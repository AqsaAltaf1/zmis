<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_dist_reports extends CI_Controller {
 
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('pza_dist_reports_model');
	}


	public function index()
	{
		$data['get_all_districts'] = $this->pza_dist_reports_model->get_all_districts();
		$this->load->view('pza/pza_dist_reports',$data);
	}
	
	
	function manage_pza_dist_reports()
	{
		
	
	$district_id = $this->input->post("district_id");	
	$report_type = $this->input->post("report_type");
	$financial_year = $this->input->post("financial_year");
	$inst_value = $this->input->post("inst_value");
	
	$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
	$district_name = $get_dist_name->row('district_name');	
	
	if($report_type == "LZC Wise List")
	{
		$data['district_name'] = $district_name;
		$data['financial_year'] = $this->input->post("financial_year");
		$data['inst_value'] = $this->input->post("inst_value");
		$data['get_lzc_wise_report_list'] = $this->pza_dist_reports_model->get_lzc_wise_report_list($district_id,$financial_year,$inst_value);
		$this->load->view('pza/manage_pza_dist_reports_print',$data);	
	}
	
	else if($report_type == "Guzara Allowance")
	{
		
		$this->db->select("*");
		$this->db->from("guzara_allowance_mustahiqeen_payments");
		$this->db->where("district_id",$district_id);
		$this->db->where("financial_Year",$financial_year);
		$this->db->where("installment",$inst_value);
		$this->db->order_by('id',"DESC");
		$data['guzara_allowance'] = $this->db->get()->result_array();
		
		$data['district_name'] = $district_name;
		$data['financial_year'] = $this->input->post("financial_year");
		$data['inst_value'] = $this->input->post("inst_value");
		$this->load->view('pza/manage_pza_dist_reports_print',$data);	
		
	}
	
	else if($report_type == "Marriage Assist")
	{
		$this->db->select("*");
		$this->db->from("ma_paid_mustahiqeen");
		$this->db->where("district_id",$district_id);
		$this->db->where("financial_Year",$financial_year);
		$this->db->where("installment",$inst_value);
		$this->db->order_by('id',"DESC");
		$data['marriage_assist'] = $this->db->get()->result_array();
		
		$data['district_name'] = $district_name;
		$data['financial_year'] = $this->input->post("financial_year");
		$data['inst_value'] = $this->input->post("inst_value");
		$this->load->view('pza/manage_pza_dist_reports_print',$data);	
		
	}
	
	
	else if($report_type == "Deeni Madaris")
	{
		
		$this->db->select("*");
		$this->db->from("madrassa_list");
		$this->db->order_by('id',"DESC");
		$this->db->where("district_id",$district_id);
		$data['deeni_madaris'] = $this->db->get()->result_array();
		$this->db->last_query();
		
		$this->db->select("*");
		$this->db->from("dm_mustahiqeen");
		$this->db->where("district_id",$district_id);
		$this->db->where("year",$financial_year);
		$this->db->where("installment",$inst_value);
		$this->db->order_by('id',"DESC");
		$data['deeni_madaris_paid'] = $this->db->get()->result_array();
		$this->db->last_query();
		
		$data['district_id'] = $district_id;
		$data['district_name'] = $district_name;
		$data['financial_year'] = $this->input->post("financial_year");
		$data['inst_value'] = $this->input->post("inst_value");
		$this->load->view('pza/manage_pza_dist_reports_print',$data);	
		
	}
	
	
	else if($report_type == "Health Care")
	{
	
		$this->db->select("*");
		$this->db->from("hc_mustahiqeen");
		$this->db->where("district_id",$district_id);
		$this->db->where("year",$financial_year);
		$this->db->where("installment",$inst_value);
		$this->db->order_by('id',"DESC");
		$data['hc_mustahiqeen_paid'] = $this->db->get()->result_array();
		$this->db->last_query();
		
		$data['district_id'] = $district_id;
		$data['district_name'] = $district_name;
		$data['financial_year'] = $this->input->post("financial_year");
		$data['inst_value'] = $this->input->post("inst_value");
		$this->load->view('pza/manage_pza_dist_reports_print',$data);
	
	}
	
	
	else if($report_type == "Edu-Stipend(A)")
	{
	
		$this->db->select("*");
		$this->db->from("esa_mustahiqeen");
		$this->db->where("district_id",$district_id);
		$this->db->where("year",$financial_year);
		$this->db->where("installment",$inst_value);
		$this->db->order_by('id',"DESC");
		$data['esa_mustahiqeen_paid'] = $this->db->get()->result_array();

		$data['district_id'] = $district_id;
		$data['district_name'] = $district_name;
		$data['financial_year'] = $this->input->post("financial_year");
		$data['inst_value'] = $this->input->post("inst_value");
		$this->load->view('pza/manage_pza_dist_reports_print',$data);
	
	}
	

	
	}
	
	
	
	
	public function distWisePaidMustahiqeen()
	{
		$data['get_all_districts'] = $this->pza_dist_reports_model->get_all_districts();
		$this->load->view('pza/distWisePaidMustahiqeen',$data);
	}
	
	
	public function yearWisePaidMustahiqeen()
	{
		$data['get_all_districts'] = $this->pza_dist_reports_model->get_all_districts();
		$financialYear  = ($this->input->post("year") == "" ? "%%" : $this->input->post("year"));
		
		if ($financialYear==""){
		$queryPaidMustahiq = $this->db->query("SELECT District_Name, MustahiqType, count(MustahiqType) as Total,
		SUM(CASE WHEN MustahiqType ='Guzara Allowance' THEN 1 ELSE 0 END) as GA,
		SUM(CASE WHEN MustahiqType ='Marriage Assistance' THEN 1 ELSE 0 END) as MA,
		SUM(CASE WHEN MustahiqType ='Deeni Madaris' THEN 1 ELSE 0 END) as DM,
		SUM(CASE WHEN MustahiqType ='Educational Stipend (A)' THEN 1 ELSE 0 END) as ESA,
		SUM(CASE WHEN MustahiqType ='Educational Stipend (P)' THEN 1 ELSE 0 END) as ESP
		 FROM mustahiqeen where payment_status = 1 group by District_Name");
		//$queryPaidResult = $queryPaidMustahiq->result_array();
		} else if (($financialYear == "2019-20") || ($financialYear == "2020-21"))
		{
		$queryPaidMustahiq = $this->db->query("SELECT District_Name, MustahiqType, count(MustahiqType) as Total,
		SUM(CASE WHEN MustahiqType ='Guzara Allowance' THEN 1 ELSE 0 END) as GA,
		SUM(CASE WHEN MustahiqType ='Marriage Assistance' THEN 1 ELSE 0 END) as MA,
		SUM(CASE WHEN MustahiqType ='Deeni Madaris' THEN 1 ELSE 0 END) as DM,
		SUM(CASE WHEN MustahiqType ='Educational Stipend (A)' THEN 1 ELSE 0 END) as ESA,
		SUM(CASE WHEN MustahiqType ='Educational Stipend (P)' THEN 1 ELSE 0 END) as ESP
		 FROM mustahiqeen_payments where financial_Year = '".$financialYear."' group by District_Name");
		 
		}
		else
		{
		$queryPaidMustahiq = $this->db->query("SELECT District_Name, MustahiqType, count(MustahiqType) as Total,
		SUM(CASE WHEN MustahiqType ='Guzara Allowance' THEN 1 ELSE 0 END) as GA,
		SUM(CASE WHEN MustahiqType ='Marriage Assistance' THEN 1 ELSE 0 END) as MA,
		SUM(CASE WHEN MustahiqType ='Deeni Madaris' THEN 1 ELSE 0 END) as DM,
		SUM(CASE WHEN MustahiqType ='Educational Stipend (A)' THEN 1 ELSE 0 END) as ESA,
		SUM(CASE WHEN MustahiqType ='Educational Stipend (P)' THEN 1 ELSE 0 END) as ESP
		 FROM mustahiqeen where payment_year = '".$financialYear."' and payment_status = 1 group by District_Name");
		//$queryPaidResult = $queryPaidMustahiq->result_array();
		}
		
		
		//echo $this->db->last_query();
		//exit;
		
		$data['getPaidList'] = $queryPaidMustahiq->result_array();
		$data['financialYear'] = $financialYear;
		$this->load->view('pza/mustaiqeenList/yearWisePaidList',$data);
	}
	
	
	
	public function yearlyHeadwiseSummary()
	{
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getInstallment = $getfinancialdata->row('installment');
		
		$data ['get_all_districts'] = $this->pza_dist_reports_model->get_all_districts();
		$data['getYearlyHeadwiseFund']=$this->pza_dist_reports_model->getYearlyHeadwiseFund($getfinancial_year, $getInstallment);
		$this->load->view('pza/reports/yearlyHeadwiseSummary', $data);
	}
	
	
	
	
	
}
