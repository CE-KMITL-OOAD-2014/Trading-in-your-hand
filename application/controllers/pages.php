<?php

class pages extends CI_Controller {
	public function index()
	{
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('home.php');
	}
	public function register()
	{
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('register.php');
	}
	public function login(){
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('login.php');	
	}
	public function addproduct(){
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('add_product.php');	
	}
	public function editproduct(){
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('edit_product.php');	
	}
	public function displayproduct(){
		$username = "admin"; // Get username from session
		$this->load->model('Product_model');	
		$data = $this->Product_model->display_product();
		$data_send['data'] = $data;
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('display_product.php',$data_send);
	}
}
?>