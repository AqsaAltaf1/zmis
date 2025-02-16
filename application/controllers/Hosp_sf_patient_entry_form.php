<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_sf_patient_entry_form extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('hosp_dashboard_model');
	$this->load->model('Hosp_sf_patient_entry_form_model');
	
	
	}
	
	
	public function index()
	{
		
		$data['get_all_districts'] = $this->hosp_dashboard_model->get_all_districts();
		$this->load->view('hospital/hosp_sf_patient_entry_form',$data);
	}
	
	
	
	function manage_add_post()
	{
		
		$formArray['post_name'] = $this->input->post("post_name");
		$formArray['no_of_posts'] = $this->input->post("number_of_posts");
		$formArray['bps'] = $this->input->post("bps_grade");
		$formArray['post_status'] = $this->input->post("post_status");
		$formArray['post_category'] = $this->input->post("post_category");
		$formArray['post_location'] = $this->input->post("post_location");
		$formArray['disrict_id'] = $this->input->post("disrict_id");
		$formArray['job_description'] = $this->input->post("job_description");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		
		$this->pza_new_post_model->pza_add_post($formArray);	
		
		$this->session->set_flashdata('success','Record Added Successfully..!');
		
		redirect(base_url('pza_new_post'));
		
		
	}
	
	
	
	
	
	
	
	
}




















