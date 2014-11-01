<?
class member extends CI_Controller {
	private function check($chk){ //Check that call from pages class
		
	}
	public function register(){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$name = $_POST['name'];
			$sname = $_POST['sname'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$this->load->model('member_model');	
			$this->db->select_max('id');
			$query = $this->db->get('member');
			echo"success";
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$data = array('id'=>$id,'username'=>$username,'password'=>$password,'name'=>$name,'sname'=>$sname,'address'=>$address,'email'=>$email);
			$this->member_model->register($data);
		}
	public function login(){
			$data['username'] = $_POST['username'];
			$data['password'] = $_POST['password'];
			$this->load->model('member_model');	
			$check = $this->member_model->verifylogin($data);
			if($check){
				$newdata = array(
                   'username'  => $data['username'],
                   'logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);
				echo"<script language='javascript'>
	alert('Log in success');
    window.location.href = '../../pages';
</script>";
			}
			else
				echo"<script language='javascript'>
	alert('Log in failed');
    window.location.href = '../../pages';
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
		if(isset($_POST['name']) && !empty($_POST['name']))			$data['name'] = $_POST["name"];
		else			$data['name'] = "";
		if(isset($_POST['sname']) && !empty($_POST['sname']))		$data['sname'] = $_POST["sname"];
		else			$data['sname'] = "";
		if(isset($_POST['about']) && !empty($_POST['about']))		$data['about'] = $_POST["about"];
		else			$data['about'] = "";
		if(isset($_POST['email']) && !empty($_POST['email']))		$data['email'] = $_POST["email"];
		else			$data['email'] = "";
		if(isset($_POST['address']) && !empty($_POST['address']))	$data['address'] = $_POST["address"];
		else			$data['address'] = "";
		if(isset($_POST['facebook']) && !empty($_POST['facebook']))	$data['facebook'] = $_POST["facebook"];
		else			$data['facebook'] = "";
		if(isset($_POST['twitter']) && !empty($_POST['twitter']))	$data['twitter'] = $_POST["twitter"];
		else			$data['twitter'] = "";
		if(isset($_POST['googleplus']) && !empty($_POST['googleplus']))		$data['googleplus'] = $_POST["googleplus"];
		else			$data['googleplus'] = "";
		if(isset($_POST['github']) && !empty($_POST['github']))		$data['github'] = $_POST["github"];
		else 			$data['github'] = "";
		$this->member_model->edit_profile($data);
		echo"<script language='javascript'>
    window.location.href = '../../pages/member/".$data['username']."';
</script>";
	}
		

}
?>