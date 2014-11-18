<?php
		class Member_model extends CI_Model{
			function register($data){	// use to insert data(register) to db
				if(!$this->checkexist($data['username'])){
					$this->db->insert('member',$data);	
					return true;	
				}
				else
					return false;
			}	
			function memberDetail($data){	// Use to get detail of this member
				$data = $this->db->where('username',$data['username'])->get('member');
				foreach($data->result_array() as $row){}
				if(isset($row))
					return $row;
			}
			function messageDetail($id){	// Use to get detail of this message
				$data = $this->db->where('ID',$id)->get('message');
				foreach($data->result_array() as $row){}
				if(isset($row))
					return $row;
			}
			function verifylogin($data){	// Use to check status log in
				$check = $this->db->where('username',$data['username'])->where('password',md5($data['password']))->count_all_results('member');
				if($check==1)	// if login success
					return true;	
				return false;
			}
			function getmessage(){	// use to get all message of this member
				$data = $this->session->all_userdata();
				$mdata = $this->db->where('receiver',$data['username'])->order_by('id','desc')->get('message');
				return $mdata;
			}
			function sendmessage($data){	// use to insert message to db
				$this->db->insert('message',$data);	
			}
			function delmessage($data){	// use to delete message in db
				$this->db->delete('message', array('ID' => $data)); 
			}
			function checkexist($name){ // use to check exist username
				$check = $this->db->where('username',$name)->count_all_results('member');	
				if($check>=1) // if found exist username
					return true;
				return false;
			}
			function queueiden($name){	// user to set buyer thai identify to seller
				$this->db->where('username',$name)->set('iden',"1")->update('member');
			}
			function edit_profile($data){	// user to update data to member detail
				$this->db->where('username',$data['username'])->set('name',$data['name'])->set('sname',$data['sname'])->set('about',$data['about'])->set('email',$data['email'])->set('address',$data['address'])->set('facebook',$data['facebook'])->set('twitter',$data['twitter'])->set('googleplus',$data['googleplus'])->set('github',$data['github'])->update('member');
			}
			function getstatusscore($name,$sell){	// use to check that can rate user
				$tScore = $this->db->where('buyer',$name)->where('isScore',"0")->where('seller',$sell)->count_all_results('transac');
				return $tScore;
			}
			function setnewscore($data){	// use to set new score to user
				$sess = $this->session->all_userdata();
				$score = round($data['score'], 1); 
				$this->db->where('username',$data['name'])->set('avg',$score)->set('amount',$data['amount'])->update('member');
				$this->db->where('seller',$data['name'])->where('buyer',$sess['username'])->where('isScore',"0")->set('isScore',"1")->update('transac');
			}
		}
	
?>