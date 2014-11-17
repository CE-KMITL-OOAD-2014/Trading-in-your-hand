<?php
	class product extends CI_Controller{
		
		function delete(){	// Delete product function
			if ($this->uri->segment(3) === FALSE){ // Check if dont have segment 3 , redirect
				header('Location: '."../../../pages");
			}
			else{
				if($this->session->userdata('username')){	// Check if dont login, redirect
					$id = $this->uri->segment(3);
					$sess = $this->session->all_userdata();
					$this->load->model('Product_model');
					if($this->Product_model->checkowner($id,$sess['username'])){	// Check if dont owner of this product
						$this->Product_model->delete($id);	// Delete product by id
						header('Location: '."../../../../pages/member/".$sess['username']);
					}
					else{
						echo"<script language='javascript'>
	alert('You can delete only your product');</script>";	
						header('Location: '."../../../pages");
					}
				}
				else 
					header('Location: '."../../../pages/login");
			}
		}
		function edit(){	// Edit product function
			if($this->session->userdata('username')){// Check if dont login, redirect
				$sess = $this->session->all_userdata();		
				if ($this->uri->segment(3) === FALSE)	// Check if dont have segment 3 , redirect
					echo"<script language='javascript'>
					window.location.href = '../../../pages/member/".$sess['username']."';
					</script>";
				else{
					$this->load->model('Product_model');	
					$temp = $this->Product_model->getproductdetail($this->uri->segment(3));	// Get product detail by id
					$fname = $temp['pic1'];
					$config =  array(	// Config value for upload
						  'file_name'		=> $fname.".jpg",
						  'upload_path'     => "./productPic/",
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE,
						  'max_size'        => "1000KB",
						  'max_height'      => "768",
						  'max_width'       => "1024"  
						);
					$this->load->library('upload', $config);	// Load library upload
					$this->upload->do_upload();	// Upload picture
					$name = $_POST["name"];
					$price = $_POST["price"];
					$amount = $_POST["amount"];
					$type = $_POST["type"];
					$detail = $_POST["detail"];
					$data = array('id'=>$temp['id'],'name'=>$name,'price'=>$price,'amount'=>$amount,'username'=>$sess['username'],'detail'=>$detail,'pic1'=>$fname,'type'=>$type);
					$this->Product_model->edit_product($data);	// Call model to update value to database
					header('Location: '."../../../../pages/member/".$sess['username']);			
				}
			}
		}
		function send_mail($data,$bdata,$pdetail,$amount){	// Send transaction email to seller
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
				<br/>The Trading in your hand team<br/>Admin : iam.pae0@gmail.com<br/>Co-Admin : nvb_kukuku@hotmail.com";	// Set message to send
				$config = Array(	// Config value to send email
						'protocol' => 'smtp',
						'smtp_host' => 'mx1.hostinger.in.th',
						'smtp_port' => 2525,
						'smtp_user' => 'support@trading.esy.es',
						'smtp_pass' => 'pae123456',
						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('support@trading.esy.es');
				$this->email->to($to);
				$this->email->subject('You have sold an item on Trading in your hand');
				$this->email->message($message);
				$this->email->send();	// Send email
		}
		public function sendmessage($receiver,$message){	// Send message to message box of seller
			$temp = $this->session->all_userdata();
			$dt = date("D M d, Y G:i");
			$this->db->select_max('id');
			$query = $this->db->get('message');
			foreach($query->result_array() as $row)	// define id in database for this message
				$id = $row['id']+1;
			$data = array('id'=>$id,'sender'=>$temp['username'],'time'=>$dt,'receiver'=>$receiver,'message'=>$message);	
			$this->load->model('member_model');	
			$this->member_model->sendmessage($data);	// Send message
		}
		function buy(){
			if($this->uri->segment(3) === FALSE||$this->uri->segment(4) === FALSE||!$this->session->userdata('username'))	// Check condition

				header('Location: '."../../../../pages/addproduct");
			else{
				$data = $this->session->all_userdata();
				$this->load->model('Product_model');
				$this->load->model('Log_model');
				$id = $this->uri->segment(3);
				$amount = $this->uri->segment(4);
				$detail = $this->Product_model->getproductdetail($this->uri->segment(3));	//	get product detail
				if($this->Product_model->buyproduct($id,$amount,$data['username'])){	// Check if buy done
					$this->load->model('member_model');	
					$to = $this->member_model->memberDetail($detail);	// get member detail
					$this->send_mail($to,$data,$detail,$amount);	
					$tdata =  array('buyer'=>$data['username'],'seller'=>$detail['username'],'product'=>$detail['name'],'price'=>$detail['price'],'amount'=>$this->uri->segment(4));
					$this->Log_model->logtransac($tdata);
					$this->sendmessage($to['username'],"You has been sold<br/>".$tdata['product']."<br/>Price&nbsp;".$tdata['price']."<br/>Amount&nbsp;".$tdata['amount']."<br/>Total&nbsp;".$tdata['price']*$tdata['amount']);			// send message to seller
					header('Location: '."../../../../pages");
				}
				else{
					echo"<script language='javascript'>
					alert('Buy failed');
					</script>";
					header('Location: '."../../../../pages");
				}
			}
		}
		function add(){	 //add product function
			$this->load->model('Product_model');	
			$this->db->select_max('id');	
			$query = $this->db->get('product');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;				// find max id+1 in db to use to this product
			$sess = $this->session->all_userdata();
			$fname  =  md5($sess['username'].date("D M d, Y G:i").$id);
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
			if($this->upload->do_upload())	// if upload done
			{
				$name = $_POST["name"];
				$price = $_POST["price"];
				$amount = $_POST["amount"];
				$type = $_POST["type"];
				$detail = $_POST["detail"];
				$data = array('id'=>$id,'name'=>$name,'price'=>$price,'amount'=>$amount,'username'=>$sess['username'],'detail'=>$detail,'pic1'=>$fname,'type'=>$type);
				if($this->Product_model->add_product($data)){	// Add product
					echo"<script language='javascript'>
	alert('Upload done');
</script>";
					header('Location: '."../../../../pages/member/".$sess['username']);
				}
				else{
					echo"<script language='javascript'>
	alert('You are have the same product name');
</script>";
					header('Location: '."../../../../pages/addproduct");
				}
			}
			else
			{
			   echo"<script language='javascript'>
	alert('Please browse file only type JPG');
</script>";
				header('Location: '."../../../../pages/addproduct");
			}
			
		}

	}
?>
