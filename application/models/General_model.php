<?php
class General_model extends CI_model
{

	function user_log($formArray)
	{
	$this->db->insert("userlog",$formArray);
	}
	
	function get_master_fields($get_field_type)
	{
	$this->db->select("*"); 
	$this->db->from("masterfields");
	$this->db->where("status","1");
	$this->db->where("field_type",$get_field_type);
	return $result = $this->db->get()->result_array();
	}

	function getAllMasterField()
	{
	$this->db->select("*"); 
	$this->db->from("masterfields");
	$this->db->group_by('field_type');
	$this->db->order_by('field_type',"ASC");
	$this->db->where("status","1");
	return $result = $this->db->get()->result_array();
	}
	
	
		function get_all_lzc($userid)
	{
		$this->db->select("id, lzc_name");  // Changed by Abbas (16-Oct-2020)
		$this->db->from("lzc_list");
		$this->db->where('district_id',$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	function get_districts()
	{
	$this->db->select("*");
	$this->db->where("status","1");
	$query = $this->db->get('district_users');
	return $result = $query->result();
	}
	
	
	public function insert_district_user($data) {
		return $this->db->insert('district_users', $data); // Ensure 'district_users' is the correct table name
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function get_districttehsils()
	{
	$this->db->distinct();	
	$this->db->select("concat(District_Name,'     ',District_Ur) as District_Name");
	$this->db->order_by('District_Name',"ASC");
	//$this->db->where("District_Name",$district_name);
	$query = $this->db->get('tehsil');
	
	return $result = $query->result();
	}
	
	function get_tehsils($district_name)
	{
	if(strpos($district_name,'     ')!=null){
	$district_names = substr($district_name,0,strpos($district_name,'     '));
	$district_name = $district_names;
	}
	
	$this->db->distinct();	
	$this->db->select("concat(Tehsil_Name,'     ',Tehsil_Ur) as Tehsil_Name");
	$this->db->where("District_Name",$district_name);
	$this->db->order_by('Tehsil_Name',"ASC");
	$query = $this->db->get('tehsil');
	return $result = $query->result();
	}
	
	
	function get_tehsils_edit($district_name)
	{	
	$this->db->distinct();	
	$this->db->select("*");
	$this->db->where("District_Name",$district_name);
	$this->db->order_by('Tehsil_Name',"ASC");
	$query = $this->db->get('tehsil');
	return $result = $query->result();
	}
	
	
	
	
	function get_schedule($district_name)
	{
	$this->db->distinct();	
	$this->db->select("Schedules");
	$this->db->limit(5);
	$this->db->where("District_Name",substr($district_name,0,strpos($district_name,'     ')));
	$this->db->order_by('Id',"ASC");
	
	$query = $this->db->get('Schedule');
	return $result = $query->result();	
	}
	
	function get_services_years()
	{
	$this->db->distinct();	
	$this->db->select("*");
	$this->db->group_by("year");
	$this->db->where("status","1");
	$query = $this->db->get('services');
	return $result = $query->result();
	}
	
	
	
	function get_dastakri_centers()
	{
	$this->db->select("*");
	$this->db->where("status","1");
	$query = $this->db->get('dastakari_itc_centers');
	return $result = $query->result();
	}
	
	
	
	



}


?>
