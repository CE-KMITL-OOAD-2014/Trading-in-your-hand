<?php
	class product extends CI_Controller{
		
		function delete(){
			if ($this->uri->segment(3) === FALSE){ 
			echo"<script language='javascript'>
    window.location.href = '../../../pages';
</script>";
			}
			else{
				if($this->session->userdata('username')){
					$id = $this->uri->segment(3);
					$sess = $this->session->all_userdata();
					$this->load->model('Product_model');
					if($this->Product_model->checkowner($id,$sess['username'])){
						$this->Product_model->delete($id);
						echo"<script language='javascript'>
    window.location.href = '../../../pages/member/".$sess['username']."';
</script>";
					}
					else
						echo"<script language='javascript'>
	alert('You can delete only your product');
    window.location.href = '../../../pages/login';
</script>";
				}
				else 
					echo"<script language='javascript'>
    window.location.href = '../../../pages/login';
</script>";
			}
		}
		function edit(){
			if($this->session->userdata('username')){
				$sess = $this->session->all_userdata();		
				if ($this->uri->segment(3) === FALSE)
					echo"<script language='javascript'>
					window.location.href = '../../../pages/member/".$sess['username']."';
					</script>";
				else{
					$this->load->model('Product_model');	
					$temp = $this->Product_model->getproductdetail($this->uri->segment(3));
					$fname = $temp['pic1'];
					$config =  array(
						  'file_name'		=> $fname.".jpg",
						  'upload_path'     => "./productPic/",
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE,
						  'max_size'        => "1000KB",
						  'max_height'      => "768",
						  'max_width'       => "1024"  
						);
					$this->load->library('upload', $config);
					$this->upload->do_upload();
					$name = $_POST["name"];
					$price = $_POST["price"];
					$amount = $_POST["amount"];
					$type = $_POST["type"];
					$detail = $_POST["detail"];
					$data = array('id'=>$temp['id'],'name'=>$name,'price'=>$price,'amount'=>$amount,'username'=>$sess['username'],'detail'=>$detail,'pic1'=>$fname,'type'=>$type);
					$this->Product_model->edit_product($data);
					echo"<script language='javascript'>
					window.location.href = '../../../pages/member/".$sess['username']."';
					</script>";			
				}
			}
		}
		function send_mail($data,$bdata,$pdetail,$amount){
			while(true){
				$attemp = "";
				$to = $data['email'];
				$message = "<img src='http://forkbomb.azurewebsites.net/images/headmail.png'/><br/><br/>Dear ".$data['username'].",<br/><br/> An item you listed in Trading in your hand has been sold to ".$bdata['username'].".<br/><br/><table cellspacing='4' width='420'>
		<tbody>
		<tr>
		  <td width='200'><div align='right'><b>".$pdetail['name']."&nbsp;&nbsp;</b></div></td>
		  <td width='202'>".$pdetail['price']."&nbsp;THB</td>
		</tr>
		<tr>
		  <td width='200'><div align='right'><b>Amount&nbsp;&nbsp;</b></div></td>
		  <td width='202'>".$amount."&nbsp;Units</td>
		</tr>
		<tr>
		  <td width='200'><div align='right'><b>&nbsp;</b></div></td>
		  <td width='202'><hr align='left' color='#cccccc' noshade='' size='1' width='180'></td>
		</tr>
		<tr>
		  <td width='200'><div style='font-size:18px' align='right'><b>Total&nbsp;&nbsp;</b></div></td>
		  <td width='202'><span style='font-size:18px'>".$pdetail['price']*$amount."&nbsp;THB</span></td>
		</tr>   
	  </tbody>
	</table>
				<br/>The Trading in your hand team<br/>Admin : iam.pae0@gmail.com<br/>Co-Admin : nvb_kukuku@hotmail.com";	
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'test'.$attemp.'.trading.in.your.hand@gmail.com',
					'smtp_pass' => 'pae123456',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('test'.$attemp.'.trading.in.your.hand@gmail.com');
				$this->email->to($to);
				$this->email->subject('You have sold an item on Trading in your hand');
				$this->email->message($message);
				if($this->email->send())
					break;
				if($attemp=="2")
					break;
				$attemp = "2";
			}
		}
		public function sendmessage($receiver,$message){
			$temp = $this->session->all_userdata();
			$dt = date("D M d, Y G:i");
			$this->db->select_max('id');
			$query = $this->db->get('message');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$data = array('id'=>$id,'sender'=>$temp['username'],'time'=>$dt,'receiver'=>$receiver,'message'=>$message);
			$this->load->model('member_model');	
			$this->member_model->sendmessage($data);
		}
		function buy(){
			if($this->uri->segment(3) === FALSE||$this->uri->segment(4) === FALSE||!$this->session->userdata('username'))
				echo"<script language='javascript'>
    window.location.href = '../../../pages/addproduct';
</script>";
			else{
				$data = $this->session->all_userdata();
				$this->load->model('Product_model');
				$this->load->model('Log_model');
				$id = $this->uri->segment(3);
				$amount = $this->uri->segment(4);
				$detail = $this->Product_model->getproductdetail($this->uri->segment(3));
				if($this->Product_model->buyproduct($id,$amount,$data['username'])){
					$this->load->model('member_model');	
					$to = $this->member_model->memberDetail($detail);
					$this->send_mail($to,$data,$detail,$amount);
					$tdata =  array('buyer'=>$data['username'],'seller'=>$detail['username'],'product'=>$detail['name'],'price'=>$detail['price'],'amount'=>$this->uri->segment(4));
					$this->Log_model->logtransac($tdata);
					$this->sendmessage($to['username'],"You has been sold<br/>".$tdata['product']."<br/>Price&nbsp;".$tdata['price']."<br/>Amount&nbsp;".$tdata['amount']."<br/>Total&nbsp;".$tdata['price']*$tdata['amount']);
					echo"<script language='javascript'>
    window.location.href = '../../../pages/member/".$data['username']."';
</script>";
				}
				else
					echo"<script language='javascript'>
					alert('Buy failed');
    				window.location.href = '../../../pages/';
					</script>";
			}
		}
		function add(){
			$this->load->model('Product_model');	
			$this->db->select_max('id');
			$query = $this->db->get('product');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$sess = $this->session->all_userdata();
			$fname  =  md5($sess['username'].date("D M d, Y G:i").$id);
			echo $fname;
			$config =  array(
				  'file_name'		=> $fname.".jpg",
                  'upload_path'     => "./productPic/",
                  'allowed_types'   => "gif|jpg|png|jpeg",
                  'overwrite'       => TRUE,
                  'max_size'        => "1000KB",
                  'max_height'      => "768",
                  'max_width'       => "1024"  
                );
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$name = $_POST["name"];
				$price = $_POST["price"];
				$amount = $_POST["amount"];
				$type = $_POST["type"];
				$detail = $_POST["detail"];
				$data = array('id'=>$id,'name'=>$name,'price'=>$price,'amount'=>$amount,'username'=>$sess['username'],'detail'=>$detail,'pic1'=>$fname,'type'=>$type);
				if($this->Product_model->add_product($data)){
					echo"<script language='javascript'>
	alert('Upload done');
    window.location.href = '../../../pages/member/".$sess['username']."';
</script>";
				}
				else{
					echo"<script language='javascript'>
	alert('You are have the same product name');
    window.location.href = '../../../pages/addproduct';
</script>";
				}
			}
			else
			{
			   echo"<script language='javascript'>
	alert('Please browse file only type JPG');
    window.location.href = '../../../pages/addproduct';
</script>";
			}
			
		}

	}
?>
