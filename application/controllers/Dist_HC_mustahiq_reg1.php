<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_HC_mustahiq_reg extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_HC_mustahiq_reg_model');
	$this->load->model('Dist_DM_mustahiq_reg_model');
	}
	
	
	
	public function index()
	{
		
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');


		$userid = $this->session->userdata('id');
		$data['get_all_lzcs'] = $this->Dist_DM_mustahiq_reg_model->get_all_lzcs($userid);
		$data['get_all_hostpital_list'] = $this->Dist_HC_mustahiq_reg_model->get_all_hostpital_list();
		
		$data['get_HC_mustahiq_list'] = $this->Dist_HC_mustahiq_reg_model->get_HC_mustahiq_list($userid,$getfinancial_year,$getfinancial_installment);
		
		
		$this->load->view('district/dist_hc_mustahiq_reg',$data);
	}
	
	
	
	
	
	function dist_manage_mustahiq_register()
	{
		
		
	$formArray['district_id'] = $this->session->userdata('id');
	$formArray['lzc_id']  = $this->input->post("lzc_id");
	
	$formArray['mustahiq_name']  = $this->input->post("mustahiq_name");
	$formArray['f_name']  = $this->input->post("f_name");
	$formArray['cnic']  = str_replace("-", "", $this->input->post("cnic"));
	$formArray['cell_no']  = $this->input->post("cell_no");
	$formArray['gender']  = $this->input->post("gender");
	$formArray['age']  = $this->input->post("age");
	$formArray['istehqaq_no']  = $this->input->post("istehqaq_no");
	$formArray['category']  = $this->input->post("category");
	$formArray['address']  = $this->input->post("address");
	$formArray['disease_type']  = $this->input->post("disease_type");
	$formArray['hospital_id']  = $this->input->post("hospital_id");
	
	
    $dhqId = $this->input->post("dhq_id");
    $iparr =  explode(".", $dhqId); 
    $type = $iparr[0];
    $districtvalue = $iparr[1];
    
   $finalvalue = $type.$districtvalue;
   
	if($type == "THQ")
	{
	 $formArray['amount']  = $this->input->post("thqAmount");
	 $formArray['dhq_id'] = $districtvalue;   
	}
	else if($type == "DHQ")
	{
	 $formArray['amount']  = $this->input->post("amount");   
	 $formArray['dhq_id'] = $districtvalue;  
	}
	else if($type == "BHU")
	{
	 $formArray['amount']  = $this->input->post("bhuAmount"); 
	 $formArray['dhq_id'] = $districtvalue;
	}
	else if($type == "provincial_hospital")
	{
	 $formArray['amount']  = $this->input->post("bhuAmount"); 
	 $formArray['dhq_id'] = 0;
	}
	
	
	
	
	
	
	$formArray['hospital_type'] = $type;
		
	

	//$formArray['dhq_id']  = $this->input->post("dhq_id");
	

	$formArray['year']= $this->input->post("year");
	$formArray['installment']= $this->input->post("installment");
	
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
		
		
	$this->Dist_HC_mustahiq_reg_model->dist_manage_mustahiq_register($formArray);		
	
	$this->session->set_flashdata('success','Record Added Successfully..!');
		
	redirect(base_url('Dist_HC_mustahiq_reg'));		
		
	}
	
	
function HealthMustahiqPrint()
	{
	$userid  = $this->session->userdata('id');
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');
	
	$data['getHealthMustahiqPrint'] = $this->Dist_HC_mustahiq_reg_model->getHealthMustahiqPrint($userid,$getfinancial_year,$getfinancial_installment);
	$this->load->view('district/distHealthMustahiqPrint',$data);
}
	
	
	
	
	
	
}
