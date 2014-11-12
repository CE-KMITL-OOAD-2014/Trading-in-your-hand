<?php
		class Member_model extends CI_Model{
			function register($data){
				$this->db->insert('member',$data);	
			}	
			function memberDetail($data){
				$data = $this->db->where('username',$data['username'])->get('member');
				foreach($data->result_array() as $row){}
				if(isset($row))
					return $row;
			}
			function verifylogin($data){
				$check = $this->db->where('username',$data['username'])->where('password',md5($data['password']))->count_all_results('member');
				if($check==1)
					return true;
				return false;
			}
			function genlog($data){
				$this->db->insert('log',$data);
			}
			function getmessage(){
				$data = $this->session->all_userdata();
				$mdata = $this->db->where('receiver',$data['username'])->get('message');
				return $mdata;
			}
			function sendmessage($data){
				$this->db->insert('message',$data);	
			}
			function checkexist($name){
				$check = $this->db->where('username',$name)->count_all_results('member');	
				if($check>=1)
					return true;
				return false;
			}
			function queueiden($name){
				$this->db->where('username',$name)->set('iden',base64_encode(md5($name)))->update('member');
			}
			function edit_profile($data){
				$this->db->where('username',$data['username'])->set('name',$data['name'])->set('sname',$data['sname'])->set('about',$data['about'])->set('email',$data['email'])->set('address',$data['address'])->set('facebook',$data['facebook'])->set('twitter',$data['twitter'])->set('googleplus',$data['googleplus'])->set('github',$data['github'])->update('member');
			}
		}
	
?>