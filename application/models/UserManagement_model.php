<?php
class UserManagement_model extends CI_model
{

/*
function add_direct_institute_reg($formArray)
{
$this->db->insert("sw_centers",$formArray);
return $this->db->affected_rows();
}
 


function update_center_data($record_id,$formArray)
{
$this->db->where('id',$record_id);
$this->db->update('sw_centers',$formArray);
return $this->db->affected_rows();
}







function add_ngo($formArray)
{
$this->db->insert("ngo_list",$formArray);
return $this->db->affected_rows();
}
*/




function districtUserPassword($formArray,$user_id)
{
$this->db->where('id',$user_id);
$this->db->update('district_users',$formArray);	
return $this->db->affected_rows();
}

function zakatPaidStaffUserPassword($formArray,$user_id)
{
$this->db->where('user_id',$user_id);
$this->db->update('users',$formArray);	
return $this->db->affected_rows();
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
