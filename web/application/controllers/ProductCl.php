<?php
	class ProductCl extends CI_Controller{
		function add(){
			$name = $_POST["name"];
			$price = $_POST["price"];
			$amount = $_POST["amount"];
			$data = array('name'=>$name,'price'=>$price,'amount'=>$amount);
			$this->load->model('Product_model');	
			$this->Product_model->add_product($data);
			echo"<h1>Your product has added to database</h1><br />";
			echo"<a href='../HomeCl'>Back</a>";
		}
		function display(){
			$data = $this->db->get('product');
			return $data;
		}
	}
?>
