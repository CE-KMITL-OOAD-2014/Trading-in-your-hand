<?
class member extends CI_Controller {
	private function check($chk){ //Check that call from pages class
		
	}
	public function register(){
			$id = $_POST["id"];
			$pass = md5($_POST["pass"]);
			$name = $_POST["name"];
			$sname = $_POST["sname"];
			$address = $_POST["address"];
			$data = array('id'=>$id,'pass'=>$pass,'name'=>$name,'sname'=>$sname,'address'=>$address);
			$this->load->model('member_model');	
			$this->member_model->register($data);
		}
	public function login(){
			$id = $_POST["username"];
			$pass = $_POST["password"];
			$check = $this->db->where('id',$id)->where('pass',md5($pass))->count_all_results('member');
			if($check>0){
				echo"Success";
			}
			else
				echo"Failed";
		}
	public function logout(){
			
		}

}
?>