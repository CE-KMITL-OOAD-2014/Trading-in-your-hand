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
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$data = array('id'=>$id,'username'=>$username,'password'=>$password,'name'=>$name,'sname'=>$sname,'address'=>$address,'email'=>$email,'facebook'=>"https://",'twitter'=>"https://",'github'=>"https://",'googleplus'=>"https://");
			$this->member_model->register($data);
			echo"<script language='javascript'>
	alert('Success');
    window.location.href = '../../pages/login';
</script>";
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
		$config =  array(
			  //'file_name'		=> md5(base64_encode($data['username'])),
              'upload_path'     => "./userPic/",
              'allowed_types'   => "gif|jpg|png|jpeg",
              'overwrite'       => TRUE,
              'max_size'        => "1000KB",
              'max_height'      => "768",
              'max_width'       => "1024"      );
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			echo "file upload success";
		else
			echo "file upload failed";
			
	}
}
?>