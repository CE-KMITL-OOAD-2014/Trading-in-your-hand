<?php
	class HomeCl extends CI_Controller{
		function index(){
			$menu['menuone'] = '#';
			$menu['menutwo'] = '../index.php/HomeCl/product';
			$menu['menuthree'] = '../index.php/HomeCl/about';
			$this->load->helper('page_css.php');
			$this->load->view('top-menu',$menu);	
		}
		function product(){
			$menu['menuone'] = '../HomeCl';
			$menu['menutwo'] = '#';
			$menu['menuthree'] = '../HomeCl/about';
			$this->load->helper('page_css.php');
			$this->load->view('top-menu',$menu);	
			$this->load->view('add_product');	
		}
	}
?>
