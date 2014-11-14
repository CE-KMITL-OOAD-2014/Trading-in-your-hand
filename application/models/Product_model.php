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
		function getproductowner($id){
			$data = $this->db->where('id',$id)->get('product');
			foreach($data->result_array() as $row){}
				if(isset($row))
					return $row;
		}
		function buyproduct($id,$amount,$username){
			$check = $this->db->where('id',$id)->get('product');
			foreach($check->result_array() as $row){}
			if($row['amount']==$amount&&$check['username']!=$username)
				$this->db->where('id',$id)->delete('product');
			else if($row['amount'] < $amount||$row['username']==$username)
				return false;
			else
				$this->db->where('id',$id)->set('amount',($row['amount']-$amount))->update('product');	
			return true;
		}
		function viewProduct($name,$type){
			if($name!="Any"&&$type=="all")
				$data = $this->db->where('name',$name)->order_by('id','desc')->get('product');
			else if($name=="Any"&&$type=="all")
				$data = $this->db->order_by('id','desc')->get('product');
			else if($name=="Any"&&$type!="all")
				$data = $this->db->where('type',$type)->order_by('id','desc')->get('product');
			else
				$data = $this->db->where('name',$name)->where('type',$type)->order_by('id','desc')->get('product');
			return $data;
		}
		function newProduct(){
			$data = $this->db->order_by('id','desc')->get('product');
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