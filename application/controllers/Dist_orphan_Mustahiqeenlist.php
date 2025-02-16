<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_orphan_Mustahiqeenlist extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_orphan_Mustahiqeenlist_model');
	}
	
	
	
	public function index()
	{
		//$data['get_lzc_mustahiqeen'] = $this->Dist_GA_Mustahiqeenlist_model->get_lzc_mustahiqeen();
		$this->load->view('district/dist_orphan_mustahiqeenlist');
	}
	
	function getmustahiqeenlist()
	{
		$getlzc_id = $this->uri->segment(3);
		$userid  = $this->session->userdata('id');
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		
		$getlzc_nobsqry = $this->db->select('*')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$getlzc_id)->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
		$getnob = $getlzc_nobsqry->row('nob');
		
		$data['get_lzc_mustahiqeen_limitwise'] = $this->Dist_orphan_Mustahiqeenlist_model->get_lzc_mustahiqeen_limitwise($getnob,$getlzc_id,$userid);
		
		$data['get_alllzc_mustahiqeen'] = $this->Dist_orphan_Mustahiqeenlist_model->get_alllzc_mustahiqeen($getlzc_id,$userid);
		
		$this->load->view('district/dist_orphan_mustahiqeenlist',$data);
		
		
		
	}
	
	
	function manage_mustahiqeen_payment()
	{
	
	$formArray = array();
	$formArray['user_id'] = $this->input->post("user_id");	
	$formArray['bank_name']  = $this->input->post("bank_name");
	$formArray['account_number']  = $this->input->post("account_number");
	$formArray['cheque_number']  = $this->input->post("cheque_number");
	$formArray['payment_amount']  = $this->input->post("payment_amount");
	$formArray['financial_Year']  = $this->input->post("financial_Year");
	$formArray['installment']  = $this->input->post("installment");
	$formArray['lzc_id']  = $this->input->post("lzc_id");
	$formArray['district_id']  = $this->session->userdata('id');
	$formArray['add_date'] = date("Y-m-d");	
	
	$this->Dist_orphan_Mustahiqeenlist_model->manage_mustahiqeen_payment($formArray,$this->input->post("user_id"));	
	
	$userid = $this->input->post("user_id");	
	
	$formArrayupdate = array();
	$formArrayupdate['payment_status'] = 1;
	$this->Dist_orphan_Mustahiqeenlist_model->updateuser($userid,$formArrayupdate);
	
	$this->session->set_flashdata('success','Paid Successfully..!');
	
	redirect(base_url('Dist_orphan_paid_mustahiqeen'));
	
	
	}
	
	
	
	
}
