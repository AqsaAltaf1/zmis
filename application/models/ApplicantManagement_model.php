<?php
class ApplicantManagement_model extends CI_model
{



	function add_institutes_users($formArray)
	{
		$this->db->insert("users",$formArray);
		return $this->db->affected_rows();
	}


	function manage_users_passwords($formArray,$user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->update('users',$formArray);	
		return $this->db->affected_rows();
	}

	function getAllDistrict()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	function mustahiqUpdateManage($formArray,$getid)
	{
	
	$this->db->where('id',$getid);
	$this->db->update('mustahiqeen',$formArray);		
	}
	
	function auditReconsideration($formArray,$getmustahiq_id)
	{
	
	$this->db->where('id',$getmustahiq_id);
	$this->db->update('mustahiqeen',$formArray);
	
		
	}

	
/*
function fetch_institutes($dist_value,$inst_type)
{
$this->db->where('selected_district_id', $dist_value);
$this->db->where('institutes_type', $inst_type);
$this->db->order_by('id','DESC');
$query = $this->db->get('sw_centers');
$output = '<option value="">---Select---</option>';
foreach($query->result() as $row)
{
$output .= '<option value="'.$row->id.'">'.$row->center_name.'</option>';
}
return $output;	
}



function fetch_institutes_customize($dist_value)
{
$this->db->where('district_id', $dist_value);
$this->db->order_by('id','DESC');
$query = $this->db->get('dastakari_itc_centers');
//echo $this->db->last_query();
$output = '<option value="">---All---</option>';
foreach($query->result() as $row)
{
$output .= '<option value="'.$row->id.'">'.$row->center_name.'</option>';
}
return $output;	
}

*/



	


}


?>
