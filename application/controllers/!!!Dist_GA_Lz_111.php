<?php

ini_set('memory_limit', '2000M');

defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_GA_Lz_111 extends CI_Controller 
{
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_GA_Lz_11_model1');
	}
	
	public function index()
	{
	
	$userid  = $this->session->userdata('id');
	//$data['get_all_lzclist'] = $this->Dist_GA_Lz_11_model1->get_all_lzclist($userid);
	//$this->load->view('district/dist_ga_lz_111',$data);
	
	
	$this->load->library("pagination");
	
	$config["base_url"] = base_url() . "Dist_GA_lz_111/index/";
	$config["total_rows"] = $this->Dist_GA_Lz_11_model1->record_count($userid);
	
	//echo $this->Dist_GA_Lz_11_model1->record_count($userid);
	//exit;
	
	$config["per_page"] = 20;
	$config["uri_segment"] = 3;
	
	/*$config['full_tag_open'] = '<ul class="pagination">';
	$config['full_tag_close'] = '</ul>';
	$config['first_link'] = false;
	$config['last_link'] = false;
	$config['first_tag_open'] = '<li>';
	$config['first_tag_close'] = '</li>';
	$config['prev_link'] = '&laquo';
	$config['prev_tag_open'] = '<li class="prev">';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = '&raquo';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	$config['last_tag_open'] = '<li>';
	$config['last_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';*/
	
	
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
	$data["links"] = $this->pagination->create_links();
	
	$data["totalcount"] = $this->Dist_GA_Lz_11_model1->record_count($userid);
			
	$data['get_all_lzclist'] = $this->Dist_GA_Lz_11_model1->get_all_lzclist($config["per_page"], $page,$userid);
	$this->load->view('district/dist_ga_lz_111',$data);		
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	function dist_lzcwise_print()
	{
	$userid  = $this->session->userdata('id');
	$formArray = array();
	$data['get_all_lzclist'] = $this->Dist_GA_Lz_11_model->get_all_lzclist($userid);
	
	$data['get_lzcwise_mustahiq_record'] = $this->Dist_GA_Lz_11_model->get_lzcwise_mustahiq_record($formArray);
	$this->load->view('district/dist_print_lzcwise_mustahiq',$data);
}




}
