<?php

class pages extends CI_Controller {
	public function index()
	{
		$this->load->view('home.php');
	}
	public function register()
	{
		$this->load->view('register.php');
	}
	public function login(){
		$this->load->view('login.php');	
	}
	public function addproduct(){
		$this->load->view('add_product.php');	
	}
	public function editproduct(){
		$this->load->view('edit_product.php');	
	}
}
?>