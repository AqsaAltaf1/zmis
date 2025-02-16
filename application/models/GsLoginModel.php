<?php
class GsLoginModel extends CI_model
{

function chk_account_gs($username,$password)
{
$this->db->select("*");
$this->db->from("users");
$this->db->where("user_name",$username);
$this->db->where("password",$password);
$this->db->where("role",'gs');
$this->db->where("Active",1);
$query=$this->db->get();
if($query->num_rows()>0)
{
$row = $query->row_array();

$data = array('id'=>$row['district_id'],'groupSecretaryID'=>$row['user_id'],'entityName'=>$row['entity_name'],'username'=>$row['user_name'],'user_type'=>$row['role']);

//$data = array('id'=>$row['id'],'district_name'=>$row['district_name'],'username'=>$row['username'],'user_type'=>$row['role']);

$this->session->set_userdata($data);
$this->session->set_flashdata('success',"You are successfully Logged in.");
redirect(base_url('Gs_dashboard'));
}
else
{
$this->session->set_flashdata('error',"Incorrect username password.");
redirect(base_url('GsLogin'));
}

}

	
	



}


?>
