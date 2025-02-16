<?php
ini_set('memory_limit', '50000M');
defined('BASEPATH') OR exit('No direct script access allowed');

 class ResponseResult{
		public $Result;
		public $Description;
	}
 class ResponseResultVersion{
		public $Result;
		public $Description;
		public $VersionNo;
	}
 class ResponseUsers{
		public $Result;
		public $Description;
		public $userid;
		public $personname;
		public $district_id;
		public $district_name;	
 }
 
  class ResponseDropdowns{
		public $Result;
		public $Description;
 }

 class ShowEnteredData{
		public $Result;
		public $Description;
		public $LZCName;
		public $TargetNOBs;
		public $RegNOBs;
		public $RemNOBs;	
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
//$this->load->view('district/dist_ga_mustahiq_reg',$data);
}


function GA_Mustahiqeen_Save()
{
		$myResponse = new  ResponseResult();
		
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

                // ******************** ADDED for Getting District, LZC and PErson Name (05Oct2020)*****************       
				
				$district_id  =  $this->input->post("district_id");
				$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
		
				$LZC_id  = $this->input->post("LZC_name");
				$get_lzc_nameqry = $this->db->select('*')->from('lzc_list')->where('id',$LZC_id)->get();
		
				$get_gsnameqry = $this->db->select('*')->from('lzc_list')->where('id',$LZC_id)->where('district_id',$district_id)->get();
				
				$formArray['District_Name'] = $get_dist_name->row('district_name');	
				$formArray['LZCActualName']  = $get_lzc_nameqry->row('lzc_name');	
				$formArray['EntryUserName']  = $get_gsnameqry->row('gs_name');
				
				// ******************** ADDED for Getting District, LZC and PErson Name (05Oct2020)*****************
				
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
							if  ($this->input->post("age") < 16)
								$categorymarks = 10;
							else
								$categorymarks = 1;	
							$priority = 4;
						}
						else if($this->input->post("category") == "Poor")
						{
							
							if  ($this->input->post("age") < 30)
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
				
				
				
				$formArray['RelationWithGuardian']  = $this->input->post("RelationWithGuardian");
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

				if($this->input->post("house_status") == "No (Homeless)")
				{
				$house_status_marks = 5;
				}
				else if($this->input->post("house_status") == "Yes (House hold)")
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

				if($this->input->post("dependences_daughters") == "3 or Above Adult(Un-Married)")
					{
						$no_of_dependences2 = 5;	
					}
					else if($this->input->post("dependences_daughters") == "2 Adult(Un-Married)")
					{
						$no_of_dependences2 = 4;	
					}
					else if($this->input->post("dependences_daughters") == "1 Adult(Un-Married)")
					{
						$no_of_dependences2 = 3;	
					}
					else if($this->input->post("dependences_daughters") == "None")
					{
						$no_of_dependences2 = 0;	
					}
			//	$no_of_dependences1  = $this->input->post("no_of_dependences");
			//	$no_of_dependences2  = $this->input->post("dependences_daughters");

				$no_of_dependences_marks = $no_of_dependences1 + $no_of_dependences2;



				$formArray_details['bank_account_number']  = $this->input->post("bank_account_number");
				$formArray_details['account_balance']  = $this->input->post("bankaccount_value_marks");
				$formArray_details['pesco_bill']  = $this->input->post("pesco_bill_value");
				
				
				
				
				$formArray['monthly_income_source']  = $this->input->post("monthly_income_source");
				$formArray_details['monthly_income_value']  = $this->input->post("monthly_income_value");

				if($this->input->post("monthly_income_source") == "Unemployed")
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
				//	$live_stock_marks = $this->input->post("live_stock_type");
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
				
				
				
				
				$formArray['comments']  = $this->input->post("comments");


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

				$formArray['year']  = '2020-21';
                $comments = $this->input->post("comments");
				$formArray['total_marks']  = $gettoalmarks;
				$formArray['marks_2021'] = $gettoalmarks;   // Variable name added marks_2021, Changed on 25/05/2021 by Abbaas
		


				$formArray_details['add_date'] = date("Y-m-d");
				$formArray_details['status'] = 1;
				
				$formArray['add_date'] = date("Y-m-d");
				$formArray['status'] = 1;
				$formArray['Device'] = "Mobile";
				$formArray['installment'] = '1&2';
				$formArray['tobeupdated	'] = 1;
				$formArray['district_id']  = $this->input->post("district_id");
				$formArray['addedby']  = 0;  //$this->input->post("addedby");
				
				
	
		$this->db->select("mustahiq_cnic,District_Name,LZCActualName,EntryUserName");
		$this->db->from("guzara_allowance_mustahiqeen");
		$this->db->where("mustahiq_cnic",$this->input->post("mustahiq_cnic"));
													 
		$query=$this->db->get();
		$row = $query->row_array();
		$data = array('id'=>$row['id'],'district_name'=>$row['district_name'],'username'=>$row['username'],'user_type'=>$row['role']);
		if($query->num_rows() > 0)
		{
			$myResponse->Result = "Failed";
			$myResponse->Description = "*** Record already Exist..!*** \n District : ".$row['District_Name']."\n LZC Name : ".$row['LZCActualName']."\n Entered By : ".$row['EntryUserName'];
			echo json_encode($myResponse);
			// 9284175487193
		}
		else
		{
			$getid = $this->Dist_GA_mustahiq_reg_model->manage_mustahiq_reg_func($formArray);
			$formArray_details['user_id'] = $getid;
		
		
			$this->Dist_GA_mustahiq_reg_model->manage_mustahiq_reg_details($getid,$formArray_details);
	
		
		$myResponse->Result = "Successful";
		$myResponse->Description = "Record Added Successfully";
		
		echo json_encode($myResponse);
		
		
		}
		
}


