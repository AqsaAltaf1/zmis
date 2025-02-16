<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_head_wise_fund_alloc extends CI_Controller {


function __construct()
{
parent::__construct();
$this->load->model('Dist_headwise_fundalloc_model');
$this->load->model('Dist_GA_mustahiq_reg_model');

}


public function index()
{
$userid = $this->session->userdata('id');
$data['get_all_districts'] = $this->Dist_GA_mustahiq_reg_model->get_all_districts();

$data['get_all_lzc'] = $this->Dist_GA_mustahiq_reg_model->get_all_lzc($userid);
$data['get_all_lzc_controlled'] = $this->Dist_GA_mustahiq_reg_model->get_all_lzc_controlled($userid);  // Added by Abbas (16-Oct-2020)


$data['get_all_inst_list'] = $this->Dist_headwise_fundalloc_model->get_all_inst_list($userid);


$data['get_all_deeni_madaris'] = $this->Dist_headwise_fundalloc_model->get_all_deeni_madaris($userid);




$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$data['get_all_madrassalist'] = $this->Dist_headwise_fundalloc_model->get_all_madrassalist($getfinancial_year,$getfinancial_installment,$userid);

$data['get_dist_headwise_fund'] = $this->Dist_headwise_fundalloc_model->get_dist_headwise_fund($getfinancial_year,$getfinancial_installment,$userid);

$data['get_all_edulistings'] = $this->Dist_headwise_fundalloc_model->get_all_edulistings($getfinancial_year,$getfinancial_installment,$userid);

$data['get_hc_listings'] = $this->Dist_headwise_fundalloc_model->get_hc_listings($getfinancial_year,$getfinancial_installment,$userid);


$this->load->view('district/dist_head_wise_fund_alloc',$data);

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
else if ($this->input->post("account_head")=="Health Care (District Level)")
{
$formArray['lzc_institution_madrasa'] = $this->input->post("hospital_type");
$lzc_institution_madrasa = $this->input->post("hospital_type");
}
else 
{
$formArray['lzc_institution_madrasa']  = 0;
}

$formArray['cheque_no']  = $this->input->post("cheque_no");
$formArray['cheque_date']  = $this->input->post("cheque_date");

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
$this->Dist_headwise_fundalloc_model->manage_headwise_payment($formArray);
$this->session->set_flashdata('success','Record Added Successfully..!');	
}
redirect(base_url('Dist_head_wise_fund_alloc'));
}








function manage_dist_headwise_payment_update()
{
	$getrecord_id = $this->input->post("getrecord_id");
	$userid = $this->session->userdata('id');
	
	$formArray = array();
	$formArray['cheque_no']  = $this->input->post("cheque_no");
	$formArray['lzc_institution_madrasa']  = $this->input->post("lzcid");
	$formArray['cheque_no']  = $this->input->post("cheque_no");
	$formArray['cheque_date']  = $this->input->post("cheque_date");
	
	if($this->input->post('account_head') == "Guzara Allowance")
	{
		$formArray['nob']  = $this->input->post("nob_ga_value");
		$formArray['amount_allocated']  = $this->input->post("amount_allocated_ga");
	}
	if($this->input->post('account_head') == "Marriage Assistance")
	{
		$formArray['nob']  = $this->input->post("nob_ma_value");
		$formArray['amount_allocated']  = $this->input->post("amount_allocated_ma");
	}
	$formArray['updayedOn'] = date("Y-m-d");
	
	$this->Dist_headwise_fundalloc_model->updateuser_headwise_payments($formArray,$getrecord_id,$userid);
	$this->session->set_flashdata('success','Record Updated Successfully..!');	
	redirect(base_url('Dist_head_wise_fund_alloc'));
	

	
}

function chequeCancel()
	{
		
		$getrecord_id = $this->input->post("getrecord_id");
		$userid = $this->session->userdata('id');
		
		$amount = $this->db->select('amount_allocated')->from('dist_head_wise_fund')->where('id',$getrecord_id)->where('district_id',$userid)->get();
		$chequeAmount = $amount->row('amount_allocated');
		
		$nob = $this->db->select('nob')->from('dist_head_wise_fund')->where('id',$getrecord_id)->where('district_id',$userid)->get();
		$totalNob = $nob->row('nob');
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$year = $getfinancialdata->row('financial_Year');
$inst = $getfinancialdata->row('installment');

		$formArray = array();
		$formArray['status']  = 0;
		$formArray['amount_allocated']  = '(-'.$chequeAmount.')';
		$formArray['comments']  = $this->input->post("comments");
		$formArray['nob']  = '(-'.$totalNob.')';
		$formArray['chequeStatus']  = 'canceled';
		$this->Dist_headwise_fundalloc_model->chequeCancelUpdate($getrecord_id,$userid, $formArray, $year, $inst);
		$this->session->set_flashdata('success','your Cheque Has been cancel Successfully..!');	
		redirect(base_url('Dist_head_wise_fund_alloc'));
	}
	
	function LZCFundPrint()
	{
	$userid  = $this->session->userdata('id');
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');
	$data['getFundPrint'] = $this->Dist_headwise_fundalloc_model->getFundPrint($userid,$getfinancial_year,$getfinancial_installment);
	$this->load->view('district/distLZCFundPrint',$data);
}
	


function getTargetMustahiqeen()
{
    $targetLzcID = $this->input->post("lzcID");
    $lzcMustahiqeen = $this->db->select('*')->from('zakatentryforms')->where('LZC_ID',$targetLzcID)->get();
	echo $lzcMustahiqeen->row('FormHandedOver');  
}
	
	


}
