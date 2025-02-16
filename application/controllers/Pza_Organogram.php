<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_Organogram extends CI_Controller {



function __construct()
	{
	parent::__construct();
	$this->load->model('Pza_Organogram_model');
	//$this->load->model('Dist_admin_expense_model');
	}

	public function index()
	{


		
		$data['get_all_posts'] = $this->Pza_Organogram_model->get_all_posts();



		$this->load->view('pza/organogram',$data);
	}




}