function Login()
{
	    $username   = $this->input->post("username");
		$password   = $this->input->post("password");
		$version    = $this->input->post("Version");
		$macaddress = $this->input->post("MacAddress");
		$imeino     = $this->input->post("IMEINO");
		$LangLat    = $this->input->post("LangLat");
		
		$chk_account = $this->User_login_model->chk_account($username,$password, 'gs');
		$chk_version = $this->User_login_model->UpdateUserInfo($username,$version,$macaddress,$imeino,$LangLat);
		$userid=$this->session->userdata('zakat_paid_staff_id');
		$district_id=$this->session->userdata('district_id');
		
		$getDistrictName =       $this->Dist_login_model->getDistrictName($district_id);
		
		$data['get_all_lzc'] = $this->Dist_login_model->get_all_lzc($userid);
		
		$myResponse = new  ResponseUsers();
		
		if($chk_account == "1"){
		$myResponse->Result = "Successful";
		$myResponse->Description = "User Logged In Successfully";
		$myResponse->userid=$this->session->userdata('zakat_paid_staff_id');
		$myResponse->personname= $this->session->userdata('entity_name');
		$myResponse->district_id=$this->session->userdata('district_id');
		$myResponse->district_name=$getDistrictName;
		$myResponse->gs_lzc_name=$data['get_all_lzc'];
		}
		else
		{
		$myResponse->Result = "Failed";
		$myResponse->Description = "ACCOUNT LOCKED by ZMIS Secretariat OR User Logged In Failed, Please use Group Secretary CNIC No as Username";
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


 // WORKING ON IT
function ZakatEntryForm()
{
	
		$myResponse = new  ResponseResult();
		
			$formArray = array();
			
		$formArray['District_Name'] =  $this->input->post("District_Name");      
		$formArray['LZC_Name'] =  $this->input->post("LZC_Name");     		
		$formArray['GS_Name'] =  $this->input->post("GS_Name");       
		$formArray['GS_Username'] =  $this->input->post("GS_Username");
		$formArray['FinYear'] =  $this->input->post("FinYear");       
		$formArray['InstallmentNo'] =  $this->input->post("InstallmentNo");       
		$formArray['ChairmanName'] =  $this->input->post("ChairmanName");       
		$formArray['ChairmanFather'] =  $this->input->post("ChairmanFather");     
		$formArray['ChairmanCNIC'] =  $this->input->post("ChairmanCNIC");     	
		$formArray['ChairmanAppointDate'] =  $this->input->post("ChairmanAppointDate");     	
		$formArray['ChairmanDoB'] =  $this->input->post("ChairmanDoB");     	
		$formArray['ChairmanPhone1	'] =  $this->input->post("ChairmanPhone1");       
		$formArray['ChairmanPhone2'] =  $this->input->post("ChairmanPhone2");       
		$formArray['FormHandedOver'] =  $this->input->post("FormHandedOver");       
		$formArray['CNICHandedOver'] =  $this->input->post("CNICHandedOver");       
		$formArray['Picture1'] =  $this->input->post("Picture1");       
		$formArray['Picture2'] =  $this->input->post("Picture2");       
		$formArray['Picture3'] =  $this->input->post("Picture3");       
		$formArray['EntryDateTime'] =  date("Y-m-d H:i:s");       
		$formArray['EnteredBy'] =  $this->input->post("EnteredBy");       
		$formArray['Device'] = "Mobile";
		$formArray['status'] = "1";
	
			$getid = $this->Dist_GA_mustahiq_reg_model->manage_chairman_dataentryform($formArray);
	
		$myResponse->Result = "Successful";
		$myResponse->Description = "Record Added Successfully";
		
		echo json_encode($myResponse);
		
	
}


function VerifyCNIC()
{
		$myResponse = new  ResponseResult();
		$cnic      = $this->input->post("cnic");
		$ChkCNIC = $this->db->select('mustahiq_cnic,District_Name,LZCActualName,EntryUserName')->from('guzara_allowance_mustahiqeen')->
		$this->db->where("mustahiq_cnic",$cnic);
	    $query=$this->db->get();
	    if($query->num_rows()>0)
	    {

		$myResponse = new  ResponseResult();
			$myResponse->Result = "Failed";
			$myResponse->Description = "*** Record Already Exist..!*** \n District : ".$row['District_Name']."\n LZC Name : ".$row['LZCActualName']."\n Entered By : ".$row['EntryUserName'];
			
		}		
		else
		{
			$myResponse->Result = "Successful";
			$myResponse->Description = "No Record found, Please carry on Data Entry ";
		}
		echo json_encode($myResponse);
}


function SavePicture()
{
/*Face picture code*/
$myResponse = new  ResponseResult();
$allowed_image_extension = array("gif","jpg","png","jpeg","JPEG","JPG","PNG","GIF");

if($_FILES["pictureurl"]["tmp_name"])
{
$path = $_FILES['pictureurl']['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
if(! in_array($file_extension, $allowed_image_extension)) 
{
$myResponse->Result = "Error";
$myResponse->Description = "Invalid Image Format ";
echo json_encode($myResponse);
}
else if($_FILES["pictureurl"]["size"] > 409600)
{
$myResponse->Result = "Error";
$myResponse->Description = "Invalid Image Size Exceeded then 400KB ";
echo json_encode($myResponse);
}
else
{

$student_cnic = $this->input->post("cnicno");
$picture_type =  $this->input->post("picture_type");
$config_cnicFront['upload_path'] = 'assets/zakatentryform/'; 
$config_cnicFront['allowed_types'] = 'jpg|jpeg|png|gif'; 
$config_cnicFront['file_name'] = $student_cnic."_".$picture_type.".jpg";        //"_".$_FILES["pictureurl"]['name']; Changed on 03-Jun-2021 by ABBAS

$this->load->library('upload', $config_cnicFront); 
$this->upload->initialize($config_cnicFront);
$this->upload->do_upload('pictureurl');
$fileData = $this->upload->data();
$formArray['cnicFront']  = $fileData['file_name'];


$myResponse->Result = "Successful";
$myResponse->Description = "Picture Uploaded Successfully ";

echo json_encode($myResponse);
}
}
else
{
$myResponse->Result = "Failure";
$myResponse->Description = "Picture Not Uploaded Successfully ";
}


}

function ShowGSDashboard()
{
	    $username   = $this->input->post("username");
		
		$data['get_gs_dashboard'] = $this->Dist_login_model->get_gs_dashboard($username);
		
		$myResponse = new  ResponseUsers();
		
		
		$myResponse->Result = "Successful";
		$myResponse->Description = "User Logged In Successfully";
		
		$myResponse->gs_Dashboard=$data['get_gs_dashboard'];
		// }
		// else
		// {
		// $myResponse->Result = "Failed";
		// $myResponse->Description = "ACCOUNT LOCKED by ZMIS Secretariat OR User Logged In Failed, Please use Group Secretary CNIC No as Username";
		// $myResponse->userid="";
		// $myResponse->personname="";
		// $myResponse->district_id="";
		// $myResponse->district_name="";
		// $myResponse->lzc_name="";
		
		//}
				  		
		echo json_encode($myResponse);
	
}

function ShowLZCBeneficiariesData()
{
	    $lzcname   = $this->input->post("lzcname");
		
		$data['get_lzc_data'] = $this->Dist_login_model->get_lzc_Data($lzcname);
		
		$myResponse = new  ResponseUsers();
		
		
		$myResponse->Result = "Successful";
		$myResponse->Description = "User Logged In Successfully";
		
		$myResponse->lzc_data=$data['get_lzc_data'];
		// }
		// else
		// {
		// $myResponse->Result = "Failed";
		// $myResponse->Description = "ACCOUNT LOCKED by ZMIS Secretariat OR User Logged In Failed, Please use Group Secretary CNIC No as Username";
		// $myResponse->userid="";
		// $myResponse->personname="";
		// $myResponse->district_id="";
		// $myResponse->district_name="";
		// $myResponse->lzc_name="";
		
		//}
				  		
		echo json_encode($myResponse);
	
}

function ShowLZCSelectedData()
{
	    $lzcname   = $this->input->post("lzcname");
		
		$data['get_lzc_selected_data'] = $this->Dist_login_model->get_lzc_selected_data($lzcname);
		
		$myResponse = new  ResponseUsers();
				
		$myResponse->Result = "Successful";
		$myResponse->Description = "User Logged In Successfully";
		
		$myResponse->lzc_data=$data['get_lzc_selected_data'];
	
		echo json_encode($myResponse);
	
}

function GetDropDownList() // Still in Progress
{
	    $category   = $this->input->post("category");
		
		$data['get_dropdown_values'] = $this->Dist_login_model->get_DD_Values($category);
		
		$myResponse = new  ResponseDropdowns();
		
		
		$myResponse->Result = "Successful";
		$myResponse->Description = "User Logged In Successfully";
		
		$myResponse->DropdownName=$category;
		$myResponse->DropdownValues=$data['get_dropdown_values'];
			  		
		echo json_encode($myResponse);
	
}

function SetVersion()
{
		$username      = $this->input->post("Username");
		$versionno   = $this->input->post("VersionNo");
		$appname   = $this->input->post("AppName");
		
		$chk_appversion = $this->User_login_model->SetVersion($username,$versionno,$appname);
		$myResponse = new  ResponseResult();
		if ($chk_appversion=="1"){
		
			$myResponse->Result = "Successful";
			$myResponse->Description = "Version Updated Successfully";
		}
		else
		{
			$myResponse->Result = "Failed";
			$myResponse->Description = "Version not available for updating ";
		}
		echo json_encode($myResponse);
}
}