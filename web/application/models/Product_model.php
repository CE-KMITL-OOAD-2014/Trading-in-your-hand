<?php
	class Product_model extends CI_Model{
		function add_product($pdata){
			$query = $this->db->insert('product',$pdata);	
		}	
		function display_product(){
			$plist = $this->db->get('product');
		}
	}
?>