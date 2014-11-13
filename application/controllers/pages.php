<?php

class pages extends CI_Controller {
	public function index()
	{	$data['page'] = "Home";
		$this->load->model('Product_model');	
		$pdata = $this->Product_model->newProduct();
		$num = 0;
    	foreach($pdata->result_array() as $rows){
			$num++;
			$tdata[$num] = $rows;
		}
		$temp['data'] = $tdata;
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('home.php',$temp);
		$this->load->view('footer.php');
	}
	public function register()
	{
		$data['page'] = "Register";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('register.php');
		$this->load->view('footer.php');
	}
	public function confirm()
	{
		$data['page'] = "confirm";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('confirm.php');
		$this->load->view('footer.php');
	}
	public function iden()
	{
		$data['page'] = "identify";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('indentify.php');
		$this->load->view('footer.php');
	}
	public function login(){
		if($this->session->userdata('username')){
			$sess = $this->session->all_userdata();
			echo"<script language='javascript'>
    window.location.href = '../../../pages/member/".$sess['username']."';
</script>";
		}
		$data['page'] = "Log in";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('login.php');	
		$this->load->view('footer.php');
	}
	public function addproduct(){
		$this->load->model('member_model');
		$sess = $this->session->all_userdata();
		$checkiden = $this->member_model->memberDetail($sess);
		if($checkiden['iden']==0)
			echo"<script language='javascript'>
	alert('Please identify first');
    window.location.href = '../../../pages/member/".$sess['username']."';
</script>";
		$data['page'] = "addproduct";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
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
		$data['page'] = "Message"; 
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('message.php');
		$this->load->view('footer.php');
	}
	public function viewmessage(){
		$data['page'] = "Message"; 
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
		$this->load->view('upload.php');
		$this->load->view('footer.php');
	}
	public function member(){
		if ($this->uri->segment(3) === FALSE){ 
			echo"<script language='javascript'>
    window.location.href = '../../pages';
</script>";
		}
		else{
			if ($this->uri->segment(4) === FALSE)
				$ppage = 1;
			else
				$ppage = $this->uri->segment(4);
			$data['username'] = $this->uri->segment(3);
			$id = $data['username'];
			$this->load->model('member_model');	
			$this->load->model('product_model');	
			$detail = $this->member_model->memberDetail($data);
			$pdata = $this->product_model->userProduct($data);
			$data['page'] = "profile"; 
			$temp = array( 'detail' => $detail, 'pdata' => $pdata, 'ppage' => $ppage ,'id' => $id); 
			$this->load->helper('body.php');
			$this->load->view('header.php',$data);
			$this->load->view('space.php');
			$this->load->view('profile',$temp);
			$this->load->view('footer.php');
		}
	}
	public function search(){
		$data = $this->session->all_userdata();
		$data['page'] = "Search";
		$id = $data['username'];
		$this->load->model('product_model');
		if($this->uri->segment(3) === FALSE)
			$type = "all";
		else $type = $this->uri->segment(3);
		if($this->uri->segment(4) === FALSE)
			$name = "";
		else
			$name = $this->uri->segment(3);
		if ($this->uri->segment(5) === FALSE)
			$ppage = 1;
		else
			$ppage = $this->uri->segment(5);
		$pdata = $this->product_model->viewProduct($name,$type);
		$temp = array('pdata' => $pdata, 'ppage' => $ppage ,'id' => $id,'$type' => $type,'$name' => $name); 
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('search',$temp);
		$this->load->view('footer.php');
		
	}
	public function editprofile(){
		if($this->session->userdata('username')){
			$this->load->model('member_model');
			$data['page'] = "Edit profile"; 
			$sess = $this->session->all_userdata();
			$detail = $this->member_model->memberDetail($sess);
			$this->load->helper('body.php');
			$this->load->view('header.php',$data);
			$this->load->view('space.php');
			$this->load->view('edit_profile.php',$detail);
			$this->load->view('footer.php');
		}
		else
			echo"<script language='javascript'>
    window.location.href = '../../pages';
</script>";
	}
}
?>