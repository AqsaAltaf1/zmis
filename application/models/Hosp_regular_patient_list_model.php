<?php
class Hosp_regular_patient_list_model extends CI_model{

	function pza_add_fund($formArray)
	{
		$this->db->insert("pzf_fund",$formArray);
	}
	
	
	
	function get_all_districts()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	

	function get_all_regular_patients($getfinancial_year,$getfinancial_installment)
	{
		$userid = $this->session->userdata('hospital_id');
		$this->db->select("*");
		$this->db->from("patients");
		$this->db->where('hospital_id',$userid);
		$this->db->where('patient_type','Regular Fund Patient');
		$this->db->where('financial_year',$getfinancial_year);
		$this->db->where('installment',$getfinancial_installment);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
		//echo $this->db->last_query();
		//exit;
	}


	function get_patient_profile()
	{
		$this->db->select("*");
		$this->db->from("patients");
		$this->db->where('patient_type','Regular Fund Patient');
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}



	function get_all_hospitals()
	{
		$this->db->select("*");
		$this->db->from("hospital_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}


	

}


?>
