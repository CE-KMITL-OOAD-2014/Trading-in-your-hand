<?php
	class Product_model extends CI_Model{		
		function add_product($pdata){ // use to add data to db
			$check = $this->db->where('name',$pdata['name'])->where('username',$pdata['username'])->count_all_results('product');
			if($check == 0){
				$query = $this->db->insert('product',$pdata);	// insert data to db
				return 1;
			}
			else
				return 0;
		}	
		function edit_product($data){	// use to update product detail
			$this->db->where('username',$data['username'])->where('name',$data['name'])->set('name',$data['name'])->set('price',$data['price'])->set('amount',$data['amount'])->set('type',$data['type'])->set('detail',$data['detail'])->update('product');
		}
		function userProduct($pdata){	// use to get user's product detail
			$username = $pdata['username'];
			$data = $this->db->where('username',$username)->order_by('id','desc')->get('product');
			return $data;
		}
		function gettransac($pdata){	// use to get transaction detail
			$buyer = $pdata['username'];
			$data = $this->db->where('buyer',$buyer)->order_by('id','desc')->get('transac');
			return $data;
		}
		function getproductdetail($id){	// Get product detail
			$data = $this->db->where('id',$id)->get('product');
			foreach($data->result_array() as $row){}
				if(isset($row))
					return $row;
		}
		function buyproduct($id,$amount,$username){	// buy product
			$check = $this->db->where('id',$id)->get('product');
			foreach($check->result_array() as $row){}
			if($row['amount']=="".$amount&&$row['username']!=$username)	// if product available == product want to buy
				$this->delete($id);	// delete product
			else if($row['amount'] < $amount||$row['username']==$username)	// if product available < product want to buy
				return false;
			else	// if product available > product want to buy
				$this->db->where('id',$id)->set('amount',($row['amount']-$amount))->update('product');	// product available = product available - product want to buy
			return true;
		}
		function viewProduct($name,$type){	// Get product for search bar
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
		function newProduct(){	// get product sort by new arrival
			$data = $this->db->order_by('id','desc')->get('product');
			return $data;
		}
		function checkowner($id,$user){	// Check that this product belong to this member
			$check = $this->db->where('id',$id)->where('username',$user)->count_all_results('product');	
			if($check==1)
				return true;
			return false;
		}
		function delete($id){	// Delete product
			$this->db->delete('product', array('id' => $id)); 
			$data = $this->getproductdetail($id);
			$path_to_file = "../../../../../productPic/".$data['pic1'].".jpg";
			$this->load->helper("file");
			delete_files($path_to_file); // Delete proto of this product
		}
	}
?>