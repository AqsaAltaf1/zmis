<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_reconsilation extends CI_Controller {



function __construct()
{
parent::__construct();
$this->load->model('Dist_reconsilation_model');
$this->load->model('Dist_cash_book_model');
//$this->load->model('Dist_admin_expense_model');
}



public function index()
{

$userid = $this->session->userdata('id');

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$data['get_all_cashbook_entries'] = $this->Dist_cash_book_model->get_all_cashbook_entries($getfinancial_year,$userid);


$data['get_passcheques'] = $this->Dist_reconsilation_model->get_passcheques($getfinancial_year,$getfinancial_installment,$userid);
/*$data['get_all_lzcs'] = $this->Dist_employee_model->get_all_lzcs($userid);
$data['get_zakat_staff'] = $this->Dist_employee_model->get_zakat_staff();
$data['get_zakat_staff_listing'] = $this->Dist_employee_model->get_zakat_staff_listing($userid);*/

$this->load->view('district/dist_reconsilation',$data);
}




}
