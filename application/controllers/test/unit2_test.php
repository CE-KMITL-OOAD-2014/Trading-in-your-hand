<?php
require_once(APPPATH . '/controllers/test/Toast.php');	// Use TOAST - Unit Testing for CodeIgniter v. 1.5

class Unit2_tests extends Toast
{
	function Unit2_tests()
	{
		parent::Toast(__FILE__);
		$this->load->model('member_model');	
	}
	/* TESTS BELOW */

	function test_message()
	{	
		$newdata = array(
                   'username'  => 'test02',
                   'logged_in' => TRUE
				);
		$this->session->set_userdata($newdata);
		$data = array(	'ID'      => '999',
						'time'   => 'Wed Oct 30, 2014 18:00',
						'receiver'  => 'test02',
						'message'=> 'Hello'
		);
		$this->member_model->sendmessage($data);
		$getdata = $this->member_model->getmessage($data);
		
		foreach($getdata->result_array() as $row){}
		
		$this->_assert_equals($data['ID'],$row['ID']);
		$this->_assert_equals($newdata['username'],$row['sender']);
		$this->_assert_equals($data['time'],$row['time']);
		$this->_assert_equals($data['message'],$row['message']);
	}


}

// End of file example_test.php */
// Location: ./application/controllers/test/Unit1_test.php */