<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_total_mustahiqeen_report extends CI_Controller {

	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Pza_total_mustahiqeen_report_model');
	}


	public function index()
	{
		$data['get_all_districts'] = $this->Pza_total_mustahiqeen_report_model->get_all_districts();
		
		$getfinancialdata = $this->db->select('financial_Year,installment')->from('year_installment')->	where('status',1)->get();
			
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		//$getfinancial_installment = $getfinancialdata->row('installment');	
		$data['yearWiseReportGraph'] = $getfinancial_year;
		$this->load->view('pza/pza_total_mustahiqeen_report',$data);
	}
	
	
	
	
	
	
	
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	

