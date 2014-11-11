<?
class member extends CI_Controller {
	public function twowayauthen(){
		require('../../../../twilio-php/Services/Twilio.php');
		$sid = "AC1cebed1bef3754b8ea59007589b8799c"; 
		$token = "328f00d3cf3f0ae160e75a214256d8b9"; 
		$client = new Services_Twilio($sid, $token);
		$message = $client->account->messages->sendMessage(
		  '+16024836345', // From a valid Twilio number
		  '+66874735633', // Text this number
		  "Hello monkey!"
		);	
		print $message->sid;
	}
	public function register(){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$name = $_POST['name'];
			$sname = $_POST['sname'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$this->load->model('member_model');	
			if($this->member_model->checkexist($username))
				echo"<script language='javascript'>
	alert('Sorry , There are the exist username in system');
    window.location.href = '../../pages/register';	
</script>";
			$this->db->select_max('id');
			$query = $this->db->get('member');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$data = array('id'=>$id,'username'=>$username,'password'=>$password,'name'=>$name,'sname'=>$sname,'address'=>$address,'email'=>$email,'facebook'=>"https://",'twitter'=>"https://",'github'=>"https://",'googleplus'=>"https://",'iden'=>0);
			$this->member_model->register($data);
			echo"<script language='javascript'>
	alert('Success');
    window.location.href = '../../pages/login';
</script>";
		}
	public function genlog($username,$check){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) 			$ip = $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else 												$ip = $_SERVER['REMOTE_ADDR'];
		$this->db->select_max('id');
		$query = $this->db->get('log');
		foreach($query->result_array() as $row)
			$id = $row['id']+1;
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$dt = date("D M d, Y G:i");
		$data = array('id' => $id,'browser' => $browser,'time' => $dt,'ip' => $ip,'username' => $username,'isSuccess' => $check);
		$this->load->model('member_model');
		$this->member_model->genlog($data);
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
			$this->genlog($data['username'],$check);
			if($check){
				$newdata = array(
                   'username'  => $data['username'],
                   'logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);
				echo"<script language='javascript'>
	alert('Welcome , ".$name['name']."');
    window.location.href = '../../pages';
</script>";
			}
			else
				echo"<script language='javascript'>
	alert('Username or Password incorrect');
    window.location.href = '../../pages/login';
</script>";
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
		$config =  array(
				'file_name'		  => md5(base64_encode($data['username'])),
                'upload_path'     => "./userPic/",
                'allowed_types'   => "gif|jpg|png|jpeg",
                'overwrite'       => TRUE,
                'max_size'        => "1000KB",
                'max_height'      => "768",
                'max_width'       => "1024"  
            );
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			echo"<script language='javascript'>
    window.location.href = '../../pages/editprofile';
</script>";	
		else
			echo"<script language='javascript'>
	alert('Please browse file');
    window.location.href = '../../pages/editprofile';
</script>";	
	}	
}
?>