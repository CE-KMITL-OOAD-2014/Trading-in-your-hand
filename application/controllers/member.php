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
    window.location.href = '../pages';
</script>";
			}
			else
				echo"<script language='javascript'>
	alert('Log in failed');
    window.location.href = '../pages';
</script>";
		}
	public function logout(){
			$this->session->sess_destroy();
			echo"<script language='javascript'>
    window.location.href = '../pages';
</script>";
		}
	public function viewmessage(){
			if(!$this->session->userdata('username'))
			echo"<script language='javascript'>
    window.location.href = '../pages';
</script>";
			$this->load->model('member_model');	
			$data = $this->member_model->getmessage();
			foreach($data->result_array() as $row)
				echo"".$data['sender']." ".$data['time']."".$data['message']."<br/>";
			echo"<a href='../pages'>back</a>";
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
    window.location.href = '../pages';
</script>";	
		}

}
?>