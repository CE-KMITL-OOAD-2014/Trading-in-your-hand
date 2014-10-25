<?php

class pages extends CI_Controller {
	public function index()
	{	$data['page'] = "home";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('home.php');
		$this->load->view('footer.php');
	}
	public function register()
	{
		$data['page'] = "register";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('register.php');
		$this->load->view('footer.php');
	}
	public function login(){
		$data['page'] = "login";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('login.php');	
		$this->load->view('footer.php');
	}
	public function addproduct(){
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('space.php');
		$this->load->view('add_product.php');	
		$this->load->view('footer.php');
	}
	public function editproduct(){
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('space.php');
		$this->load->view('edit_product.php');
		$this->load->view('footer.php');	
	}
	public function displayproduct(){
		$username = "admin"; // Get username from session
		$this->load->model('Product_model');	
		$data = $this->Product_model->display_product();
		$data_send['data'] = $data;
		$this->load->helper('body.php');
		$this->load->view('header.php');
		$this->load->view('space.php');
		$this->load->view('display_product.php',$data_send);
		$this->load->view('footer.php');
	}
	public function message(){
		$data['page'] = "message"; 
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('message.php');
		$this->load->view('footer.php');
	}
	public function viewmessage(){
		$data['page'] = "message"; 
		$this->load->model('member_model');	
		$mdata['data'] = $this->member_model->getmessage();
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('viewmessage.php',$mdata);
		$this->load->view('footer.php');		
	}
	public function upload(){
		$data['page'] = "upload"; 
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('message.php');
		$this->load->view('footer.php');
	}
}
?>