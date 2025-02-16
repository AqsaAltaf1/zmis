<?php
class Audit_login_model extends CI_model
{

function chk_account($username,$password)
{
$this->db->select("*");
$this->db->from("users");
$this->db->where("user_name",$username);
$this->db->where("password",$password);
$this->db->where("role",'audit');
$this->db->where("Active",1);
$query=$this->db->get();
if($query->num_rows()>0)
{
$row = $query->row_array();
$district_id = $row['district_id'];
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
$district_name = $get_dist_name->row('district_name');



$data = array('id'=>$row['district_id'],'audit_id'=>$row['user_id'],'district_name'=>$district_name,'username'=>$row['user_name'],'user_type'=>$row['role'], 'AuditOfficerName'=>$row['entity_name']);
//$data = array('id'=>$row['district_id'],'auditOfficerID'=>$row['user_id'],'entityName'=>$row['entity_name'],'username'=>$row['user_name'],'user_type'=>$row['role']);

//


//$data = array('id'=>$row['id'],'district_name'=>$row['district_name'],'username'=>$row['username'],'user_type'=>$row['role']);

$this->session->set_userdata($data);
$this->session->set_flashdata('success',"You are successfully Logged in.");
redirect(base_url('AuditDashboard'));
}
else
{
$this->session->set_flashdata('error',"Incorrect username password. OR Currently, your account is In-Active. Contact with ZMIS Administrator...");
redirect(base_url('Audit_login'));
}

}

	
	function auditLoginProfileUpdate($formArray,$getid)
		{
		$this->db->where('user_id',$getid);
		$this->db->update('users',$formArray);
		$this->db->last_query();	
		}



}


?>
