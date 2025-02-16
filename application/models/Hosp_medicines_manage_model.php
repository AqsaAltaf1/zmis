<?php
class Hosp_medicines_manage_model extends CI_model{

	function add_medicines($formArray)
	{
		$this->db->insert("treatment_types_values",$formArray);
	}
	
	
	function get_all_medicinces()
	{
	$hospital_id = $this->session->userdata('hospital_id');
	$this->db->select("*");
	$this->db->from("treatment_types_values");
	$this->db->where("hospital_id",$hospital_id);
	$this->db->order_by('id',"DESC");
	return $query = $this->db->get()->result_array();
	}
	
	
	function get_all_types()
	{
	$this->db->select("*");
	$this->db->from("treatment_types");
	$this->db->where("status",1);
	return $query = $this->db->get()->result_array();
	}
	
	
	
	function manage_medicines_print($get_type_id,$hospital_id)
	{
	$this->db->select("*");
	$this->db->from("treatment_types_values");
	$this->db->where("hospital_id",$hospital_id);
	$this->db->where("type_id",$get_type_id);
	return $query = $this->db->get()->result_array();
	}
	
	
	
	
	
	function manage_medicines_delete($get_emp_id)
	{
		$this->db->where('id',$get_emp_id);
		$this->db->delete('treatment_types_values');
			
	}
	
	function pza_add_fund_update($formArray,$getid)
	{
		$this->db->where('id',$getid);
		$this->db->update('pzf_fund',$formArray);		
	}
	

	


	
	
	
	
	


	


}


?>
