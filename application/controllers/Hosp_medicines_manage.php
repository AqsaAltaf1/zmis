<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_medicines_manage extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Hosp_medicines_manage_model');
	}
	
	
	public function index()
	{
		
		$data['get_all_types'] = $this->Hosp_medicines_manage_model->get_all_types();
		$data['get_all_medicinces'] = $this->Hosp_medicines_manage_model->get_all_medicinces();
		$this->load->view('hospital/hosp_medicines_manage',$data);
	}
	
	
	function add_medicines()
	{
		
		$formArray = array();
		
		$formArray['hospital_id'] = $this->session->userdata('hospital_id');	
		
		$formArray['name']  = $this->input->post("medicine_name");
		
		$formArray['type_id']  = $this->input->post("get_types");
		
		$formArray['add_date'] = date("Y-m-d");
		
		$formArray['date_and_time'] = date('Y-m-d H:i:s');
		
		$formArray['status'] = 1;
		
		
		$this->db->select("*");
		$this->db->from("treatment_types_values");
		$this->db->where("name",$this->input->post("medicine_name"));
		$this->db->where("type_id",$this->input->post("get_types"));
		$this->db->where("hospital_id",$this->session->userdata('hospital_id'));
		$getpayment_status = $this->db->get()->num_rows();
		
		if($getpayment_status > 0)
		{
		$this->session->set_flashdata('error','Record Already Exists.!');	
		redirect(base_url('Hosp_medicines_manage'));		
		}
		else
		{
		$this->Hosp_medicines_manage_model->add_medicines($formArray);
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('Hosp_medicines_manage'));
		}
		
	}
	
	
	function manage_medicines_delete()
	{
		
		$get_emp_id = $this->uri->segment(3); // 1stsegment
		$this->Hosp_medicines_manage_model->manage_medicines_delete($get_emp_id);
		$this->session->set_flashdata('success','Record Deleted Successfully..!');
		redirect(base_url('Hosp_medicines_manage'));
		
	}
	
	
	function manage_medicines_print()
	{
		$get_type_id = $this->uri->segment(3);
		$hospital_id = $this->session->userdata('hospital_id');		
		$data['get_hospitals_medicinces'] = $this->Hosp_medicines_manage_model->manage_medicines_print($get_type_id,$hospital_id);
		$this->load->view('hospital/hosp_medicines_manage_print',$data);
	}
	
	
	
	
	
}




















