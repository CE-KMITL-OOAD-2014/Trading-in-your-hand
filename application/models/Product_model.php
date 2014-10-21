<?php
	class Product_model extends CI_Model{		
		function add_product($pdata){
			$check = $this->db->where('name',$pdata['name'])->where('owner',$pdata['username'])->count_all_results('product');
			if($check == 0){
				$query = $this->db->insert('product',$pdata);
				return 1;
			}
			else
				return 0;
		}	
		function edit_product($data){
			$username = "admin"; // get username from session
			$this->db->where('owner',$username)->where('name',$data['name'])->set('name',$data['name'])->set('price',$data['price'])->set('amount',$data['amount'])->update('product');
		}
		public function display_product(){
			$username = "admin";
			$plist = $this->db->where('owner',$username)->get('product');
			return $plist;
		}
	}
?>