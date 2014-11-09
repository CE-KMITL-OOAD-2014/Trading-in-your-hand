<?php
	class product extends CI_Controller{
		
		private function check($chk){ //Check that call from pages class
		
		}
		function add(){
			$sess = $this->session->all_userdata();
			$query = $this->db->get('product');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$name = $_POST["name"];
			$price = $_POST["price"];
			$amount = $_POST["amount"];
			$detail = $_POST["detail"];
			$data = array('id'=>$id,'name'=>$name,'price'=>$price,'amount'=>$amount,'username'=>$sess['username'],'pic1'=>$sess['productpic']);
			$this->load->model('Product_model');	
			if($this->Product_model->add_product($data)){
				echo"<h1>Your product has added to database</h1><br />";
				echo"<a href='../Pages'>Back</a>";
			}
			else{
				echo"<h1>Your have the same product name</h1><br />";
				echo"<a href='../Pages'>Back</a>";
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
		function uploaded(){
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
			}
			else
			{
			   echo "file upload failed";
			}
			
		}

	}
?>
