<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_new_post extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('pza_dashboard_model');
	$this->load->model('pza_new_post_model');
	
	
	}
	
	
	public function index()
	{
		
		$data['get_all_districts'] = $this->pza_dashboard_model->get_all_districts();
		$data['get_zakat_sections'] = $this->pza_new_post_model->get_zakat_sections();
		$this->load->view('pza/pza_new_post',$data);
	}
	
	
	
	function manage_add_post()
	{
		
		$formArray['post_name'] = $this->input->post("post_name");
		$formArray['no_of_posts'] = $this->input->post("number_of_posts");
		$formArray['total_posts'] = $this->input->post("number_of_posts");
		$formArray['bps'] = $this->input->post("bps_grade");
		$formArray['post_status'] = $this->input->post("post_status");
		$formArray['post_category'] = $this->input->post("post_category");
		$formArray['post_location'] = $this->input->post("post_location");
		
		if ($this->input->post("post_location")== 'Head Quarter Level')
		{
			$formArray['district_id'] = $this->input->post("section_name");
		}
		else if ($this->input->post("post_location")== 'District Level')
		{
			$formArray['district_id'] = $this->input->post("district_id");
		}
		
		
		
		
		
		$formArray['job_description'] = $this->input->post("job_description");
		
		
		
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		$formArray['filled_vacant_status'] = 'vacant';
		$this->pza_new_post_model->pza_add_post($formArray);	
		
		$this->session->set_flashdata('success','Record Added Successfully..!');
		
		redirect(base_url('Pza_new_post'));
		
		
	}
	
	
	
	
	
	
	
	
}




















