<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sec_PzaDistwisePaidReport extends CI_Controller {

	 
	function __construct()
	{
	parent::__construct();
	$this->load->model('Sec_PzaDistwisePaidReport_model');
	}


	public function index()
	{
		$data['get_all_districts'] = $this->Sec_PzaDistwisePaidReport_model->get_all_districts();
		$data['get_all_districts1'] = $this->Sec_PzaDistwisePaidReport_model->get_all_districts1();
		$this->load->view('secretary/sec_pzaDistwisePaidReport',$data);
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
		$data['report_type'] = $report_type;
		$data['get_lzc_wise_report_list'] = $this->Sec_pza_dist_reports_model->get_lzc_wise_report_list($district_id,$financial_year,$inst_value);
		$this->load->view('pza/manage_pza_dist_reports_print',$data);	
	}
	
	else if($report_type == "Guzara Allowance")
	{
		
		/*$this->db->select("*");
		$this->db->from("guzara_allowance_mustahiqeen_payments");
		$this->db->where("district_id",$district_id);
		$this->db->where("financial_Year",$financial_year);
		$this->db->where("installment",$inst_value);
		$this->db->order_by('id',"DESC");
		$data['guzara_allowance'] = $this->db->get()->result_array();
		
		$data['district_name'] = $district_name;
		$data['financial_year'] = $this->input->post("financial_year");
		$data['inst_value'] = $this->input->post("inst_value");
		$this->load->view('pza/manage_pza_dist_reports_print',$data);	*/
		
		
		
		$this->db->select("*");
		$this->db->from("dist_head_wise_fund");
		$this->db->where("district_id",$district_id);
		$this->db->where("account_head","Guzara Allowance");
		$this->db->where("year",$financial_year);
		$this->db->where("installment",$inst_value);
		$this->db->order_by('id',"DESC");
		$data['guzara_allowance'] = $this->db->get()->result_array();
		
		$data['district_name'] = $district_name;
		$data['financial_year'] = $this->input->post("financial_year");
		$data['inst_value'] = $this->input->post("inst_value");
		$data['report_type'] = $report_type;
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
		$data['report_type'] = $report_type;
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
		$data['report_type'] = $report_type;
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
		$data['report_type'] = $report_type;
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
		$data['report_type'] = $report_type;
		$this->load->view('pza/manage_pza_dist_reports_print',$data);
	
	}
	
	
	
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
