<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dist_Institution_reg extends CI_Controller
{



	function __construct()
	{
		parent::__construct();

		$this->load->model('Dist_Institution_reg_model');
	}



	public function index()
	{

		$userid = $this->session->userdata('id');




		$this->db->select('*');
		$this->db->from('tehsil_list');
		$this->db->where('district_id', $userid);
		$data['get_all_tehsils'] = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from('lzc_list');
		$this->db->where('district_id', $userid);
		$data['get_all_lzcs'] = $this->db->count_all_results();


		$this->db->select('*');
		$this->db->from('institution_list');
		$this->db->where('district_id', $userid);
		$data['get_all_edu'] = $this->db->count_all_results();



		$this->db->select('*');
		$this->db->from('madrassa_list');
		$this->db->where('district_id', $userid);
		$data['get_all_madrassas'] = $this->db->count_all_results();






		$data['get_all_lzcsnames'] = $this->Dist_Institution_reg_model->get_all_lzcsnames($userid);
		$data['getTehsilList'] = $this->Dist_Institution_reg_model->getTehsilList($userid);
		$data['get_all_districtslist'] = $this->Dist_Institution_reg_model->get_all_districtslist();

		$this->load->view('district/dist_institution_reg', $data);
	}




	function manage_institution_reg_tehsil()
	{
		$formArray = array();
		$formArray['district_id'] = $this->input->post("district_id");
		$formArray['districtName'] = $this->input->post("districtName");
		$formArray['tehsil_name'] = $this->input->post("tehsil");
		$formArray['no_lzc_value'] = $this->input->post("LZC_no");
		$formArray['status'] = 1;
		$this->Dist_Institution_reg_model->manage_institution_reg_tehsil($formArray);
		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(base_url('dist_institution_reg'));
	}


	function manage_institution_reg_lzc()
	{
		$formArray = array();
		$formArray['district_id'] = $this->input->post("district_id");
		$formArray['districtName'] = $this->input->post("districtName");
		$formArray['tehsil_id'] = $this->input->post("tehsil_id");
		$formArray['lzc_name'] = $this->input->post("lzc_name");
		$formArray['lzc_code'] = $this->input->post("lzc_code");
		$formArray['lzc_population'] = $this->input->post("lzc_population");
		$formArray['status'] = 1;
		$this->Dist_Institution_reg_model->manage_institution_reg_lzc($formArray);
		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(base_url('dist_institution_reg'));
	}



	function manage_dist_institution_reg()
	{
		$formArray = array();
		$formArray['district_id'] = $this->input->post("district_id");
		$formArray['districtName'] = $this->input->post("districtName");
		$formArray['institution_name'] = $this->input->post("inst_name");
		$formArray['address'] = $this->input->post("inst_address");
		$formArray['status'] = 1;
		$this->Dist_Institution_reg_model->manage_dist_institution_reg($formArray);
		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(base_url('dist_institution_reg'));
	}



	function manage_institution_reg_madrassa()
	{



		$formArray = array();
		$formArray['madrassa_name'] = $this->input->post("madrassa_name");
		$formArray['district_id'] = $this->input->post("district_id");
		$formArray['districtName'] = $this->input->post("districtName");
		$formArray['lzc_id'] = $this->input->post("lzcget_id");
		$formArray['lzcName'] = $this->input->post("lzcName");
		$formArray['address'] = $this->input->post("mad_address");
		$formArray['status'] = 1;
		$formArray['add_date'] = date("Y-m-d");

		$this->Dist_Institution_reg_model->manage_institution_reg_madrassa($formArray);
		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(base_url('dist_institution_reg'));
	}
}
