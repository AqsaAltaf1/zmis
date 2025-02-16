<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_hosp_reports extends CI_Controller 
{


	function __construct()
	{
	parent::__construct();
	$this->load->model('pza_hosp_reports_model');
	}

	
	public function index()
	{
		
		$data['get_all_hospitals'] = $this->pza_hosp_reports_model->get_all_hospitals();
		$this->load->view('pza/pza_hosp_reports',$data);
		
	}
	
	
}
