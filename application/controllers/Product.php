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
				$data = $this->session->all_userdata();
				$id = $data['username'];		
				if ($this->uri->segment(3) === FALSE)
					echo"<script language='javascript'>
					window.location.href = '../../../pages/member/".$data['username']."';
					</script>";
			else{
				$this->load->model('Product_model');	
				$fname = $this->Product_model->getproductdetail($this->uri->segment(3));
				$fname = $fname['pic1'];
				$config =  array(
					  'file_name'		=> $fname,
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
					$this->Product_model->edit_product($data);
				}
				else
				   echo"<script language='javascript'>
					alert('Please browse file only type JPG');
					window.location.href = '../../../pages/addproduct';
					</script>";
				
			}
		}
		}		
		function send_mail($data,$bdata,$pdetail,$amount){
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
			<br/>The Trading in your hand team<br/>Admin : iam.pae0@gmail.com<br/>Assistant Admin : nvb_kukuku@hotmail.com";	
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'test2.trading.in.your.hand@gmail.com',
				'smtp_pass' => 'pae123456',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('test2.trading.in.your.hand@gmail.com');
			$this->email->to($to);
			$this->email->subject('You have sold an item on Trading in your hand');
			$this->email->message($message);
			$result = $this->email->send();	
		}
		function buy(){
			if($this->uri->segment(3) === FALSE||$this->uri->segment(4) === FALSE||!$this->session->userdata('username'))
				echo"<script language='javascript'>
    window.location.href = '../../../pages/addproduct';
</script>";
			else{
				$data = $this->session->all_userdata();
				$this->load->model('Product_model');
				$id = $this->uri->segment(3);
				$amount = $this->uri->segment(4);
				if($this->Product_model->buyproduct($id,$amount,$data['username'])){
					$detail = $this->Product_model->getproductdetail($this->uri->segment(3));
					$this->load->model('member_model');	
					$to = $this->member_model->memberDetail($detail);
					$this->send_mail($to,$data,$detail,$amount);
					echo"<script language='javascript'>
    window.location.href = '../../../pages/member/".$data['username']."';
</script>";
					echo"sucsess";
				}
				else
					echo"fail";
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
				  'file_name'		=> $fname,
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
