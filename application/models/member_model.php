<?php
		class Member_model extends CI_Model{
			function register($data){
				$this->db->insert('member',$data);	
			}	
			function memberDetail($data){
				return $this->db->where('username',$data['username'])->get('member');
			}
			function verifylogin($data){
				$check = $this->db->where('username',$data['username'])->where('password',md5($data['password']))->count_all_results('member');
				if($check==1)
					return true;
				return false;
			}
			function getmessage(){
				$data = $this->session->all_userdata();
				$mdata = $this->db->where('receiver',$data['username'])->get('message');
				return $mdata;
			}
			function sendmessage($data){
				$this->db->insert('message',$data);	
			}
		}
	
?>