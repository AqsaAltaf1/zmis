<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_DM_mustahiq_reg extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_DM_mustahiq_reg_model');
	$this->load->model('General_model');
	}
	
	
	
	public function index()
	{
		$userid = $this->session->userdata('id');
		// Year Installment
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
	
		$data['get_all_madrassa_list'] = $this->Dist_DM_mustahiq_reg_model->get_all_madrassa_list($userid);
		$data['get_all_lzcs'] = $this->Dist_DM_mustahiq_reg_model->get_all_lzcs($userid);
		
		$data['get_all_madrassa_tablevalues'] = $this->Dist_DM_mustahiq_reg_model->get_all_madrassa_tablevalues($userid,$getfinancial_year,$getfinancial_installment);
		
		//Select Drop Down
		$data['getResidenceType'] = $this->General_model->get_master_fields("accommodationType");
		$data['getCategory'] = $this->General_model->get_master_fields("Category");
		$data['getDMCategory'] = $this->General_model->get_master_fields("otherCategory");
		$data['getClassDarja'] = $this->General_model->get_master_fields("ClassDarja");
		
		$this->load->view('district/dist_dm_mustahiq_reg',$data);
	}
	
	
	
	function dist_dm_mustahiq_register()
	{
	//Getting LZC Name	
	$LZC_id  = $this->input->post("lzc_id");
	$get_lzcname = $this->db->select('*')->from('lzc_list')->where('id',$LZC_id)->get();
	$LZCActualName = $get_lzcname->row('lzc_name');
	
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');
	
	
	$formArray = array();
	$formArray['district_id'] = $this->session->userdata('id');
	$formArray['District_Name'] = $this->session->userdata('district_name');
	$formArray['MustahiqType'] = "Deeni Madaris";
	$formArray['LZCActualName']  = $LZCActualName;
	$formArray['payment_status']  = 1;
	$formArray['payment_year']  = $getfinancial_year;
	$formArray['payment_installment']  = $getfinancial_installment;
	$formArray['LZC_id']  = $this->input->post("lzc_id");
	$formArray['mustahiq_name']  = $this->input->post("mustahiq_name");
	$formArray['father_name']  = $this->input->post("f_name");
	$formArray['mustahiq_cnic']  = str_replace("-", "", $this->input->post("cnic"));
	$formArray['contact_number']  = str_replace("-", "", $this->input->post("cell_no"));
	$formArray['InstituteName']  = $this->input->post("madrassa_name");
	$formArray['ClassDarja']  = $this->input->post("class_darja");
	$formArray['AccommodationType']  = $this->input->post("accommodation_type");
	$formArray['dob']  = $this->input->post("dob");
	$formArray['istehqaqnumber']  = $this->input->post("Istehqaq_no");
	$formArray['category']  = $this->input->post("category");
	$formArray['permanent_address']  = $this->input->post("address");
	$formArray['amount']  = $this->input->post("amount");
	$formArray['year']  = $this->input->post("year");
	$formArray['installment']  = $this->input->post("installment");
	$formArray['addedby'] = $this->session->userdata('district_name');
	
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	$this->Dist_DM_mustahiq_reg_model->dist_dm_mustahiq_register($formArray);		
	
	$this->session->set_flashdata('success','Record Added Successfully..!');
		
	redirect(base_url('Dist_DM_mustahiq_reg'));	
	
	
	
	}
	
	
	function get_madrassa_budget()
	{
		
		$userid = $this->session->userdata('id');
		$getmadrassaid = $this->input->post("getmadrassaid");
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		
		//echo $this->db->last_query();
		
		$get_dist_name = $this->db->select('*')->from('dist_head_wise_fund')
		->where('district_id',$userid)->where('account_head','Deeni Madaris')
		->where('lzc_institution_madrasa',$getmadrassaid)->where('year',$getfinancial_year)
		->where('installment',$getfinancial_installment)->get();
		$amount_allocated = $get_dist_name->row('amount_allocated');
		
		
		$dm_disb_qry = $this->db->select_sum('amount')->from('mustahiqeen')
		->where('district_id',$userid)
		->where('MustahiqType',"Deeni Madaris")
		->where('InstituteName',$getmadrassaid)
		->where('year',$getfinancial_year)
		->where('installment',$getfinancial_installment)
		->get();
		
		$deeni_madaras_disb = $dm_disb_qry->row('amount');
		
		$getfinal_balance = $amount_allocated - $deeni_madaras_disb;
		
		echo json_encode($getfinal_balance);
	
	}
	


function DeeniMadarisPrint()
	{
	$userid  = $this->session->userdata('id');
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');

	
	$data['getDeeniMadarisPrint'] = $this->Dist_DM_mustahiq_reg_model->getDeeniMadarisPrint($userid,$getfinancial_year,$getfinancial_installment);
	$this->load->view('district/distDeeniMadarisPrint',$data);
}	
	

	function deleteMadarisRecord(){
		
		$studentID=$this->uri->segment(3);
	  	$response=$this->Dist_DM_mustahiq_reg_model->deleteMadarisRecord($studentID);
	if($response==true){
		
	  	$this->session->set_flashdata('success','Record Deleted Successfully..!');
		redirect(base_url('Dist_DM_mustahiq_reg'));
  		}
	else
		{
	  	$this->session->set_flashdata('error','Record not Deleted Successfully..!');
		redirect(base_url('Dist_DM_mustahiq_reg'));
		}
	  }
	
}
