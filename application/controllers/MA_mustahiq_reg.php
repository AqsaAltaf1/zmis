<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_mustahiq_reg extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('MA_mustahiq_reg_model');
	}
	
	
	
	public function index()
	{
		$data['get_all_districts'] = $this->MA_mustahiq_reg_model->get_all_districts();
		$this->load->view('district/ma_mustahiq_reg',$data);
	}
}
