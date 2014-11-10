<?php
	class Product_model extends CI_Model{		
		function add_product($pdata){
			$check = $this->db->where('name',$pdata['name'])->where('username',$pdata['username'])->count_all_results('product');
			if($check == 0){
				$query = $this->db->insert('product',$pdata);
				return 1;
			}
			else
				return 0;
		}	
		function edit_product($data){
			$username = "admin"; // get username from session
			$this->db->where('username',$username)->where('name',$data['name'])->set('name',$data['name'])->set('price',$data['price'])->set('amount',$data['amount'])->update('product');
		}
		function userProduct($pdata){
			$username = $pdata['username'];
			$data = $this->db->where('username',$username)->order_by('id','desc')->get('product');
			return $data;
		}
		function checkowner($id,$user){
			$check = $this->db->where('id',$id)->where('username',$user)->count_all_results('product');	
			if($check==1)
				return true;
			return false;
		}
		function delete($id){
			$this->db->delete('product', array('id' => $id)); 	
		}
	}
?>