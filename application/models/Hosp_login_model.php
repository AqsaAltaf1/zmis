<?php
class Hosp_login_model extends CI_model
{

	/*function chk_account($username,$password)
	{
		$this->db->select("*");
	    $this->db->from("hospital_users");
	    $this->db->where("username",$username);
	    $this->db->where("password",$password);
	    $query=$this->db->get();
	    if($query->num_rows()>0)
	    {
		$row = $query->row_array();
		$data = array('hospital_id'=>$row['id'],'hospital_name'=>$row['name'],'user_type'=>$row['role'] );
		$this->session->set_userdata($data);
		$this->session->set_flashdata('success',"You are successfully Logged in.");
		redirect(base_url('Hosp_dashboard'));
		}
		else
		{
		$this->session->set_flashdata('error',"Incorrect username password.");
		redirect(base_url('Hosp_login'));
	    }

	}*/

function chk_account($username,$password)
	{
		$this->db->select("*");
	    $this->db->from("hospital_users");
	    $this->db->where("username",$username);
	    $this->db->where("password",$password);
	    $query=$this->db->get();
	    if($query->num_rows()>0)
	    {
		$row = $query->row_array();
		$data = array('hospital_id'=>$row['id'],'hospital_name'=>$row['name'],'username'=>$row['username'],'user_type'=>$row['role']);
		$this->session->set_userdata($data);
		$this->session->set_flashdata('success',"You are successfully Logged in.");
		
		$userid = $this->session->userdata('hospital_id');
		$get_dist_qry = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
		$hospital_password = $get_dist_qry->row('password');
			
			if($hospital_password == 1234)
			{
			$this->session->set_flashdata('success','Please Update Your Password...!');
			//$this->load->view('district/user_login_profile');	
			redirect(base_url('Hosp_login/user_login_profile'));
			
			}
			else
			{
			redirect(base_url('hosp_dashboard'));
			}
			
		}
		else
		{
		$this->session->set_flashdata('error',"Incorrect username password.");
		redirect(base_url('Hosp_login'));
	    }

		}





	
	function user_login_profile_update($formArray,$userid)
		{
		$this->db->where('id',$userid);
		$this->db->update('hospital_users',$formArray);
		$this->db->last_query();	
		}

	


}


?>
