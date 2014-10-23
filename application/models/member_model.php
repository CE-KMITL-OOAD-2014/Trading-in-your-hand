<?php
	class Member_model extends CI_Model{
		function register($data){
			$this->db->insert('member',$data);	
		}	
		function memberDetail(){
			$plist = $this->db->get('member');
		}
		function verifylogin($data){
			$check = $this->db->where('username',$data['username'])->where('password',md5($data['password']))->count_all_results('member');
			if($check==1)
				return true;
			return false;
		}
	}
?>