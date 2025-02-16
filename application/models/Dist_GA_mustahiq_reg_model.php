<?php
class Dist_GA_mustahiq_reg_model extends CI_model{

	
	function manage_institution_reg_district($formArray)
	{
		$this->db->insert("district_users",$formArray);
	}
	
	function manage_chairman_dataentryform($formArray)
	{
		$this->db->insert("zakatentryforms",$formArray);
		return $this->db->insert_id();
	}
	
	
	function manage_addmustahiq_reg($formArray)
	{
		$this->db->insert("mustahiqeen",$formArray);
		$data['user_id'] = $this->db->insert_id();
		//echo $this->db->insert_id();
		
		$data['affected_rows'] = $this->db->affected_rows();
		return $data;
	}
	
	function manage_addmustahiq_reg_details($getid,$formArray)
	{
		$this->db->insert("mustahiqeen_details",$formArray);
	}
	
	function manage_mustahiq_reg_func($formArray)
	{
		$this->db->insert("guzara_allowance_mustahiqeen",$formArray);
		return $this->db->insert_id();
	}
	
	function manage_mustahiq_reg_details($getid,$formArray)
	{
		$this->db->insert("guzara_allowance_mustahiqeen_details",$formArray);
	}
	

	function get_master_fields($get_field_type)
	{
	
	$this->db->select("*"); 
	$this->db->from("masterfields");
	$this->db->where("status","1");
	$this->db->where("field_type",$get_field_type);
	return $result = $this->db->get()->result_array();
	}
	
	
	function get_all_districtslist()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
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
	
	
	function get_all_lzc_gs($userid)
	{
		$this->db->select("id, lzc_name");  // Changed by Abbas (16-Oct-2020)
		$this->db->from("lzc_list");
		$this->db->where('district_id',$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	function get_all_lzc_controlled($userid)     // Added by Abbas (16-Oct-2020)
	{
		$lzc_query = $this->db->query("select id, lzc_name from lzc_list where id not in (SELECT lzc_institution_madrasa FROM dist_head_wise_fund where district_id=".$userid.") and district_id=".$userid." order by id asc");
		$data['get_all_lzclist'] = $lzc_query->result_array();
		
		return $users = $lzc_query->result_array();
	}
	
	
	////////////////////////////////////////////////////////
	
	
	function manage_mustahiq_marks()
	{
		$this->db->select("*");
		$this->db->from("guzara_allowance_mustahiqeen");
		$this->db->where('total_marks_new=',0);
		$this->db->where('id>',510000);
		//$this->db->where('district_id',$userid);
		//$this->db->limit(2000,36240);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	function manage_mustahiq_marks_update($formArray,$getid)
	{
	$this->db->where('id',$getid);
	$this->db->update('guzara_allowance_mustahiqeen',$formArray);		
	}
	
	
	
	
	function get_all_districts()
	{
		$this->db->select("id, district_name "); // Changed by Abbas 16-10-2020
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




