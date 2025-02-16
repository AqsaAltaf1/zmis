<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_cash_book extends CI_Controller {


function __construct()
{
parent::__construct();
$this->load->model('dist_headwise_fundalloc_model');
$this->load->model('Dist_GA_mustahiq_reg_model');
$this->load->model('Dist_cash_book_model');

}


public function index()
{
$userid = $this->session->userdata('id');

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$data['get_all_cashbook_entries'] = $this->Dist_cash_book_model->get_all_cashbook_entries($getfinancial_year,$userid);


$this->load->view('district/dist_cash_book',$data);

}


function manage_dist_headwise_payment()
{

$userid = $this->session->userdata('id');
$formArray = array();
$formArray['account_head']  = $this->input->post("account_head");

if($this->input->post("account_head")=="Guzara Allowance")
{
$formArray['lzc_institution_madrasa']  = $this->input->post("lzc");
$lzc_institution_madrasa = $this->input->post("lzc");
} 
else if ($this->input->post("account_head")=="Marriage Assistance")
{
$formArray['lzc_institution_madrasa']  = $this->input->post("lzc");
$lzc_institution_madrasa = $this->input->post("lzc");
} 
else if($this->input->post("account_head")=="Deeni Madaris")
{
$formArray['lzc_institution_madrasa']  = $this->input->post("madarassa");
$lzc_institution_madrasa = $this->input->post("madarassa");
} 
else if($this->input->post("account_head")=="Educational Stipend (A)")
{
$formArray['lzc_institution_madrasa']  = $this->input->post("institution");
$lzc_institution_madrasa = $this->input->post("institution");
} 
else if($this->input->post("account_head")=="Educational Stipend (P)")
{
$formArray['lzc_institution_madrasa']  = $this->input->post("institution");
$lzc_institution_madrasa = $this->input->post("institution");
} 
else 
{
$formArray['lzc_institution_madrasa']  = 0;
}

$formArray['cheque_no']  = $this->input->post("cheque_no");
$formArray['year']  = $this->input->post("year");
$formArray['installment']  = $this->input->post("installment");



if($this->input->post("account_head")=="Guzara Allowance")
{
	$formArray['amount_allocated']  = $this->input->post("amount_allocated_ga");
	$formArray['nob']  = $this->input->post("nob_ga");	
}
else if($this->input->post("account_head")=="Marriage Assistance")
{
	$formArray['amount_allocated']  = $this->input->post("amount_allocated_ma");
	$formArray['nob']  = $this->input->post("nob_ma");		
}
else
{
	$formArray['amount_allocated']  = $this->input->post("amount_allocated_all");
	$formArray['nob']  = 0;		
}


$formArray['district_id']  = $userid;

$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;

/*$this->dist_headwise_fundalloc_model->manage_headwise_payment($formArray);	
redirect(base_url('Dist_head_wise_fund_alloc'));*/

$this->db->select("*");
$this->db->from("dist_head_wise_fund");
$this->db->where("account_head",$this->input->post("account_head"));
$this->db->where("year",$this->input->post("year"));
$this->db->where("installment",$this->input->post("installment"));
$this->db->where("district_id",$userid);
$this->db->where("lzc_institution_madrasa",$lzc_institution_madrasa);
$query=$this->db->get();

//echo $query->num_rows();

if($query->num_rows()>0)
{
$this->session->set_flashdata('error','Record already exists.');
}
else
{
$this->dist_headwise_fundalloc_model->manage_headwise_payment($formArray);
$this->session->set_flashdata('success','Record Added Successfully..!');	
}
redirect(base_url('Dist_head_wise_fund_alloc'));
}






}
