<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_lz_19 extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('MA_lz_19_model');
	}
	
	
	
	public function index()
	{
		$data['get_all_districts'] = $this->MA_lz_19_model->get_all_districts();
		$this->load->view('district/ma_lz_19',$data);
	}
}
