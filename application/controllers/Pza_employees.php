<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_employees extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Pza_employee_model');
	$this->load->model('pza_dashboard_model');
	$this->load->model('pza_new_post_model');
	}
	
	
	
	public function index()
	{
		
		
		$data['get_all_districts'] = $this->pza_dashboard_model->get_all_districts();
		$data['get_designation_list'] = $this->Pza_employee_model->get_designation_list();
		$data['get_pzaDesignation_list'] = $this->Pza_employee_model->get_pzaDesignation_list();
		$data['get_pza_employee_list'] = $this->Pza_employee_model->get_pza_employee_list();
		$data['get_zakat_sections'] = $this->pza_new_post_model->get_zakat_sections();
		$this->load->view('pza/pza_employees',$data);
	}
	
	
	
	function manage_pza_employees()
	{
		
	$formArray = array();
	$formArray['personal_no'] = $this->input->post("personal_no");	
	$formArray['emp_name']  = $this->input->post("name");
	$formArray['f_name']  = $this->input->post("f_name");

	$formArray['cnic']  = $this->input->post("cnic");
	$formArray['dob']  = $this->input->post("dob");
	$formArray['domicile']  = $this->input->post("domiciles");
	$formArray['marital_status']  = $this->input->post("marital_status");
	$formArray['contact']  = $this->input->post("contact");
	$formArray['email']  = $this->input->post("email");
	$formArray['qualification']  = $this->input->post("qualification");
	$formArray['skills']  = $this->input->post("skills");
	$formArray['address']  = $this->input->post("address");
	$formArray['appointment_date']  = $this->input->post("doa");
	$formArray['post_location']  = $this->input->post("post_location");
	
	if ($this->input->post("post_location") == 'Head Quarter Level')
	{
	$formArray['posting_stat']  = $this->input->post("section_name");
	$formArray['designation']  = $this->input->post("hqDesig");
	}
	else if ($this->input->post("post_location") == 'District Level')
	{
	$formArray['posting_stat']  = $this->input->post("district_id");
	$formArray['designation']  = $this->input->post("desig");
	}
	

	$formArray['experience']  = $this->input->post("experience");
	$formArray['acr']  = $this->input->post("acr");
	$formArray['job_description']  = $this->input->post("des_remarks");
	
	$formArray['picture']  = $this->input->post("pza_employee_picture");
	
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;

	 $config['upload_path'] = 'assets/uploads/'; 
	 $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
	 $config['file_name'] = date('ymdghsi').'-'.$_FILES["pza_employee_picture"]['name'];
	 
	 $get_albumimg = date('ymdghsi').'-'.$_FILES["pza_employee_picture"]['name'];
	
	
	 $this->load->library('upload', $config); 
	
	 $formArray['add_date'] = date("Y-m-d");
	 $formArray['status'] = 1;
	 $formArray['picture']  = $get_albumimg;
	
	
	/*Update AddPost Table*/
	$formArrayupdate = array();
	$distPosting = $this->input->post("district_id");
	$post_name = $this->input->post("desig");
	
	$formArrayupdate['filled_vacant_status'] = 'filled';
	$this->Pza_employee_model->updateAddPost($distPosting,$formArrayupdate,$post_name);
	
	$hqDesignation = $this->input->post("hqDesig");
	$hqPosting = $this->input->post("section_name");
	$this->Pza_employee_model->updateHqDesig($hqPosting,$formArrayupdate,$hqDesignation);
	
	
	 if($this->upload->do_upload('pza_employee_picture'))
	 {
		$this->Pza_employee_model->manage_pza_employees($formArray);
		$this->session->set_flashdata('success','Record Added Successfully..!');
		
		redirect(base_url('Pza_employees'));
	
	}
	
	redirect(base_url('Pza_employees'));

	}
	
	
	
	
	
	
	
	
	
	function employees_details()
	{
		
		$get_employee_id  = $this->uri->segment(3);

		//$data['get_all_mustahiqeen'] = $this->Dist_GA_Lz_19_model->get_all_mustahiqeen($userid);
		$this->load->view('pza/pza_user_profile',$get_employee_id);
	}
	
	
	
	
	
	
	
	
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	

