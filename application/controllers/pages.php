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
	public function captcha(){
		$newdata['code']=rand(1000,9999);
		$this->session->set_userdata($newdata);
		$im = imagecreatetruecolor(50, 24);
		$bg = imagecolorallocate($im, 22, 86, 165); //background color blue
		$fg = imagecolorallocate($im, 255, 255, 255);//text color white
		imagefill($im, 0, 0, $bg);
		imagestring($im, 5, 5, 5,  $code, $fg);
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-type: image/png');
		imagepng($im);
		
	}
}
?>