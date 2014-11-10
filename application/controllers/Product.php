<?php
	class product extends CI_Controller{
		
		private function check($chk){ //Check that call from pages class
		
		}
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
			$data['name'] = $_POST["name"];
			$data['price'] = $_POST["price"];
			$data['amount'] = $_POST["amount"];
			$this->load->model('Product_model');
			$this->Product_model->edit_product($data);
			echo"<h1>Updated</h1><br/>";
			echo"<a href='../Pages/displayproduct'>Back</a>";
		}
		function add(){
			$sess = $this->session->all_userdata();
			$fname  =  md5($sess['username'].date("D M d, Y G:i"));
			$this->session->set_userdata('productpic',$fname);
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
				echo "file upload success";
				echo $fname;
				$this->load->model('Product_model');	
				$this->db->select_max('id');
				$query = $this->db->get('product');
				foreach($query->result_array() as $row)
					$id = $row['id']+1;
				$name = $_POST["name"];
				$price = $_POST["price"];
				$amount = $_POST["amount"];
				$detail = $_POST["detail"];
				$data = array('id'=>$id,'name'=>$name,'price'=>$price,'amount'=>$amount,'username'=>$sess['username'],'detail'=>$detail,'pic1'=>$sess['productpic']);
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
