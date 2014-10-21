<?php
	class Product extends CI_Controller{
		
		private function check($chk){ //Check that call from pages class
		
		}
		function add(){
			$id = 55;
			$name = $_POST["name"];
			$price = $_POST["price"];
			$amount = $_POST["amount"];
			$username = "admin"; // Get username from session
			$data = array('id'=>$id,'name'=>$name,'price'=>$price,'amount'=>$amount,'username'=>$username);
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

	}
?>
