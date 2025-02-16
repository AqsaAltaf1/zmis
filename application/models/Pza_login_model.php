<?php
class Pza_login_model extends CI_model
{

	function chk_account($username,$password)
	{
	$this->db->select("*");
	$this->db->from("pza_admin");
	$this->db->where("username",$username);
	$this->db->where("password",$password);
	$query=$this->db->get();
	if($query->num_rows()>0)
	{
	$row = $query->row_array();
	$data = array('id'=>$row['id'],'name'=>$row['name'],'user_type'=>$row['role'],'username'=>$row['username'] );
	$this->session->set_userdata($data);
	$this->session->set_flashdata('success',"You are successfully Logged in.");
	redirect(base_url('Pza_dashboard'));
	}
	else
	{
	$this->session->set_flashdata('error',"Incorrect username password.");
	redirect(base_url('Pza_login'));
	}
	
	}

	
	



}


?>
