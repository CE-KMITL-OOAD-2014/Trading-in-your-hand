<?php

class pages extends CI_Controller {
	public function index()	// Home page
	{	$data['page'] = "Home";
		$this->load->model('Product_model');	
		$pdata = $this->Product_model->newProduct();	// Get product sort by new arrival
		$num = 0;
    	foreach($pdata->result_array() as $rows){
			$num++;
			$tdata[$num] = $rows;	// Store product detail in array
		}
		$temp['data'] = $tdata;
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('home.php',$temp);
		$this->load->view('footer.php');
	}
	public function error(){	// Error check redirect
		$data['page'] = "Error";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('error');
		$this->load->view('footer.php');
	}
	public function register()	// Register page
	{
		$data['page'] = "Register";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('register.php');
		$this->load->view('footer.php');
	}
	public function confirm()	// confirm page
	{
		if($this->session->userdata('username')){	// check login
			$sess = $this->session->all_userdata();
			header('Location: '."../../../../pages/member/".$sess['username']);
		}
		$data['page'] = "confirm";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('confirm.php');
		$this->load->view('footer.php');
	}
	public function about()	// About page
	{
		$data['page'] = "About";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('about.php');
		$this->load->view('footer.php');	
	}
	public function iden()	// identify page
	{
		if(!$this->session->userdata('username')){	// check login
			header('Location: '."../../../../pages");
		}
		else{
			$data['page'] = "identify";
			$this->load->helper('body.php');
			$this->load->view('header.php',$data);
			$this->load->view('space.php');
			$this->load->view('indentify.php');
			$this->load->view('footer.php');
		}
	}
	public function login(){	// ;ogin page
		if($this->session->userdata('username')){	// check login
			$sess = $this->session->all_userdata();
			header('Location: '."../../../../pages/member/".$sess['username']);
		}
		$data['page'] = "Log in";
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('login.php');	
		$this->load->view('footer.php');
	}
	public function addproduct(){	// add product page
		if(!$this->session->userdata('username')){	// check login
			header('Location: '."../../../../pages");
		}
		else{
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
	}
	public function editproduct(){// edit product page
		if($this->session->userdata('username')){
			$data = $this->session->all_userdata();
			$id = $data['username'];		
			if ($this->uri->segment(3) === FALSE)
				header('Location: '."../../../../pages/member/".$data['username']);
			else{
				$this->load->model('Product_model');
				$pdata = $this->Product_model->getproductdetail($this->uri->segment(3)); // get product detail
				$head['page'] = "Edit product";	
				$this->load->helper('body.php');
				$this->load->view('header.php',$head);
				$this->load->view('space.php');
				$this->load->view('edit_product.php',$pdata);
				$this->load->view('footer.php');
			}
		}
		else
			header('Location: '."../../../../pages");
	}
	
	public function message(){		// Send message page
		if(!$this->session->userdata('username')){	// check login
			header('Location: '."../../../../pages");
		}
		else
		{
			$data['page'] = "Message"; 
			$this->load->helper('body.php');
			$this->load->view('header.php',$data);
			$this->load->view('space.php');
			$this->load->view('message.php');
			$this->load->view('footer.php');
		}
	}
	public function viewmessage(){	// view message page
		if(!$this->session->userdata('username')){	// check login
			header('Location: '."../../../../pages");
		}
		else
		{
			$data['page'] = "Message"; 
			$this->load->model('member_model');	
			$mdata['data'] = $this->member_model->getmessage();
			$this->load->helper('body.php');
			$this->load->view('header.php',$data);
			$this->load->view('space.php');
			$this->load->view('viewmessage.php',$mdata);
			$this->load->view('footer.php');	
		}
	}
	public function member(){ // member profile page
		if ($this->uri->segment(3) === FALSE){ 
			header('Location: '."../../../../pages");
		}
		else{
			$this->load->model('member_model');	
			if ($this->uri->segment(4) === FALSE)
				$ppage = 1;
			else 
				$ppage = $this->uri->segment(4);
			if($this->session->userdata('username')){	// Check login status
				$this->load->model('member_model');	
				$sess = $this->session->all_userdata();
				$score = $this->member_model->getstatusscore($sess['username'],$this->uri->segment(3));
				$isScore = true;
			}
			else{
				$score = "";
				$isScore = false;
			}
			if(!$this->member_model->checkexist($this->uri->segment(3))){ // Check exist username
					echo"<script language='javascript'>
		alert('Sorry , There are no exist username in system');
		window.location.href = '../../../../pages';	
	</script>";
			}
			$data['username'] = $this->uri->segment(3);
			$id = $data['username'];
			$this->load->model('product_model');	
			$detail = $this->member_model->memberDetail($data);	// get profile detail
			$pdata = $this->product_model->userProduct($data);	// get product og this user
			$data['page'] = "profile"; 
			$temp = array( 'detail' => $detail, 'pdata' => $pdata, 'ppage' => $ppage ,'id' => $id,'score' => $score,'isScore' => $isScore); 
			$this->load->helper('body.php');
			$this->load->view('header.php',$data);
			$this->load->view('space.php');
			$this->load->view('profile',$temp);
			$this->load->view('footer.php');
		}
	}
	public function search(){	// Search page
		if($this->session->userdata('username')){
			$data = $this->session->all_userdata();
			$id = $data['username'];}
		$id = "";
		$data['page'] = "Search";
		$this->load->model('product_model');
		if($this->uri->segment(3) === FALSE)
			$type = "all";
		else 
			$type = $this->uri->segment(3);
		if($this->uri->segment(4) === FALSE)
			$name = "Any";
		else
			$name = $this->uri->segment(4);
		if ($this->uri->segment(5) === FALSE)
			$ppage = 1;
		else
			$ppage = $this->uri->segment(5);
		$pdata = $this->product_model->viewProduct($name,$type);	// get product detail
		$temp = array('pdata' => $pdata, 'ppage' => $ppage ,'id' => $id,'type' => $type,'name' => $name); 
		$this->load->helper('body.php');
		$this->load->view('header.php',$data);
		$this->load->view('space.php');
		$this->load->view('search',$temp);
		$this->load->view('footer.php');
		
	}
	public function buy(){	// buy page
		if($this->session->userdata('username')){
			$data = $this->session->all_userdata();
			$id = $data['username'];		
			if ($this->uri->segment(3) === FALSE)
				header('Location: '."../../../../pages/member/".$data['username']);
			else{
				$this->load->model('Product_model');
				$pdata = $this->Product_model->getproductdetail($this->uri->segment(3));	// get product detail
				$head['page'] = "Buy product";	
				$this->load->helper('body.php');
				$this->load->view('header.php',$head);
				$this->load->view('space.php');
				$this->load->view('buy.php',$pdata);
				$this->load->view('footer.php');
			}
		}
		else
			echo"<script language='javascript'>
			alert('Please Log in before');
		window.location.href = '../../../pages/login';
	</script>";
	}
	public function editprofile(){	// edit profile page
		if($this->session->userdata('username')){
			$this->load->model('member_model');
			$data['page'] = "Edit profile"; 
			$sess = $this->session->all_userdata();
			$detail = $this->member_model->memberDetail($sess);	// get member detail from db
			$this->load->helper('body.php');
			$this->load->view('header.php',$data);
			$this->load->view('space.php');
			$this->load->view('edit_profile.php',$detail);
			$this->load->view('footer.php');
		}
		else
			header('Location: '."../../../../pages/login");
	}
	public function phistory(){	// purchase history page
		if(!$this->session->userdata('username')){	// check login
			header('Location: '."../../../../pages");
		}
		else
		{
			$sess = $this->session->all_userdata();
			$this->load->model('product_model');
			$pdata['data'] = $this->product_model->gettransac($sess); // get transaction history form db
			$data['page'] = "Purchase history"; 
			$this->load->helper('body.php');
			$this->load->view('header.php',$data);
			$this->load->view('space.php');
			$this->load->view('phistory.php',$pdata);
			$this->load->view('footer.php');	
		}
	}
}
?>