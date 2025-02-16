<?php
class Hosp_patient_entry_form_model extends CI_model{

	function pza_add_post($formArray)
	{
		$this->db->insert("add_post",$formArray);
	}
	
	
	function patient_hosp_register($formArray)
	{
		$this->db->insert("patients",$formArray);
		return $getpt_id = $this->db->insert_id();
	}
	
	function patient_hosp_register_details($formArray)
	{
		$this->db->insert("pt_treatment",$formArray);
	}
	
	
	
	function pza_add_fund_update($formArray,$getid)
	{
		$this->db->where('id',$getid);
		$this->db->update('pzf_fund',$formArray);		
	}
	
	
	
	function get_medicines($category_id)
	{
		$this->db->select("*");
		$query = $this->db->get('medicine_list');
		return $query = $query->result();
	}
	
	
	
	function update_patient_status($formArray_update,$record_id)
	{
		$this->db->where('id',$record_id);
		$this->db->update('hc_mustahiqeen',$formArray_update);	
	}
	
	
	
	
	
	function get_all_districts()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	function get_all_zakatheads()
	{
		$this->db->select("*");
		$this->db->from("hoa_list");
		//$this->db->limit(5);
		$this->db->order_by('zakat_head',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	function dashboardsearch($dist_hosp,$acount_head)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where("district_hospital_id",$dist_hosp);
	$this->db->where("account_head",$acount_head);
	return $query = $this->db->get()->result_array();
	}
	
	
	function dashboardsearchdate($dist_hosp,$acount_head,$start_date,$end_date)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where("district_hospital_id",$dist_hosp);
	$this->db->where("account_head",$acount_head);
	$this->db->where('add_date >=', $start_date);
	$this->db->where('add_date <=', $end_date);
	return $query = $this->db->get()->result_array();
	}
	
	
	
	
	

	function get_all_headofaccounts()
	{
		$this->db->select("*");
		$this->db->from("hoa_list");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
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


	function get_pza_fundrecords()
	{
		$this->db->select("*");
		$this->db->from("pzf_fund");
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}


	function manage_year_inst($formArray)
	{
	$this->db->insert("year_installment",$formArray);
	$getlastid = $this->db->insert_id();
	$queryupdate = $this->db->query("UPDATE year_installment SET status = '0' WHERE id != '".$getlastid."'");
	}
	
	
	
	
	


	


}


?>
