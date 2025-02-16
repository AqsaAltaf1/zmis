<?php
ini_set('memory_limit', '50000M');
defined('BASEPATH') OR exit('No direct script access allowed');


class Dist_GA_mustahiq_reg extends CI_Controller {
function __construct()
{
parent::__construct();
$this->load->model('General_model');
$this->load->model('Dist_GA_mustahiq_reg_model');
$this->load->model('FormHandingOverModel');

}
	
public function index()
{
$districtID = $this->session->userdata('id');

$data['get_all_districts'] = $this->Dist_GA_mustahiq_reg_model->get_all_districts();
$data['GetLzcLocality'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("LzcLocality");
$data['GetGender'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("Gender");
$data['GetGuardianType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("GuardianType");
$data['GetIdentityOption'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("IdentityOption");
$data['GetIdentityOptionSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("IdentityOptionSubType");
$data['GetContectType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("ContectType");
$data['GetSehatCard'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("SehatCard");
$data['GetYesNo'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("YesNo");
$data['GetMaritalStatus'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("MaritalStatus");
$data['GetSkills'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("Skills");
$data['GetSchoolGoingChild'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("SchoolGoingChild");
$data['GetChildType1'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("ChildType1");
$data['GetChildType2'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("ChildType2");

$data['GetCategory'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("Category");
$data['GetOtherDisableType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OtherDisableType");
$data['GetCategorySubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("CategorySubType");
$data['GetFinancialAssiatance'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("FinancialAssiatance");
$data['GetFinancialAssiatanceSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("FinancialAssiatanceSubType");
$data['GetGoldStatus'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("GoldStatus");
$data['GetGoldStatusSubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("GoldStatusSubType");
$data['GetHouseStatus'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("HouseStatus");
$data['GetHouseStatusSubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("HouseStatusSubType");
$data['GetRentalSubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("RentalSubType");
$data['GetNoOfDependence'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("NoOfDependence");
$data['GetNoOfDependenceSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("NoOfDependenceSubType");
$data['GetQualification'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("Qualification");
$data['GetIncomeSource'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("IncomeSource");
$data['GetMonthlyIncomeRange'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("MonthlyIncomeRange");
$data['GetJobType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("JobType");
$data['GetOtherIncomeSource'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OtherIncomeSource");
$data['GetIncomeSourceSubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("IncomeSourceSubType");
$data['GetBankAccount'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("BankAccount");
$data['GetLiveStock']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("LiveStock");
$data['GetLiveStockSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("LiveStockSubType");
$data['GetModeOfTransportation']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("ModeOfTransportation");

$data['GetElectricity']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("Electricity");
$data['GetFuel']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("Fuel");
$data['GetWater']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("Water");


$data['get_all_lzc'] = $this->Dist_GA_mustahiq_reg_model->get_all_lzc($userid);

/*$user_type = $this->session->userdata('user_type');	
if($user_type == "district")
{
}
else if($user_type == "gs")
{	
$data['get_all_lzc'] = $this->Dist_GA_mustahiq_reg_model->get_all_lzc_gs($userid);
}*/

$userName = $this->session->userdata('username');
$data['get_gs_lzc'] = $this->FormHandingOverModel->getGroupSecretaryLZC($districtID,$userName);

$this->load->view('district/dist_ga_mustahiq_reg',$data);
}
		


function add_guzara_allowance_mustahiqeen()
{

$districtid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$districtid)->get();
$district_name = $get_dist_name->row('district_name');

$formArray = array();
$formArray_details = array();

$LZC_id  = $this->input->post("LZC_id");
$get_lzname = $this->db->select('*')->from('zakatentryforms')->where('LZC_ID',$LZC_id)->get();
$LZCActualName = $get_lzname->row('LZC_Name');


$this->db->select("mustahiq_cnic");
$this->db->from("mustahiqeen");
$this->db->where("mustahiq_cnic",str_replace("-", "", $this->input->post("mustahiq_cnic")));
$query=$this->db->get();
if($query->num_rows() > 0)
{
$this->session->set_flashdata('error','Record on this CNIC already Exist..!');
redirect(base_url('Dist_GA_mustahiq_reg'));
exit;
}

$formArray['LZCActualName'] =  $LZCActualName;
$formArray['LzcLocality'] = $this->input->post("LzcLocality");
$formArray['MustahiqType'] = "Guzara Allowance";
$formArray['istehqaqnumber'] = $this->input->post("istehqaqnumber");
$formArray['gender'] = $this->input->post("gender");
$formArray['mustahiq_name'] = $this->input->post("mustahiq_name");
$formArray['GuardianType'] = $this->input->post("MustahiqGuardianType");
$formArray['father_name'] = $this->input->post("father_name");
$formArray['IdentityType'] = $this->input->post("IdentityType");
$formArray['mustahiq_cnic'] = str_replace("-", "", $this->input->post("mustahiq_cnic"));
//$this->input->post("mustahiq_cnic");

$formArray_details['GuardianType'] = $this->input->post("GuardianType");
$formArray_details['GuardianName'] = $this->input->post("GuardianName");
$formArray_details['GuardianFatherName'] = $this->input->post("GuardianFatherName");
$formArray_details['GuardianCnic'] = str_replace("-", "",$this->input->post("GuardianCnic"));

$formArray['MobileNetwork'] = $this->input->post("MobileNetwork");
$formArray['contact_number'] = str_replace("-", "", $this->input->post("contact_number"));
//$this->input->post("contact_number");
$formArray['dob'] = $this->input->post("dob");
$formArray['age'] = $this->input->post("age");
$formArray['SehatCard'] = $this->input->post("SehatCard");
$formArray['marital_status'] = $this->input->post("marital_status");
$formArray['Skills'] = $this->input->post("Skills");
$formArray['SchoolGoingChild'] = $this->input->post("SchoolGoingChild");

$formArray_details['SchoolGoingType1'] = $this->input->post("SchoolGoingType1");
$formArray_details['SchoolGoingType2'] = $this->input->post("SchoolGoingType2");
$formArray_details['SchoolGoingSonBrothers'] = $this->input->post("SchoolGoingSonBrothers");
$formArray_details['NoSchoolGoingSisters'] = $this->input->post("NoSchoolGoingSisters");

$formArray['postal_address'] = $this->input->post("postal_address");
$formArray['permanent_address'] = $this->input->post("permanent_address");

$formArray['category']  = $this->input->post("category");
$formArray['OrYouDisable'] = $this->input->post("OrYouDisable");
$formArray['financial_assistance'] = $this->input->post("financial_assistance");
$formArray['gold_status'] = $this->input->post("gold_status");
$formArray['house_status'] = $this->input->post("house_status");
$formArray['Dependences_sons'] = $this->input->post("Dependences_sons");
$formArray['Dependences_sisters'] = $this->input->post("Dependences_sisters");
$formArray['Dependences_others'] = $this->input->post("Dependences_others");
$formArray['Dependences_totals'] = $this->input->post("Dependences_totals");
$formArray['Qualification'] = $this->input->post("Qualification");
$formArray['monthly_income_source'] = $this->input->post("monthly_income_source");
$formArray['JobType'] = $this->input->post("JobType");
$formArray['ExpenditureResource'] = $this->input->post("SourceOfExpense");
//$formArray['other_source_of_income'] = $this->input->post("other_source_of_income");
$formArray['bankaccount_value'] = $this->input->post("bankaccount_value");
$formArray['live_stock'] = $this->input->post("live_stock");
$formArray['mode_of_transportation'] = $this->input->post("mode_of_transportation");
$formArray['electricity_type'] = $this->input->post("electricity_type");
$formArray['fuel_type'] = $this->input->post("fuel_type");
$formArray['water_type'] = $this->input->post("water_type");
$formArray['comments'] = $this->input->post("comments");

$formArray['year']  = $this->input->post("year");
$formArray['installment']  = $this->input->post("installment");
$formArray['Device']  = $this->input->post("device");

// Added by Abbas as it is creating issues, Dont Delete

if($this->input->post("device")=="Mobile")
{
	$gsCNIC = $this->input->post("addedby");
	$districtid =  $this->input->post("district_id");
	$district_name =  $this->input->post("district_name");
}
else
{	
	$gsCNIC =  $this->session->userdata('username');
}
   


$formArray['addedby']  = $gsCNIC;
$formArray['LZC_id'] = $this->input->post("LZC_id");
$formArray['district_id']  = $districtid;
$formArray['District_Name']  = $district_name;

$formArray['status'] = 1;
//$formArray['year'] = date("Y");
$formArray['add_date'] = date("Y-m-y");



////////////// Main table Data /////////////





if($this->input->post("category") == "Orphan")
{
	if($this->input->post("OrYouDisable") == "Yes")
	{
		$disability_marks = 5;
	}
	else 
	{
		$disability_marks = 0;
	}
	$category_marks = $this->manage_points("Orphan");
	$category_disability_marks = $category_marks + $disability_marks;
		
}


if($this->input->post("category") == "Senior Citizen")
{
	
	
	if($this->input->post("OrYouDisable") == "Yes")
	{
		$disability_marks = 6;
		
	}
	else if($this->input->post("OrYouDisable") == "No")
	{
		$disability_marks = 0;
		
	}
	
	$category_marks = $this->manage_points("SeniorCitizen");
	
	$category_disability_marks = $category_marks + $disability_marks;
	
		
}

if($this->input->post("category") == "Disable")
{
	
	$category_disability_marks = $this->manage_points("Disable");
}




if($this->input->post("category") == "Widow/Divorced")
{
	if($this->input->post("OrYouDisable") == "Yes")
	{
		$disability_marks = 2;
		
	}
	else 
	{
		$disability_marks = 0;
		
	}
	
	if($this->input->post("age") >= 60)
	{
		$agemarks = 2;	
	}
	else
	{
		$agemarks = 0;
	}
	
	$category_marks = $this->manage_points("WidowDivorced");
	
	$category_disability_marks = $category_marks + $disability_marks + $agemarks;
	
}






if($this->input->post("financial_assistance") == "Yes")
{
$financial_assistance_marks = $this->manage_points("Financial_Assiatance_Yes");								   
}
else if($this->input->post("financial_assistance") == "No")
{
$financial_assistance_marks = $this->manage_points("Financial_Assiatance_No");
}



if($this->input->post("gold_status") == "Yes")
{
	if($this->input->post("gold_status_value") == "1 or Less Tola")
	{
	$gold_status_marks =  $this->manage_points("Gold_Status1Tola");
	}
	else if($this->input->post("gold_status_value") == "2 to 3 Tola")
	{
	$gold_status_marks = $this->manage_points("Gold_Status2Tola");
	}
	else if($this->input->post("gold_status_value") == "3 to 4 Tola")
	{
	$gold_status_marks = $this->manage_points("Gold_Status2Tola");
	}
	else if($this->input->post("gold_status_value") == "4 to 5 Tola")
	{
	$gold_status_marks = $this->manage_points("Gold_Status2Tola");
	}
	$formArray_details['gold_status_value']  = $this->input->post("gold_status_value");
}
else if($this->input->post("gold_status") == "No")
{
	$gold_status_marks = $this->manage_points("Gold_StatusNo");
	
}


///////////// House Status ////////////////



if($this->input->post("house_status") == "Own House")
{

	if($this->input->post("house_status_type") == "Concrete")
	{
		$house_status_marks = $this->manage_points("House_Status_Concrete");	
	}
	else if($this->input->post("house_status_type") == "Semi-Concrete")
	{
		$house_status_marks = $this->manage_points("House_Status_SemiConcrete");
	}
    else if($this->input->post("house_status_type") == "Mud")
	{
		$house_status_marks = $this->manage_points("House_Status_Mud");
	}
}
else if($this->input->post("house_status") == "On Rent")
{
	
	if($this->input->post("MonthlyRent") == "Rs.1000 or less")
	{
		$House_RentalHome = $this->manage_points("House_Status_RentalHome");	
	}
	else if($this->input->post("MonthlyRent") == "Rs.1001 to 2000")
	{
		$House_RentalHome = $this->manage_points("House_Status_RentalHome1000");
	}
	else
	{
		$House_RentalHome = $this->manage_points("House_Status_RentalHome1000");
	}	
	
	$house_status_marks = $House_RentalHome + 4;
	
}


else if($this->input->post("house_status") == "Homeless/Shelter")
{
	$house_status_marks = $this->manage_points("House_Status_Shelter");
}





/////////******************* Dependants *****************////////////////

if($this->input->post("Dependences_totals") == 0)
{
$this->manage_points("dependance_totals_nil");	
}
else if($this->input->post("Dependences_totals") <= 3)
{
$no_of_dependences1 = $this->manage_points("dependance_totals_less3");
}
else if(($this->input->post("Dependences_totals") == 4) || ($this->input->post("Dependences_totals") == 5) || ($this->input->post("Dependences_totals") == 6))
{
$no_of_dependences1 = $this->manage_points("dependance_totals_less46");
}
else if($this->input->post("Dependences_totals") >= 7)
{
$no_of_dependences1 = $this->manage_points("dependance_totals_less7");
}


if($this->input->post("Dependences_sisters") == 1)
{
	$no_of_dependences2 =$this->manage_points("No_dependance_1daughter");
}
else if($this->input->post("Dependences_sisters") == 2)
{
	 $no_of_dependences2 = $this->manage_points("No_dependance_2daughter");	
}
else if($this->input->post("Dependences_sisters") >= 3)
{
	$no_of_dependences2 =$this->manage_points("No_dependance_3daughter");
}


$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;





/////////******************* Dependants *****************////////////////



if($this->input->post("Qualification") == "Primary/Middle")
{
	$Qualification_marks = $this->manage_points("Qualification_Primary");

}
else if($this->input->post("Qualification") == "Matric")
{
	$Qualification_marks = $this->manage_points("Qualification_Matric");

}
else if($this->input->post("Qualification") == "Intermediate")
{
	$Qualification_marks = $this->manage_points("Qualification_Intermediate");

}
else if($this->input->post("Qualification") == "Graduate/Master")
{
	$Qualification_marks = $this->manage_points("Qualification_Master");

}
else if($this->input->post("Qualification") == "Religious Education")
{
	$Qualification_marks = $this->manage_points("Qualification_Religious");

}
else if($this->input->post("Qualification") == "Illitrate")
{
	$Qualification_marks = $this->manage_points("Qualification_Illitrate");

}





if($this->input->post("monthly_income_source") == "Unemployed")
{
	$monthly_income_source_marks = $this->manage_points("Source_of_income_jobless");

}
else if($this->input->post("monthly_income_source") == "Employed (Non Govt. Employee)")
{
	
	if($this->input->post("monthly_income_value") == "4000 or less")
	{
		$monthly_income_source_marks = $this->manage_points("Source_of_income_4000");
	}
	else if($this->input->post("monthly_income_value") == "4001 to 8000")
	{
		$monthly_income_source_marks = $this->manage_points("Source_of_income_8000");
	}
	
	
	else if($this->input->post("monthly_income_value") == "8001 to 11999")
	{
		$monthly_income_source_marks = $this->manage_points("Source_of_income_9000");
	}
	
	
	else if($this->input->post("monthly_income_value") == "12000 or more")
	{
		$monthly_income_source_marks = $this->manage_points("Source_of_income_12000");	
	}
	
}
else if($this->input->post("monthly_income_source") == "Agriculture")
{
	
	
	if($this->input->post("other_source_income_value2") <= 11999)
	{
	$monthly_income_source_marks = $this->manage_points("Other_Source_11999");
	}
	else if($this->input->post("other_source_income_value2") >= 12000)
	{
	$monthly_income_source_marks = $this->manage_points("Other_Source_above12k");
	}

}

else if($this->input->post("monthly_income_source") == "Commercial")
{
	
	
	if($this->input->post("other_source_income_value22") <= 11999)
	{
	$monthly_income_source_marks = $this->manage_points("Other_Source_11999");
	}
	else if($this->input->post("other_source_income_value22") >= 12000)
	{
	$monthly_income_source_marks = $this->manage_points("Other_Source_above12k");
	}
	
}


/// Recheck This with sir shehzad. 


////////// Other source of income ///////////

/*if($this->input->post("other_source_of_income") == "No Resource")
{
$other_source_of_income_marks = $this->manage_points("Other_Source_No");
}
else if($this->input->post("other_source_of_income") == "Agriculture")
{
	if($this->input->post("other_source_income_value2") <= 11999)
	{
	$other_source_of_income_marks = $this->manage_points("Other_Source_11999");
	}
	else if($this->input->post("other_source_income_value2") >= 12000)
	{
	$other_source_of_income_marks = $this->manage_points("Other_Source_above12k");
	}
	
}
else if($this->input->post("other_source_of_income") == "Commercial")
{
	if($this->input->post("other_source_income_value22") <= 11999)
	{
	$other_source_of_income_marks = $this->manage_points("Other_Source_11999");
	}
	else if($this->input->post("other_source_income_value22") >= 12000)
	{
	$other_source_of_income_marks = $this->manage_points("Other_Source_above12k");
	}
	
}*/



/////////// Bank Account ///////////


$bankaccount_value_marks = $this->input->post("bankaccount_value_marks");

if($this->input->post("bankaccount_value") == "No")
{
$bankaccount_value = $this->manage_points("Bank_account_No");
}
else if($this->input->post("bankaccount_value") == "Yes")
{
	if($this->input->post("bankaccount_value_marks") <= 4000)
	{
		$bankaccount_value = $this->manage_points("Bank_account_4000");
	}
	else if(($bankaccount_value_marks > 4001) && ($bankaccount_value_marks <= 11999))
	{
		$bankaccount_value = $this->manage_points("Bank_account_11999");
	}
	else if($bankaccount_value_marks >= 12000)
	{
	
		$bankaccount_value = $this->manage_points("Bank_account_12000");	
	}

}


//////////// Live Stock //////////////


$formArray['live_stock']  = $this->input->post("live_stock");
$formArray_details['live_stock_type']  = $this->input->post("live_stock_type");

if($this->input->post("live_stock") == "No")
{
$live_stock_marks = $this->manage_points("Live_Stock_No");
}
else if($this->input->post("live_stock") == "Yes")
{
if($this->input->post("live_stock_type") == "Cow/Buffalo")
{
	$live_stock_marks = $this->manage_points("Live_Stock_Cow");
}
else if($this->input->post("live_stock_type") == "Goats/Sheeps")
{
	$live_stock_marks = $this->manage_points("Live_Stock_Sheeps");
}
else if($this->input->post("live_stock_type") == "Both")
{
	$live_stock_marks = $this->manage_points("Live_Stock_Both");
}
}


////// Mode of Transportation ///////


if($this->input->post("mode_of_transportation") == "Motor car")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Car");
}
else if($this->input->post("mode_of_transportation") == "Rickshaw/Motorcycle")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Raksha");	
}
else if($this->input->post("mode_of_transportation") == "Cart")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Cart");	
}
else if($this->input->post("mode_of_transportation") == "Bi-Cycle")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Cycle");	
}
else if($this->input->post("mode_of_transportation") == "Public Transport")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Public");	
}




////////////// Electricity //////////////////////


$formArray['electricity_type']  = $this->input->post("electricity_type");


if($this->input->post("electricity_type") == "Wapda")
{
$pesco_bill_value = $this->input->post("pesco_bill_value");
if($pesco_bill_value < 1000)
{
	$electricity_type_marks = $this->manage_points("Electricity_Bill_1000");
}
else if($pesco_bill_value >= 1000)
{
	$electricity_type_marks = $this->manage_points("Electricity_Bill_1001");
}
}
else if($this->input->post("electricity_type") == "Own arrangment/Solar")
{
$electricity_type_marks = $this->manage_points("Electricity_Solar");
}

else if($this->input->post("electricity_type") == "No Facility")
{
$electricity_type_marks = $this->manage_points("Electricity_No");
}


///////////////////////////// Fuel /////////////////////////



$formArray['fuel_type']  = $this->input->post("fuel_type");

if($this->input->post("fuel_type") == "Wood")
{
$fuel_type_marks = $this->manage_points("Fuel_Wood");
}
if($this->input->post("fuel_type") == "LP Gas (Cylinder)")
{
$fuel_type_marks = $this->manage_points("Fuel_LPG");
}
if($this->input->post("fuel_type") == "Natural Gas (SNGPL)")
{
$fuel_type_marks = $this->manage_points("Fuel_NaturalGas");
}
if($this->input->post("fuel_type") == "Other/Coal")
{
$fuel_type_marks = $this->manage_points("Fuel_Coal");
}
if($this->input->post("fuel_type") == "No Facility")
{
$fuel_type_marks = $this->manage_points("Fuel_No");
}



///////////////////////////////// Water ///////////////////////////////


$formArray['water_type']  = $this->input->post("water_type");

if($this->input->post("water_type") == "Govt Water Supply")
{
$water_type_marks = $this->manage_points("Water_GovtSupply");
}
else if($this->input->post("water_type") == "Own Bore Hole with hand-pump")
{
$water_type_marks =$this->manage_points("Water_Ownboar");
}
else if($this->input->post("water_type") == "Community Bore Hole")
{
$water_type_marks = $this->manage_points("Water_CommunityBoar");
}
else if($this->input->post("water_type") == "Open/ Dug well")
{
$water_type_marks = $this->manage_points("Water_DugWell");
}
else if($this->input->post("water_type") == "River/Pond/Stream")
{
$water_type_marks = $this->manage_points("Water_River");
}
else if($this->input->post("water_type") == "No Facility")
{
$water_type_marks = $this->manage_points("Water_No");
}



$gettoalmarks =  
$category_disability_marks +  
$financial_assistance_marks + 
$gold_status_marks + 
$house_status_marks + 
$no_of_dependences_marks +
$Qualification_marks + 
$monthly_income_source_marks + 
//$other_source_of_income_marks + 
$bankaccount_value + 
$live_stock_marks + 
$mode_of_transportation_marks + 
$electricity_type_marks +
$fuel_type_marks +
$water_type_marks;


/*echo "category =" . $category_disability_marks;  
echo "<br>financial =" . $financial_assistance_marks; 
echo "<br>gold =" . $gold_status_marks;
echo "<br>house =" . $house_status_marks; 
echo "<br>dependants =" . $no_of_dependences_marks; 
echo "<br>Education =" . $Qualification_marks;
echo "<br>monthlyincome =" . $monthly_income_source_marks; 
echo "<br>other source =" . $other_source_of_income_marks; 
echo "<br>bank =" . $bankaccount_value; 
echo "<br>livestock =" . $live_stock_marks; 
echo "<br>transportation =" . $mode_of_transportation_marks; 
echo "<br>electricity =" . $electricity_type_marks;
echo "<br>fuel =" . $fuel_type_marks;
echo "<br>water =" . $water_type_marks;
echo "<br>";
echo "<br>";
echo "Total Marks = ". $gettoalmarks;
echo "<br>";
echo "<br>";
echo "done";
exit;*/


$formArray['total_marks']  = $gettoalmarks;
//$formArray['marks_2021'] = $gettoalmarks;   // Variable name added marks_2021, Changed on 25/05/2021 by Abbaas

/////////// Details Form Data /////////////////


$formArray_details['disable_type'] = $this->input->post("CategoryDisability");
$formArray_details['financial_assistance_type'] = $this->input->post("financial_assistance_type");
$formArray_details['gold_status_value'] = $this->input->post("gold_status_value");

$formArray_details['house_status_type'] = $this->input->post("house_status_type");
$formArray_details['NoOfRooms'] = $this->input->post("NoOfRooms");
$formArray_details['HouseToilet'] = $this->input->post("HouseToilet");
$formArray_details['RentRange'] = $this->input->post("MonthlyRent");
$formArray_details['monthly_income_value'] = $this->input->post("monthly_income_value");



$formArray_details['other_source_income_value1'] = $this->input->post("other_source_income_value1");
$formArray_details['other_source_income_value2'] = $this->input->post("other_source_income_value2");

$formArray_details['other_source_income_value11'] = $this->input->post("other_source_income_value11");
$formArray_details['other_source_income_value22'] = $this->input->post("other_source_income_value22");

$formArray_details['bank_account_number'] = $this->input->post("bank_account_number");
$formArray_details['account_balance'] = $this->input->post("bankaccount_value_marks");

$formArray_details['live_stock_type'] = $this->input->post("live_stock_type");
$formArray_details['pesco_bill'] = $this->input->post("pesco_bill_value");


$formArray_details['add_date'] = date("Y-m-d");
$formArray_details['status'] = 1;
$formArray_details['District_Name'] = $district_name;

$result = $this->Dist_GA_mustahiq_reg_model->manage_addmustahiq_reg($formArray);

$user_id = $result['user_id'];
$results = $result['affected_rows'];

$formArray_details['user_id'] = $user_id;

$this->Dist_GA_mustahiq_reg_model->manage_addmustahiq_reg_details($user_id,$formArray_details);

$this->session->set_flashdata('success','Record Added Successfully..!');


//$data = array('id'=>$row['district_id'],'groupSecretaryID'=>$row['user_id'],'entityName'=>$row['entity_name'],'username'=>$row['user_name'],'user_type'=>$row['role'],'district_name'=>$row['role']);


if($results == 1)
{
$userLog = array();
$userLog['UserName'] = $this->session->userdata('entityName');	
//$userLog['UserName'] = $this->session->userdata('user_name');	
$userLog['Activity']  = "Mustahiq registeration ".$finalstd_cnic;
$userLog['Description']  = "new Mustahiq registered successfully";
$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");

$userLog['Day'] = date("d");
$userLog['Month'] = date("m");
$userLog['Year'] = date("Y");

$this->General_model->user_log($userLog); // Access Method

$this->session->set_flashdata('success','Record updated Successfully..!');
redirect(base_url('Dist_GA_mustahiq_reg'));
exit;
}
else
{
$userLog = array();
$userLog['UserName'] = $this->session->userdata('entityName');	
//$userLog['UserName'] = $this->session->userdata('user_name');	
$userLog['Activity']  = "pwd registeration not updated ".$finalstd_cnic;
$userLog['Description']  = "pwd user register successfully";
$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
$userLog['Day'] = date("d");
$userLog['Month'] = date("m");
$userLog['Year'] = date("Y");
$this->General_model->user_log($userLog); // Access Method
$this->session->set_flashdata('error','Record Not updated Please Try Again.');
redirect(base_url('Dist_GA_mustahiq_reg'));
exit;
}

}



function add_guzara_allowance_mustahiqeen_api()
{

 // ******************** ADDED for Getting District, LZC and PErson Name (05Oct2020)*****************       

$formArray = array();
$formArray_details = array();


 $LZCActualName  = $this->input->post("LZC_id");
 $get_lzc_nameqry = $this->db->select('lzc_name')->from('lzc_list')->where('id',$LZCActualName)->get();


$this->db->select("mustahiq_cnic");
$this->db->from("mustahiqeen");
$this->db->where("mustahiq_cnic",str_replace("-", "", $this->input->post("mustahiq_cnic")));
$query=$this->db->get();
if($query->num_rows() > 0)
{
	$myResponse->Result = "Duplicate";
    $myResponse->Description = " آپ نے جو قومی شناختی کارڈ درج کیا ہے وہ پہلے ہی زکوٰۃ MIS میں شامل ہے۔ براہ کرم دوبارہ چیک کریں اور درست قومی شناختی کارڈ درج کریں۔ ";
    echo json_encode($myResponse); 
	exit;	
}
			$this->db->select("FormHandedOver");
			$this->db->from("zakatentryforms");
			$this->db->where("LZC_Name", $get_lzc_nameqry->row('lzc_name'));
			$formshandedover=$this->db->get();
			  if($formshandedover->num_rows()>0)
					{
						$rowformshandedover = $formshandedover->row_array();
						
					}

			$this->db->select("count(*) as CNT");
			$this->db->from("mustahiqeen");
			$this->db->where("LZCActualName", $get_lzc_nameqry->row('lzc_name'));
			$LZCCount=$this->db->get();

			if($LZCCount->num_rows()>0)
					{
						$rowLZCCount = $LZCCount->row_array();
					}
		
//echo $LZCActualName; echo "\n";
//echo $rowLZCCount['CNT']; echo "\n";
//echo $rowformshandedover['FormHandedOver'];

if($rowLZCCount['CNT'] >= $rowformshandedover['FormHandedOver'])
{
	$myResponse->Result = "Duplicate";
    $myResponse->Description = " \nForm Handed Over : ".$rowformshandedover['FormHandedOver']." \nForm Uploaded   :  ".$rowLZCCount['CNT']."\n"."\n آپ اس کمیٹی میں مزید مستحقین شامل نہیں کر سکتے کیونکہ آپ اس کمیٹی کے چیئرمین کی طرف سے فراہم کردہ فارم کی تعداد کو پہنچ چکے ہیں۔";
    echo json_encode($myResponse); 
	exit;	
}


 //$formArray['LZC_id']  = $get_lzc_nameqry->row('lzc_name');		
/* if($query->num_rows() > 0)
{
$this->session->set_flashdata('error','Record on this CNIC already Exist..!');
 redirect(base_url('Dist_GA_mustahiq_reg'));
exit;
} */

 $LZCActualName  = $this->input->post("LZC_id");
 $get_lzc_nameqry = $this->db->select('lzc_name')->from('lzc_list')->where('id',$LZCActualName)->get();

$formArray['LZCActualName']  =  $get_lzc_nameqry->row('lzc_name');
$formArray['LzcLocality'] = $this->input->post("LzcLocality");
$formArray['MustahiqType'] = "Guzara Allowance";
$formArray['istehqaqnumber'] = $this->input->post("istehqaqnumber");
$formArray['gender'] = $this->input->post("gender");
$formArray['mustahiq_name'] = $this->input->post("mustahiq_name");
$formArray['GuardianType'] = $this->input->post("MustahiqGuardianType");
$formArray['father_name'] = $this->input->post("father_name");
$formArray['IdentityType'] = $this->input->post("IdentityType");
$formArray['mustahiq_cnic'] = str_replace("-", "", $this->input->post("mustahiq_cnic"));
//$this->input->post("mustahiq_cnic");



$formArray_details['GuardianType'] = $this->input->post("GuardianType");
$formArray_details['GuardianName'] = $this->input->post("GuardianName");
$formArray_details['GuardianFatherName'] = $this->input->post("GuardianFatherName");
$formArray_details['GuardianCnic'] = str_replace("-", "",$this->input->post("GuardianCnic"));

$formArray['MobileNetwork'] = $this->input->post("MobileNetwork");
$formArray['contact_number'] = str_replace("-", "", $this->input->post("contact_number"));
//$this->input->post("contact_number");
$formArray['dob'] = $this->input->post("dob");
$formArray['age'] = $this->input->post("age");
$formArray['SehatCard'] = $this->input->post("SehatCard");
$formArray['marital_status'] = $this->input->post("marital_status");
$formArray['Skills'] = $this->input->post("Skills");
$formArray['SchoolGoingChild'] = $this->input->post("SchoolGoingChild");

/* $formArray_details['SchoolGoingType1'] = $this->input->post("SchoolGoingType1");
$formArray_details['SchoolGoingType2'] = $this->input->post("SchoolGoingType2");
$formArray_details['SchoolGoingSonBrothers'] = $this->input->post("SchoolGoingSonBrothers");
$formArray_details['NoSchoolGoingSisters'] = $this->input->post("NoSchoolGoingSisters"); */

$formArray['postal_address'] = $this->input->post("postal_address");
$formArray['permanent_address'] = $this->input->post("permanent_address");

$formArray['category']  = $this->input->post("category");
$formArray['OrYouDisable'] = $this->input->post("OrYouDisable");
$formArray['financial_assistance'] = $this->input->post("financial_assistance");
$formArray['gold_status'] = $this->input->post("gold_status");
$formArray['house_status'] = $this->input->post("house_status");
$formArray['Dependences_sons'] = $this->input->post("Dependences_sons");
$formArray['Dependences_sisters'] = $this->input->post("Dependences_sisters");
$formArray['Dependences_others'] = $this->input->post("Dependences_others");
$formArray['Dependences_totals'] = $this->input->post("Dependences_totals");
$formArray['Qualification'] = $this->input->post("Qualification");
$formArray['monthly_income_source'] = $this->input->post("monthly_income_source");
$formArray['JobType'] = $this->input->post("JobType");
$formArray['ExpenditureResource'] = $this->input->post("SourceOfExpense");
//$formArray['other_source_of_income'] = $this->input->post("other_source_of_income");
$formArray['bankaccount_value'] = $this->input->post("bankaccount_value");
$formArray['live_stock'] = $this->input->post("live_stock");
$formArray['mode_of_transportation'] = $this->input->post("mode_of_transportation");
$formArray['electricity_type'] = $this->input->post("electricity_type");
$formArray['fuel_type'] = $this->input->post("fuel_type");
$formArray['water_type'] = $this->input->post("water_type");
$formArray['comments'] = $this->input->post("comments");

$formArray['year']  = $this->input->post("year");
$formArray['installment']  = $this->input->post("installment");
$formArray['Device']  = $this->input->post("Device");

// Added by Abbas as it is creating issues, Dont Delete

 $LZC_Name  = $this->input->post("LZC_id");
 $get_lzc_nameqry = $this->db->select('*')->from('lzc_list')->where('lzc_name',$LZC_Name)->get();
	
$formArray['District_Name'] = $this->input->post("district_name");		
$formArray['EntryUserName']  = 	$this->input->post("addedby");
$formArray['addedby']  =   $this->input->post("EntryUserName");   // CNIC
//$formArray['LZC_id']  = $get_lzc_nameqry->row('id');	
$formArray['district_id']  = $this->input->post("district_id");
$formArray['LZC_id'] = $this->input->post("LZCActualName");

$formArray['status'] = 1;
//$formArray['year'] = date("Y");
$formArray['add_date'] = date("Y-m-y");



////////////// Main table Data /////////////

if($this->input->post("category") == "Orphan")
{
	if($this->input->post("OrYouDisable") == "Yes")
	{
		$disability_marks = 5;
	}
	else 
	{
		$disability_marks = 0;
	}
	$category_marks = $this->manage_points("Orphan");
	$category_disability_marks = $category_marks + $disability_marks;
		
}


if($this->input->post("category") == "Senior Citizen")
{
	
	
	if($this->input->post("OrYouDisable") == "Yes")
	{
		$disability_marks = 6;
		
	}
	else if($this->input->post("OrYouDisable") == "No")
	{
		$disability_marks = 0;
		
	}
	
	$category_marks = $this->manage_points("SeniorCitizen");
	
	$category_disability_marks = $category_marks + $disability_marks;
	
		
}

if($this->input->post("category") == "Disable")
{
	
	$category_disability_marks = $this->manage_points("Disable");
}




if($this->input->post("category") == "Widow/Divorced")
{
	if($this->input->post("OrYouDisable") == "Yes")
	{
		$disability_marks = 2;
		
	}
	else 
	{
		$disability_marks = 0;
		
	}
	
	if($this->input->post("age") >= 60)
	{
		$agemarks = 2;	
	}
	else
	{
		$agemarks = 0;
	}
	
	$category_marks = $this->manage_points("WidowDivorced");
	
	$category_disability_marks = $category_marks + $disability_marks + $agemarks;
	
}


if($this->input->post("financial_assistance") == "Yes")
{
$financial_assistance_marks = $this->manage_points("Financial_Assiatance_Yes");								   
}
else if($this->input->post("financial_assistance") == "No")
{
$financial_assistance_marks = $this->manage_points("Financial_Assiatance_No");
}



if($this->input->post("gold_status") == "Yes")
{
	if($this->input->post("gold_status_value") == "1 or Less Tola")
	{
	$gold_status_marks =  $this->manage_points("Gold_Status1Tola");
	}
	else if($this->input->post("gold_status_value") == "2 to 3 Tola")
	{
	$gold_status_marks = $this->manage_points("Gold_Status2Tola");
	}
	else if($this->input->post("gold_status_value") == "3 to 4 Tola")
	{
	$gold_status_marks = $this->manage_points("Gold_Status2Tola");
	}
	else if($this->input->post("gold_status_value") == "4 to 5 Tola")
	{
	$gold_status_marks = $this->manage_points("Gold_Status2Tola");
	}
	$formArray_details['gold_status_value']  = $this->input->post("gold_status_value");
}
else if($this->input->post("gold_status") == "No")
{
	$gold_status_marks = $this->manage_points("Gold_StatusNo");
	
}


///////////// House Status ////////////////



if($this->input->post("house_status") == "Own House")
{

	if($this->input->post("house_status_type") == "Concrete")
	{
		$house_status_marks = $this->manage_points("House_Status_Concrete");	
	}
	else if($this->input->post("house_status_type") == "Semi-Concrete")
	{
		$house_status_marks = $this->manage_points("House_Status_SemiConcrete");
	}
    else if($this->input->post("house_status_type") == "Mud")
	{
		$house_status_marks = $this->manage_points("House_Status_Mud");
	}
}
else if($this->input->post("house_status") == "On Rent")
{
	
	if($this->input->post("MonthlyRent") == "Rs.1000 or less")
	{
		$House_RentalHome = $this->manage_points("House_Status_RentalHome");	
	}
	else if($this->input->post("MonthlyRent") == "Rs.1001 to 2000")
	{
		$House_RentalHome = $this->manage_points("House_Status_RentalHome1000");
	}
	else
	{
		$House_RentalHome = $this->manage_points("House_Status_RentalHome1000");
	}	
	
	$house_status_marks = $House_RentalHome + 4;
	
}


else if($this->input->post("house_status") == "Homeless/Shelter")
{
	$house_status_marks = $this->manage_points("House_Status_Shelter");
}



/////////******************* Dependants *****************////////////////

if($this->input->post("Dependences_totals") == 0)
{
$this->manage_points("dependance_totals_nil");	
}
else if($this->input->post("Dependences_totals") <= 3)
{
$no_of_dependences1 = $this->manage_points("dependance_totals_less3");
}
else if(($this->input->post("Dependences_totals") == 4) || ($this->input->post("Dependences_totals") == 5) || ($this->input->post("Dependences_totals") == 6))
{
$no_of_dependences1 = $this->manage_points("dependance_totals_less46");
}
else if($this->input->post("Dependences_totals") >= 7)
{
$no_of_dependences1 = $this->manage_points("dependance_totals_less7");
}


if($this->input->post("Dependences_sisters") == 1)
{
	$no_of_dependences2 =$this->manage_points("No_dependance_1daughter");
}
else if($this->input->post("Dependences_sisters") == 2)
{
	 $no_of_dependences2 = $this->manage_points("No_dependance_2daughter");	
}
else if($this->input->post("Dependences_sisters") >= 3)
{
	$no_of_dependences2 =$this->manage_points("No_dependance_3daughter");
}


$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;





/////////******************* Dependants *****************////////////////



if($this->input->post("Qualification") == "Primary/Middle")
{
	$Qualification_marks = $this->manage_points("Qualification_Primary");

}
else if($this->input->post("Qualification") == "Matric")
{
	$Qualification_marks = $this->manage_points("Qualification_Matric");

}
else if($this->input->post("Qualification") == "Intermediate")
{
	$Qualification_marks = $this->manage_points("Qualification_Intermediate");

}
else if($this->input->post("Qualification") == "Graduate/Master")
{
	$Qualification_marks = $this->manage_points("Qualification_Master");

}
else if($this->input->post("Qualification") == "Religious Education")
{
	$Qualification_marks = $this->manage_points("Qualification_Religious");

}
else if($this->input->post("Qualification") == "Illitrate")
{
	$Qualification_marks = $this->manage_points("Qualification_Illitrate");

}





if($this->input->post("monthly_income_source") == "Unemployed")
{
	$monthly_income_source_marks = $this->manage_points("Source_of_income_jobless");

}
else if($this->input->post("monthly_income_source") == "Employed (Non Govt. Employee)")
{
	
	if($this->input->post("monthly_income_value") == "4000 or less")
	{
		$monthly_income_source_marks = $this->manage_points("Source_of_income_4000");
	}
	else if($this->input->post("monthly_income_value") == "4001 to 8000")
	{
		$monthly_income_source_marks = $this->manage_points("Source_of_income_8000");
	}
	
	
	else if($this->input->post("monthly_income_value") == "8001 to 11999")
	{
		$monthly_income_source_marks = $this->manage_points("Source_of_income_9000");
	}
	
	
	else if($this->input->post("monthly_income_value") == "12000 or more")
	{
		$monthly_income_source_marks = $this->manage_points("Source_of_income_12000");	
	}
	
}
else if($this->input->post("monthly_income_source") == "Agriculture")
{
	
	
	if($this->input->post("other_source_income_value2") <= 11999)
	{
	$monthly_income_source_marks = $this->manage_points("Other_Source_11999");
	}
	else if($this->input->post("other_source_income_value2") >= 12000)
	{
	$monthly_income_source_marks = $this->manage_points("Other_Source_above12k");
	}

}

else if($this->input->post("monthly_income_source") == "Commercial")
{
	
	
	if($this->input->post("other_source_income_value22") <= 11999)
	{
	$monthly_income_source_marks = $this->manage_points("Other_Source_11999");
	}
	else if($this->input->post("other_source_income_value22") >= 12000)
	{
	$monthly_income_source_marks = $this->manage_points("Other_Source_above12k");
	}
	
}



$bankaccount_value_marks = $this->input->post("bankaccount_value");   //$this->input->post("bankaccount_value_marks");

if($this->input->post("bank_account_number") == "" && $this->input->post("bankaccount_value") == 0)
{
		$bankaccount_value = $this->manage_points("Bank_account_No");
		$formArray['bankaccount_value'] = "No";
		
}
else if($this->input->post("bank_account_number") != "" && $this->input->post("bankaccount_value") > 0)
{
			$formArray['bankaccount_value'] = "Yes";
	if($this->input->post("bankaccount_value_marks") <= 4000)
	{
		$bankaccount_value = $this->manage_points("Bank_account_4000");
	}
	else if(($bankaccount_value_marks > 4001) && ($bankaccount_value_marks <= 11999))
	{
		$bankaccount_value = $this->manage_points("Bank_account_11999");
	}
	else if($bankaccount_value_marks >= 12000)
	{
	
		$bankaccount_value = $this->manage_points("Bank_account_12000");	
	}

}


//////////// Live Stock //////////////


$formArray['live_stock']  = $this->input->post("live_stock");
$formArray_details['live_stock_type']  = $this->input->post("live_stock_type");

if($this->input->post("live_stock") == "No")
{
$live_stock_marks = $this->manage_points("Live_Stock_No");
}
else if($this->input->post("live_stock") == "Yes")
{
if($this->input->post("live_stock_type") == "Cow/Buffalo")
{
	$live_stock_marks = $this->manage_points("Live_Stock_Cow");
}
else if($this->input->post("live_stock_type") == "Goats/Sheeps")
{
	$live_stock_marks = $this->manage_points("Live_Stock_Sheeps");
}
else if($this->input->post("live_stock_type") == "Both")
{
	$live_stock_marks = $this->manage_points("Live_Stock_Both");
}
}


////// Mode of Transportation ///////


if($this->input->post("mode_of_transportation") == "Motor car")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Car");
}
else if($this->input->post("mode_of_transportation") == "Rickshaw/Motorcycle")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Raksha");	
}
else if($this->input->post("mode_of_transportation") == "Cart")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Cart");	
}
else if($this->input->post("mode_of_transportation") == "Bi-Cycle")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Cycle");	
}
else if($this->input->post("mode_of_transportation") == "Public Transport")
{
$mode_of_transportation_marks = $this->manage_points("Transportation_Public");	
}




////////////// Electricity //////////////////////


$formArray['electricity_type']  = $this->input->post("electricity_type");


if($this->input->post("electricity_type") == "Wapda")
{
$pesco_bill_value = $this->input->post("pesco_bill_value");
if($pesco_bill_value < 1000)
{
	$electricity_type_marks = $this->manage_points("Electricity_Bill_1000");
}
else if($pesco_bill_value >= 1000)
{
	$electricity_type_marks = $this->manage_points("Electricity_Bill_1001");
}
}
else if($this->input->post("electricity_type") == "Own arrangment/Solar")
{
$electricity_type_marks = $this->manage_points("Electricity_Solar");
}

else if($this->input->post("electricity_type") == "No Facility")
{
$electricity_type_marks = $this->manage_points("Electricity_No");
}


///////////////////////////// Fuel /////////////////////////



$formArray['fuel_type']  = $this->input->post("fuel_type");

if($this->input->post("fuel_type") == "Wood")
{
$fuel_type_marks = $this->manage_points("Fuel_Wood");
}
if($this->input->post("fuel_type") == "LP Gas (Cylinder)")
{
$fuel_type_marks = $this->manage_points("Fuel_LPG");
}
if($this->input->post("fuel_type") == "Natural Gas (SNGPL)")
{
$fuel_type_marks = $this->manage_points("Fuel_NaturalGas");
}
if($this->input->post("fuel_type") == "Other/Coal")
{
$fuel_type_marks = $this->manage_points("Fuel_Coal");
}
if($this->input->post("fuel_type") == "No Facility")
{
$fuel_type_marks = $this->manage_points("Fuel_No");
}



///////////////////////////////// Water ///////////////////////////////


$formArray['water_type']  = $this->input->post("water_type");

if($this->input->post("water_type") == "Govt Water Supply")
{
$water_type_marks = $this->manage_points("Water_GovtSupply");
}
else if($this->input->post("water_type") == "Own Bore Hole with hand-pump")
{
$water_type_marks =$this->manage_points("Water_Ownboar");
}
else if($this->input->post("water_type") == "Community Bore Hole")
{
$water_type_marks = $this->manage_points("Water_CommunityBoar");
}
else if($this->input->post("water_type") == "Open/ Dug well")
{
$water_type_marks = $this->manage_points("Water_DugWell");
}
else if($this->input->post("water_type") == "River/Pond/Stream")
{
$water_type_marks = $this->manage_points("Water_River");
}
else if($this->input->post("water_type") == "No Facility")
{
$water_type_marks = $this->manage_points("Water_No");
}



$gettoalmarks =  
$category_disability_marks +  
$financial_assistance_marks + 
$gold_status_marks + 
$house_status_marks + 
$no_of_dependences_marks +
$Qualification_marks + 
$monthly_income_source_marks + 
//$other_source_of_income_marks + 
$bankaccount_value + 
$live_stock_marks + 
$mode_of_transportation_marks + 
$electricity_type_marks +
$fuel_type_marks +
$water_type_marks;


$formArray['total_marks']  = $gettoalmarks;

//$formArray['marks_2021'] = $gettoalmarks;   // Variable name added marks_2021, Changed on 25/05/2021 by Abbaas

/////////// Details Form Data /////////////////
 
 
		

$formArray_details['disable_type'] = $this->input->post("disable_type");
$formArray_details['financial_assistance_type'] = $this->input->post("financial_assistance_type");
$formArray_details['gold_status_value'] = $this->input->post("gold_status_value");

$formArray_details['house_status_type'] = $this->input->post("house_status_type");
$formArray_details['NoOfRooms'] = $this->input->post("NoOfRooms");
$formArray_details['HouseToilet'] = $this->input->post("HouseToilet");
$formArray_details['RentRange'] = $this->input->post("MonthlyRent");
$formArray_details['monthly_income_value'] = $this->input->post("monthly_income_value");



$formArray_details['other_source_income_value1'] =  $this->input->post("other_source_income_value2");
$formArray_details['other_source_income_value2'] = $this->input->post("other_source_income_value22");

$formArray_details['other_source_income_value11'] = $this->input->post("other_source_income_value2");
$formArray_details['other_source_income_value22'] = $this->input->post("other_source_income_value22");



$formArray_details['bank_account_number'] = $this->input->post("bank_account_number");
$formArray_details['account_balance'] = $this->input->post("bankaccount_value");


$formArray_details['live_stock_type'] = $this->input->post("live_stock_type");
$formArray_details['pesco_bill'] = $this->input->post("pesco_bill_value");


$formArray_details['add_date'] = date("Y-m-d");
$formArray_details['status'] = 1;
$formArray_details['District_Name'] =  $this->input->post("district_name");		// ""; //$district_name;   FOR SOME TIME

$result = $this->Dist_GA_mustahiq_reg_model->manage_addmustahiq_reg($formArray);

$user_id = $result['user_id'];
$results = $result['affected_rows'];

$formArray_details['user_id'] = $user_id;

$this->Dist_GA_mustahiq_reg_model->manage_addmustahiq_reg_details($user_id,$formArray_details);

// $this->session->set_flashdata('success','Record Added Successfully..!');


//$data = array('id'=>$row['district_id'],'groupSecretaryID'=>$row['user_id'],'entityName'=>$row['entity_name'],'username'=>$row['user_name'],'user_type'=>$row['role'],'district_name'=>$row['role']);


		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		$output = print_r($_POST, true);   //.print_r($_POST)
		file_put_contents('newfile.txt', $output);
		fwrite($myfile, $txt);

		fclose($myfile);			
			

	$myResponse->Result = "Successful";
    $myResponse->Description = "Record Added Successfully  ";
    echo json_encode($myResponse); 
	
	
if($results == 1)
{
$userLog = array();
$userLog['UserName'] = $this->input->post("addedby");
//$userLog['UserName'] = $this->session->userdata('user_name');	
$userLog['Activity']  = "Mustahiq registeration ".$this->input->post("mustahiq_name");
$userLog['Description']  = "new Mustahiq registered successfully";
$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");

$userLog['Day'] = date("d");
$userLog['Month'] = date("m");
$userLog['Year'] = date("Y");

$this->General_model->user_log($userLog); // Access Method

// $this->session->set_flashdata('success','Record updated Successfully..!');
// redirect(base_url('Dist_GA_mustahiq_reg'));
exit;
}
else
{
$userLog = array();
$userLog['UserName'] =  $this->input->post("addedby");
//$userLog['UserName'] = $this->session->userdata('user_name');	
$userLog['Activity']  = "pwd registeration not updated ".$this->input->post("mustahiq_name");
$userLog['Description']  = "pwd user register successfully";
$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
$userLog['Day'] = date("d");
$userLog['Month'] = date("m");
$userLog['Year'] = date("Y");
$this->General_model->user_log($userLog); // Access Method
// $this->session->set_flashdata('error','Record Not updated Please Try Again.');
// redirect(base_url('Dist_GA_mustahiq_reg'));
exit;
}


}




function manage_points($getType)
{
	
	
	
	$points = array(
	"Orphan"=>"5", 
	"SeniorCitizen"=>"2", 
	"Disable"=>"10",
	"WidowDivorced"=>"6",
	
	"Financial_Assiatance_No"=>"5",
	"Financial_Assiatance_Yes"=>"-50",
	
	"Gold_StatusNo"=>"8",
	"Gold_Status1Tola"=>"1",
	"Gold_Status2Tola"=>"-10",
	
	"House_Status_Concrete"=>"1",
	"House_Status_SemiConcrete"=>"2",
	"House_Status_Mud"=>"3",
	"House_Status_RentalHome"=>"4",
	"House_Status_RentalHome1000"=>"-2",
	"House_Status_Shelter"=>"8",
	
	
	"dependance_totals_less3"=>"2",
	"dependance_totals_less46"=>"5",
	"dependance_totals_less7"=>"8",
	"dependance_totals_nil"=>"0",
	
	"No_dependance_1daughter"=>"3",
	"No_dependance_2daughter"=>"4",
	"No_dependance_3daughter"=>"5",
	
	"Qualification_Primary"=>"5",
	"Qualification_Matric"=>"4",
	"Qualification_Intermediate"=>"2",
	"Qualification_Master"=>"0",
	"Qualification_Religious"=>"3",
	"Qualification_Illitrate"=>"6",
	
	"Source_of_income_jobless"=>"7",
	"Source_of_income_4000"=>"2",
	"Source_of_income_8000"=>"1",
	"Source_of_income_9000"=>"1",
	"Source_of_income_12000"=>"-30",
	
	"Other_Source_No"=>"3",
	"Other_Source_4kLess"=>"2",
	"Other_Source_11999"=>"1",
	"Other_Source_above12k"=>"-30",
	
	"Bank_account_No"=>"5",
	"Bank_account_4000"=>"2",
	"Bank_account_11999"=>"1",
	"Bank_account_12000"=>"-10",
	
	"Live_Stock_No"=>"8",
	"Live_Stock_Cow"=>"-10",
	"Live_Stock_Sheeps"=>"1",
	"Live_Stock_Both"=>"-20",
	
	"Transportation_Public"=>"7",
	"Transportation_Car"=>"-20",
	"Transportation_Raksha"=>"-10",
	"Transportation_Cart"=>"3",
	"Transportation_Cycle"=>"5",
	
	"Electricity_No"=>"5",
	"Electricity_Solar"=>"3",
	"Electricity_Bill_1000"=>"1",
	"Electricity_Bill_1001"=>"0",
	
	"Fuel_NaturalGas"=>"1",
	"Fuel_LPG"=>"2",
	"Fuel_Coal"=>"3",
	"Fuel_Wood"=>"4",
	"Fuel_No"=>"5",
	
	"Water_GovtSupply"=>"0",
	"Water_Ownboar"=>"1",
	"Water_CommunityBoar"=>"2",
	"Water_DugWell"=>"3",
	"Water_River"=>"4",
	"Water_No"=>"5",
	
	);
	
	//echo $value1 = $points["Source_of_income_8000"];
	//echo $value2 = $points["Source_of_income_12000"];
	//echo $value1+$value2;
	
	return $points[$getType];
	
	
	
}


	
/* 		
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
$formArray['LZCActualName']  = $get_lzc_nameqry->row('LZC_Name');	
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
// $gold_status_marks = $this->input->post("gold_status_value");

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
// $house_status_marks = $this->input->post("house_status_type");

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
// $no_of_dependences1  = $this->input->post("no_of_dependences");
// $no_of_dependences2  = $this->input->post("dependences_daughters");

$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;

// $no_of_dependences_marks = $this->input->post("dependences_daughters");

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

// $monthly_income_source_marks = $this->input->post("monthly_income_value");

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

// $other_source_of_income_marks = $this->input->post("other_source_income_value2");
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

// $other_source_of_income_marks = $this->input->post("other_source_income_value22");

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
// $bankaccount_value = $this->input->post("bankaccount_value_marks");
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
// $live_stock_marks = $this->input->post("live_stock_type");
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

// $mode_of_transportation_marks = $this->input->post("mode_of_transportation");

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

// $fuel_type_marks = $this->input->post("fuel_type");
// $water_type_marks = $this->input->post("water_type");


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


$formArray['total_marks']  = 40;
$formArray['marks_2021'] = 40;   // Variable name added marks_2021, Changed on 25/05/2021 by Abbaas

$formArray['comments']  = $this->input->post("comments");

$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;

$formArray_details['add_date'] = date("Y-m-d");
$formArray_details['status'] = 1;

$this->db->select("mustahiq_cnic");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where("mustahiq_cnic",str_replace("-", "", $this->input->post("mustahiq_cnic")));


$query=$this->db->get();

// echo $this->db->last_query();

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
	
	// echo $getmustahiq_data['category'];
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
	
	// $formArray['RelationWithGuardian']  = $this->input->post("guardian_relation");
	// $formArray_details['disable_type']  = $this->input->post("disable_type");
	// $formArray['financial_assistance']  = $this->input->post("financial_assistance");
	// $formArray_details['financial_assistance_type']  = $this->input->post("financial_assistance_type");
	
	if($getmustahiq_data['financial_assistance'] == "Yes")
	{
	$financial_assistance_marks = 0;								   
	}
	else if($getmustahiq_data['financial_assistance'] == "No")
	{
	$financial_assistance_marks = 5;
	}
	
	
	// $formArray['gold_status']  = $this->input->post("gold_status");
	// $formArray_details['gold_status_value']  = $this->input->post("gold_status_value");
	
	
	if($getmustahiq_data['gold_status'] == "No")
	{
	$gold_status_marks = 5;
	}
	else if($getmustahiq_data['gold_status'] == "Yes")
	{
	
		// $gold_status_marks = $this->input->post("gold_status_value");
		
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
	
	
	// $formArray['house_status']  = $this->input->post("house_status");
	$formArray_details['house_status_type']  = $this->input->post("house_status_type");
	
	if($getmustahiq_data['house_status'] == "No (Homeless)")
	{
	$house_status_marks = 5;
	}
	else if($getmustahiq_data['house_status'] == "Yes (House hold)")
	{
	
		// $house_status_marks = $this->input->post("house_status_type");
		
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
	
	// $formArray['no_of_dependences']  = $this->input->post("no_of_dependences");
	
	// $formArray_details['dependences_sons']  = $this->input->post("dependences_sons");
	// $formArray_details['dependences_daughters']  = $this->input->post("dependences_daughters");
	// $formArray_details['dependences_others']  = $this->input->post("dependences_others");
	
	
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
	// $no_of_dependences1  = $this->input->post("no_of_dependences");
	// $no_of_dependences2  = $this->input->post("dependences_daughters");
	
	$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;
	
	// $no_of_dependences_marks = $this->input->post("dependences_daughters");
	
	
	// $formArray_details['bank_account_number']  = $this->input->post("bank_account_number");
	// $formArray_details['account_balance']  = $this->input->post("bankaccount_value_marks");
	// $formArray_details['pesco_bill']  = $this->input->post("pesco_bill_value");
	
	
	$formArray['monthly_income_source']  = $this->input->post("monthly_income_source");
	$formArray_details['monthly_income_value']  = $this->input->post("monthly_income_value");
	
	if($getmustahiq_data['monthly_income_source'] == "Unemployed")
	{
	$monthly_income_source_marks = 5;
	}
	else if($getmustahiq_data['monthly_income_source'] == "Employed (Non Govt. Employee)")
	{
	
	// $monthly_income_source_marks = $this->input->post("monthly_income_value");
	
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
	
	
	// $formArray['other_source_of_income']  = $this->input->post("other_source_of_income");
	
	if($getmustahiq_data['other_source_of_income'] == "None")
	{
	$other_source_of_income_marks = 5;
	}
	else if($getmustahiq_data['other_source_of_income'] == "Agriculture")
	{
	
	// $other_source_of_income_marks = $this->input->post("other_source_income_value2");
	
	if($get_details_qry->row('other_source_income_value2') == "5000 Or Less")
	{
	$other_source_of_income_marks = 1;
	}
	else if($get_details_qry->row('other_source_income_value2') == "6000 or above")
	{
	$other_source_of_income_marks = 0;
	}
	
	// $formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value1");
	// $formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value2");
	
	
	}
	else if($getmustahiq_data['other_source_of_income'] == "Commercial")
	{
	
	// $other_source_of_income_marks = $this->input->post("other_source_income_value22");
	
	if($get_details_qry->row('other_source_income_value22') == "5000 Or Less")
	{
	$other_source_of_income_marks = 1;
	}
	else if($get_details_qry->row('other_source_income_value22') == "6000 or above")
	{
	$other_source_of_income_marks = 0;
	}
	
	// $formArray_details['other_source_income_value1']  = $this->input->post("other_source_income_value11");
	// $formArray_details['other_source_income_value2']  = $this->input->post("other_source_income_value22");
	}
	
	
	
	
	if($getmustahiq_data['bankaccount_value'] == "No")
	{
	$bankaccount_value = 5;
	// $formArray['bankaccount_value']  = $this->input->post("bankaccount_value");
	}
	else if($getmustahiq_data['bankaccount_value'] == "Yes")
	{
		// $bankaccount_value = $this->input->post("bankaccount_value_marks");
		
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
	
	
	
	
	
	
	// $formArray['live_stock']  = $this->input->post("live_stock");
	// $formArray_details['live_stock_type']  = $this->input->post("live_stock_type");
	
	if($getmustahiq_data['live_stock'] == "No")
	{
	$live_stock_marks = 5;
	}
	else if($getmustahiq_data['live_stock'] == "Yes")
	{
	// $live_stock_marks = $this->input->post("live_stock_type");
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
	
	
		
	
	// $formArray['mode_of_transportation']  = $this->input->post("mode_of_transportation");
	
	// $mode_of_transportation_marks = $this->input->post("mode_of_transportation");
	
	
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
	
	
	
	
	
	
	// $formArray['electricity_type']  = $this->input->post("electricity_type");
	
	
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
	
	// $formArray['fuel_type']  = $this->input->post("fuel_type");
	
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
	
	// $formArray['water_type']  = $this->input->post("water_type");
	
	// $fuel_type_marks = $this->input->post("fuel_type");
	// $water_type_marks = $this->input->post("water_type");
	
	
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
	} */
	

	/* function manage_mustahiq_marks_2021()  // NOT IN USE
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
	 */


}