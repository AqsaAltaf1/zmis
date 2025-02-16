<?php
class User_login_model extends CI_model
{

 
	 
	function chk_account($username,$password,$role,$version)
	{
		$this->db->select("*");
	    $this->db->from("users");
	    $this->db->where("user_name",$username);		
		$this->db->where("Active",1);

	    $this->db->where("password",$password);
		$this->db->where("role",$role);
		
	    $query=$this->db->get();
		
	    if($query->num_rows()>0)
	    {
		$row = $query->row_array();

		$data = array('user_id'=>$row['user_id'],'entity_name'=>$row['entity_name'],
				'role'=>$row['role'],'district_id'=>$row['district_id'],'zakat_paid_staff_id'=>$row['zakat_paid_staff_id']);
		
		if (($version != "2.4")){            ////////////////////////////////////////////////// MUST CHANGE ON VERSION  //////////////////////////////////////////////////////
			  return "2";
		  }
				
		// $data = array('id'=>$row['id'],'name'=>$row['name'],'user_type'=>$row['role'] );
		$this->session->set_userdata($data);
		$this->session->set_flashdata('Success',"You are successfully Logged in.");
		return "1";
		
		}
		else
		{
		$this->session->set_flashdata('Error',"Incorrect username password.");
		return "Failed";
	    }

	}
	
	function SetVersion($Username,$VersionNo,$AppName)
	{
		$this->db->select("*");
	    $this->db->from("version");
		$this->db->where("AppName",$AppName);
		
	   
	    $query=$this->db->get();
		
	     if($query->num_rows()>0)
			{
					
					$row = $query->row_array();
					$data = array(
						'VersionNo' => $VersionNo
						);
					$this->db->set($data);
					$this->db->where('AppName', $AppName);
					$this->db->update('version');
				
			$this->session->set_flashdata('Success',"Version Updated Successfully.");
			return "1";
		}
		else
		{
			$this->session->set_flashdata('Error',"No Existing Version available.");
			return "0";
	    }

	}
	
	function ChangePassword($username,$oldpassword,$newpassword)
	{
		$this->db->select("*");
	    $this->db->from("users");
	    $this->db->where("user_name",$username);
	    $this->db->where("password",$oldpassword);
		$this->db->where("role",'gs');
	    $query=$this->db->get();
		
	     if($query->num_rows()>0)
			{
					
					$row = $query->row_array();
					$data = array(
						'password' => $newpassword
						);
					$this->db->set($data);
					$this->db->where('user_name', $username);
					$this->db->update('users');
				
			$this->session->set_flashdata('Success',"Password Changed Successfully.");
			return "1";
		}
		else
		{
			$this->session->set_flashdata('Error',"Incorrect username password.");
			return "0";
	    }

	}
     
	 function UpdateUserInfo($username,$Version,$Macaddress,$Imeino,$LangLat)
	{
		$this->db->select("*");
	    $this->db->from("users");
	    $this->db->where("user_name",$username);
		
	    $query=$this->db->get();
		
	     if($query->num_rows()>0)
			{
					
					$row = $query->row_array();
					$data = array(
						'Version' => $Version,
						'MacAddress' => $Macaddress,
						'IMEINo' => $Imeino,
						'LangLat' => $LangLat
						);
					$this->db->set($data);
					$this->db->where('user_name', $username);
					$this->db->update('users');
				
			//$this->session->set_flashdata('Success',"Password Changed Successfully.");
			return "1";
		}
		else
		{
			$this->session->set_flashdata('Error',"Incorrect username password.");
			return "0";
	    }

	}
	function chk_duplicateChairman($LZC_ID, $ChairmanCNIC, $LZCName)
	{
		$this->db->select(" * ");
	    $this->db->from("zakatentryforms");
	    $this->db->where("LZC_ID",$LZC_ID);		
		// $this->db->where("LZC_Name",$LZC_Name);
		$this->db->where("ChairmanCNIC",$ChairmanCNIC);
		// $this->db->where("Active",1);
	    $query=$this->db->get();
		
	/* 	$myfile = fopen("ZakatEntryForm.txt", "a") or die("Unable to open file!");
		$output =  $LZC_ID."<br />".  $ChairmanCNIC ."<br />".   $LZCName ."<br />". $chk_duplicate ."<br />" . $this->db->last_query();   //print_r($_POST, true);   //.print_r($_POST)
		file_put_contents('ZakatEntryForm.txt', $output);
		fwrite($myfile, $txt);

		fclose($myfile); */		
		
	    if($query->num_rows()>0)
	    {
			return "1";
		}
		else
		{
			return "0";
	    }

	}
	
	function chk_duplicateMustahiq($LZC_ID, $ChairmanCNIC, $LZCName)
	{
		$this->db->select(" * ");
	    $this->db->from("zakatentryforms");
	    $this->db->where("LZC_ID",$LZC_ID);		
		// $this->db->where("LZC_Name",$LZC_Name);
		$this->db->where("ChairmanCNIC",$ChairmanCNIC);
		// $this->db->where("Active",1);
	    $query=$this->db->get();
		
	/* 	$myfile = fopen("ZakatEntryForm.txt", "a") or die("Unable to open file!");
		$output =  $LZC_ID."<br />".  $ChairmanCNIC ."<br />".   $LZCName ."<br />". $chk_duplicate ."<br />" . $this->db->last_query();   //print_r($_POST, true);   //.print_r($_POST)
		file_put_contents('ZakatEntryForm.txt', $output);
		fwrite($myfile, $txt);

		fclose($myfile); */		
		
	    if($query->num_rows()>0)
	    {
			return "1";
		}
		else
		{
			return "0";
	    }

	}
	
}


?>
