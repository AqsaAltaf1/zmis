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


<?php $this->load->view('gs/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('gs/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('gs/include/user_manue');?> -->

<!-- Sidebar Menu -->

<?php $this->load->view('gs/include/sidebar');?>

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
<form action="<?php echo base_url();?>Dist_GA_mustahiq_reg/add_guzara_allowance_mustahiqeen/" method="post" enctype="multipart/form-data">

<div class="row form-group">

<label class="col-md-2" style="color:#f00;" for="">LZC Name<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="lzc" name="LZC_id" required="">
<option value="">---Select LZC---</option>


<?php foreach ($get_gs_lzc as $get_lzcname) { ?>
<option value="<?php echo $get_lzcname['id']?>"><?php echo $get_lzcname['lzc_name'];?></option>
<?php }?>
</select>

<!--New Tag-->
<label class="col-md-2" for="" style="color:#f00;">Locality of LZC<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="LzcLocality" name="LzcLocality">
<option value="">---Select Locality of LZC---</option>
<?php foreach ($GetLzcLocality as $LzcLocality) { ?>
<option value="<?php echo $LzcLocality['field_name']; ?>"><?php echo $LzcLocality['field_name']; ?></option>
<?php }?>
</select>



</div>
<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Istehqaq No:<span class="required">*</span>
</label>

<input required type="number" name="istehqaqnumber" class="form-control col-md-4 col-xs-12" min="1" max="99999">

<label class="col-md-2" style="color:#f00;" for="">Gender<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="gender" name="gender">
<option value="">---Select Gender---</option>
<?php foreach ($GetGender as $Gender){?>
<option value="<?php echo $Gender['field_name'];?>"><?php echo $Gender['field_name'];?></option>
<?php }?>
</select>

</div>

<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Mustahiq Name <span class="required">*</span>
</label>
<input type="text" name="mustahiq_name" id="m_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name">


<select class="form-control col-md-2 col-xs-12" id="GuardianType" name="MustahiqGuardianType">
<option value="">---Guardian Type---</option>
<?php foreach($GetGuardianType as $GuardianType) {?>
<option value="<?php echo $GuardianType['field_name']; ?>"><?php echo $GuardianType['field_name'];?></option>
<?php }?>
</select>

<input type="text" name="father_name" id="f_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Parent Name">
</div>

<div class="row form-group">
<!--New Tag-->
<label class="col-md-2" style="color:#f00;" for="">Identity Type<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="IdentityType" name="IdentityType">
<option value="">---Select Identity Type---</option>
<?php foreach($GetIdentityOption as $IdentityOption) {?>
<option value="<?php echo $IdentityOption['field_name']; ?>"><?php echo $IdentityOption['field_name'];?></option>
<?php }?>
</select>

<label class="col-md-2" style="color:#f00;" for="">CNIC/Form-B<span class="required">*</span>
</label>

<input required type="text" name="mustahiq_cnic" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask>

</div>


<div id="GuardianTypeDiv" style="display:none;">

<div class="row form-group">
<!--New Tag-->
<label class="col-md-2" style="color:#f00;" for="">Guardian Type<span class="required">*</span>
</label>
<select class="form-control col-md-2 col-xs-12" id="GuardianType" name="GuardianType">
<option value="">---Guardian Type---</option>
<?php foreach($GetIdentityOptionSubType as $IdentityOptionSubType) {?>
<option value="<?php echo $IdentityOptionSubType['field_name']; ?>"><?php echo $IdentityOptionSubType['field_name'];?></option>
<?php }?>
</select>


<input type="text" name="GuardianName" class="form-control col-md-2 col-xs-12" placeholder="Guardian Name" style="margin-left:25px;">


<input type="text" name="GuardianFatherName" class="form-control col-md-2 col-xs-12" placeholder="Guardian Father Name" style="margin-left:25px;">

<input type="text" name="GuradianCnic" class="form-control col-md-2 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask placeholder="Gurdian CNIC" style="margin-left:25px;">

</div>
</div>





<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Mobile Network<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="ConnectionType" name="MobileNetwork">
<option value="">---Select Mobile Network Type---</option>
<?php foreach($GetContectType as $ContectType) {?>
<option value="<?php echo $ContectType['field_name']; ?>"><?php echo $ContectType['field_name'];?></option>
<?php }?>

</select>

<label class="col-md-2" style="color:#f00;" for="">Contact #<span class="required">*</span>
</label>

<input required type="text" name="contact_number" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "9999-9999999"' data-mask>


</div>

<div class="row form-group">
<label class="col-md-2" for="" style="color:#f00;">Date Of Birth<span class="required">*</span>
</label>
<input type="date" name="dob" onChange="findage(this.value);" id="dob" value="" class="form-control col-md-4 col-xs-12" placeholder="Date Of Birth">

<label class="col-md-2" for="" style="color:#f00;">Age<span class="required">*</span>
</label>
<input type="text" name="age" id="age" min="1" value="" class="form-control col-md-4 col-xs-12" placeholder="Age of Mustahiq" readonly>
</div>

<div class="row form-group">
<!--New Tag-->
<label class="col-md-2" for="" style="color:#f00;">Sehat Sahulat Card<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="SehatSahulatCard" name="SehatCard">
<option value="">---Have You Availed Sehat Sahulat Card ?---</option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>
</select>


<label class="col-md-2" for="" style="color:#f00;">Marital Status<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="marital_status" name="marital_status">
<option value="">---Select Marital Status---</option>
<?php foreach($GetMaritalStatus as $MaritalStatus) {?>
<option value="<?php echo $MaritalStatus['field_name']; ?>"><?php echo $MaritalStatus['field_name'];?></option>
<?php }?>
</select>

</div>


<div class="row form-group">
<!--New Tag-->
<label class="col-md-2" for="" style="color:#f00;">Skills<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="Skills" name="Skills">
<option value="">---Select Appropriate SKill---</option>
<?php foreach($GetSkills as $Skills) {?>
<option value="<?php echo $Skills['field_name']; ?>"><?php echo $Skills['field_name'];?></option>
<?php }?>
</select>


<label class="col-md-2" for="" style="color:#f00;">School going Child/Sisters<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="SchoolGoingChild" name="SchoolGoingChild">
<option value="">---Select School Going Child---</option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>
</select>

</div>


<div id="BrotherSistersDiv" style="display:none;">
<div class="row form-group">

<select class="form-control col-md-2 col-xs-12" id="ChildType1" name="SchoolGoingType1">
<option value="">---Child Type---</option>
<?php foreach($GetChildType1 as $ChildType1) {?>
<option value="<?php echo $ChildType1['field_name']; ?>"><?php echo $ChildType1['field_name'];?></option>
<?php }?>
</select>
<input type="number" name="SchoolGoingSonBrothers" class="form-control col-md-4 col-xs-12">

<select class="form-control col-md-2 col-xs-12" id="ChildType2" name="SchoolGoingType2">
<option value="">---Child Type---</option>
<?php foreach($GetChildType2 as $ChildType2) {?>
<option value="<?php echo $ChildType2['field_name']; ?>"><?php echo $ChildType2['field_name'];?></option>
<?php }?>
</select>
<input type="number" name="NoSchoolGoingSisters" class="form-control col-md-4 col-xs-12">

</div>
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
<label class="col-md-2" for="">Category<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="category" name="category">
<option value="">---Select Category---</option>
<?php foreach($GetCategory as $Category) {?>
<option value="<?php echo $Category['field_name']; ?>"><?php echo $Category['field_name'];?></option>
<?php }?>

</select>
</div>

<div id="guardian_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Relation with Guardian:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="guardian_relation" name="RelationWithGuardian">
<option value="">---Select One---</option>
<?php foreach($GetIdentityOptionSubType as $IdentityOptionSubType) {?>
<option value="<?php echo $IdentityOptionSubType['field_name']; ?>"><?php echo $IdentityOptionSubType['field_name'];?></option>
<?php }?>

</select>
</div>
</div>

<div id="disable_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Are You Disable ?<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="OtherDisableType" name="OrYouDisable">
<option value="">---Select One---</option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>

</select>
</div>
</div>



<div id="disable_status_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">If Disable Select<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="disable_type" name="CategoryDisability">
<option value="">---Select Disability Type---</option>
<?php foreach($GetCategorySubType as $CategorySubType) {?>
<option value="<?php echo $CategorySubType['field_name']; ?>"><?php echo $CategorySubType['field_name'];?></option>
<?php }?>
</select>
</div>
</div>




<div class="row form-group">
<label class="col-md-2" for="">Financial Assistance<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="finan_assiatance" name="financial_assistance">
<option value="">---Financial Assistance Availed---</option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>
</select>
</div>

<div id="financial_status_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then from<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="financial_assistance_type" name="financial_assistance_type">
<option value="">---Select Assistance Type---</option>
<?php foreach($GetFinancialAssiatanceSubType as $FinancialAssiatanceSubType) {?>
<option value="<?php echo $FinancialAssiatanceSubType['field_name']; ?>"><?php echo $FinancialAssiatanceSubType['field_name'];?></option>
<?php }?>
</select>
</div>
</div>




<div class="row form-group">
<label class="col-md-2" for="">Gold Status<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="gold_status" name="gold_status">
<option value="">---Select Gold Status---</option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>
</select>
</div>

<div id="gold_status_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="gold_status_value" name="gold_status_value">
<option value="">---Select Gold Quantity---</option>
<?php foreach($GetGoldStatusSubType as $GoldStatusSubType) {?>
<option value="<?php echo $GoldStatusSubType['field_name']; ?>"><?php echo $GoldStatusSubType['field_name'];?></option>
<?php }?>
</select>
</div>
</div>



<div class="row form-group">
<label class="col-md-2" for="">House Status<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="house_status" name="house_status">
<option value="">---Select House Status---</option>
<?php foreach($GetHouseStatus as $HouseStatus) {?>
<option value="<?php echo $HouseStatus['field_name']; ?>"><?php echo $HouseStatus['field_name'];?></option>
<?php }?>

</select>
</div>


<div style="display:none;" id="house_status_div">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then<span class="required">*</span></label>
<select class="form-control col-md-2 col-xs-12" id="house_status_type" name="house_status_type">
<option value="">---Select House Type---</option>
<?php foreach($GetHouseStatusSubType as $HouseStatusSubType) {?>
<option value="<?php echo $HouseStatusSubType['field_name']; ?>"><?php echo $HouseStatusSubType['field_name'];?></option>
<?php }?>

</select>

<label class="col-md-2">No of Room<span class="required">*</span></label>

<input type="number" name="NoOfRooms" id="" value="" class="form-control col-md-2 col-xs-12">

<label class="col-md-2">No of Toilet  <span class="required">*</span></label>

<input type="number" name="HouseToilet" id="" value="" class="form-control col-md-2 col-xs-12">

</div>
</div>

<div id="OnRent_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Monthly Rent<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="MonthlyRent" name="MonthlyRent">
<option value="">---Select Monthly Rent Range---</option>
<?php foreach($GetRentalSubType as $RentalSubType) {?>
<option value="<?php echo $RentalSubType['field_name']; ?>"><?php echo $RentalSubType['field_name'];?></option>
<?php }?>
</select>

</div>
</div>


<div id="Dependences_div">
<div class="row form-group" >
<label class="col-md-2" for="">Dependentance: Son/Brothers<span class="required">(Below 18)</span>
</label>
<input type="number" onChange="sumtotals();" required onKeyUp="sumtotals();" class="form-control col-md-1 col-xs-12" id="dependences_sons" name="Dependences_sons" min="0" value="0">


<label class="col-md-2" for="">Daughters/Sisters<span class="required">(Un-married)</span>
</label>

<input type="number" onChange="sumtotals();" required onKeyUp="sumtotals();" class="form-control col-md-1 col-xs-12" id="dependences_daughters" name="Dependences_sisters" min="0" value="0">

<label class="col-md-2" for="other">Others<span class="required"> (Parents)</span>
</label>

<input type="number" onChange="sumtotals();" required onKeyUp="sumtotals();" class="form-control col-md-1 col-xs-12" id="dependences_others" name="Dependences_others" min="0" value="0">

<label class="col-md-2" for="other">Total<span class="required"> (Dependent)</span>
</label>
<input type="text" style="font-weight:bold;" class="form-control col-md-1 col-xs-12" value="0" id="Dependences_totals" name="Dependences_totals" min="0" readonly>
</div>
</div>


<div class="row form-group">
<label class="col-md-2" for="">Educational Qualification:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="EduQualification" name="Qualification">
<option value="">---Select Qualification Level---</option>

<?php foreach($GetQualification as $Qualification) {?>
<option value="<?php echo $Qualification['field_name']; ?>"><?php echo $Qualification['field_name'];?></option>
<?php }?>

</select>
</div>



<div class="row form-group">
<label class="col-md-2" for="">Monthly Income Source:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="monthly_income_source" name="monthly_income_source">
<option value="">---Select Source Of Income---</option>


<?php foreach($GetIncomeSource as $IncomeSource) {?>
<option value="<?php echo $IncomeSource['field_name']; ?>"><?php echo $IncomeSource['field_name'];?></option>
<?php }?>
</select>
</div>


<div id="monthly_income_source_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Monthly Income:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="" name="monthly_income_value">
<option value="">---Select Monthly Income Range---</option>
<?php foreach($GetMonthlyIncomeRange as $MonthlyIncomeRange) {?>
<option value="<?php echo $MonthlyIncomeRange['field_name']; ?>"><?php echo $MonthlyIncomeRange['field_name'];?></option>
<?php }?>
</select>
</div>
</div>


<div id="SourceOfExpenseDiv" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Source of Expense:<span class="required">*</span>
</label>

<input type="text" class="form-control col-md-10 col-xs-12" id="SourceOfExpense" name="SourceOfExpense" placeholder="Please mention the Scource Of Your Expenditure">
</div>
</div>




<div id="Other_source_income_marla" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">No of Marla<span class="required">*</span>
</label>
<input type="number" min="1" class="form-control col-md-4 col-xs-12" id="category" name="other_source_income_value1">
<label class="col-md-2" for="">Monthly Income Rs.<span class="required">*</span>
</label>
<input type="number" class="form-control col-md-4 col-xs-12" id="other_source_income_value2" name="other_source_income_value2" >
</div>
</div>

<div id="Other_source_income_shops" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">No of Shops<span class="required">*</span>
</label>
<input type="text" class="form-control col-md-4 col-xs-12" id="" name="other_source_income_value11">
<label class="col-md-2" for="">Monthly Income Rs.<span class="required">*</span>
</label>

<input type="number" class="form-control col-md-4 col-xs-12" id="other_source_income_value22" name="other_source_income_value22" >
</div>
</div>




<div class="row form-group">
<label class="col-md-2" for="">Bank Account:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="bankaccount_value" name="bankaccount_value">
<option value="">---Select Bank Account---</option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>
</select>
</div>

<div id="bankaccount_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Account Number<span class="required">*</span>
</label>
<input type="number" class="form-control col-md-4 col-xs-12" id="" name="bank_account_number">
<label class="col-md-2" for="">Account Balance .<span class="required">*</span>
</label>
<input type="number" class="form-control col-md-4 col-xs-12" id="bankaccount_value_marks" name="bankaccount_value_marks" >
</div>
</div>

<div class="row form-group">
<label class="col-md-2" for="">Live Stock:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="live_stock" name="live_stock">
<option value="">---Select Live Stock Details---</option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>
</select>
</div>


<div id="live_stock_div" style="display:none;">
<div class="row form-group">
<label class="col-md-2" for="">Select Type:<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="" name="live_stock_type">
<option value="">---Select Live Stock Type---</option>

<?php foreach($GetLiveStockSubType as $LiveStockSubType) {?>
<option value="<?php echo $LiveStockSubType['field_name']; ?>"><?php echo $LiveStockSubType['field_name'];?></option>
<?php }?>
</select>
</div>
</div>



<div class="row form-group">
<label class="col-md-2" for="">Mode of Transportation<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="" name="mode_of_transportation">
<option value="">---Select Transportation Type---</option>
<?php foreach($GetModeOfTransportation as $ModeOfTransportation) {?>
<option value="<?php echo $ModeOfTransportation['field_name']; ?>"><?php echo $ModeOfTransportation['field_name'];?></option>
<?php }?>
</select>
</div>



<div class="row form-group">
<label class="col-md-2" for="">Utilities Coverage<span class="required">*</span>
</label>

<div class="col-md-4">
<label for="">Electricity</label>
<br>
<input type="radio" onclick="doSomething(1);" name="electricity_type" value="<?php 
$GetWapda = $this->db->select('*')->from('masterfields')->where('field_name','Wapda')->where('status',1)->get();
echo $Wapda = $GetWapda->row('field_name'); ?>">&nbsp;&nbsp;Provided by Govt (WAPDA)<br>

<div id="pesodiv" style="display:none;">
<input type="number" name="pesco_bill_value" class="form-control" placeholder="Enter Monthly Average Bill" min="1">
</div>
<input type="radio" onclick="doSomething(2);" name="electricity_type" value="<?php 
$GetOwnArrangment = $this->db->select('*')->from('masterfields')->where('field_name','Own arrangment/Solar')->where('status',1)->get();
echo $OwnArrangment = $GetOwnArrangment->row('field_name'); ?>">&nbsp;&nbsp;Own arrangement (Solar, UPS, etc)<br>
<input type="radio" onclick="doSomething(3);" name="electricity_type" value="<?php 
$GetNoFacility = $this->db->select('*')->from('masterfields')->where('field_name','No Facility')->where('status',1)->get();
echo $NoFacility = $GetNoFacility->row('field_name'); ?>">&nbsp;&nbsp;No electricity<br>
<br>


</div>

<div class="col-md-3">
<label for="">Fuel</label>
<br>
<input type="radio" name="fuel_type" value="Wood">&nbsp;&nbsp;Wood<br>
<input type="radio" name="fuel_type" value="LP Gas (Cylinder)">&nbsp;&nbsp;LP Gas (Cylinder)<br>
<input type="radio" name="fuel_type" value="Natural Gas (SNGPL)">&nbsp;&nbsp;Natural Gas (SNGPL)<br>
<input type="radio" name="fuel_type" value="Other/Coal">&nbsp;&nbsp;Other/Coal<br>
<input type="radio" name="fuel_type" value="No Facility">&nbsp;&nbsp;No Facility<br>



</div>

<div class="col-md-3">
<label for="">Water</label>

<br>
<input type="radio" name="water_type" value="Govt Water Supply">&nbsp;&nbsp;Govt. Water Supply<br>
<input type="radio" name="water_type" value="Own Bore Hole with hand-pump">&nbsp;&nbsp;Own Bore<br>
<input type="radio" name="water_type" value="Community Bore Hole">&nbsp;&nbsp;Community Bore Hole<br>
<input type="radio" name="water_type" value="Open/ Dug well">&nbsp;&nbsp;Open / Dug well<br>
<input type="radio" name="water_type" value="River/Pond/Stream">&nbsp;&nbsp;River / Pond / Stream<br>
<input type="radio" name="water_type" value="No Facility">&nbsp;&nbsp;No Facility<br>

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

<!--<input type="hidden" name="District_Name" value="Computer">-->

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


// ------------- Identity Type -------------//

$('#IdentityType').on('change',function(){
if( $(this).val()==="Guardian CNIC" || $(this).val()==="Form-B"){
$("#GuardianTypeDiv").slideDown()
}
else{
$("#GuardianTypeDiv").slideUp()
}
});



// ------------- School Going Child -------------//

$('#SchoolGoingChild').on('change',function(){
if( $(this).val()==="Yes"){
$("#BrotherSistersDiv").slideDown()
}
else{
$("#BrotherSistersDiv").slideUp()
}
});

// ------------- Category -------------//

$('#category').on('change',function(){
if( $(this).val()==="Disable"){
$("#disable_status_div").slideDown()
$("#guardian_div").slideUp()
$("#disable_div").slideUp()
}
else if ( $(this).val()==="Orphan")
{
	var orphan_age = parseInt($('#age').val());
	if((orphan_age >= 17) || (orphan_age <= 0))
	{
	 alert('Invalid Age Selection for Orphan');
	 $("#dob").css("border", "1px solid red");
	 $("#dob").val("");	
	 $("#dob").focus();	
	 $("#age").val("");
	 return false;	
	}
$("#guardian_div").slideDown()
$("#disable_div").slideDown()
$("#disable_status_div").slideUp()
}
else if($(this).val()==="Senior Citizen")
{
$("#guardian_div").slideUp()
$("#disable_status_div").slideUp()
$("#disable_div").slideDown()
}
else if($(this).val()==="Widow/Divorced")
{
$("#guardian_div").slideUp()
$("#disable_status_div").slideUp()
$("#disable_div").slideDown()
}
});

// ------------- Other Disable Type -------------//

$('#OtherDisableType').on('change',function(){
if( $(this).val()==="Yes"){
$("#disable_status_div").slideDown()
}
else{
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

// ------------- Gold Status -------------//

$('#no_of_dependences').on('change',function(){
if( $(this).val()==="Nil"){
$("#Dependences_div").slideUp()
}
else{
$("#Dependences_div").slideDown()
}
});


// ------------- House Status -------------//

$('#house_status').on('change',function(){
if( $(this).val()==="Own House"){
$("#house_status_div").slideDown();
$("#OnRent_div").slideUp();
}
else if( $(this).val()==="On Rent"){
$("#OnRent_div").slideDown();
$("#house_status_div").slideUp();
} 
else
{
$("#house_status_div").slideUp();
$("#OnRent_div").slideUp();
}
});

// ------------- Monthly Income Source -------------//

$('#monthly_income_source').on('change',function(){
if( $(this).val()==="Employed (Non Govt. Employee)"){
$("#monthly_income_source_div").slideDown();
$("#SourceOfExpenseDiv").slideUp();
$("#Other_source_income_marla").slideUp();
$("#Other_source_income_shops").slideUp();
}
else if($(this).val()==="Unemployed")
{
$("#SourceOfExpenseDiv").slideDown();
$("#monthly_income_source_div").slideUp();
$("#Other_source_income_marla").slideUp();
$("#Other_source_income_shops").slideUp();
}
else if($(this).val()==="Agriculture")
{
$("#SourceOfExpenseDiv").slideUp();
$("#monthly_income_source_div").slideUp();
$("#Other_source_income_marla").slideDown();
$("#Other_source_income_shops").slideUp();
}
else if($(this).val()==="Commercial")
{
$("#SourceOfExpenseDiv").slideUp();
$("#monthly_income_source_div").slideUp();
$("#Other_source_income_marla").slideUp();
$("#Other_source_income_shops").slideDown();
}
});


// ------------- Other Source of Income -------------//


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
else if ((year_age > 100) || (year_age <= 0))
{
 alert('Age Limit is 0-100');
 $("#dob").css("border", "1px solid red");
 $("#dob").val("");	
 $("#dob").focus();	
 $("#age").val("");
 return false;	
}
else 
{
document.getElementById("age").value = year_age;
$("#dob").css("border", "1px solid #ced4da");
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
  
  
  
  
  
function sumtotals()
{
	var dependences_sons = parseInt($('#dependences_sons').val());
	var dependences_daughters = parseInt($('#dependences_daughters').val());
	var dependences_others = parseInt($('#dependences_others').val());
	var totalsum = dependences_sons + dependences_daughters + dependences_others;
	$("#Dependences_totals").val(totalsum);

}  
  
  
  
  
  
  
  
</script>




</body>
</html>
