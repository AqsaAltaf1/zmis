<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_list extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	//$this->load->model('pza_dashboard_model');
	$this->load->model('Posts_list_model');
	
	
	}
	
	
	public function index()
	{
		
		$data['get_posts_list'] = $this->Posts_list_model->get_posts_list();
		$data['get_postsHq_list'] = $this->Posts_list_model->hq_posts_list();
		
		$this->load->view('pza/posts_list',$data);
	}
	
	
	

	
	
	
	
	
	
	
	
}




















