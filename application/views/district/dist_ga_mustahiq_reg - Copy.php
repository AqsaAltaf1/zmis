<?php
$userid = $this->session->userdata('id');
$runpzf_query = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query->row('pza_amount');
$runpza_query = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->get();
$total_pzareceived_amount = $runpza_query->row('amount_allocated');
$gettotalnet_balance =  $total_pzfreceived_amount - $total_pzareceived_amount;

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('pza/include/title');?></title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Select 2 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
.text_align{
text-align: right;
}
.div_align {
align-items: right;
}
</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


<?php $this->load->view('district/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('district/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('district/include/user_manue');?> -->

<!-- Sidebar Menu -->

<?php $this->load->view('district/include/sidebar');?>

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 202px;">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">

<?php 
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');
if(isset($success))
{
?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success!</strong> <?php echo $success;?>
</div>
<?php
}
else if(isset($error))
{
?>
<div class="alert alert-danger alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>error!</strong> <?php echo $error;?> 
</div>
<?php	
}
?>


<div class="row mb-2">
<div class="col-sm-8">
<h3 class="m-0 text-dark">Guzara Allowance Mustahiqeen Registration (LZ-19)</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year ?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="lz_19-tab" data-toggle="pill" href="#lz_19" role="tab" aria-controls="lz_19" aria-selected="true">Guzara Allowance Mustahiq Entry Form</a>
</li>
</ul>
</div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="lz_19" role="tabpanel" aria-labelledby="lz_19-tab">

<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<!-- For Card heading and placing line <div class="card-header"></div> -->
<!-- /.card-header -->
<div class="card-body">
<div class="row"></div>
<form action="<?php echo base_url(); ?>Dist_GA_mustahiq_reg/guzara_allowance_mustahiqeen/" method="post" enctype="multipart/form-data">


<!--<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B<span class="required" style="color: red">*</span>
</label>
<input type="text" name="mustahiq_cnic" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask placeholder="Enter CNIC or Form-B to Fetch Patient's Personal Information">
<input style="margin-left:5px;" type="submit" class="btn btn-success col-md-2" name="sbmitbtn" value="Submit">
<div class="col-md-6"></div>
</div>-->




<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Mustahiq Name <span class="required">*</span>
</label>
<input type="text" name="mustahiq_name" id="m_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name">

<label class="col-md-2" style="color:#f00;" for="">Father/Guardian Name<span class="required">*</span>
</label>
<input type="text" name="father_name" id="f_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Father or Guardian Name">
</div>

<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">CNIC/Form-B<span class="required">*</span>
</label>

<input required type="text" name="mustahiq_cnic" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask>

<label class="col-md-2" style="color:#f00;" for="">Contact #<span class="required">*</span>
</label>

<input required type="text" name="contact_number" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "9999-9999999"' data-mask>


</div>






<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Gender<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="lzc" name="gender">
<option value="">---Select Gender---</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>

<label class="col-md-2" style="color:#f00;" for="">LZC Name<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="lzc" name="LZC_name" required="">
<option value="">---Select LZC---</option>

<?php
$i=1;
if(!empty($get_all_lzc))
{
foreach($get_all_lzc as $get_lzcname)
{
?>

<?php
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen_payments");
$this->db->where("financial_Year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$userid);
$this->db->where("lzc_id",$get_lzcname['id']);
$getpayment_status = $this->db->get()->num_rows();
if($getpayment_status == 0)
{
?>

<option value="<?php echo $get_lzcname['id']?>"><?php echo $get_lzcname['lzc_name'];?></option>

<?php
}
?>



<?php 
$i++;
}
}
?>




</select>
</div>

<div class="row form-group">
<label class="col-md-2" style="color:#f00;">Postal Address<span class="required">*</span>
</label>
<input type="text" name="postal_address" id="" value="" class="form-control col-md-4 col-xs-12" placeholder="Postal Address">

<label class="col-md-2" style="color:#f00;">Permanent Address<span class="required">*</span>
</label>
<input type="text" name="permanent_address" id="" value="" class="form-control col-md-4 col-xs-12" placeholder="Permanent Address">
</div>

<div class="row form-group">
<label class="col-md-2" for="" style="color:#f00;">Date Of Birth<span class="required">*</span>
</label>
<input type="date" name="dob" onChange="findage(this.value);" id="dob" value="" class="form-control col-md-4 col-xs-12" placeholder="Date Of Birth">

<label class="col-md-2" for="" style="color:#f00;">Age<span class="required">*</span>
</label>
<input type="text" name="age" id="age" min="1" value="" class="form-control col-md-4 col-xs-12" placeholder="Age of Mustahiq">
</div>

<div class="row form-group">

<label class="col-md-2" for="" style="color:#f00;">Marital Status<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="marital_status" name="marital_status">
<option value="">---Select Marital Status---</option>
<option value="Married">Married</option>
<option value="Un-Married">Un-Married</option>
</select>



<label class="col-md-2" style="color:#f00;" for="">Istehqaq No:<span class="required">*</span>
</label>

<input required type="text" name="istehqaqnumber" class="form-control col-md-4 col-xs-12">


</div>


<div class="row form-group">
<label class="col-md-2" for="">Category<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="category" name="category">
<option value="">---Select Category---</option>
<option value="Orphan">Orphan</option>
<option value="Poor">Poor</option>
<option value="Widow">Widow</option>
<option value="Disable">Disable</option>
</select>
</div>

<div id="guardian_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Relation with Guardian:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="guardian_relation" name="guardian_relation">
<option value="">---Select One---</option>
<option value="Mother">Mother</option>
<option value="Uncle/Aunt">Uncle/Aunt</option>
<option value="Grand Parents">Grand Parents</option>
<option value="Maternal Relation">Maternal Relation</option>
</select>
</div>
</div>




<div id="disable_status_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">If Disable then Type<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="disable_type" name="disable_type">
<option value="">---Select Disability Type---</option>
<option value="Physical">Physical</option>
<option value="Visual">Visual</option>
<option value="Deaf & Dum">Deaf & Dum</option>
<option value="Mental">Mental</option>
</select>
</div>
</div>




<div class="row form-group">
<label class="col-md-2" for="">Financial Assistance<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="finan_assiatance" name="financial_assistance">
<option value="">---Financial Assistance Availed---</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</div>

<div id="financial_status_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then from<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="financial_assistance_type" name="financial_assistance_type">
<option value="">---Select---</option>
<option value="BISP">BISP</option>
<option value="Bait-ul-Maal">Bait-ul-Maal</option>
<option value="Ehsaas">Ehsaas</option>
<option value="Zakat Fund">Zakat Fund</option>
</select>
</div>
</div>




<div class="row form-group">
<label class="col-md-2" for="">Gold Status<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="gold_status" name="gold_status">
<option value="">---Select---</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</div>

<div id="gold_status_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="gold_status_value" name="gold_status_value">
<option value="">---Select Gold Quantity---</option>
<option value="1 Tola or Less"> 1 Tola or Less</option>
<option value="2-3 Tolas"> 2-3 Tolas</option>
<option value="4-5 Tolas"> 4-5 Tolas</option>
<option value="6-7 Tolas"> 6-7 Tolas</option>
</select>
</div>
</div>



<div class="row form-group">
<label class="col-md-2" for="">House Status<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="house_status" name="house_status">
<option value="">---Select---</option>
<option value="Yes">Yes (House Hold)</option>
<option value="No">No (Homeless)</option>
</select>
</div>


<div style="display:none;" id="house_status_div">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then from<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="house_status_type" name="house_status_type">
<option value="">---Select---</option>
<option value="Concrete (Pakka)">Concrete (Pakka)</option>
<option value="Semi Pakka">Semi Pakka</option>
<option value="Kacha">Kacha</option>
<option value="Rental/Shelter">Rental/Shelter</option>
</select>
</div>
</div>


<div id="marital_status_div" style="display:none;">



<div class="row form-group">
<label class="col-md-2" for="">No of Dependences:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="" name="no_of_dependences">
<option value="">---Select---</option>
<option value="3 or Less">3 or Less</option>
<option value="4-6">4-6</option>
<option value="Above 7">Above 7</option>
</select>
</div>



<div class="row form-group" id="financial_status">
<label class="col-md-2" for="">Son<span class="required">(Below 18)</span>
</label>
<input type="number" class="form-control col-md-2 col-xs-12" id="m_status" name="dependences_sons">
<label class="col-md-3" for="">Doughters<span class="required">(Un-married)</span>
</label>

<select class="form-control col-md-2 col-xs-12" id="" name="dependences_daughters">
<option value="None">No Adult Un-Married Doughter </option>
<option value="3 or Above Adult (Un-married)">3 or Above Adult (Un-married) Doughters</option>
<option value="2 Adult (Un-married)">2 Adult (Un-married) Doughters</option>
<option value="1 Adult (Un-married)">1 Adult (Un-married) Doughter</option>
</select>

<!--<input type="number" class="form-control col-md-2 col-xs-12" id="category" name="category">-->
<label class="col-md-1" for="other">Others<span class="required">()</span>
</label>
<input type="number" class="form-control col-md-2 col-xs-12" id="" name="dependences_others">
</div>





</div>









<div class="row form-group">
<label class="col-md-2" for="">Monthly Income Source:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="monthly_income_source" name="monthly_income_source">
<option value="">---Select---</option>
<option value="Yes">Employed (Not Govt. Employed)</option>
<option value="No">Unemployed</option>
</select>
</div>


<div id="monthly_income_source_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Monthly Income:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="" name="monthly_income_value">
<option value="">---Select---</option>
<option value="4000 Or Less">4000 Or Less</option>
<option value="8000 Or Less">8000 Or Less</option>
<option value="12000 Or Less">12000 Or Less</option>
</select>
</div>
</div>



<div class="row form-group">
<label class="col-md-2" for="">Other Source of Income:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="Other_source_income" name="other_source_of_income">
<option value="">---Select---</option>
<option value="None">None</option>
<option value="Agriculture">Agriculture</option>
<option value="Commercial">Commercial</option>
</select>
</div>

<div id="Other_source_income_marla" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">No of Marla<span class="required">*</span>
</label>
<input type="number" min="1" class="form-control col-md-4 col-xs-12" id="category" name="other_source_income_value1">
<label class="col-md-2" for="">Monthly Income Rs.<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="" name="other_source_income_value2">
<option value="">---Select Amount---</option>
<option value="5000 Or Less">5000 Or Less</option>
<option value="6000 or above">6000 or above</option>
</select>
</div>
</div>

<div id="Other_source_income_shops" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">No of Shops<span class="required">*</span>
</label>
<input type="text" class="form-control col-md-4 col-xs-12" id="m_status" name="other_source_income_value11">
<label class="col-md-2" for="">Monthly Income Rs.<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="" name="other_source_income_value22">
<option value="">---Select Amount---</option>
<option value="1">5000 Or Less</option>
<option value="0">6000 or above</option>
</select>
</div>
</div>




<div class="row form-group">
<label class="col-md-2" for="">Bank Account:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="bankaccount_value" name="bankaccount_value">
<option value="">---Select---</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</div>

<div id="bankaccount_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Account Number<span class="required">*</span>
</label>
<input type="number" class="form-control col-md-4 col-xs-12" id="" name="bank_account_number">
<label class="col-md-2" for="">Account Balance .<span class="required">*</span>
</label>

<select class="form-control col-md-4 col-xs-12" id="" name="bankaccount_value_marks">
<option value="4000 or less"> 4000 or less</option>
<option value="4001-8000">4001-8000</option>
<option value="12000 or Above"> 12000 or Above</option>
</select>

</div>
</div>

<div class="row form-group">
<label class="col-md-2" for="">Live Stock:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="live_stock" name="live_stock">
<option value="">---Select---</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</div>


<div id="live_stock_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Select Type:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="" name="live_stock_type">
<option value="">---Select---</option>
<option value="Cow/Buffalos">Cow/Buffalos</option>
<option value="Sheeps/Goats">Sheeps/Goats</option>
<option value="Both">Both</option>
</select>
</div>
</div>



<div class="row form-group">
<label class="col-md-2" for="">Mode of Transportation<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="" name="mode_of_transportation">
<option value="">---Select---</option>
<option value="Car">Car</option>
<option value="Motorcycle / Rickshaw">Motorcycle / Rickshaw</option>
<option value="Cart">Cart</option>
<option value="Bicycle">Bicycle</option>
<option value="Public Transport">Public Transport</option>
<option value="None">None</option>
</select>
</div>



<div class="row form-group">
<label class="col-md-2" for="">Utilities Coverage<span class="required">*</span>
</label>

<div class="col-md-4">
<label for="">Electricity</label>
<br>
<input type="radio" onclick="doSomething(1);" name="electricity_type" value="Provided by Govt (WAPDA)">&nbsp;&nbsp;Provided by Govt (WAPDA)<br>

<div id="pesodiv" style="display:none;">
<input type="text" name="pesco_bill_value" class="form-control" placeholder="Enter Monthly Average Bill">
</div>
<input type="radio" onclick="doSomething(2);" name="electricity_type" value="Own arrangement (Solar, UPS, etc)">&nbsp;&nbsp;Own arrangement (Solar, UPS, etc)<br>
<input type="radio" onclick="doSomething(3);" name="electricity_type" value="No electricity">&nbsp;&nbsp;No electricity<br>
<br>


</div>

<div class="col-md-3">
<label for="">Fuel</label>
<br>
<input type="radio" name="fuel_type" value="Wood">&nbsp;&nbsp;Wood<br>
<input type="radio" name="fuel_type" value="LP Gas (Cylinder)">&nbsp;&nbsp;LP Gas (Cylinder)<br>
<input type="radio" name="fuel_type" value="Natural Gas (SNGPL)">&nbsp;&nbsp;Natural Gas (SNGPL)<br>
<input type="radio" name="fuel_type" value="Other/Coal">&nbsp;&nbsp;Other/Coal<br>
<input type="radio" name="fuel_type" value="Nil">&nbsp;&nbsp;Nil<br>



</div>

<div class="col-md-3">
<label for="">Water</label>

<br>
<input type="radio" name="water_type" value="Govt Water Supply">&nbsp;&nbsp;Govt Water Supply<br>
<input type="radio" name="water_type" value="Own Bore Hole with hand-pump">&nbsp;&nbsp;Own Bore Hole with hand-pump<br>
<input type="radio" name="water_type" value="Community Bore Hole">&nbsp;&nbsp;Community Bore Hole<br>
<input type="radio" name="water_type" value="Open / Dug well">&nbsp;&nbsp;Open / Dug well<br>
<input type="radio" name="water_type" value="River / Pond / Stream">&nbsp;&nbsp;River / Pond / Stream<br>
<input type="radio" name="water_type" value="Nil">&nbsp;&nbsp;Nil<br>





</div>




</div>


<div class="row form-group">
<label class="col-md-2" for="">Remarks/Description<span class="required">*</span>
</label>
<textarea cols="10" rows="5" class="form-control col-md-10 col-xs-12" id="comments" name="comments">
	
</textarea>
</div>

<hr>

<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-2"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>


</div>

<input type="hidden" name="year" value="<?php echo $getfinancial_year;?>">
<input type="hidden" name="installment" value="<?php echo $getfinancial_installment;?>">
<input type="hidden" name="computer" value="Computer">
</form>


</div>
<!-- /.card-body -->
</div>
</div>
</div>



<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pza_Institution_reg/manage_institution_reg_hospital/" enctype="multipart/form-data" novalidate>      
<h3>Add New LZCs To The Database</h3>
<br>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Select District <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">

<select class="form-control col-md-8" id="distt" name="district_idget">
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_districtslist))
{
foreach($get_all_districtslist as $getdistricts)
{
?>
<option value="<?php echo $getdistricts['id']?>"><?php echo $getdistricts['district_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Tehsil Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="tehsil_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="tehsil_name" placeholder="Please Enter Hospital Name" required type="text">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">LZC Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="lzc_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="lzc_name" placeholder="Please Enter Hospital Name" required type="text">
</div>
</div>
<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">LZC Code <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="lzc_code" type="text" name="lzc_code" placeholder="Please Enter Address" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
</div>
</div>

<div class="ln_solid"></div>
<div class=" row form-group">
<div class="col-md-12 col-md-offset-3">
<input type="submit" name="submitbtn" class="btn btn-success">
<button type="reset" class="btn btn-primary float right">Reset</button>
</div>
</div>
</form> 
</div>
<div class="tab-pane fade" id="lz_11" role="tabpanel" aria-labelledby="lz_11-tab">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Guzara Allowance LZ-11 Mustahiqeen List of District_____ during Year:___</h3>
<!-- Print list -->
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<div class="row"></div>
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Cell #</th>
<th>LZC</th>
<th>Category</th>
<th>A/C#</th>
<th>Score</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
</tbody>
</table>
</div>
<!-- /.card-body -->
</div>
</div>

<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab"></div>



</div>
</div>
<!-- /.card -->
</div>
</div>
</div>

<div class="row"></div>

<!-- Table no 2 -->
<div class="row"></div>

<!-- Table No 3 -->
<div class="row"></div>
<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->

<?php $this->load->view('pza/include/footer');?>


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>


<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>


<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>



<!-- For data tables -->
<script>

// ------------- Category -------------//

$('#category').on('change',function(){
if( $(this).val()==="Disable"){
$("#disable_status_div").slideDown()
$("#guardian_div").slideUp()
}
else if ( $(this).val()==="Orphan")
{
$("#guardian_div").slideDown()
$("#disable_status_div").slideUp()
}
else if($(this).val()==="Poor")
{
$("#guardian_div").slideUp()
$("#disable_status_div").slideUp()
}
else if($(this).val()==="Widow")
{
$("#guardian_div").slideUp()
$("#disable_status_div").slideUp()
}
});

// ------------- Financial Assistance -------------//

$('#finan_assiatance').on('change',function(){
if( $(this).val()==="Yes"){
$("#financial_status_div").slideDown()
}
else{
$("#financial_status_div").slideUp()
}
});


// ------------- Gold Status -------------//

$('#gold_status').on('change',function(){
if( $(this).val()==="Yes"){
$("#gold_status_div").slideDown()
}
else{
$("#gold_status_div").slideUp()
}
});




// ------------- House Status -------------//

$('#house_status').on('change',function(){
if( $(this).val()==="Yes"){
$("#house_status_div").slideDown()
}
else{
$("#house_status_div").slideUp()
}
});

// ------------- Monthly Income Source -------------//

$('#monthly_income_source').on('change',function(){
if( $(this).val()==="Yes"){
$("#monthly_income_source_div").slideDown()
}
else{
$("#monthly_income_source_div").slideUp()
}
});


// ------------- Other Source of Income -------------//
$('#Other_source_income').on('change',function(){
if( $(this).val()==="Agriculture")
{
$("#Other_source_income_marla").slideDown();
$("#Other_source_income_shops").slideUp();
}
else if($(this).val()==="Commercial")
{
$("#Other_source_income_shops").slideDown();
$("#Other_source_income_marla").slideUp();
}
else if($(this).val()==="None")
{
$("#Other_source_income_marla").slideUp();
$("#Other_source_income_shops").slideUp();	
}
});


// ------------- Live Stock -------------//

$('#live_stock').on('change',function(){
if( $(this).val()==="Yes"){
$("#live_stock_div").slideDown()
}
else{
$("#live_stock_div").slideUp()
}
});



// -------------  passport -------------//

$('#passport_number').on('change',function(){
if( $(this).val()==="Yes"){
$("#passport_div").slideDown()
}
else{
$("#passport_div").slideUp()
}
});



// -------------  bank account -------------//

$('#bankaccount_value').on('change',function(){
if( $(this).val()==="Yes"){
$("#bankaccount_div").slideDown()
}
else{
$("#bankaccount_div").slideUp()
}
});


// -------------  martial status -------------//

$('#marital_status').on('change',function(){
if( $(this).val()==="Married"){
$("#marital_status_div").slideDown()
}
else{
$("#marital_status_div").slideUp()
}
});




$('#marital_status').on('change',function(){
if( $(this).val()==="Married"){
$("#marital_status_div").slideDown()
}
else{
$("#marital_status_div").slideUp()
}
});


function doSomething(getvalue)
{
	if(getvalue == 1){
	$("#pesodiv").slideDown();
	}
	else{
	$("#pesodiv").slideUp();
	}

}

function findage(getvalue)
{
var birthDate = getvalue;
var d = new Date(birthDate);
var mdate = birthDate.toString();
var yearThen = parseInt(mdate.substring(0,4), 10);
var monthThen = parseInt(mdate.substring(5,7), 10);
var dayThen = parseInt(mdate.substring(8,10), 10);
var today = new Date();
var birthday = new Date(yearThen, monthThen-1, dayThen);
var differenceInMilisecond = today.valueOf() - birthday.valueOf();
var year_age = Math.floor(differenceInMilisecond / 31536000000);
var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);
var month_age = Math.floor(day_age/30);
day_age = day_age % 30;
var tMnt= (month_age + (year_age*12));
var tDays =(tMnt*30) + day_age;
if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
alert("Invalid Date - Please try again!");
}
else 
{
document.getElementById("age").value = year_age;
}
}



</script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  });
  
  
  
  
  
  
  
  
  
  
  
  
  
</script>




</body>
</html>
