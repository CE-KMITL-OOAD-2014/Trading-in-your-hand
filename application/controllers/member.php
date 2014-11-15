<?
class member extends CI_Controller {
	public function twowayauthen($number){
		while(true){
			$attemp = 1;
			$sess = $this->session->all_userdata();
			$to = $sess['remail'];
			$message = "<img src='http://forkbomb.azurewebsites.net/images/headmail.png'/><br/><br/>Dear ".$sess['rusername'].",<br/><br/> Here's the Confirmation code you'll need to complete the process: <br/><h1><b>".$number."</b></h1>If you haven't recently tried to login to Trading in your hand from the device located at ".$_SERVER['REMOTE_ADDR'].", someone else may be trying to access your account.<br/><br/>Thanks for using our website<br/><br/>The Trading in your hand team<br/>Admin : iam.pae0@gmail.com<br/>Co-Admin : nvb_kukuku@hotmail.com";	
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'test'.$attemp.'.trading.in.your.hand@gmail.com',
				'smtp_pass' => 'pae123456',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('test'.$attemp.'.trading.in.your.hand@gmail.com');
			$this->email->to($to);
			$this->email->subject('Trading-in-your-hand-Confirmation code');
			$this->email->message($message);
			if($this->email->send())
				break;
		}
	}
	public function register(){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$name = $_POST['name'];
			$sname = $_POST['sname'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$this->load->model('member_model');	
			if($this->member_model->checkexist($username)){
				echo"<script language='javascript'>
	alert('Sorry , There are the exist username in system');
    window.location.href = '../../pages/register';	
</script>";}
			else{
				$number = rand(1111111,9999999);
				$data = array('rusername'=>$username,'rpassword'=>$password,'rname'=>$name,'rsname'=>$sname,'raddress'=>$address,'remail'=>$email,'rcode' => $number);
				$this->session->set_userdata($data);
				$this->genlog("","Register first");
				$this->twowayauthen($number);
				echo"<script language='javascript'>
		window.location.href = '../../pages/confirm';	
	</script>";
			}
		}
	public function register2way(){
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
				$id = $row['id']+1;
			$data = array('id'=>$id,'username'=>$sess['rusername'],'password'=>$sess['rpassword'],'name'=>$sess['rname'],'sname'=>$sess['rsname'],'address'=>$sess['raddress'],'email'=>$sess['remail'],'facebook'=>"https://",'twitter'=>"https://",'github'=>"https://",'googleplus'=>"https://",'iden'=>0);
			if($this->member_model->register($data))
				$this->session->sess_destroy();
			$this->genlog($sess['rusername'],"Register success");
			echo"<script language='javascript'>
	alert('Success');
    window.location.href = '../../pages/login';
</script>";
		}	
	public function genlog($username,$activity){
		$ip = $_SERVER['REMOTE_ADDR'];
		$this->db->select_max('id');
		$query = $this->db->get('log');
		foreach($query->result_array() as $row)
			$id = $row['id']+1;
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$dt = date("D M d, Y G:i");
		$data = array('id' => $id,'browser' => $browser,'time' => $dt,'ip' => $ip,'username' => $username,'Activity' => $activity);
		$this->load->model('Log_model');
		$this->Log_model->logmember($data);
	}
	public function isExist(){
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
	public function login(){
			$data['username'] = $_POST['username'];
			$data['password'] = $_POST['password'];
			$this->load->model('member_model');	
			$check = $this->member_model->verifylogin($data);
			$name = $this->member_model->memberDetail($data);
			$this->genlog($data['username'],"log in first");
			if($check){
				$number = rand(1111111,9999999);
				$temp = array('rusername'=>$data['username'],'rpassword'=>$data['password'],'remail'=>$name['email'],'rcode'=>$number,'login2'=>'1');
				$this->session->set_userdata($temp);
				$this->twowayauthen($number);
				echo"<script language='javascript'>
    window.location.href = '../../pages/confirm';	
</script>";
			}
			else
				echo"<script language='javascript'>
	alert('Username or Password incorrect');
    window.location.href = '../../pages/login';
</script>";
		}
	public function logintwoway(){
			$code = $_POST['code'];
			$sess = $this->session->all_userdata();
			if($code!=$sess['rcode'])
				echo"<script language='javascript'>
	alert('Sorry , You are enter wrong code');
    window.location.href = '../../pages/confirm';	
</script>";
			else{
			$this->load->model('member_model');
			$data['username'] = $sess['rusername'];
			$name = $this->member_model->memberDetail($data);
			$sess = $this->session->all_userdata();
			$newdata = array(
                   'username'  => $sess['rusername'],
                   'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);
			$this->genlog($data['username'],"log in success");
			echo"<script language='javascript'>
	alert('Welcome , ".$name['name']."');
    window.location.href = '../../pages';
</script>";}
		}
	public function logout(){
			$this->session->sess_destroy();
			echo"<script language='javascript'>
    window.location.href = '../../pages';
</script>";
		}

	public function sendmessage(){
			$receiver = $_POST['receiver'];
			$message = $_POST['message'];
			$temp = $this->session->all_userdata();
			$dt = date("D M d, Y G:i");
			$this->db->select_max('id');
			$query = $this->db->get('message');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$data = array('id'=>$id,'sender'=>$temp['username'],'time'=>$dt,'receiver'=>$receiver,'message'=>$message);
			$this->load->model('member_model');	
			$this->member_model->sendmessage($data);
			echo"<script language='javascript'>
	alert('success');
    window.location.href = '../../pages/message';
</script>";	
		}
	public function edit(){
		$data = $this->session->all_userdata();
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
		$this->member_model->edit_profile($data);
		echo"<script language='javascript'>
    window.location.href = '../../pages/member/".$data['username']."';
</script>";	
	}
	public function uploaded(){
		$data = $this->session->all_userdata();
		if ($this->uri->segment(3) === FALSE){
			$name = md5(base64_encode($data['username']));
			
		}
		else{ // iden 
			$name = md5(base64_encode(md5($data['username'])));
		}
		$config =  array(
				'file_name'		  => $name,
                'upload_path'     => "./userPic/",
                'allowed_types'   => "gif|jpg|png|jpeg",
                'overwrite'       => TRUE,
                'max_size'        => "1000KB",
                'max_height'      => "768",
                'max_width'       => "1024"  
            );
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			if ($this->uri->segment(3) === FALSE)
				echo"<script language='javascript'>
    			window.location.href = '../../pages/editprofile';
				</script>";	
			else{
				echo"<script language='javascript'>
    			window.location.href = '../../pages/iden';
				</script>";
				$this->load->model('member_model');
				$this->member_model->queueiden($data['username']);
				}
		else
			if ($this->uri->segment(3) === FALSE)
				echo"<script language='javascript'>
				alert('Please browse file');
    			window.location.href = '../../pages/editprofile';
				</script>";	
			else
				echo"<script language='javascript'>
				alert('Please browse file');
    			window.location.href = '../../pages/iden';
				</script>";	
	}	
}
?>