<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_posting_transfer extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
		
	$this->load->model('Pza_posting_transfer_model');
	$this->load->model('Dist_employee_model');
	$this->load->model('Pza_employee_model');
	}
	
	
	
	public function index()
	{
	
	
	$data['get_all_districts'] = $this->Dist_employee_model->get_all_districts();
	
	$this->load->view('pza/pza_posting_transfer');
	
	}
	
	
	function pza_employees_transfer()
	{
	
	
	$data['get_all_districts'] = $this->Dist_employee_model->get_all_districts();
	$data['get_designation_list'] = $this->Pza_employee_model->get_designation_list();
	
	$get_employee_cinc  = $this->input->post("emp_cnic");
	
	$this->db->select("*");
	$this->db->from("employees");
	$this->db->where("cnic",$get_employee_cinc);
	$employee_status = $this->db->get()->num_rows();
	
	if($employee_status > 0)
	{
	$data['get_all_districts'] = $this->Dist_employee_model->get_all_districts();	
	$this->session->set_flashdata('success','Employee found with following details.');	
	$data['emp_info'] = $this->db->select('*')->from('employees')->where('cnic',$get_employee_cinc)->get()->result_array();
	$this->load->view('pza/pza_posting_transfer',$data);
	}
	else
	{
	$this->session->set_flashdata('error','No Record Found');	
	$this->load->view('pza/pza_posting_transfer');
	}
	}
	
	
	
	function manage_pza_employees_transfer()
	{
	
	
	$formArray = array();
	$formArray['employee_name'] = $this->input->post('employee_id');
	
	$formArray['posted_from'] = $this->input->post('post_location');
	$formArray['posted_from_id'] = $this->input->post('posting_stat');
	
	
	$formArray['posted_to'] = $this->input->post('posted_to');
	$formArray['posted_to_id'] = $this->input->post('district_name');
	
	$formArray['current_desig'] = $this->input->post('current_desig');
	$formArray['new_desig'] = $this->input->post('new_desig');
	
	$formArray['released_on'] = $this->input->post('transfer_date');
	$formArray['joined_on'] = $this->input->post('joined_on');
	
	$formArray['add_date'] = date("Y-m-d");
	
	$formArray['description'] = $this->input->post('remarks');
	
	$this->Pza_posting_transfer_model->manage_pza_employees_transfer($formArray);
	
	$this->session->set_flashdata('success','Record Updated Successfully..!');	
	
	redirect(base_url('Pza_employees'));
	
	
	
	
	
	
	}
	
	
	
	
	
	
	
}
