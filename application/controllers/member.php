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
			$email = $POST['email'];
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
				echo"success <a href='../pages'>home</a>";
			}
			else
				echo"Failed";
		}
	public function logout(){
			
		}

}
?>