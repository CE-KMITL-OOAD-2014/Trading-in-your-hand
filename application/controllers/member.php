<?
class member extends CI_Controller {
	public function twowayauthen($number){	// This function use to Confirmation code send emial address. 
			$attemp = "";
			$sess = $this->session->all_userdata();
			$to = $sess['remail'];
			$message = "<img src='http://forkbomb.azurewebsites.net/images/headmail.png'/><br/><br/>Dear ".$sess['rusername'].",<br/><br/> Here's the Confirmation code you'll need to complete the process: <br/><h1><b>".$number."</b></h1>If you haven't recently tried to login to Trading in your hand from the device located at ".$_SERVER['REMOTE_ADDR'].", someone else may be trying to access your account.<br/><br/>Thanks for using our website<br/><br/>The Trading in your hand team<br/>Admin : iam.pae0@gmail.com<br/>Co-Admin : nvb_kukuku@hotmail.com";	
			$config = Array(	// Config email of bot.
				'protocol' => 'smtp',
				'smtp_host' => 'mx1.hostinger.in.th',
				'smtp_port' => 2525,
				'smtp_user' => 'support@trading.esy.es',
				'smtp_pass' => 'pae123456',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('support@trading.esy.es');
			$this->email->to($to);
			$this->email->subject('Trading-in-your-hand-Confirmation code');
			$this->email->message($message);
			$this->email->send();	// Send email 
	}
	public function givestar(){	// This function use to give star to seller that you have bought.
		if ($this->uri->segment(3) === FALSE)
			header('Location: '."../../../../pages");
		else{
			$score = $_POST['score'];
			$name['username'] = $this->uri->segment(3);
			$this->load->model('member_model');	
			$data = $this->member_model->memberdetail($name);	// get old score
			$newscore = ((($data['avg']*$data['amount'])+$score)/($data['amount']+1));	//Calulate new score
			$setdata = array('name'=>$name['username'],'score'=>$newscore,'amount'=>$data['amount']+1);
			$this->member_model->setnewscore($setdata);	// set new score
			header('Location: '."../../../../pages/member/".$name['username']);
		}
	}
	public function register(){ // This fuction use to register
			$username = strtolower($_POST['username']);
			$password = md5($_POST['password']);
			$name = $_POST['name'];
			$sname = $_POST['sname'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$this->load->model('member_model');	
			if($this->member_model->checkexist($username)){	// Check if username exist
				echo"<script language='javascript'>
	alert('Sorry , There are the exist username in system');
    window.location.href = '../../pages/register';	
</script>";}
			else{
				$number = rand(1111111,9999999);	// random number ( Confirmation code  )
				$data = array('rusername'=>$username,'rpassword'=>$password,'rname'=>$name,'rsname'=>$sname,'raddress'=>$address,'remail'=>$email,'rcode' => $number);
				$this->session->set_userdata($data);
				$this->genlog("","Register first");	// generate log to db
				$this->twowayauthen($number);	// call step two
				header('Location: '."../../../../pages/confirm");
			}
		}
	public function register2way(){ // Register function ( step2 ) after confirmation step
 			$code = $_POST['code'];
			$sess = $this->session->all_userdata();
			if($code!=$sess['rcode'])
				echo"<script language='javascript'>
	alert('Sorry , You are enter wrong code');
    window.location.href = '../../pages/confirm';	
</script>";
			$this->load->model('member_model');
			$this->db->select_max('id');
			$query = $this->db->get('member');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;	// get max id from db to find this id
			$data = array('id'=>$id,'username'=>$sess['rusername'],'password'=>$sess['rpassword'],'name'=>$sess['rname'],'sname'=>$sess['rsname'],'address'=>$sess['raddress'],'email'=>$sess['remail'],'facebook'=>"https://",'twitter'=>"https://",'github'=>"https://",'googleplus'=>"https://",'iden'=>0);
			if($this->member_model->register($data))	//  if put data to db success
				$this->session->sess_destroy();// detroy session that include confirmation code
			$this->genlog($sess['rusername'],"Register success");
			echo"<script language='javascript'>
	alert('Success');
    window.location.href = '../../pages/login';
</script>";
		}	
	public function genlog($username,$activity){	// Generate log function
		$ip = $_SERVER['REMOTE_ADDR'];// get client ip address
		$this->db->select_max('id');
		$query = $this->db->get('log');
		foreach($query->result_array() as $row)
			$id = $row['id']+1;	
		$browser = $_SERVER['HTTP_USER_AGENT'];	// get client web browser
		$dt = date("D M d, Y G:i");	// get date
		$data = array('id' => $id,'browser' => $browser,'time' => $dt,'ip' => $ip,'username' => $username,'Activity' => $activity);
		$this->load->model('Log_model');
		$this->Log_model->logmember($data);	// Put data to log db
	}
	public function isExist(){	// This function use to check username exist in system
		$this->load->model('member_model');	
		if ($this->uri->segment(3) === FALSE)
			echo"<script language='javascript'>
	alert('Please enter username');
	window.location.href = '../../pages/register';
</script>";
		else{
			if($this->member_model->checkexist($this->uri->segment(3)))
				echo"<script language='javascript'>
	alert('Sorry , There are the exist username in system');
    window.location.href = '../../pages/register';	
</script>";
			else
				echo"<script language='javascript'>
	alert('You can use this username');
    window.location.href = '../../pages/register';
</script>";
		}
	}
	public function login(){	// Log in process function
			$data['username'] = strtolower($_POST['username']);		//
			$data['password'] = $_POST['password'];		// Get data from user
			$this->load->model('member_model');	
			$check = $this->member_model->verifylogin($data);	// Verify that username exist in system
			$name = $this->member_model->memberDetail($data);	// get member detail to use to sent email
			$this->genlog($data['username'],"log in first");	// Generate log
			if($check){
				$number = rand(1111111,9999999);	// Generate confirmation code
				$temp = array('rusername'=>$data['username'],'rpassword'=>$data['password'],'remail'=>$name['email'],'rcode'=>$number,'login2'=>'1');
				$this->session->set_userdata($temp);	// Set session to use for 2 way authen
				$this->twowayauthen($number);	// Call function that send confirmation code to your email
				header('Location: '."../../../../pages/confirm");
			}
			else
				echo"<script language='javascript'>
	alert('Username or Password incorrect');
    window.location.href = '../../pages/login';
</script>";
		}
	public function logintwoway(){ // The second step that call after put confirmation code
			$code = $_POST['code'];
			$sess = $this->session->all_userdata();
			if($code!=$sess['rcode'])	// Check confirmation code
				echo"<script language='javascript'>
	alert('Sorry , You are enter wrong code');
    window.location.href = '../../pages/confirm';	
</script>";
			else{	// If put correct confirmation code
			$this->load->model('member_model');
			$data['username'] = $sess['rusername'];
			$name = $this->member_model->memberDetail($data);	// get user data
			$sess = $this->session->all_userdata();
			$newdata = array(
                   'username'  => $sess['rusername'],
                   'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);	// Create new account
			$this->genlog($data['username'],"log in success");	// Generate log file
			echo"<script language='javascript'>
	alert('Welcome , ".$name['name']."');
    window.location.href = '../../pages';
</script>";}
		}
	public function logout(){	// Log out function
			$this->session->sess_destroy();	// Detroy all session
			header('Location: '."../../../../pages");
		}

	public function sendmessage(){	// This function use to send message to other user
			$receiver = strtolower($_POST['receiver']);
			$message = $_POST['message'];
			$temp = $this->session->all_userdata();
			$dt = date("D M d, Y G:i");	// get date time
			$this->db->select_max('id');
			$query = $this->db->get('message');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$data = array('id'=>$id,'sender'=>$temp['username'],'time'=>$dt,'receiver'=>$receiver,'message'=>$message); // put data to array
			$this->load->model('member_model');	
			$this->member_model->sendmessage($data); // Send message
			echo"<script language='javascript'>
	alert('success');
    window.location.href = '../../pages/message';
</script>";	
		}
	public function delmessage(){	// Use for delete message in inbox
		if ($this->uri->segment(3) === FALSE)
			header('Location: '."../../../../pages");
		else{
			$this->load->model('member_model');
			$message = $this->member_model->messageDetail($this->uri->segment(3));	// get message data
			$sess = $this->session->all_userdata();
			if($sess['username']==$message['receiver']){	// Chech that you're the true owner of this message
				$this->member_model->delmessage($this->uri->segment(3));	// Delete message
			}
			header('Location: '."../../../../pages/viewmessage");
		}	
	}
	public function edit(){	// Use to edit profile
		$data = $this->session->all_userdata();	//get session data
		$this->load->model('member_model');
		$data['name'] = $_POST["name"];
		$data['sname'] = $_POST["sname"];
		$data['about'] = $_POST["about"];
		$data['email'] = $_POST["email"];
		$data['address'] = $_POST["address"];
		$data['facebook'] = $_POST["facebook"];
		$data['twitter'] = $_POST["twitter"];
		$data['googleplus'] = $_POST["googleplus"];
		$data['github'] = $_POST["github"];
		$this->member_model->edit_profile($data);	// Update data to db
		header('Location: '."../../../../pages/member/".$data['username']);
	}
	public function uploaded(){	// This function use to upload identify picture 
		$data = $this->session->all_userdata();
		if ($this->uri->segment(3) === FALSE){
			$name = md5(base64_encode($data['username']));
			
		}
		else{ // identify picture name 
			$name = md5(base64_encode(md5($data['username'])));
		}
		$config =  array(
				'file_name'		  => $name.".jpg",
                'upload_path'     => "./userPic/",
                'allowed_types'   => "gif|jpg|png|jpeg",
                'overwrite'       => TRUE,
                'max_size'        => "1000KB",
                'max_height'      => "768",
                'max_width'       => "1024"  
            );
		$this->load->library('upload', $config);
		if($this->upload->do_upload())	// if upload done
			if ($this->uri->segment(3) === FALSE)
				header('Location: '."../../../../pages/editprofile");	
			else{
				header('Location: '."../../../../pages/iden");
				$this->load->model('member_model');
				$this->member_model->queueiden($data['username']);	// Set this user to seller
				}
		else
			if ($this->uri->segment(3) === FALSE)
				echo"<script language='javascript'>
				alert('Please browse file');
    			window.location.href = '../../pages/editprofile';
				</script>";	
			else
				echo"<script language='javascript'>
				alert('Please browse file only type JPG');
    			window.location.href = '../../pages/iden';
				</script>";	
	}	
}
?>