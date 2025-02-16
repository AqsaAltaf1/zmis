<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_MA_paid_mustahiqeen extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_MA_paid_mustahiqeen_model');
	}
	
	
	
	public function index()
	{
		$data['dist_ma_paid_mustahiqeen'] = $this->Dist_MA_paid_mustahiqeen_model->dist_ma_paid_mustahiqeen();
		$this->load->view('district/dist_ma_paid_mustahiqeen',$data);
	}
	
	
	
	function MarriageMustahiqeenPrint()
	{
	$userid  = $this->session->userdata('id');
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');

	
	$data['getMarriageMustahiqeenPrint'] = $this->Dist_MA_paid_mustahiqeen_model->getMarriageMustahiqeenPrint($userid,$getfinancial_year,$getfinancial_installment);
	$this->load->view('district/disMAPaidPrint',$data);
}	


}
