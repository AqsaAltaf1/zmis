<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_mustahiqeen_fix extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	//$this->load->model('Pza_District_fund_allocation_model');
	}
	
	
	public function index()
	{
		
	$query = $this->db->select("*,lzc_list.id AS getlzcid")->from("lzc_list")
	->join("dist_head_wise_fund", "dist_head_wise_fund.lzc_institution_madrasa = lzc_list.id")
	->where("dist_head_wise_fund.account_head", "Guzara Allowance")
	
	->order_by('lzc_list.id',"ASC")->get();
    $data['getlzcs'] = $query->result_array();   
		
	$this->load->view('pza/pza_mustahiqeen_fix',$data);
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
