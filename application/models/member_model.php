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
				$this->db->where('username',$name)->set('iden',"1")->update('member');
			}
			function edit_profile($data){
				$this->db->where('username',$data['username'])->set('name',$data['name'])->set('sname',$data['sname'])->set('about',$data['about'])->set('email',$data['email'])->set('address',$data['address'])->set('facebook',$data['facebook'])->set('twitter',$data['twitter'])->set('googleplus',$data['googleplus'])->set('github',$data['github'])->update('member');
			}
			function getstatusscore($name,$sell){
				$tScore = $this->db->where('buyer',$name)->where('isScore',"0")->where('seller',$sell)->count_all_results('transac');
				return $tScore;
			}
			function setnewscore($data){
				$sess = $this->session->all_userdata();
				$score = round($data['score'], 1); 
				$this->db->where('username',$data['name'])->set('avg',$score)->set('amount',$data['amount'])->update('member');
				$this->db->where('seller',$data['name'])->where('buyer',$sess['username'])->where('isScore',"0")->set('isScore',"1")->update('transac');
			}
		}
	
?>