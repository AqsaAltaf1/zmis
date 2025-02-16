<?php
class Dist_login_model extends CI_model
{

	function chk_account($username,$password)
	{
		$this->db->select("*");
	    $this->db->from("district_users");
	    $this->db->where("username",$username);
	    $this->db->where("password",$password);
	    $query=$this->db->get();
	    if($query->num_rows()>0)
	    {
		$row = $query->row_array();
		$data = array('id'=>$row['id'],'district_name'=>$row['district_name'],'username'=>$row['username'],'user_type'=>$row['role']);
		$this->session->set_userdata($data);
		$this->session->set_flashdata('success',"You are successfully Logged in.");
		
		$userid = $this->session->userdata('id');
		$get_dist_qry = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
		$district_password = $get_dist_qry->row('password');
			
			if($district_password == 4321)
			{
			$this->session->set_flashdata('success','Please Update Your Password...!');
			//$this->load->view('district/user_login_profile');	
			redirect(base_url('Dist_login/user_login_profile'));
			
			}
			else
			{
			redirect(base_url('Dist_dashboard'));
			}
			
		}
		else
		{
		$this->session->set_flashdata('error',"Incorrect username password.");
		redirect(base_url('Dist_login'));
	    }

		}

	
		function user_login_profile_update($formArray,$getid)
		{
		$this->db->where('id',$getid);
		$this->db->update('district_users',$formArray);
		$this->db->last_query();	
		}


		function getDistrictName($district_id)
		{
				$this->db->select("district_name");
				$this->db->from("district_users");
				$this->db->where("id",$district_id);
				
				return $users = $this->db->get()->row('district_name'); //result_array();

		}
		
		
		
		function get_all_lzc($userid)
		{
			//$str = "lzcname."(".id.")";
			$this->db->select("id,CONCAT(lzc_name,'(',id,')') as lzc_name");
			$this->db->from("lzc_list");
			$this->db->where('gs_id',$userid);
			//$this->db->limit(5);
			$this->db->order_by('id',"ASC");
			return $users = $this->db->get()->result_array();
		}
	
		function get_gs_dashboard($username)
		{
			//$str = "lzcname."(".id.")";
			$this->db->select("lzc_name,nob as TargetNOBs,(nob2020-10) as RegNOBs ,(nob-nob2020-10) as RemNOBs ");
			$this->db->from("lzc_list");
			$this->db->where('gs_username',$username);
			//$this->db->limit(5);
			$this->db->order_by('lzc_name',"ASC");
			return $users = $this->db->get()->result_array();
		}

	function get_lzc_data($lzcname)
		{
			//$str = "lzcname."(".id.")";
			$this->db->select("mustahiq_name,father_name,mustahiq_cnic,contact_number,gender ");
			$this->db->from("guzara_allowance_mustahiqeen");
			$this->db->where('LZCActualName',$lzcname);
			$this->db->limit(50);
			$this->db->order_by('id',"ASC");
			return $users = $this->db->get()->result_array();
		}

	function get_lzc_selected_data($lzcname)
		{
			//$str = "lzcname."(".id.")";
			$this->db->select("mustahiq_name,father_name,mustahiq_cnic,contact_number,gender ");
			$this->db->from("guzara_allowance_mustahiqeen");
			$this->db->where('LZCActualName',$lzcname);
			$this->db->limit(10);
			$this->db->order_by('id',"ASC");
			return $users = $this->db->get()->result_array();
		}
		
	function get_DD_Values($category)
		{
			//$str = "lzcname."(".id.")";
			$this->db->select("field_name");
			$this->db->from("masterfields");
			$this->db->where('field_type',$category);
			//$this->db->limit(50);
			$this->db->order_by('field_name',"ASC");
			return $users = $this->db->get()->result_array();
		}	

}


?>
