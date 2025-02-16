<?php
class Dist_employee_model extends CI_model{

	
	function manage_dist_employees($formArray)
	{
		$this->db->insert("zakat_paid_staff_list",$formArray);
		return $this->db->insert_id();
		
	}
	
	
	
	function manage_users_info($formArray)
	{
		$this->db->insert("users",$formArray);
		
	}
	
	function update_lzcs_audit($usersArray)
	{
		$this->db->insert("users",$usersArray);
		
	}
	
	function update_lzcs_gs($formArray,$getlzc_listvalue)
	{
	$this->db->where('lzc_name',$getlzc_listvalue);
	$this->db->where('district_id',$this->session->userdata('id'));
	$this->db->update('lzc_list',$formArray);		
	}
	
	
	
	
	function get_all_districtslist()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	function gs_selected_lzcs($get_emp_id)
	{
		$userid = $this->session->userdata('id');
		$this->db->select("*");
		$this->db->from(" lzc_list");
		$this->db->where("gs_id",$get_emp_id);
		$this->db->where("district_id",$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
		
	}
	
	
	
	function get_all_lzcs($userid)
	{
		$this->db->select("*");
		$this->db->from("lzc_list");
		$this->db->where("gs_id",$get_emp_id);
		$this->db->where("district_id",$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	function manage_gs_lzcs($formArrays)
	{
		$this->db->insert("zakat_paid_staff_list",$formArrays);		
	}
	
	
	
	// Get Zakat Paid Staff type

		function get_zakat_staff()
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_type");
	
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	// Get Zakat Paid Staff List
	function get_zakat_paid_staff_list()
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_list");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	// Get Zakat Paid Staff List for Table
	function get_zakat_staff_listing($userid)
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_list");
		$this->db->where("district_id",$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	function updateuser_emp($get_emp_id,$formArray)
	{
		$this->db->where('id',$get_emp_id);
		$this->db->update('zakat_paid_staff_list',$formArray);
	}
	
	
	function updateuser_emp_img($get_emp_id,$formArrayimg)
	{
		$this->db->where('id',$get_emp_id);
		$this->db->update('zakat_paid_staff_list',$formArrayimg);
	}
	
	
	
	function delete_dist_employees($get_emp_id)
	{
		$this->db->where('id',$get_emp_id);
		$this->db->delete('zakat_paid_staff_list');
			
	}
	
	
	
	
	
	function updateuser_emp_userstable($get_emp_id,$formArray_users)
	{
		$this->db->where('zakat_paid_staff_id',$get_emp_id);
		$this->db->update('users',$formArray_users);
	}
	
	
	function updateuser_emp_lzctable($get_emp_id,$formArray_users)
	{
		$this->db->where('gs_id',$get_emp_id);
		$this->db->update('lzc_list',$formArray_users);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	////////////////////////////////////////////////////////
	
	
	
	
	
		
	

	
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






	
	function create($formArray)
	{
		$this->db->insert("adddata",$formArray);
	}


	function allrecords()
	{
		
		$this->db->select("*");
		$this->db->from("adddata");
		$this->db->limit(15);
		$this->db->order_by('sn',"DESC");
		return $users = $this->db->get()->result_array();
	}


	
	function lastuser()
	{

	$this->db->select("*");
	$this->db->from("adddata");
	$this->db->limit(1);
	$this->db->order_by('sn',"DESC");
	$query = $this->db->get();
	return $result = $query->result();

	}



	function get_single_user($id)
	{
	return $this->db
	->where( 'sn', $id )
	->get('adddata')
	->result();
	}
	
	
	
	
	
	

	function delete_user_data($getuserid)
	{
		$this->db->where('sn',$getuserid);
		$this->db->delete('adddata');	
	}


	function get_single_user_array($id)
	{
	return $this->db
	->where( 'sn', $id )
	->get('adddata')
	->row_array();
	}
	
	
	function record_count() {
       return $this->db->count_all("adddata");
   }
	
	public function fetch_subscribers($limit, $start) {
       $this->db->limit($limit, $start);
       $query = $this->db->get("adddata");
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data[] = $row;
           }
           return $data;
       }
       return false;
   }
	
	

	function confirm_users($formArray,$getuserid)
	{
		$this->db->insert("confirmdata",$formArray);
		$this->db->where('sn',$getuserid);
		$this->db->delete('adddata');	
	}

	function review_users($formArray,$getuserid)
	{
		$this->db->insert("reviewdata",$formArray);
		$this->db->where('sn',$getuserid);
		$this->db->delete('adddata');	
	}

	function reject_users($formArray,$getuserid)
	{
		$this->db->insert("rejecteddata",$formArray);
		$this->db->where('sn',$getuserid);
		$this->db->delete('adddata');	
	}



}


?>
