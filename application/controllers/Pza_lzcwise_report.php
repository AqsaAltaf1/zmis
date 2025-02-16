<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_lzcwise_report extends CI_Controller 
{

	public function index()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		$data['get_all_districts'] = $this->db->get()->result_array();
		
		$this->load->view('pza/pza_lzcwise_report',$data);
	}
	
	
function getlzc_mustahiqeens()
{
// echo $test = $this->input->post("year");	
// exit;
$district_id = $this->input->post("district_idget");
$lzc_counts = $this->input->post("lzc_counts");

$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
$district_name = $get_dist_name->row('district_name');

$lzc_name  = $this->input->post("lzc_name");
foreach($lzc_name as $lzc_namevalues)
{
$output .= $lzc_namevalues.","; 
}

$outputfinal = substr($output,0,-1);


//$data['getlzc_list'] = $this->db->select('*')->from('lzc_list')->where('district_id', $district_id)->order_by('lzc_name',"ASC")->get()->result();
/*$data['getlzc_list'] = 
$this->db->select('*')->from('lzc_list')
->where('district_id', $district_id)
->order_by('id',"DESC")->limit(3)
->get()->result();*/

if(!empty($this->input->post("lzc_name")))
{
$getlzcs_query = "SELECT * FROM lzc_list WHERE district_id = '".$district_id."' AND id in($outputfinal) ORDER BY id ASC LIMIT 0,$lzc_counts";
$data['getlzc_list'] = $this->db->query($getlzcs_query)->result();	
}
else
{
$getlzcs_query = "SELECT * FROM lzc_list WHERE district_id = '".$district_id."' ORDER BY id ASC LIMIT 0,$lzc_counts";
$data['getlzc_list'] = $this->db->query($getlzcs_query)->result();	
}

$data['year'] = $this->input->post("year");
$data['district_name']=$district_name;
$this->load->view('pza/pza_lzcwise_report_print',$data);
}


function fetch_lzcsvalues()
{
	
	$dist_value = $this->input->post("dist_value");
	
	$this->db->where('district_id', $dist_value);
	$this->db->order_by('id','ASC');
	$query = $this->db->get('lzc_list');
	$output = '<option value="">---Select---</option>';
	foreach($query->result() as $row)
	{
	$output .= '<option value="'.$row->id.'">'.$row->lzc_name.'</option>';
	}
	echo $output;	
	
}
	

}
	
	
	
	
