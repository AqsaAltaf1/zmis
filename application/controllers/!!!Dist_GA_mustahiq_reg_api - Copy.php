<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class ResponseResult{
		public $Result;
		public $Description;
	}
 class ResponseUsers{
		public $Result;
		public $Description;
		public $userid;
		public $personname;
		public $district_id;
		public $district_name;
		
 }

	
class Dist_GA_mustahiq_reg_api extends CI_Controller {



function __construct()
{
parent::__construct();
$this->load->model('Dist_GA_mustahiq_reg_model');
$this->load->model('User_login_model');
$this->load->model('Dist_login_model');
}



public function index()
{
$userid = $this->session->userdata('id');
$data['get_all_districts'] = $this->Dist_GA_mustahiq_reg_model->get_all_districts();
$data['get_all_lzc'] = $this->Dist_GA_mustahiq_reg_model->get_all_lzc($userid);
$this->load->view('district/dist_ga_mustahiq_reg',$data);
}



function GA_Mustahiqeen_Save()
{

				$formArray = array();
				$formArray_details = array();

				$formArray['mustahiq_name'] = $this->input->post("mustahiq_name");	
				$formArray['father_name']  = $this->input->post("father_name");
				$formArray['mustahiq_cnic']  = str_replace("-", "", $this->input->post("mustahiq_cnic"));
				$formArray['contact_number']  = $this->input->post("contact_number");
				$formArray['gender']  = $this->input->post("gender");

				//$formArray['district_id']  = $this->session->userdata('id');
				$formArray['district_id']  = $this->input->post("district_id");

				$formArray['LZC_name']  = $this->input->post("LZC_name");
				$formArray['postal_address']  = $this->input->post("postal_address");
				$formArray['permanent_address']  = $this->input->post("permanent_address");
				$formArray['dob']  = $this->input->post("dob");
				$formArray['age']  = $this->input->post("age");
				$formArray['marital_status']  = $this->input->post("marital_status");

				$formArray['bankaccount_value']  = $this->input->post("bankaccount_value");
				$formArray['istehqaqnumber']  = $this->input->post("istehqaqnumber");



				$formArray['category']  = $this->input->post("category");

				if($this->input->post("category") == "Orphan")
				{
				$categorymarks = 1;	
				}
				else if($this->input->post("category") == "Poor")
				{
				$categorymarks = 3;	
				}
				else if($this->input->post("category") == "Widow")
				{
				$categorymarks = 4;	
				}
				else if($this->input->post("category") == "Disable")
				{
				$categorymarks = 5;	
				}

				$formArray_details['disable_type']  = $this->input->post("disable_type");
				$formArray_details['RelationWithGuardian']  = $this->input->post("RelationWithGuardian");
				
				

				$formArray['financial_assistance']  = $this->input->post("financial_assistance");
				$formArray_details['financial_assistance_type']  = $this->input->post("financial_assistance_type");

				if($this->input->post("financial_assistance") == "Yes")
				{
				$financial_assistance_marks = 0;		
				}
				else if($this->input->post("financial_assistance") == "No")
				{
				$financial_assistance_marks = 5;
				}



				$formArray['gold_status']  = $this->input->post("gold_status");
				$formArray_details['gold_status_value']  = $this->input->post("gold_status_value");


				if($this->input->post("gold_status") == "No")
				{
				$gold_status_marks = 5;
				}
				else if($this->input->post("gold_status") == "Yes")
				{
				$gold_status_marks = $this->input->post("gold_status_value");
				}
				$formArray['house_status']  = $this->input->post("house_status");
				$formArray_details['house_status_type']  = $this->input->post("house_status_type");

				if($this->input->post("house_status") == "No")
				{
				$house_status_marks = 5;
				}
				else if($this->input->post("house_status") == "Yes")
					{
				$house_status_marks = $this->input->post("house_status_type");
				}
				$formArray['no_of_dependences']  = $this->input->post("no_of_dependences");
				$formArray_details['dependences_sons']  = $this->input->post("dependences_sons");
				$formArray_details['dependences_daughters']  = $this->input->post("dependences_daughters");
				$formArray_details['dependences_others']  = $this->input->post("dependences_others");


				$formArray_details['bank_account_number']  = $this->input->post("bank_account_number");
				$formArray_details['account_balance']  = $this->input->post("bankaccount_value_marks");
				$formArray_details['pesco_bill']  = $this->input->post("pesco_bill_value");
				$no_of_dependences1  = $this->input->post("no_of_dependences");
				$no_of_dependences2  = $this->input->post("dependences_daughters");

				$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;

				//$no_of_dependences_marks = $this->input->post("dependences_daughters");
				$formArray['monthly_income_source']  = $this->input->post("monthly_income_source");
				$formArray_details['monthly_income_value']  = $this->input->post("monthly_income_value");

				if($this->input->post("monthly_income_source") == "No")
				{
				$monthly_income_source_marks = 5;
				}
				else if($this->input->post("monthly_income_source") == "Yes")
				{
				$monthly_income_source_marks = $this->input->post("monthly_income_value");
				}
				$formArray['other_source_of_income']  = $this->input->post("other_source_of_income");



				if($this->input->post("other_source_of_income") == "None")
				{
				$other_source_of_income_marks = 5;
				}
				else if($this->input->post("other_source_of_income") == "Agriculture")
				{
				$other_source_of_income_marks = $this->input->post("other_source_income_value2");
				$formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value1");
				$formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value2");
				}
				else if($this->input->post("other_source_of_income") == "Commercial")
				{
				$other_source_of_income_marks = $this->input->post("other_source_income_value22");
				$formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value11");
				$formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value22");
				}

				if($this->input->post("bankaccount_value") == "No")
				{
				$bankaccount_value = 5;
				$formArray['bankaccount_value']  = $this->input->post("bankaccount_value");
				}
				else if($this->input->post("bankaccount_value") == "Yes")
				{
				$bankaccount_value = $this->input->post("bankaccount_value_marks");;
				}


				$formArray['live_stock']  = $this->input->post("live_stock");
				$formArray_details['live_stock_type']  = $this->input->post("live_stock_type");

				if($this->input->post("live_stock") == "No")
				{
				$live_stock_marks = 5;
				}
				else if($this->input->post("live_stock") == "Yes")
				{
				$live_stock_marks = $this->input->post("live_stock_type");
				}

				$formArray['mode_of_transportation']  = $this->input->post("mode_of_transportation");

				$mode_of_transportation_marks = $this->input->post("mode_of_transportation");


				$formArray['electricity_type']  = $this->input->post("electricity_type");


				if($this->input->post("electricity_type") == 1)
				{
				$pesco_bill_value = $this->input->post("pesco_bill_value");
				if($pesco_bill_value < 1000)
				{
				$electricity_type_marks = 1; 
				}
				else if($pesco_bill_value >= 1000)
				{
				$electricity_type_marks = -30; 
				}
				}
				else
				{
				$electricity_type_marks = $this->input->post("electricity_type"); 
				}


				$formArray['fuel_type']  = $this->input->post("fuel_type");
				$formArray['water_type']  = $this->input->post("water_type");
				$formArray['comments']  = $this->input->post("comments");

				$fuel_type_marks = $this->input->post("fuel_type");
				$water_type_marks = $this->input->post("water_type");
				 

				$gettoalmarks =  
				$categorymarks +  
				$financial_assistance_marks + 
				$gold_status_marks + 
				$house_status_marks + 
				$no_of_dependences_marks + 
				$monthly_income_source_marks + 
				$other_source_of_income_marks + 
				$bankaccount_value + 
				$live_stock_marks + 
				$mode_of_transportation_marks + 
				$electricity_type_marks +
				$fuel_type_marks +
				$water_type_marks;

                $comments = $this->input->post("comments");
				$formArray['total_marks']  = $gettoalmarks;

				$formArray['add_date'] = date("Y-m-d");
				$formArray['status'] = 1;

				$formArray_details['add_date'] = date("Y-m-d");
				$formArray_details['status'] = 1;
	


		$getid = $this->Dist_GA_mustahiq_reg_model->manage_mustahiq_reg_func($formArray);
	
		$formArray_details['user_id'] = $getid;
		$this->Dist_GA_mustahiq_reg_model->manage_mustahiq_reg_details($getid,$formArray_details);
		
		
		$myResponse = new  ResponseResult();

		$myResponse->Result = "Successful";
		$myResponse->Description = "Record Added Successfully";
		
		echo json_encode($myResponse);
		

}


function Login()
{
	    $username   = $this->input->post("username");
		$password   = $this->input->post("password");
		$chk_account = $this->User_login_model->chk_account($username,$password, 'gs');
		
		$userid=$this->session->userdata('user_id');
		$district_id=$this->session->userdata('district_id');
		
		$getDistrictName =       $this->Dist_login_model->getDistrictName($district_id);
		$DName = 
		$data['get_all_lzc'] = $this->Dist_login_model->get_all_lzc($userid);
		
		$myResponse = new  ResponseUsers();
		
		if($chk_account == "1"){
		$myResponse->Result = "Successful";
		$myResponse->Description = "User Logged In Successfully";
		$myResponse->userid=$this->session->userdata('user_id');
		$myResponse->personname= $this->session->userdata('entity_name');
		$myResponse->district_id=$this->session->userdata('district_id');
		$myResponse->district_name=$getDistrictName;
		$myResponse->gs_lzc_name=$data['get_all_lzc'];
		}
		else
		{
		$myResponse->Result = "Failed";
		$myResponse->Description = "User Logged In Failed, Please use Group Secretary CNIC No as Username";
		$myResponse->userid="";
		$myResponse->personname="";
		$myResponse->district_id="";
		$myResponse->district_name="";
		$myResponse->lzc_name="";
		
		}
				  		
		echo json_encode($myResponse);
	
}

function ChangePassword()
{
		$username      = $this->input->post("Username");
		$oldpassword   = $this->input->post("OldPassword");
		$newpassword   = $this->input->post("NewPassword");
		
		$chk_account = $this->User_login_model->changepassword($username,$oldpassword,$newpassword);
		$myResponse = new  ResponseResult();
		if ($chk_account=="1"){
		
			$myResponse->Result = "Successful";
			$myResponse->Description = "Password Changed Successfully";
		}
		else
		{
			$myResponse->Result = "Failed";
			$myResponse->Description = "Password Changed Failed, Please check your Username / Password ";
		}
		echo json_encode($myResponse);
}


}
