<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_District_fund_allocation extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	$this->load->model('Pza_District_fund_allocation_model');
	}
	
	
	public function index()
	{
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
 $getfinancial_year = $getfinancialdata->row('financial_Year');
 $getfinancial_installment = $getfinancialdata->row('installment');

		$data['get_districts_payment'] = $this->Pza_District_fund_allocation_model->get_districts_payment($getfinancial_year,$getfinancial_installment);
		$this->load->view('pza/district_fund_allocation',$data);
	}


	function pza_print_dist_payment()
{
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
 $getfinancial_year = $getfinancialdata->row('financial_Year');
 $getfinancial_installment = $getfinancialdata->row('installment');
 
	$data['get_districts_payment'] = $this->Pza_District_fund_allocation_model->get_districts_payment($getfinancial_year,$getfinancial_installment);
	
	$this->load->view('pza/pza_print_dist_payment',$data);
}
	
	
	
	
}
