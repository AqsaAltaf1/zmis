<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_MA_lz_19 extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_MA_lz_19_model');
	}
	
	
	
	public function index()
	{
		$data['get_ma_mustahiqeen'] = $this->Dist_MA_lz_19_model->get_ma_mustahiqeen();
		$this->load->view('district/dist_ma_lz_19',$data);
	}
	
	
	function dist_approve_mausers()
	{
		
	$getid =  $this->uri->segment(3);
	$formArray['approved_status']  = 1;
	if(!empty($getid))
	{
	$this->Dist_MA_lz_19_model->dist_approve_mausers($getid,$formArray);
	$this->session->set_flashdata('success','User Approved Successfully..!');
	redirect(base_url('Dist_MA_lz_11'));
	}
	else
	{
	$this->session->set_flashdata('error','No User Selected...?');
	redirect(base_url('Dist_MA_lz_11'));	
	}
	
	redirect(base_url('Dist_MA_lz_11'));	
		
	}
	
	
	
	
	
	
	
	
}
