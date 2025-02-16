<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Sec_Pza_head_wise_report extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	
	$this->load->model('Sec_PzaHeadWiseReportModel');
	
	
	}
	
	
	
	
	public function index()
	{
		$data['districtList'] = $this->Sec_PzaHeadWiseReportModel->districtList();
		$data['accountHead'] = $this->Sec_PzaHeadWiseReportModel->accountHead();
		$data['getInstallment'] = $this->Sec_PzaHeadWiseReportModel->getInstallment();
		$this->load->view('secretary/sec_pza_head_wise_report', $data);
	}
	
	
	
	
	public function paidMustahiqeen()
	{
	
	$this->load->view('secretary/sec_pza_head_wise_report');
	}
	
	public function totalGAList()
	{
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getInstallment = $getfinancialdata->row('installment');
	
	$data['gaTotalList']= $this->Sec_PzaHeadWiseReportModel->gaTotalList($getfinancial_year,$getInstallment);
	$this->load->view('pza/mustaiqeenList/totalGAList',$data);
	}
	
	public function totalMAList()
	{
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getInstallment = $getfinancialdata->row('installment');
	
	$data['maTotalList']= $this->Sec_PzaHeadWiseReportModel->maTotalList($getfinancial_year,$getInstallment);
	$this->load->view('pza/mustaiqeenList/totalMAList',$data);
	}
	
	public function totalDMList()
	{
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getInstallment = $getfinancialdata->row('installment');
	
	$data['dmTotalList']= $this->Sec_PzaHeadWiseReportModel->dmTotalList($getfinancial_year,$getInstallment);
	$this->load->view('pza/mustaiqeenList/totalDMPaidList',$data);
	}
	
	public function totalESList()
	{
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getInstallment = $getfinancialdata->row('installment');
	
	$data['esTotalList']= $this->Sec_PzaHeadWiseReportModel->esTotalList($getfinancial_year,$getInstallment);
	$this->load->view('pza/mustaiqeenList/totalESPaidList',$data);
	}
	
	
	public function totalGAPaidList()
	{
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getInstallment = $getfinancialdata->row('installment');
	
	$data['gaPaidList']= $this->Sec_PzaHeadWiseReportModel->gaPaidList($getfinancial_year,$getInstallment);
	$this->load->view('pza/mustaiqeenList/gaPaidList',$data);
	}
	
	public function totalMAPaidList()
	{
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getInstallment = $getfinancialdata->row('installment');
	
	$data['maPaidList']= $this->PzaHeadWiseReportModel->maPaidList($getfinancial_year,$getInstallment);
	$this->load->view('pza/mustaiqeenList/totalMAPaidList',$data);
	}
	
	
/*	function rehab_institute_reports_submit()
{
	
	$get_date = date("Y-m-d");
	$start_date = ($this->input->post("start_date") == "" ? "2020-11-01" : $this->input->post("start_date"));
	$end_date = ($this->input->post("end_date") == "" ? "$get_date" : $this->input->post("end_date"));

	$report_qry = "SELECT * FROM employees where post_location like '".$post_location."' 
	AND designation like '".$designation."' AND district_id like '".$district_id."' AND
	(appointment_date between '".$start_date."' AND  '".$end_date."')";
	
	$query = $this->db->query($report_qry);
	
	$data['get_employee_list'] = $query->result_array(); 
	
	//echo $this->db->last_query();//exit;
	
	$this->load->view('institutions/rehab_institute_reports_view',$data);	
}*/



function headWiseReport()
{
	
	$districtName  = ($this->input->post("districtName") == "" ? "%%" : $this->input->post("districtName"));
	$financialYear  = ($this->input->post("financialYear") == "" ? "%%" : $this->input->post("financialYear"));
	$installment  = ($this->input->post("installment") == "" ? "%%" : $this->input->post("installment"));
	$MustahiqType  = ($this->input->post("MustahiqType")== "" ? "%%" : $this->input->post("MustahiqType"));
	$paymentStatus  = ($this->input->post("paymentStatus")== "" ? "%%" : $this->input->post("paymentStatus"));
	

	if (($MustahiqType == "Guzara Allowance") || ($MustahiqType == "Marriage Assistance") and ($paymentStatus == "paid"))
	{
		
		 $headWiseQuery = "SELECT District_Name, mustahiq_name, father_name, mustahiq_cnic,  LZCActualName,  category   FROM mustahiqeen_payments where District_Name like '".$districtName."' 
	AND financial_Year like '".$financialYear."' AND installment like '".$installment."' AND MustahiqType like '".$MustahiqType."' ";

		} else if (($MustahiqType == "Guzara Allowance") || ($MustahiqType == "Marriage Assistance") and ($paymentStatus == "notPaid"))
	{
		
		  $headWiseQuery = "SELECT District_Name, mustahiq_name, father_name, mustahiq_cnic, gender, contact_number, LZCActualName,  category, Remarks  FROM mustahiqeen where District_Name like '".$districtName."' AND year like '".$financialYear."' AND installment like '".$installment."' AND MustahiqType like '".$MustahiqType."' ";
		 
		

		} 
		else if ($MustahiqType == "Deeni Madaris" || ($MustahiqType == "Educational Stipend (A)") || ($MustahiqType =="Educational Stipend (P)"))
		{
		$headWiseQuery = "SELECT District_Name, mustahiq_name, father_name, mustahiq_cnic, gender, contact_number, LZCActualName,  category   FROM mustahiqeen where District_Name like '".$districtName."' 
	AND year like '".$financialYear."' AND installment like '".$installment."' AND MustahiqType like '".$MustahiqType."' AND payment_status = 1 ";
	
	
		}
	
	
	
	$mustahiqeenQuery = $this->db->query($headWiseQuery);
	
	$data['getCustomizePaidList'] = $mustahiqeenQuery->result_array();
	 
	$data['districtName'] = $districtName;
	$data['financialYear'] = $financialYear;
	$data['installment'] = $installment;
	$data['MustahiqType'] = $MustahiqType;
	
	//echo $this->db->last_query();
	//exit;
	$this->load->view('pza/mustaiqeenList/customizePaidList',$data);	
}
	
	
	
	
	
	
	
	
}
