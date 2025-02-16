<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_pass_book extends CI_Controller {


function __construct()
{
parent::__construct();
$this->load->model('Dist_pass_book_model');
}


public function index()
{
$userid = $this->session->userdata('id');

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');


$data['get_passbook_entries'] = $this->Dist_pass_book_model->get_passbook_entries($getfinancial_year,$getfinancial_installment,$userid);

/*
$data['get_all_lzc'] = $this->Dist_GA_mustahiq_reg_model->get_all_lzc($userid);
$data['get_all_inst_list'] = $this->dist_headwise_fundalloc_model->get_all_inst_list($userid);
$data['get_all_deeni_madaris'] = $this->dist_headwise_fundalloc_model->get_all_deeni_madaris($userid);
$data['get_all_madrassalist'] = $this->dist_headwise_fundalloc_model->get_all_madrassalist($getfinancial_year,$getfinancial_installment,$userid);
*/

$this->load->view('district/dist_pass_book',$data);

}


function manage_passbook_entries()
{

$userid = $this->session->userdata('id');
$formArray = array();

$formArray['district_id']  = $this->session->userdata('id');
$formArray['remarks']  = $this->input->post("remarks");
$formArray['cheque_no']  = $this->input->post("cheque_no");
$formArray['amount']  = $this->input->post("amount");
$formArray['year']  = $this->input->post("year");
$formArray['installment']  = $this->input->post("installment");
$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;

$this->db->select("*");
$this->db->from("district_passbook");
$this->db->where("cheque_no",$this->input->post("cheque_no"));
$this->db->where("year",$this->input->post("year"));
$this->db->where("installment",$this->input->post("installment"));
$this->db->where("district_id",$userid);
$query=$this->db->get();

//echo $query->num_rows();

if($query->num_rows()>0)
{
$this->session->set_flashdata('error','Cheque already exists.');
}
else
{
$this->Dist_pass_book_model->manage_passbook_entries($formArray);
$this->session->set_flashdata('success','Record Added Successfully..!');	
}
redirect(base_url('Dist_pass_book'));
}






}
