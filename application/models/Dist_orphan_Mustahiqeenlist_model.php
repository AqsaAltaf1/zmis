<?php
class Dist_orphan_Mustahiqeenlist_model extends CI_model{

	
	
	function get_lzc_mustahiqeen($userid)
	{
		$this->db->select("*");
		$this->db->from("lzc_list");
		$this->db->where('district_id',$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_lzc_mustahiqeen_limitwise($getnob,$getlzc_id,$userid)
	{
		$this->db->select("*");
		$this->db->from("guzara_allowance_mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('LZC_name',$getlzc_id);
		$this->db->limit($getnob);
		$this->db->order_by('total_marks',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	function get_alllzc_mustahiqeen($getlzc_id,$userid)
	{
		$this->db->select("*");
		$this->db->from("guzara_allowance_mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('LZC_name',$getlzc_id);
		//$this->db->limit($getnob);
		$this->db->order_by('total_marks',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	
	function manage_mustahiqeen_payment($formArray)
	{
		$this->db->insert("guzara_allowance_mustahiqeen_payments",$formArray);		
		
	}
	
	
	
	function updateuser($userid,$formarray)
	{
		$this->db->where('id',$userid);
		$this->db->update('guzara_allowance_mustahiqeen',$formarray);
			
	}
	
	
	
	
	
	
	
	
	
	////////////////////////////////////////////////////////
	
	
	
	
	function manage_institution_reg_district($formArray)
	{
		$this->db->insert("district_users",$formArray);
	}
	
	
	
	
	
	
	
	
	
	function get_all_districts()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
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






	
	

	
	
	
	
	
	
	
	



}


?>
