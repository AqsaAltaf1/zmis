<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_employees extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_employee_model');
	//$this->load->model('Dist_admin_expense_model');
	}
	
	
	
	public function index()
	{
		
		$userid = $this->session->userdata('id');
		
		$data['get_all_districts'] = $this->Dist_employee_model->get_all_districts();
		
		$data['get_all_lzcs'] = $this->Dist_employee_model->get_all_lzcs($userid);
		
		$data['get_zakat_staff'] = $this->Dist_employee_model->get_zakat_staff();
		
		
		$data['get_zakat_staff_listing'] = $this->Dist_employee_model->get_zakat_staff_listing($userid);
		
		$this->load->view('district/dist_employees',$data);
	}
	
	
	
	function manage_dist_employees()
	{
		
	$formArray = array();
	$formArrays = array();
	
	$getlzc_list  = $this->input->post("getlzc_list");	
		
	foreach($getlzc_list as $getlzc_listvalue)
	{
	echo $getlzc_listvalue;
	}
	
	
	
	
	
	
	echo "sss";
	exit;
	$this->Dist_employee_model->manage_gs_lzcs($formArrays);	
		
		
	$formArray = array();
	$formArray['district_id'] = $this->session->userdata('id');	
	$formArray['name']  = $this->input->post("name");
	$formArray['f_name']  = $this->input->post("f_name");
	$formArray['designation_id']  = $this->input->post("designation");
	$formArray['cnic']  = $this->input->post("cnic");
	$formArray['dob']  = $this->input->post("dob");
	$formArray['domicile']  = $this->input->post("domiciles");
	$formArray['marital_status']  = $this->input->post("marital_status");
	$formArray['contact_no']  = $this->input->post("contact_no");
	$formArray['qualification']  = $this->input->post("qualification");
	$formArray['address']  = $this->input->post("address");
	$formArray['appointment_date']  = $this->input->post("appointment_date");
	$formArray['job_description']  = $this->input->post("job_description");
	
	
	
	
	
	
	
	
	
	/*$formArray['email']  = $this->input->post("email");
	$formArray['skills']  = $this->input->post("skills");
	$formArray['posting_stat']  = $this->input->post("posting_stat");
	$formArray['experience']  = $this->input->post("experience");
	$formArray['acr']  = $this->input->post("acr");*/
	
	$config['upload_path'] = 'assets/uploads/'; 
	$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
	$config['file_name'] = date('ymdghsi').'-'.$_FILES["emp_img"]['name'];
	$get_albumimg = date('ymdghsi').'-'.$_FILES["emp_img"]['name'];
	
	
	$this->load->library('upload', $config); 
	
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	$formArray['picture']  = $get_albumimg;
	
	
	if($this->upload->do_upload('emp_img'))
	{
	$this->Dist_employee_model->manage_dist_employees($formArray);	
	$this->session->set_flashdata('success','Record Added Successfully..!');
	}
	redirect(base_url('Dist_employees'));	
	}
	
	
	
	
	function manage_dist_editemployees()
	{
	
	$formArray = array();
	$formArray['district_id'] = $this->session->userdata('id');	
	$formArray['name']  = $this->input->post("name");
	$formArray['f_name']  = $this->input->post("f_name");
	$formArray['designation_id']  = $this->input->post("designation");
	$formArray['cnic']  = $this->input->post("cnic");
	$formArray['dob']  = $this->input->post("dob");
	$formArray['domicile']  = $this->input->post("domiciles");
	$formArray['marital_status']  = $this->input->post("marital_status");
	$formArray['contact_no']  = $this->input->post("contact_no");
	$formArray['qualification']  = $this->input->post("qualification");
	$formArray['address']  = $this->input->post("address");
	$formArray['appointment_date']  = $this->input->post("appointment_date");
	$formArray['job_description']  = $this->input->post("job_description");
	
	$get_emp_id  = $this->input->post("get_emp_id");
	
	$this->Dist_employee_model->updateuser_emp($get_emp_id,$formArray);	
	
	$getimage = $_FILES['emp_img']['tmp_name'];
	
	if(!empty($getimage))
	{
	
	$config['upload_path'] = 'assets/uploads/'; 
	$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
	$config['file_name'] = date('ymdghsi').'-'.$_FILES["emp_img"]['name'];
	$get_albumimg = date('ymdghsi').'-'.$_FILES["emp_img"]['name'];
	$this->load->library('upload', $config); 
	$formArrayimg['picture']  = $get_albumimg;
	
	if($this->upload->do_upload('emp_img'))
	{
	$this->Dist_employee_model->updateuser_emp_img($get_emp_id,$formArrayimg);
	}
	}
	
	$this->session->set_flashdata('success','Record Updated Successfully..!');
	redirect(base_url('Dist_employees'));	
	
	}
	
	
	function manage_delete_dist_employees()
	{
		$get_emp_id = $this->uri->segment(3); // 1stsegment
		$this->Dist_employee_model->delete_dist_employees($get_emp_id);
		$this->session->set_flashdata('success','Record Deleted Successfully..!');
		redirect(base_url('Dist_employees'));
		
	}
	
	
	function dist_zakatpaid_user()
	{
		$get_emp_id = $this->uri->segment(3); // 1stsegment
		$this->load->view('district/dist_zakatpaid_user_profile',$get_emp_id);
	
	}
	
	
	
	
	
	
	
	
	
	
}
