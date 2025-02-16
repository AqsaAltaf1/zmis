<?php
ini_set('memory_limit', '50000M');
defined('BASEPATH') OR exit('No direct script access allowed');






class Dist_GA_mustahiq_reg extends CI_Controller {
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_GA_mustahiq_reg_model');
	}
	
	public function index()
	{
		$userid = $this->session->userdata('id');
		$data['get_all_districts'] = $this->Dist_GA_mustahiq_reg_model->get_all_districts();
		$data['get_all_lzc'] = $this->Dist_GA_mustahiq_reg_model->get_all_lzc($userid);
		$this->load->view('district/dist_ga_mustahiq_reg',$data);
	}
		
			
		
	function guzara_allowance_mustahiqeen()
	{
		
		$formArray = array();
		$formArray_details = array();
		
		
		$district_id  = $this->session->userdata('id');
		$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
		
		$LZC_id  = $this->input->post("LZC_name");
		$get_lzc_nameqry = $this->db->select('*')->from('lzc_list')->where('id',$LZC_id)->get();
		
		$get_gsnameqry = $this->db->select('*')->from('lzc_list')->where('id',$LZC_id)->where('district_id',$district_id)->get();
		
		
		$formArray['mustahiq_name'] = $this->input->post("mustahiq_name");	
		$formArray['father_name']  = $this->input->post("father_name");
		$formArray['mustahiq_cnic'] = str_replace("-", "", $this->input->post("mustahiq_cnic"));
		$formArray['contact_number']  = $this->input->post("contact_number");
		$formArray['gender']  = $this->input->post("gender");
		$formArray['district_id']  = $this->session->userdata('id');
		$formArray['LZC_name']  = $this->input->post("LZC_name");
		$formArray['postal_address']  = $this->input->post("postal_address");
		$formArray['permanent_address']  = $this->input->post("permanent_address");
		$formArray['dob']  = $this->input->post("dob");
		$formArray['age']  = $this->input->post("age");
		$formArray['marital_status']  = $this->input->post("marital_status");
		
		$formArray['District_Name'] = $get_dist_name->row('district_name');	
		$formArray['LZCActualName']  = $get_lzc_nameqry->row('lzc_name');	
		$formArray['EntryUserName']  = $get_gsnameqry->row('gs_name');
		
		$formArray['bankaccount_value']  = $this->input->post("bankaccount_value");
 		$formArray['istehqaqnumber']  = $this->input->post("istehqaqnumber");
		
		$formArray['category']  = $this->input->post("category");
		
		// Poor age less than 30 give minus 10 score.
		// PWD age above 35 give plus 10 score
		// Widow age above 45 give plus 10 score
		// Orphan age less than 16 give plus 10 score
		
		if($this->input->post("category") == "Orphan")
			{
				if  ($this->input->post("age") < 16)
					$categorymarks = 10;
				else
					$categorymarks = 1;	
				$priority = 4;
			}
			else if($this->input->post("category") == "Poor")
			{
				
				if($this->input->post("age") < 30)
					$categorymarks = -10;
				else
					$categorymarks = 3;	

			$priority = 3;
			}
			else if($this->input->post("category") == "Widow")
			{
			if  ($this->input->post("age") > 45)
					$categorymarks = 10;
				else
					$categorymarks = 4;	
			$priority = 5;
			}
			else if($this->input->post("category") == "Disable")
			{
			if  ($this->input->post("age") > 35)
					$categorymarks = 10;
				else
					$categorymarks = 5;	
			$priority = 6;
			}
			$formArray['Priority']  = $priority;
		$formArray['RelationWithGuardian']  = $this->input->post("guardian_relation");
		$formArray_details['disable_type']  = $this->input->post("disable_type");
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
			//$gold_status_marks = $this->input->post("gold_status_value");
			
			if($this->input->post("gold_status_value") == "1 Tola or Less")
			{
				$gold_status_marks = 2;  //3
			}
			else if($this->input->post("gold_status_value") == "2-3 Tolas")
			{
				$gold_status_marks = -20; //2 (On request of Jamil sb.)	
			}
			else if($this->input->post("gold_status_value") == "4-5 Tolas")
			{
			$gold_status_marks = -30;	
			}
			else if($this->input->post("gold_status_value") == "6-7 Tolas")
				{
				$gold_status_marks = -40;	
			}
		}
		
		
		
		$formArray['house_status']  = $this->input->post("house_status");
		$formArray_details['house_status_type']  = $this->input->post("house_status_type");
		
		if($this->input->post("house_status") == "No")
		{
		$house_status_marks = 5;
		}
		else if($this->input->post("house_status") == "Yes")
		{
			//$house_status_marks = $this->input->post("house_status_type");
			
			if($this->input->post("house_status_type") == "Concrete (Pakka)")
			{
				$house_status_marks = 1;
			}
			else if($this->input->post("house_status_type") == "Semi Pakka")
			{
				$house_status_marks = 2;
			}
			else if($this->input->post("house_status_type") == "Kacha")
			{
				$house_status_marks = 3;
			}
			else if($this->input->post("house_status_type") == "Rental/Shelter")
			{
				$house_status_marks = 4;
			}
		}
		
		
		if($this->input->post("no_of_dependences") == "3 or Less")
		{
		$no_of_dependences1 = 1;		
		}
		else if($this->input->post("no_of_dependences") == "4-6")
		{
		$no_of_dependences1 = 3;	
		}
		else if($this->input->post("no_of_dependences") == "Above 7")
		{
		$no_of_dependences1 = 5;	
		}
	
		$formArray['no_of_dependences']  = $this->input->post("no_of_dependences");
		
		$formArray_details['dependences_sons']  = $this->input->post("dependences_sons");
		$formArray_details['dependences_daughters']  = $this->input->post("dependences_daughters");
		$formArray_details['dependences_others']  = $this->input->post("dependences_others");
		
		
		if($this->input->post("dependences_daughters") == "3 or Above Adult (Un-married)")
		{
			$no_of_dependences2 = 5;	
		}
		else if($this->input->post("dependences_daughters") == "2 Adult (Un-married)")
		{
			$no_of_dependences2 = 4;	
		}
		else if($this->input->post("dependences_daughters") == "1 Adult (Un-married)")
		{
			$no_of_dependences2 = 3;	
		}
		else if($this->input->post("dependences_daughters") == "None")
		{
			$no_of_dependences2 = 0;	
		}
		//$no_of_dependences1  = $this->input->post("no_of_dependences");
		//$no_of_dependences2  = $this->input->post("dependences_daughters");
		
		$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;
		
		//$no_of_dependences_marks = $this->input->post("dependences_daughters");
		
		$formArray_details['bank_account_number']  = $this->input->post("bank_account_number");
		$formArray_details['account_balance']  = $this->input->post("bankaccount_value_marks");
		$formArray_details['pesco_bill']  = $this->input->post("pesco_bill_value");
		
		
		
		
		
		$formArray['monthly_income_source']  = $this->input->post("monthly_income_source");
		$formArray_details['monthly_income_value']  = $this->input->post("monthly_income_value");
		
		if($this->input->post("monthly_income_source") == "No")
		{
		$monthly_income_source_marks = 5;
		}
		else if($this->input->post("monthly_income_source") == "Yes")
		{
			
			//$monthly_income_source_marks = $this->input->post("monthly_income_value");
			
			if($this->input->post("monthly_income_value") == "4000 Or Less")
			{
				$monthly_income_source_marks = 2;
			}
			else if($this->input->post("monthly_income_value") == "8000 Or Less")
			{
				$monthly_income_source_marks = 1;	
			}
			else if($this->input->post("monthly_income_value") == "12000 Or Less")
			{
				$monthly_income_source_marks = 0;	
			}
		}
			
		$formArray['other_source_of_income']  = $this->input->post("other_source_of_income");
		
		if($this->input->post("other_source_of_income") == "None")
		{
		$other_source_of_income_marks = 5;
		}
		else if($this->input->post("other_source_of_income") == "Agriculture")
		{
			
		//$other_source_of_income_marks = $this->input->post("other_source_income_value2");
			if($this->input->post("other_source_income_value2") == "5000 Or Less")
			{
				$other_source_of_income_marks = 1;
			}
			else if($this->input->post("other_source_income_value2") == "6000 or above")
			{
				$other_source_of_income_marks = 0;
			}
		
		$formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value1");
		$formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value2");
		}
		else if($this->input->post("other_source_of_income") == "Commercial")
		{
		
		//$other_source_of_income_marks = $this->input->post("other_source_income_value22");
			
			if($this->input->post("other_source_income_value22") == "5000 Or Less")
			{
			$other_source_of_income_marks = 1;
			}
			else if($this->input->post("other_source_income_value22") == "6000 or above")
			{
			$other_source_of_income_marks = 0;
			}
			
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
			//$bankaccount_value = $this->input->post("bankaccount_value_marks");
			if($this->input->post("bankaccount_value_marks") == "4000 or less")
			{
				$bankaccount_value = 2;	
			}
			else if($this->input->post("bankaccount_value_marks") == "4001-8000")
			{
				$bankaccount_value = 1;	
			}
			else if($this->input->post("bankaccount_value_marks") == "12000 or Above")
			{
	  
				$bankaccount_value = -30;	
			}
			
		}
	 
		$formArray['live_stock']  = $this->input->post("live_stock");
		$formArray_details['live_stock_type']  = $this->input->post("live_stock_type");
		
		if($this->input->post("live_stock") == "No")
		{
		$live_stock_marks = 5;
		}
		else if($this->input->post("live_stock") == "Yes")
		{
			//$live_stock_marks = $this->input->post("live_stock_type");
			if($this->input->post("live_stock_type") == "Cow/Buffalos")
			{
				$live_stock_marks = 1;
			}
			else if($this->input->post("live_stock_type") == "Sheeps/Goats")
			{
				$live_stock_marks = 2;
			}
			else if($this->input->post("live_stock_type") == "Both")
			{
				$live_stock_marks = 0;
			}
		}
		
		
		$formArray['mode_of_transportation']  = $this->input->post("mode_of_transportation");
		
		//$mode_of_transportation_marks = $this->input->post("mode_of_transportation");
		
		if($this->input->post("mode_of_transportation") == "Car")
		{
			$mode_of_transportation_marks = -30; 
		}
		else if($this->input->post("mode_of_transportation") == "Motorcycle / Rickshaw")
		{
			$mode_of_transportation_marks = -20;	
		}
		else if($this->input->post("mode_of_transportation") == "Cart")
		{
			$mode_of_transportation_marks = -10;	
		}
		else if($this->input->post("mode_of_transportation") == "Bicycle")
		{
			$mode_of_transportation_marks = 3;	
		}
		else if($this->input->post("mode_of_transportation") == "Public Transport")
		{
			$mode_of_transportation_marks = 4;	
		}
		else if($this->input->post("mode_of_transportation") == "None")
		{
			$mode_of_transportation_marks = 5;	
		}
		
		$formArray['electricity_type']  = $this->input->post("electricity_type");
		

		if($this->input->post("electricity_type") == "Provided by Govt (WAPDA)")
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
		else if($this->input->post("electricity_type") == "Own arrangement (Solar, UPS, etc)")
		{
			$electricity_type_marks = 3;
		}
		
		else if($this->input->post("electricity_type") == "No electricity")
		{
			$electricity_type_marks = 5;
		}
			
		$formArray['fuel_type']  = $this->input->post("fuel_type");
		
		if($this->input->post("fuel_type") == "Wood")
		{
			$fuel_type_marks = 4;
		}
		if($this->input->post("fuel_type") == "LP Gas (Cylinder)")
		{
			$fuel_type_marks = 3;
		}
		if($this->input->post("fuel_type") == "Natural Gas (SNGPL)")
		{
			$fuel_type_marks = 1;
		}
		if($this->input->post("fuel_type") == "Other/Coal")
		{
			$fuel_type_marks = 2;
		}
		if($this->input->post("fuel_type") == "Nil")
		{
			$fuel_type_marks = 5;
		}
		
		$formArray['water_type']  = $this->input->post("water_type");
		
		//$fuel_type_marks = $this->input->post("fuel_type");
		//$water_type_marks = $this->input->post("water_type");
		
		
		if($this->input->post("water_type") == "Govt Water Supply")
		{
			$water_type_marks = 0;
		}
		else if($this->input->post("water_type") == "Own Bore Hole with hand-pump")
		{
			$water_type_marks = 1;
		}
		else if($this->input->post("water_type") == "Community Bore Hole")
		{
			$water_type_marks = 2;
		}
		else if($this->input->post("water_type") == "Open / Dug well")
		{
			$water_type_marks = 3;
		}
		else if($this->input->post("water_type") == "River / Pond / Stream")
		{
			$water_type_marks = 4;
		}
		else if($this->input->post("water_type") == "Nil")
		{
			$water_type_marks = 5;
		}
		
		$formArray['year']  = $this->input->post("year");
		$formArray['installment']  = $this->input->post("installment");
		$formArray['Device']  = $this->input->post("computer");
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
		
	
		$formArray['total_marks']  = $gettoalmarks;
		$formArray['marks_2021'] = $gettoalmarks;   // Variable name added marks_2021, Changed on 25/05/2021 by Abbaas
		
		$formArray['comments']  = $this->input->post("comments");

		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		
		$formArray_details['add_date'] = date("Y-m-d");
		$formArray_details['status'] = 1;

		$this->db->select("mustahiq_cnic");
		$this->db->from("guzara_allowance_mustahiqeen");
		$this->db->where("mustahiq_cnic",str_replace("-", "", $this->input->post("mustahiq_cnic")));


		$query=$this->db->get();
		
		//echo $this->db->last_query();
		
		if($query->num_rows() > 0)
		{
			$this->session->set_flashdata('error','Record on this CNIC already Exist..!');
			redirect(base_url('Dist_GA_mustahiq_reg'));
		}
		else
		{
		
			$getid = $this->Dist_GA_mustahiq_reg_model->manage_mustahiq_reg_func($formArray);
			
			$formArray_details['user_id'] = $getid;
			
			$this->Dist_GA_mustahiq_reg_model->manage_mustahiq_reg_details($getid,$formArray_details);
			
			$mobilemsg = 'Record Added Successfully..!';
			
			echo json_encode($mobilemsg);
			
			$this->session->set_flashdata('success','Record Added Successfully..!');
			redirect(base_url('Dist_GA_lz_19'));
		
		}
	}
	
	
	// Function for Updateing New Score Column in Mustahqeen table
	
	function manage_mustahiq_marks()
	{

	$formArray = $this->Dist_GA_mustahiq_reg_model->manage_mustahiq_marks();

	
	foreach ($formArray as $getmustahiq_data) 
	{
	
	//echo $getmustahiq_data['category'];
	$get_id = $getmustahiq_data['id'];
	$get_details_qry = $this->db->select('*')->from('guzara_allowance_mustahiqeen_details')->where('user_id',$get_id)->get();
	$disable_type = $get_details_qry->row('disable_type');
	
	
	
	if($this->input->post("category") == "Orphan")
	{
	$categorymarks = 1;	
	$priority = 4;
	}
	else if($this->input->post("category") == "Poor")
	{
	$categorymarks = 3;	
	$priority = 3;
	}
	else if($this->input->post("category") == "Widow")
	{
	$categorymarks = 4;	
	$priority = 5;
	}
	else if($this->input->post("category") == "Disable")
	{
	$categorymarks = 5;	
	$priority = 6;
	}
	$formArray['Priority']  = $priority;
	
	//$formArray['RelationWithGuardian']  = $this->input->post("guardian_relation");
	//$formArray_details['disable_type']  = $this->input->post("disable_type");
	//$formArray['financial_assistance']  = $this->input->post("financial_assistance");
	//$formArray_details['financial_assistance_type']  = $this->input->post("financial_assistance_type");
	
	if($getmustahiq_data['financial_assistance'] == "Yes")
	{
	$financial_assistance_marks = 0;								   
	}
	else if($getmustahiq_data['financial_assistance'] == "No")
	{
	$financial_assistance_marks = 5;
	}
	
	
	//$formArray['gold_status']  = $this->input->post("gold_status");
	//$formArray_details['gold_status_value']  = $this->input->post("gold_status_value");
	
	
	if($getmustahiq_data['gold_status'] == "No")
	{
	$gold_status_marks = 5;
	}
	else if($getmustahiq_data['gold_status'] == "Yes")
	{
	
		//$gold_status_marks = $this->input->post("gold_status_value");
		
		if($get_details_qry->row('gold_status_value') == "1 Tola or Less")
		{
		$gold_status_marks = 2;
		}
		else if($get_details_qry->row('gold_status_value') == "2-3 Tolas")
		{
		$gold_status_marks = -20;	
		}
		else if($get_details_qry->row('gold_status_value') == "4-5 Tolas")
		{
		$gold_status_marks = -30;	
		}
		else if($get_details_qry->row('gold_status_value') == "6-7 Tolas")
		{
		$gold_status_marks = -40;	
		}
	
	
	}
	
	
	//$formArray['house_status']  = $this->input->post("house_status");
	$formArray_details['house_status_type']  = $this->input->post("house_status_type");
	
	if($getmustahiq_data['house_status'] == "No (Homeless)")
	{
	$house_status_marks = 5;
	}
	else if($getmustahiq_data['house_status'] == "Yes (House hold)")
	{
	
		//$house_status_marks = $this->input->post("house_status_type");
		
		if($get_details_qry->row('house_status_type') == "Concrete (Pakka)")
		{
		$house_status_marks = 1;
		}
		else if($get_details_qry->row('house_status_type') == "Semi Pakka")
		{
		$house_status_marks = 2;
		}
		else if($get_details_qry->row('house_status_type') == "Kacha")
		{
		$house_status_marks = 3;
		}
		else if($get_details_qry->row('house_status_type') == "Rental/Shelter")
		{
		$house_status_marks = 4;
		}
	}
	
	
	
	
	if($getmustahiq_data['no_of_dependences'] == "3 or Less")
	{
	$no_of_dependences1 = 1;		
	}
	else if($getmustahiq_data['no_of_dependences'] == "4-6")
	{
	$no_of_dependences1 = 3;	
	}
	else if($getmustahiq_data['no_of_dependences'] == "Above 7")
	{
	$no_of_dependences1 = 5;	
	}
	
	//$formArray['no_of_dependences']  = $this->input->post("no_of_dependences");
	
	//$formArray_details['dependences_sons']  = $this->input->post("dependences_sons");
	//$formArray_details['dependences_daughters']  = $this->input->post("dependences_daughters");
	//$formArray_details['dependences_others']  = $this->input->post("dependences_others");
	
	
	if($get_details_qry->row('dependences_daughters') == "3 or Above Adult(Un-Married)")
	{
	$no_of_dependences2 = 5;	
	}
	else if($get_details_qry->row('dependences_daughters') == "2 Adult(Un-Married)")
	{
	$no_of_dependences2 = 4;	
	}
	else if($get_details_qry->row('dependences_daughters') == "1 Adult(Un-married)")
	{
	$no_of_dependences2 = 3;	
	}
	else if($get_details_qry->row('dependences_daughters') == "None")
	{
	$no_of_dependences2 = 0;	
	}
	//$no_of_dependences1  = $this->input->post("no_of_dependences");
	//$no_of_dependences2  = $this->input->post("dependences_daughters");
	
	$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;
	
	//$no_of_dependences_marks = $this->input->post("dependences_daughters");
	
	
	//$formArray_details['bank_account_number']  = $this->input->post("bank_account_number");
	//$formArray_details['account_balance']  = $this->input->post("bankaccount_value_marks");
	//$formArray_details['pesco_bill']  = $this->input->post("pesco_bill_value");
	
	
	$formArray['monthly_income_source']  = $this->input->post("monthly_income_source");
	$formArray_details['monthly_income_value']  = $this->input->post("monthly_income_value");
	
	if($getmustahiq_data['monthly_income_source'] == "Unemployed")
	{
	$monthly_income_source_marks = 5;
	}
	else if($getmustahiq_data['monthly_income_source'] == "Employed (Non Govt. Employee)")
	{
	
	//$monthly_income_source_marks = $this->input->post("monthly_income_value");
	
	if($get_details_qry->row('monthly_income_value') == "4000 Or Less")
	{
	$monthly_income_source_marks = 2;
	}
	else if($get_details_qry->row('monthly_income_value') == "8000 Or Less")
	{
	$monthly_income_source_marks = 1;	
	}
	else if($get_details_qry->row('monthly_income_value') == "12000 Or Less")
	{
	$monthly_income_source_marks = 0;	
	}
	}
	
	
	//$formArray['other_source_of_income']  = $this->input->post("other_source_of_income");
	
	if($getmustahiq_data['other_source_of_income'] == "None")
	{
	$other_source_of_income_marks = 5;
	}
	else if($getmustahiq_data['other_source_of_income'] == "Agriculture")
	{
	
	//$other_source_of_income_marks = $this->input->post("other_source_income_value2");
	
	if($get_details_qry->row('other_source_income_value2') == "5000 Or Less")
	{
	$other_source_of_income_marks = 1;
	}
	else if($get_details_qry->row('other_source_income_value2') == "6000 or above")
	{
	$other_source_of_income_marks = 0;
	}
	
	//$formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value1");
	//$formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value2");
	
	
	}
	else if($getmustahiq_data['other_source_of_income'] == "Commercial")
	{
	
	//$other_source_of_income_marks = $this->input->post("other_source_income_value22");
	
	if($get_details_qry->row('other_source_income_value22') == "5000 Or Less")
	{
	$other_source_of_income_marks = 1;
	}
	else if($get_details_qry->row('other_source_income_value22') == "6000 or above")
	{
	$other_source_of_income_marks = 0;
	}
	
	//$formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value11");
	//$formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value22");
	}
	
	
	
	
	if($getmustahiq_data['bankaccount_value'] == "No")
	{
	$bankaccount_value = 5;
	//$formArray['bankaccount_value']  = $this->input->post("bankaccount_value");
	}
	else if($getmustahiq_data['bankaccount_value'] == "Yes")
	{
		//$bankaccount_value = $this->input->post("bankaccount_value_marks");
		
		if($get_details_qry->row('account_balance') == "4000 or less")
		{
		$bankaccount_value = 2;	
		}
		else if($get_details_qry->row('account_balance') == "4001-8000")
		{
		$bankaccount_value = 1;	
		}
		else if($get_details_qry->row('account_balance') == "12000 or Above")
		{
		$bankaccount_value = -30;	
		}
	}
	
	
	
	
	
	
	//$formArray['live_stock']  = $this->input->post("live_stock");
	//$formArray_details['live_stock_type']  = $this->input->post("live_stock_type");
	
	if($getmustahiq_data['live_stock'] == "No")
	{
	$live_stock_marks = 5;
	}
	else if($getmustahiq_data['live_stock'] == "Yes")
	{
	//$live_stock_marks = $this->input->post("live_stock_type");
	if($get_details_qry->row('live_stock_type') == "Cow/Buffalos")
	{
	$live_stock_marks = 1;
	}
	else if($get_details_qry->row('live_stock_type') == "Sheeps/Goats")
	{
	$live_stock_marks = 2;
	}
	else if($get_details_qry->row('live_stock_type') == "Both")
	{
	$live_stock_marks = 0;
	}
	}
	
	
		
	
	//$formArray['mode_of_transportation']  = $this->input->post("mode_of_transportation");
	
	//$mode_of_transportation_marks = $this->input->post("mode_of_transportation");
	
	
	if($getmustahiq_data['mode_of_transportation'] == "None")
	{
	$mode_of_transportation_marks = 5;
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Car")
	{
	$mode_of_transportation_marks = -30;
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Motorcycle / Rickshaw")
	{
	$mode_of_transportation_marks = -20;	
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Cart")
	{
	$mode_of_transportation_marks = -10;	
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Bicycle")
	{
	$mode_of_transportation_marks = 3;	
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Public Transport")
	{
	$mode_of_transportation_marks = 4;	
	}
	
	
	
	
	
	
	//$formArray['electricity_type']  = $this->input->post("electricity_type");
	
	
	if($getmustahiq_data['electricity_type'] == "Provided by Govt (WAPDA)")
	{
				
		$pesco_bill_value = $get_details_qry->row('pesco_bill_value');
		
		if($pesco_bill_value < 1000)
		{
		$electricity_type_marks = 1; 
		}
		else if($pesco_bill_value >= 1000)
		{
		$electricity_type_marks = -30; 
		}
	}
	else if($getmustahiq_data['electricity_type'] == "Own arrangement (Solar, UPS, etc)")
	{
	$electricity_type_marks = 3;
	}
	
	else if($getmustahiq_data['electricity_type'] == "No electricity")
	{
	$electricity_type_marks = 5;
	}
	
	//$formArray['fuel_type']  = $this->input->post("fuel_type");
	
	if($getmustahiq_data['fuel_type'] == "Wood")
	{
	$fuel_type_marks = 4;
	}
	if($getmustahiq_data['fuel_type'] == "LP Gas (Cylinder)")
	{
	$fuel_type_marks = 3;
	}
	if($getmustahiq_data['fuel_type'] == "Natural Gas (SNGPL)")
	{
	$fuel_type_marks = 1;
	}
	if($getmustahiq_data['fuel_type'] == "Other/Coal")
	{
	$fuel_type_marks = 2;
	}
	if($getmustahiq_data['fuel_type'] == "Nil")
	{
	$fuel_type_marks = 5;
	}
	
	//$formArray['water_type']  = $this->input->post("water_type");
	
	//$fuel_type_marks = $this->input->post("fuel_type");
	//$water_type_marks = $this->input->post("water_type");
	
	
	if($getmustahiq_data['water_type'] == "Govt Water Supply")
	{
	$water_type_marks = 0;
	}
	else if($getmustahiq_data['water_type'] == "Own Bore Hole with hand-pump")
	{
	$water_type_marks = 1;
	}
	else if($getmustahiq_data['water_type'] == "Community Bore Hole")
	{
	$water_type_marks = 2;
	}
	else if($getmustahiq_data['water_type'] == "Open / Dug well")
	{
	$water_type_marks = 3;
	}
	else if($getmustahiq_data['water_type'] == "River / Pond / Stream")
	{
	$water_type_marks = 4;
	}
	else if($getmustahiq_data['water_type'] == "Nil")
	{
	$water_type_marks = 5;
	}
	
	$formArray['year']  = $this->input->post("year");
	$formArray['installment']  = $this->input->post("installment");
	$formArray['Device']  = $this->input->post("computer");
	
	$gettoalmarks_new =  
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
	
	echo "<meta http-equiv='refresh' content='30;url=http://localhost/zmis/Dist_GA_mustahiq_reg/manage_mustahiq_marks/' />";
	echo "user id ".$getmustahiq_data['id']." New ".$gettoalmarks_new." - Old ".$getmustahiq_data['total_marks'];;
	echo "<br>";
	
	
	
	$formArray_newmarks = array();
	// $formArray_newmarks['total_marks_new'] = $gettoalmarks_new;     ////////////////// REMOVED BY ABBAS (25-05-2021)  ON DECESION OF JAMIL SB FOR CHANGING SCORE ////////////////////////////////
	$formArray_newmarks['marks_2021'] = $gettoalmarks_new;
	
	$this->Dist_GA_mustahiq_reg_model->manage_mustahiq_marks_update($formArray_newmarks,$getmustahiq_data['id']);
	$formArray_newmarks['total_marks'] = $gettoalmarks_new;
	
	
	$this->Dist_GA_mustahiq_reg_model->manage_mustahiq_marks_update($formArray_newmarks,$getmustahiq_data['id']);
	
	}// foreach loop end
	
	
	echo "Record Added Successfully...";
	echo $date = date('Y-m-d H:i:s');echo "<br>";
	}
	

	function manage_mustahiq_marks_2021()  // NOT IN USE
	{

	$formArray = $this->Dist_GA_mustahiq_reg_model->manage_mustahiq_marks();

	
	foreach ($formArray as $getmustahiq_data) 
	{
	
	//echo $getmustahiq_data['category'];
	$get_id = $getmustahiq_data['id'];
	$get_details_qry = $this->db->select('*')->from('guzara_allowance_mustahiqeen_details')->where('user_id',$get_id)->get();
	$disable_type = $get_details_qry->row('disable_type');
	
	
	if($this->input->post("category") == "Orphan")
	{
	$categorymarks = 1;	
	$priority = 4;
	}
	else if($this->input->post("category") == "Poor")
	{
	$categorymarks = 3;	
	$priority = 3;
	}
	else if($this->input->post("category") == "Widow")
	{
	$categorymarks = 4;	
	$priority = 5;
	}
	else if($this->input->post("category") == "Disable")
	{
	$categorymarks = 5;	
	$priority = 6;
	}
	$formArray['Priority']  = $priority;
	
	//$formArray['RelationWithGuardian']  = $this->input->post("guardian_relation");
	//$formArray_details['disable_type']  = $this->input->post("disable_type");
	//$formArray['financial_assistance']  = $this->input->post("financial_assistance");
	//$formArray_details['financial_assistance_type']  = $this->input->post("financial_assistance_type");
	
	if($getmustahiq_data['financial_assistance'] == "Yes")
	{
	$financial_assistance_marks = 0;								   
	}
	else if($getmustahiq_data['financial_assistance'] == "No")
	{
	$financial_assistance_marks = 5;
	}
	
	
	//$formArray['gold_status']  = $this->input->post("gold_status");
	//$formArray_details['gold_status_value']  = $this->input->post("gold_status_value");
	
	
	if($getmustahiq_data['gold_status'] == "No")
	{
	$gold_status_marks = 5;
	}
	else if($getmustahiq_data['gold_status'] == "Yes")
	{
	
		//$gold_status_marks = $this->input->post("gold_status_value");
		
		if($get_details_qry->row('gold_status_value') == "1 Tola or Less")
		{
		$gold_status_marks = 2;
		}
		else if($get_details_qry->row('gold_status_value') == "2-3 Tolas")
		{
		$gold_status_marks = -20;	
		}
		else if($get_details_qry->row('gold_status_value') == "4-5 Tolas")
		{
		$gold_status_marks = -30;	
		}
		else if($get_details_qry->row('gold_status_value') == "6-7 Tolas")
		{
		$gold_status_marks = -40;	
		}
	
	
	}
	
	
	//$formArray['house_status']  = $this->input->post("house_status");
	$formArray_details['house_status_type']  = $this->input->post("house_status_type");
	
	if($getmustahiq_data['house_status'] == "No (Homeless)")
	{
	$house_status_marks = 5;
	}
	else if($getmustahiq_data['house_status'] == "Yes (House hold)")
	{
	
		//$house_status_marks = $this->input->post("house_status_type");
		
		if($get_details_qry->row('house_status_type') == "Concrete (Pakka)")
		{
		$house_status_marks = 1;
		}
		else if($get_details_qry->row('house_status_type') == "Semi Pakka")
		{
		$house_status_marks = 2;
		}
		else if($get_details_qry->row('house_status_type') == "Kacha")
		{
		$house_status_marks = 3;
		}
		else if($get_details_qry->row('house_status_type') == "Rental/Shelter")
		{
		$house_status_marks = 4;
		}
	}
	
	
	
	
	if($getmustahiq_data['no_of_dependences'] == "3 or Less")
	{
	$no_of_dependences1 = 1;		
	}
	else if($getmustahiq_data['no_of_dependences'] == "4-6")
	{
	$no_of_dependences1 = 3;	
	}
	else if($getmustahiq_data['no_of_dependences'] == "Above 7")
	{
	$no_of_dependences1 = 5;	
	}
	
	//$formArray['no_of_dependences']  = $this->input->post("no_of_dependences");
	
	//$formArray_details['dependences_sons']  = $this->input->post("dependences_sons");
	//$formArray_details['dependences_daughters']  = $this->input->post("dependences_daughters");
	//$formArray_details['dependences_others']  = $this->input->post("dependences_others");
	
	
	if($get_details_qry->row('dependences_daughters') == "3 or Above Adult(Un-Married)")
	{
	$no_of_dependences2 = 5;	
	}
	else if($get_details_qry->row('dependences_daughters') == "2 Adult(Un-Married)")
	{
	$no_of_dependences2 = 4;	
	}
	else if($get_details_qry->row('dependences_daughters') == "1 Adult(Un-married)")
	{
	$no_of_dependences2 = 3;	
	}
	else if($get_details_qry->row('dependences_daughters') == "None")
	{
	$no_of_dependences2 = 0;	
	}
	//$no_of_dependences1  = $this->input->post("no_of_dependences");
	//$no_of_dependences2  = $this->input->post("dependences_daughters");
	
	$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;
	
	//$no_of_dependences_marks = $this->input->post("dependences_daughters");
	
	
	//$formArray_details['bank_account_number']  = $this->input->post("bank_account_number");
	//$formArray_details['account_balance']  = $this->input->post("bankaccount_value_marks");
	//$formArray_details['pesco_bill']  = $this->input->post("pesco_bill_value");
	
	
	$formArray['monthly_income_source']  = $this->input->post("monthly_income_source");
	$formArray_details['monthly_income_value']  = $this->input->post("monthly_income_value");
	
	if($getmustahiq_data['monthly_income_source'] == "Unemployed")
	{
	$monthly_income_source_marks = 5;
	}
	else if($getmustahiq_data['monthly_income_source'] == "Employed (Non Govt. Employee)")
	{
	
	//$monthly_income_source_marks = $this->input->post("monthly_income_value");
	
	if($get_details_qry->row('monthly_income_value') == "4000 Or Less")
	{
	$monthly_income_source_marks = 2;
	}
	else if($get_details_qry->row('monthly_income_value') == "8000 Or Less")
	{
	$monthly_income_source_marks = 1;	
	}
	else if($get_details_qry->row('monthly_income_value') == "12000 Or Less")
	{
	$monthly_income_source_marks = 0;	
	}
	}
	
	
	//$formArray['other_source_of_income']  = $this->input->post("other_source_of_income");
	
	if($getmustahiq_data['other_source_of_income'] == "None")
	{
	$other_source_of_income_marks = 5;
	}
	else if($getmustahiq_data['other_source_of_income'] == "Agriculture")
	{
	
	//$other_source_of_income_marks = $this->input->post("other_source_income_value2");
	
	if($get_details_qry->row('other_source_income_value2') == "5000 Or Less")
	{
	$other_source_of_income_marks = 1;
	}
	else if($get_details_qry->row('other_source_income_value2') == "6000 or above")
	{
	$other_source_of_income_marks = 0;
	}
	
	//$formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value1");
	//$formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value2");
	
	
	}
	else if($getmustahiq_data['other_source_of_income'] == "Commercial")
	{
	
	//$other_source_of_income_marks = $this->input->post("other_source_income_value22");
	
	if($get_details_qry->row('other_source_income_value22') == "5000 Or Less")
	{
	$other_source_of_income_marks = 1;
	}
	else if($get_details_qry->row('other_source_income_value22') == "6000 or above")
	{
	$other_source_of_income_marks = 0;
	}
	
	//$formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value11");
	//$formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value22");
	}
	
	
	
	
	if($getmustahiq_data['bankaccount_value'] == "No")
	{
	$bankaccount_value = 5;
	//$formArray['bankaccount_value']  = $this->input->post("bankaccount_value");
	}
	else if($getmustahiq_data['bankaccount_value'] == "Yes")
	{
		//$bankaccount_value = $this->input->post("bankaccount_value_marks");
		
		if($get_details_qry->row('account_balance') == "4000 or less")
		{
		$bankaccount_value = 2;	
		}
		else if($get_details_qry->row('account_balance') == "4001-8000")
		{
		$bankaccount_value = 1;	
		}
		else if($get_details_qry->row('account_balance') == "12000 or Above")
		{
		$bankaccount_value = -30;	
		}
	}
	
	
	
	
	
	
	//$formArray['live_stock']  = $this->input->post("live_stock");
	//$formArray_details['live_stock_type']  = $this->input->post("live_stock_type");
	
	if($getmustahiq_data['live_stock'] == "No")
	{
	$live_stock_marks = 5;
	}
	else if($getmustahiq_data['live_stock'] == "Yes")
	{
	//$live_stock_marks = $this->input->post("live_stock_type");
	if($get_details_qry->row('live_stock_type') == "Cow/Buffalos")
	{
	$live_stock_marks = 1;
	}
	else if($get_details_qry->row('live_stock_type') == "Sheeps/Goats")
	{
	$live_stock_marks = 2;
	}
	else if($get_details_qry->row('live_stock_type') == "Both")
	{
	$live_stock_marks = 0;
	}
	}
	
	
		
	
	//$formArray['mode_of_transportation']  = $this->input->post("mode_of_transportation");
	
	//$mode_of_transportation_marks = $this->input->post("mode_of_transportation");
	
	
	if($getmustahiq_data['mode_of_transportation'] == "None")
	{
	$mode_of_transportation_marks = 5;
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Car")
	{
	$mode_of_transportation_marks = -30;
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Motorcycle / Rickshaw")
	{
	$mode_of_transportation_marks = -20;	
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Cart")
	{
	$mode_of_transportation_marks = -10;	
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Bicycle")
	{
	$mode_of_transportation_marks = 3;	
	}
	else if($getmustahiq_data['mode_of_transportation'] == "Public Transport")
	{
	$mode_of_transportation_marks = 4;	
	}
	
	
	
	
	
	
	//$formArray['electricity_type']  = $this->input->post("electricity_type");
	
	
	if($getmustahiq_data['electricity_type'] == "Provided by Govt (WAPDA)")
	{
				
		$pesco_bill_value = $get_details_qry->row('pesco_bill_value');
		
		if($pesco_bill_value < 1000)
		{
		$electricity_type_marks = 1; 
		}
		else if($pesco_bill_value >= 1000)
		{
		$electricity_type_marks = -30; 
		}
	}
	else if($getmustahiq_data['electricity_type'] == "Own arrangement (Solar, UPS, etc)")
	{
	$electricity_type_marks = 3;
	}
	
	else if($getmustahiq_data['electricity_type'] == "No electricity")
	{
	$electricity_type_marks = 5;
	}
	
	//$formArray['fuel_type']  = $this->input->post("fuel_type");
	
	if($getmustahiq_data['fuel_type'] == "Wood")
	{
	$fuel_type_marks = 4;
	}
	if($getmustahiq_data['fuel_type'] == "LP Gas (Cylinder)")
	{
	$fuel_type_marks = 3;
	}
	if($getmustahiq_data['fuel_type'] == "Natural Gas (SNGPL)")
	{
	$fuel_type_marks = 1;
	}
	if($getmustahiq_data['fuel_type'] == "Other/Coal")
	{
	$fuel_type_marks = 2;
	}
	if($getmustahiq_data['fuel_type'] == "Nil")
	{
	$fuel_type_marks = 5;
	}
	
	//$formArray['water_type']  = $this->input->post("water_type");
	
	//$fuel_type_marks = $this->input->post("fuel_type");
	//$water_type_marks = $this->input->post("water_type");
	
	
	if($getmustahiq_data['water_type'] == "Govt Water Supply")
	{
	$water_type_marks = 0;
	}
	else if($getmustahiq_data['water_type'] == "Own Bore Hole with hand-pump")
	{
	$water_type_marks = 1;
	}
	else if($getmustahiq_data['water_type'] == "Community Bore Hole")
	{
	$water_type_marks = 2;
	}
	else if($getmustahiq_data['water_type'] == "Open / Dug well")
	{
	$water_type_marks = 3;
	}
	else if($getmustahiq_data['water_type'] == "River / Pond / Stream")
	{
	$water_type_marks = 4;
	}
	else if($getmustahiq_data['water_type'] == "Nil")
	{
	$water_type_marks = 5;
	}
	
	$formArray['year']  = $this->input->post("year");
	$formArray['installment']  = $this->input->post("installment");
	$formArray['Device']  = $this->input->post("computer");
	
	$gettoalmarks_new =  
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
	
	echo "<meta http-equiv='refresh' content='30;url=http://localhost/zmis/Dist_GA_mustahiq_reg/manage_mustahiq_marks/' />";
	echo "user id ".$getmustahiq_data['id']." New ".$gettoalmarks_new." - Old ".$getmustahiq_data['total_marks'];;
	echo "<br>";
	
	
	
	$formArray_newmarks = array();
	$formArray_newmarks['marks_2021'] = $gettoalmarks_new;
	
	$this->Dist_GA_mustahiq_reg_model->manage_mustahiq_marks_update($formArray_newmarks,$getmustahiq_data['id']);
	$formArray_newmarks['marks_2021'] = $gettoalmarks_new;
	
	
	$this->Dist_GA_mustahiq_reg_model->manage_mustahiq_marks_update($formArray_newmarks,$getmustahiq_data['id']);
	
	}// foreach loop end
	
	
	echo "Record Added Successfully...";
	echo $date = date('Y-m-d H:i:s');echo "<br>";
	}
	


}