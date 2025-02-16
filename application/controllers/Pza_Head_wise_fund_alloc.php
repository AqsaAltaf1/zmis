<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_Head_wise_fund_alloc extends CI_Controller {

	
	function __construct()
	{
	parent::__construct();
	$this->load->model('pza_headwise_fundalloc_model');
	}
	
	
	public function index()
	{
		
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');
	
	$data['gethead_wise_fund'] = $this->pza_headwise_fundalloc_model->gethead_wise_fund($getfinancial_year,$getfinancial_installment);
	
	$this->load->view('pza/head_wise_fund_alloc',$data);
	
	}
	
	
	function manage_headwise_payment()
	{
		$formArray = array();
		$formArray['account_head']  = $this->input->post("account_head");
		$formArray['financial_year']  = $this->input->post("financial_year");
		$formArray['installment']  = $this->input->post("installment");
		$formArray['amount_allocated']  = $this->input->post("amount_allocated");
		$formArray['description']  = $this->input->post("remarks");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		
		$this->db->select("*");
		$this->db->from("head_wise_fund");
		$this->db->where("account_head",$this->input->post("account_head"));
		$this->db->where("financial_year",$this->input->post("financial_year"));
		$this->db->where("installment",$this->input->post("installment"));
		
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			$this->session->set_flashdata('error','Record already exists.');
				
		}
		else
		{
			$this->pza_headwise_fundalloc_model->manage_headwise_payment($formArray);
			$this->session->set_flashdata('success','Record Added Successfully..!');	
		}
		
		redirect(base_url('Pza_Head_wise_fund_alloc'));
	
	}
	
	
	
	
	function manage_headwise_payment_update()
	{
		
		$formArray = array();
		$account_head  = $this->input->post("account_head");
		$financial_year  = $this->input->post("financial_year");
		$installment = $this->input->post("installment");
		$formArray['amount_allocated']  = $this->input->post("amount_allocated");
		$this->pza_headwise_fundalloc_model->manage_headwise_payment_update($account_head,$financial_year,$installment,$formArray);
		
		$this->session->set_flashdata('success','Record Update Successfully..!');
		redirect(base_url('Pza_Head_wise_fund_alloc'));
	
	}
	
	
	
	
	
	
}
