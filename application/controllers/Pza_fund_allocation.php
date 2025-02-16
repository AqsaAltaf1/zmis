<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_fund_allocation extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	$this->load->model('pza_fund_allocation_model');	
	}
	
	
	public function index()
	{
		$this->load->view('pza/pza_fund_allocation');
	}
	
	
	
	
	function manage_pza_payment()
	{
		
		$formArray = array();
		$formArray['pza_amount'] = $this->input->post("pza_fund");
		$formArray['financial_year'] = $this->input->post("financial_year");
		$formArray['installment'] = $this->input->post("installment");
		$formArray['remarks'] = $this->input->post("remarks");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		
		
		
		$this->db->select("*");
		$this->db->from("pza_fund");
		$this->db->where("financial_year",$this->input->post("financial_year"));
		$this->db->where("installment",$this->input->post("installment"));
		$query=$this->db->get();
		
		//echo $this->db->last_query();
		
		/*if($query->num_rows() > 0)
		{
		$this->session->set_flashdata('error','Record already exists..!');
		}
		else
		{
		$this->session->set_flashdata('success','Record Added Successfully..!');	
		$this->pza_fund_allocation_model->manage_pza_payment($formArray);
		}*/
		$this->session->set_flashdata('success','Record Added Successfully..!');	
		$this->pza_fund_allocation_model->manage_pza_payment($formArray);
		redirect(base_url('Pza_fund_allocation'));
		
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
