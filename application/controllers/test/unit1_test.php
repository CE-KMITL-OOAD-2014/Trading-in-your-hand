<?php
require_once(APPPATH . '/controllers/test/Toast.php');	// Use TOAST - Unit Testing for CodeIgniter v. 1.5

class Unit1_tests extends Toast
{
	function Unit1_tests()
	{
		parent::Toast(__FILE__);
		$this->load->model('Product_model');	
	}
	/* TESTS BELOW */

	function test_product()
	{	
		$data = array(	'ID'      => '999',
						'name'    => 'Ball',
						'price'   => '999',
						'amount'  => '1',
						'username'=> 'admin'
		);
		$this->Product_model->add_product($data);
		$getdata = $this->Product_model->display_product($data);
		
		foreach($getdata->result_array() as $row){}
		
		$this->_assert_equals($data['ID'],$row['ID']);
		$this->_assert_equals($data['name'],$row['name']);
		$this->_assert_equals($data['price'],$row['price']);
		$this->_assert_equals($data['amount'],$row['amount']);
		$this->_assert_equals($data['username'],$row['username']);
	}


}

// End of file example_test.php */
// Location: ./application/controllers/test/Unit1_test.php */