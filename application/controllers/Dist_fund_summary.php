<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_fund_summary extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_fund_summary_model');
	}
	
	
	
	public function index()
	{
		$data['get_all_districts'] = $this->Dist_fund_summary_model->get_all_districts();
		$this->load->view('district/dist_fund_summary');
	}
}
