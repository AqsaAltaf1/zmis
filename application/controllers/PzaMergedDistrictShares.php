<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PzaMergedDistrictShares extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('PzaMergedDistrictShares_model');
	}
	
	
	
	public function index()
	{
		
		$data['getMergedDistrictShares'] = $this->PzaMergedDistrictShares_model->getMergedDistrictShares();
		$this->load->view('pza/pzaMergedDistrictShares',$data);
	}
	
	
	
	function manage_district_payment()
	{
	
	$formArray = array();
	$formArray['district_id'] = $this->input->post("district");	
	$formArray['financial_year']  = $this->input->post("financial_year");
	$formArray['installment']  = $this->input->post("installment");
	$formArray['GA']  = $this->input->post("GA");
	$formArray['MA']  = $this->input->post("MA");
	$formArray['DM']  = $this->input->post("DM");
	$formArray['HC']  = $this->input->post("HC");
	$formArray['ESA']  = $this->input->post("ESA");
	$formArray['ESP']  = $this->input->post("ESP");
	// $formArray['VTI']  = $this->input->post("VTI");
	$formArray['admin_expns']  = $this->input->post("admin_expns");
	$formArray['total_fund'] = $this->input->post("GA")+$this->input->post("MA")+$this->input->post("DM")+$this->input->post("HC")+$this->input->post("ESA")+$this->input->post("ESP")+$this->input->post("VTI")+$this->input->post("admin_expns");
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	
	
	$this->PzaMergedDistrictShares_model->manage_district_payment($formArray);
		
		
	$this->session->set_flashdata('success','Record Added Successfully..!');	
		
	redirect(base_url('PzaMergedDistrictShares'));	
		
		
			
	}

	function PrintPzaMergedDistrictShares()
	{
	$formArray = array();
	
	$data['getMergedDistrictShares'] = $this->PzaMergedDistrictShares_model->getMergedDistrictShares();
	$data['get_district_payment_record'] = $this->PzaMergedDistrictShares_model->get_district_payment_record($formArray);
	$this->load->view('pza/printPzaMergedDistrictShares',$data);
}
	
	
	
	
	
	
	
}
