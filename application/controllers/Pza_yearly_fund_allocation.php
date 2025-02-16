<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_yearly_fund_allocation extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	$this->load->model('Pza_yearly_fund_allocation_model');	
	}
	
	
	public function index()
	{
		$this->load->view('pza/pza_yearly_fund_allocation');
	}
	
	
	
	
	function manage_yearly_pza_payment()
	{
		
		$formArray = array();
		$formArray['yearly_fund'] = $this->input->post("yearly_fund");
		$formArray['financial_year'] = $this->input->post("financial_year");
		// $formArray['installment'] = $this->input->post("installment");
		$formArray['remarks'] = $this->input->post("remarks");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		
		
		
		$this->db->select("*");
		$this->db->from("pza_yearly_fund_allocation");
		$this->db->where("financial_year",$this->input->post("financial_year"));
		// $this->db->where("installment",$this->input->post("installment"));
		$query=$this->db->get();
		
		//echo $this->db->last_query();
		
		if($query->num_rows() > 0)
		{
		$this->session->set_flashdata('error','Record already exists..!');
		}
		else
		{
		$this->session->set_flashdata('success','Record Added Successfully..!');	
		$this->Pza_yearly_fund_allocation_model->manage_yearly_pza_payment($formArray);
		}
		
		redirect(base_url('Pza_yearly_fund_allocation'));
		
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
