<?php
	class Log_model extends CI_Model{	
		function logmember($data){
				$this->db->insert('log',$data);
		}
		function logtransac($data){
			$ip = $_SERVER['REMOTE_ADDR'];
			$this->db->select_max('id');
			$query = $this->db->get('transaction');
			foreach($query->result_array() as $row)
				$id = $row['id']+1;
			$data = array('id'=>$id,'buyer'=>$data['buyer'],'seller'=>$data['seller'],'product'=>$data['product'],'price'=>$data['price'],'amount'=>$data['amount'],'time'=>$time,'ip'=>$ip,'isScore'=>"0");
			$this->db->insert('transaction',$data);
		}
	}
?>