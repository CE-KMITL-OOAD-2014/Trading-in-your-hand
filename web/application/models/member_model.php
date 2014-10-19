<?php
	class Member_model extends CI_Model{
		function register($data){
			$this->db->insert('member',$data);	
		}	
		function memberDetail(){
			$plist = $this->db->get('member');
		}
	}
?>