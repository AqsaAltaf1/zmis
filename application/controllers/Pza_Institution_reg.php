<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_Institution_reg extends CI_Controller 
{

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pza_Institution_reg_model');
		$this->load->model('General_model');
	}
	public function index()
	{	
		$data['get_all_districts'] = $this->db->count_all_results('district_users');
		$data['get_all_hospitals'] = $this->db->count_all_results('hospital_users');
		$data['get_all_deenimadaras'] = $this->db->count_all_results('madrassa_list');
		$data['get_all_foundations'] = $this->db->count_all_results('foundation');
		$data['get_all_districtslist'] = $this->Pza_Institution_reg_model->get_all_districtslist();
		$data['getMasterFields'] = $this->General_model->get_master_fields("AddNewField");
		$data['getAllMasterField'] = $this->General_model->getAllMasterField();
		$this->load->view('pza/institution_reg',$data);
	}
	
	
	
	
	
	
	function manage_institution_reg_district()
	{
		$formArray = array();
		$formArray['district_name'] = $this->input->post("district_name");
		$formArray['population'] = $this->input->post("population");
		$formArray['number_of_lzc'] = $this->input->post("LZC_no");
		$formArray['username'] = $this->input->post("username");
		$formArray['password'] = $this->input->post("password");
		$formArray['role'] = $this->input->post("role");
		$formArray['status'] = 1;
		$this->Pza_Institution_reg_model->manage_institution_reg_district($formArray);
		
		
		$this->session->set_flashdata('success','Record Added Successfully..!');	
		redirect(base_url('Pza_institution_reg'));
	}
	
	
	function manage_institution_reg_hospital()
	{
		$formArray = array();
		$formArray['name'] = $this->input->post("hosp_name");
		$formArray['username'] = $this->input->post("hosp_username");
		$formArray['password'] = $this->input->post("hosp_password");
		$formArray['address'] = $this->input->post("address");
		$formArray['role'] = $this->input->post("hosp_role");
		$formArray['status'] = 1;
		$this->Pza_Institution_reg_model->manage_institution_reg_hospital($formArray);	
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('Pza_institution_reg'));
	}
	
	
	
	function manage_institution_reg_foundation()
	{
		$formArray = array();
		$formArray['foundation_name'] = $this->input->post("found_name");
		$formArray['username'] = $this->input->post("found_username");
		$formArray['password'] = $this->input->post("found_password");
		$formArray['role'] = $this->input->post("foundation_role");
		$formArray['status'] = 1;
		$this->Pza_Institution_reg_model->manage_institution_reg_foundation($formArray);
		$this->session->set_flashdata('success','Record Added Successfully..!');	
		redirect(base_url('Pza_institution_reg'));
	}
	
	
	
	function manage_institution_reg_madrassa()
	{
		$formArray = array();
		$formArray['madrassa_name'] = $this->input->post("madrassa_name");
		$formArray['district_name_id'] = $this->input->post("district_idget");
		$formArray['local_zakat_comety'] = $this->input->post("madrassa_localzakat");
		$formArray['address'] = $this->input->post("mad_address");
		$formArray['username'] = $this->input->post("mad_username");
		$formArray['password'] = $this->input->post("mad_password");
		$formArray['role'] = "madrassa";
		$formArray['status'] = 1;
		$formArray['add_date'] = date("Y-m-d");
		
		$this->Pza_Institution_reg_model->manage_institution_reg_madrassa($formArray);	
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('Pza_institution_reg'));
	}
	
	function fetch_fieldTypes()
	{
		$field_typevalue = $this->input->post("field_typevalue");
		$this->db->where('field_type', $field_typevalue);
		$this->db->order_by('id','DESC');
		$query = $this->db->get('masterfields');
		//echo $this->db->last_query();
		$output = '<option value="">---View List---</option>';
		foreach($query->result() as $row)
		{
		$output .= '<option value="'.$row->field_name.'">'.$row->field_name.'</option>';
		}
		echo $output; 
	
	}

	function manageMasterField()
	{
		
		$formArray = array();
		$formArray['field_type'] = $this->input->post("newFieldType");
		$formArray['field_name'] = $this->input->post("newfFeldName");
		
		$formArray['field_type'] = $this->input->post("field_typevalue");
		//$formArray['username'] = $this->input->post("mad_username");
		//$formArray['password'] = $this->input->post("mad_password");
		$formArray['status'] = 1;
		$formArray['add_date'] = date("Y-m-d");
		
		$this->Pza_Institution_reg_model->manageMasterField($formArray);	
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('Pza_institution_reg'));
	}
	
	
	
	
	
	
}
