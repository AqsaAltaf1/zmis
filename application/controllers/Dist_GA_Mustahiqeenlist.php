<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_GA_Mustahiqeenlist extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_GA_Mustahiqeenlist_model');
	}
	
	
	
	public function index()
	{
		//$data['get_lzc_mustahiqeen'] = $this->Dist_GA_Mustahiqeenlist_model->get_lzc_mustahiqeen();
		$this->load->view('district/dist_ga_mustahiqeenlist');
	}
	
	function getmustahiqeenlist()
	{
		$getlzc_id = $this->uri->segment(3);
		$userid  = $this->session->userdata('id');
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		
		$getlzc_nobsqry = $this->db->select('*')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$getlzc_id)->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('account_head','Guzara Allowance')->get();
		
		
		$getnob = $getlzc_nobsqry->row('nob');
		
		 $user_type = $this->session->userdata('user_type');
		
		if($user_type == 'audit')
		{
		$data['get_lzc_mustahiqeen_limitwise'] = $this->Dist_GA_Mustahiqeenlist_model->get_lzc_mustahiqeen_limitwise_audit($getnob,$getlzc_id,$userid);	
		}
		else
		{
		
		$selectedLZ11 = $this->Dist_GA_Mustahiqeenlist_model->get_lzc_mustahiqeen_limitwise($getnob,$getlzc_id,$userid);	
		
	
		
		$data['get_lzc_mustahiqeen_limitwise'] = $selectedLZ11;
		
		foreach($selectedLZ11 as $lz11)
		{
		
		$formArrayUpdateLZ11 = array();
		$formArrayUpdateLZ11['selected_lz11'] = 1;	
		
		$this->db->where('id',$lz11['id']);
		$this->db->update('mustahiqeen',$formArrayUpdateLZ11);
		
		

		}
	
		}
		
		
		
		
		//$data['get_lzc_mustahiqeen_limitwise'] = $this->Dist_GA_Mustahiqeenlist_model->get_lzc_mustahiqeen_limitwise($getnob,$getlzc_id,$userid);
		
		$data['get_alllzc_mustahiqeen'] = $this->Dist_GA_Mustahiqeenlist_model->get_alllzc_mustahiqeen($getlzc_id,$userid);
		
		$this->load->view('district/dist_ga_mustahiqeenlist',$data);
		
		
		
	}
	
	
	
	// Group Secretary Mustahqeen List
	function getGsMustahiqeenList()
	{
		$getlzc_id = $this->uri->segment(3);
		$userid  = $this->session->userdata('id');
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		
		$getlzc_nobsqry = $this->db->select('*')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$getlzc_id)->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('account_head','Guzara Allowance')->get();
		
		
		$getnob = $getlzc_nobsqry->row('nob');
		
		 $user_type = $this->session->userdata('user_type');
		
		if($user_type == 'audit')
		{
		$data['get_lzc_mustahiqeen_limitwise'] = $this->Dist_GA_Mustahiqeenlist_model->get_lzc_mustahiqeen_limitwise_audit($getnob,$getlzc_id,$userid);	
		}
		else
		{

		$data['get_lzc_mustahiqeen_limitwise'] = $this->Dist_GA_Mustahiqeenlist_model->get_lzc_mustahiqeen_limitwise($getnob,$getlzc_id,$userid);	
		
	
		}
		
		$data['get_alllzc_mustahiqeen'] = $this->Dist_GA_Mustahiqeenlist_model->get_alllzc_mustahiqeen($getlzc_id,$userid);
		
		$this->load->view('gs/dist_ga_mustahiqeenlist',$data);
		
		
		
	}
	
	
	
	
	
	
	
	function manage_mustahiqeen_payment()
	{
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		$userid = $this->input->post("user_id");
		
	
	$formArray = array();
	$formArray['user_id'] = $this->input->post("user_id");	
	$formArray['MustahiqType'] = "Guzara Allowance";
	$formArray['mustahiq_name'] = $this->input->post("name");
	$formArray['father_name'] = $this->input->post("f_name");
	$formArray['mustahiq_cnic'] = $this->input->post("cnic");
	$formArray['category'] = $this->input->post("mustahiq_category");
	$formArray['bank_name']  = $this->input->post("bank_name");
	$formArray['account_number']  = $this->input->post("account_number");
	$formArray['cheque_number']  = $this->input->post("cheque_number");
	$formArray['payment_amount']  = $this->input->post("payment_amount");
	$formArray['financial_Year']  = $this->input->post("financial_Year");
	$formArray['installment']  = $this->input->post("installment");
	$formArray['lzc_id']  = $this->input->post("lzc_id");
	$formArray['LZCActualName']  = $this->input->post("lzcName");
	$formArray['district_id']  = $this->session->userdata('id');
	$formArray['District_Name']  = $this->input->post('districtName');
	$formArray['add_date'] = date("Y-m-d");	
	
	$year = $this->input->post("financial_Year");
	$installment = $this->input->post("installment");
	
	
	$this->db->select("*");
	$this->db->from("mustahiqeen_payments");
	$this->db->where("financial_Year",$year);
	$this->db->where("user_id",$userid);
	$this->db->where("mustahiq_cnic",$this->input->post("cnic"));
	$this->db->where("district_id",$this->session->userdata('id'));
	//$this->db->where("cheque_number",$this->input->post("cheque_number"));
	$this->db->where("installment",$installment);
	$query=$this->db->get();
	
	if($query->num_rows()>0)
	{
	$lczID = $this->input->post("lzc_id");
	$this->session->set_flashdata('error',' mustahiq already paid During '.$year);
	redirect(base_url() . 'Dist_GA_Mustahiqeenlist/getGsMustahiqeenList/' . $lczID);
	}
	else
	{
	
	$this->Dist_GA_Mustahiqeenlist_model->manage_mustahiqeen_payment($formArray,$this->input->post("user_id"));	
	
		
	
	$formArrayupdate = array();
	$formArrayupdate['payment_status'] = 1;
	$formArrayupdate['payment_year'] = $getfinancial_year;
	$formArrayupdate['payment_installment'] = $getfinancial_installment;
	$this->Dist_GA_Mustahiqeenlist_model->updateuser($userid,$formArrayupdate);
	
	$this->session->set_flashdata('success','Paid Successfully..!');
	
	$lczID = $this->input->post("lzc_id");
	//redirect(base_url('Dist_GA_paid_mustahiqeen'));
	redirect(base_url() . 'Dist_GA_Mustahiqeenlist/getGsMustahiqeenList/' . $lczID);
	
	}
	}

	function dist_lz19_mustahiqeen_print()
	{

		
		$getlzc_id = $this->uri->segment(3);
		$userid  = $this->session->userdata('id');
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		
		$getlzc_nobsqry = $this->db->select('*')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$getlzc_id)->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('account_head','Guzara Allowance')->get();
		
		
		$getnob = $getlzc_nobsqry->row('nob');

		$data['get_alllzc_mustahiqeen'] = $this->Dist_GA_Mustahiqeenlist_model->get_alllzc_mustahiqeen($getlzc_id,$userid);
		
		$data['get_selected_mustahiqeen_print'] = $this->Dist_GA_Mustahiqeenlist_model->get_lz19_mustahiqeen_print($getnob,$getlzc_id,$userid);
		$this->load->view('district/dist_print_selected_mustaiqeen',$data);
		
	}

	function dist_selected_mustahiqeen_print()
	{
	
	$getlzc_id = $this->uri->segment(3);
	$userid  = $this->session->userdata('id');
	
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');
	
	$getlzc_nobsqry = $this->db->select('*')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$getlzc_id)->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('account_head','Guzara Allowance')->get();
	
	
	$getnob = $getlzc_nobsqry->row('nob');

	$data['get_alllzc_mustahiqeen'] = $this->Dist_GA_Mustahiqeenlist_model->get_alllzc_mustahiqeen($getlzc_id,$userid);
	
	$data['get_selected_mustahiqeen_print'] = $this->Dist_GA_Mustahiqeenlist_model->get_selected_mustahiqeen_print($getnob,$getlzc_id,$userid);
	$this->load->view('district/dist_print_selected_mustaiqeen',$data);
	}
	
	
	
	
}
