<?php
// ini_set('memory_limit', '4000M');
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_GA_Lz_11 extends CI_Controller 
{
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_GA_Lz_11_model');
	$this->load->model('Dist_GA_paid_mustahiqeen_model');
	}
	
	public function index()
	{
		$userid  = $this->session->userdata('id');
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		$data['get_all_lzclist'] = $this->Dist_GA_Lz_11_model->get_all_lzclist($userid,$getfinancial_year);
		$this->load->view('district/dist_ga_lz_11',$data);
	}

	function dist_lzcwise_print()
	{
	$userid  = $this->session->userdata('id');
	$formArray = array();
	$data['get_lzclist'] = $this->Dist_GA_Lz_11_model->get_lzclist($userid);
	$data['get_all_lzclist'] = $this->Dist_GA_Lz_11_model->get_all_lzclist($userid,$getfinancial_year);
	
	$data['get_lzcwise_mustahiq_record'] = $this->Dist_GA_Lz_11_model->get_lzcwise_mustahiq_record($formArray);
	$this->load->view('district/dist_print_lzcwise_mustahiq',$data);
}


function gs_lzcwise_print()
	{
	$userid  = $this->session->userdata('id');
	$gsUserName  = $this->session->userdata('username');
	$formArray = array();
	$data['get_lzclist'] = $this->Dist_GA_Lz_11_model->get_lzclist($userid);
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
	$data['getGsLzclist'] = $this->Dist_GA_Lz_11_model->getGsLzclist($userid,$getfinancial_year,$gsUserName);
	
	$data['get_gs_lzcwise_mustahiq_record'] = $this->Dist_GA_Lz_11_model->get_gs_lzcwise_mustahiq_record($formArray);
	$this->load->view('gs/gs_print_lzcwise_mustahiq',$data);
}


	


	function gsLz11()
	{
		$userid  = $this->session->userdata('id');
		$gsUserName  = $this->session->userdata('username');
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		$data['getGsLzclist'] = $this->Dist_GA_Lz_11_model->getGsLzclist($userid,$getfinancial_year,$gsUserName);
		$data['getGsPaidMustahiqeenList'] = $this->Dist_GA_paid_mustahiqeen_model->getGsPaidMustahiqeenList($userid,$getfinancial_year,$gsUserName);
		$this->load->view('gs/gs_ga_lz_11',$data);
	
	}

	function gsPaidList()
	{
		$userid  = $this->session->userdata('id');
		$gsUserName  = $this->session->userdata('username');
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		$data['getGsPaidMustahiqeenList'] = $this->Dist_GA_paid_mustahiqeen_model->getGsPaidMustahiqeenList($userid,$getfinancial_year,$gsUserName);
		$this->load->view('gs/gsPaidMustahiqeenList',$data);
	}


}
