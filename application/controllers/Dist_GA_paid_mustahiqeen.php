<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_GA_paid_mustahiqeen extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_GA_paid_mustahiqeen_model');
	}
	
	
	
	public function index()
	{
		$userid  = $this->session->userdata('id');
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		$data['get_paid_mustahiqeen'] = $this->Dist_GA_paid_mustahiqeen_model->get_paid_mustahiqeen($userid,$getfinancial_year);
		$this->load->view('district/dist_ga_paid_mustahiqeen',$data);
	}
	
	
	function dist_paidMustahiqeenPrint()
	{
	$userid  = $this->session->userdata('id');
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');

	$data['get_paid_mustahiqeen'] = $this->Dist_GA_paid_mustahiqeen_model->get_paid_mustahiqeen($userid,$getfinancial_year);
	$this->load->view('district/dist_ga_paid_mustahiqeenPrint',$data);
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
