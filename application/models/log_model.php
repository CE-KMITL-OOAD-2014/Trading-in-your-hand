<?php
	class Log_model extends CI_Model{	
		function logmember($data){
				$this->db->insert('log',$data);
		}
		function logtransac($data){
			$ip = $_SERVER['REMOTE_ADDR'];
			$time = date("D M d, Y G:i");
			$data = array('ID'=>$data['id'],'buyer'=>$data['buyer'],'seller'=>$data['seller'],'product'=>$data['product'],'price'=>$data['price'],'amount'=>$data['amount'],'time'=>$time,'ip'=>$ip,'isScore'=>"0");
			$this->db->insert('transaction',$data);
		}
	}
?>