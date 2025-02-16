<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ESA_mustahiq_reg extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('ESA_mustahiq_reg_model');
	}
	
	
	
	public function index()
	{
		$data['get_all_districts'] = $this->ESA_mustahiq_reg_model->get_all_districts();
		$this->load->view('district/esa_mustahiq_reg',$data);
	}
}
