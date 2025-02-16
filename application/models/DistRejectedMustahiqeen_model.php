<?php
class DistRejectedMustahiqeen_model extends CI_model{

	
	function manage_district_payment($formArray)
	{
		$this->db->insert("district_payment",$formArray);
	}
	
	
	function get_all_districts()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('district_name',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	function getRejectedList($userid)
	{
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where("district_id",$userid);
		$this->db->where('Remarks','Reject');
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
		
		//echo $this->db->last_query();
		
		
	}
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	



}


?>
