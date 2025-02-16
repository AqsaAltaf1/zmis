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


<?php include("include/nav.php");?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<?php include("include/profile_manue.php");?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->
<!-- <?php include("include/user_manue.php");?> -->

<!-- Sidebar Menu -->
<?php include("include/sidebar.php");?>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
<strong>Success!</strong> <?php echo $error;?>
</div>
<?php	
}
?>



<div class="row mb-2">
<div class="col-sm-9">
<h3 class="m-0 text-dark">Districts, Hospitals and Institutional Resgitration Page</h3>
</div><!-- /.col -->

<div class="col-sm-3 div_align">
<!-- <ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Dashboard v2</li>
</ol> -->

<!--  <button type="button" class="btn btn-primary div_align" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Fund Deposit To PZF</button> --> 
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-landmark"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total No. of Districts</span>
<span class="info-box-number text_align">
<?php echo $get_all_districts;?> <br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-hospital"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total Hospitals (Provin-Level)</span>
<span class="info-box-number text_align"> 
<?php echo $get_all_hospitals;?> <br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-mosque"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total Reg-Deeni Madaris</span>
<span class="info-box-number text_align">
<?php echo $get_all_deenimadaras;?><br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-dungeon"></i></span>

<div class="info-box-content">
<span class="info-box-number" >Total Reg-Foundations</span>
<span class="info-box-number text_align">
<?php echo $get_all_foundations;?><br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

</div>

<!-- Main Body -->
<div class="row">
<div class="col-md-1"></div>
<div class="col-lg-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

<li class="nav-item">
<a class="nav-link active" id="districtTab" data-toggle="pill" href="#addDistrict" role="tab" aria-controls="addDistrict" aria-selected="true">Add District</a>
</li>
<li class="nav-item">
<a class="nav-link" id="hospitalTab" data-toggle="pill" href="#addHospital" role="tab" aria-controls="addHospital" aria-selected="false">Add Hospital</a>
</li>
<li class="nav-item">
<a class="nav-link" id="deeniMadarisTab" data-toggle="pill" href="#addMadaris" role="tab" aria-controls="addMadaris" aria-selected="false">Add Deeni Madaris</a>
</li>

<li class="nav-item">
<a class="nav-link" id="dropDownFieldTab" data-toggle="pill" href="#dropDownField" role="tab" aria-controls="dropDownField" aria-selected="false">Add Drop Down Filed</a>
</li>

<li class="nav-item">
<a class="nav-link" id="foundationTab" data-toggle="pill" href="#addFoundation" role="tab" aria-controls="addFoundation" aria-selected="false">Add Foundation</a>
</li>
</ul>
</div>


<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="addDistrict" role="tabpanel" aria-labelledby="districtTab">
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pza_Institution_reg/manage_institution_reg_district/" enctype="multipart/form-data" novalidate>      
<h3>Add New District To The Database</h3>
<br>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">District Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="district_name" placeholder="Please Enter District Name" required type="text">
</div>
</div>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="population">Population <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="text" id="population" name="population" required placeholder="Please Enter the District Population" class="form-control col-md-8 col-xs-12">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="LZC_no">Number of LZCs <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="number" id="LZC_no" name="LZC_no" required placeholder="Please Enter the Number of LZCs" data-validate-minmax="" class="form-control col-md-8 col-xs-12">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="username" type="text" name="username" placeholder="Please Enter the User Name for Login" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
</div>
</div>
<div class=" row item form-group">
<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-8 col-xs-12" required>
</div>
</div>

<div class=" row item form-group">
<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-8 col-xs-12" required>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol">Role  <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="text" id="role" name="role" required value="district" data-validate-length-range="8,20" class="form-control col-md-8 col-xs-12" readonly>
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





<div class="tab-pane fade" id="addHospital" role="tabpanel" aria-labelledby="hospitalTab">    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pza_Institution_reg/manage_institution_reg_hospital/" enctype="multipart/form-data" novalidate>      
<h3>Add New Hospital To The Database</h3>
<br>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hospital Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="hosp_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="hosp_name" placeholder="Please Enter Hospital Name" required type="text">
</div>
</div>


<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Hospital Address <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="address" type="text" name="address" placeholder="Please Enter Address" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
</div>
</div>


<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Hospital User Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="hosp_username" type="text" name="hosp_username" placeholder="Please Enter the User Name for Login" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
</div>
</div>


<div class=" row item form-group">
<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="hosp_password" type="password" name="hosp_password" data-validate-length="6,8" class="form-control col-md-8 col-xs-12" required>
</div>
</div>

<div class=" row item form-group">
<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="hosp_password2" type="password" name="hosp_password2" data-validate-linked="password" class="form-control col-md-8 col-xs-12" required>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol">Role  <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="text" id="hosp_role" name="hosp_role" required value="hospital" data-validate-length-range="8,20" class="form-control col-md-8 col-xs-12" readonly>
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




<div class="tab-pane fade" id="addMadaris" role="tabpanel" aria-labelledby="deeniMadarisTab">
    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pza_Institution_reg/manage_institution_reg_madrassa/" enctype="multipart/form-data" novalidate>      
<h3>Add New Deeni Madrassa To The Database</h3>
<br>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Madrassa Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="mad_name" class="form-control col-md-8 col-xs-12" name="madrassa_name" placeholder="Please Enter Madrassa Name" required type="text">
</div>
</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Select District <span class="required">*</span>
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
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Select Local Zakat Comety <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="mad_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="madrassa_localzakat" placeholder="" required type="text">
</div>
</div>



<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Address <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="mad_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="mad_address" placeholder="" required type="text">
</div>
</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Username <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="mad_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="mad_username" placeholder="" required type="text">
</div>
</div>



<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Password <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="mad_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="mad_password" placeholder="" required type="password">
</div>
</div>




<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Re-Type Password <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="mad_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="mad_name" placeholder="" required type="password">
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



<div class="tab-pane fade" id="dropDownField" role="tabpanel" aria-labelledby="dropDownFieldTab">
    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pza_Institution_reg/manageMasterField/" enctype="multipart/form-data" novalidate>      
<h3>Add New Drop Down Filed</h3>
<br>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Field Purpose <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<select  class="form-control col-md-8" id="fieldPurpose" name="fieldPurpose">
<option value="">--Select Purpose--</option>
<?php foreach($getMasterFields as $fieldstatus){?>
<option value="<?php echo $fieldstatus['field_name'];?>"><?php echo $fieldstatus['field_name'];?></option>
<?php }?>
</select>
</div>
</div>


<div class=" row item form-group" style="display:none;" id="newFieldDiv">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">New Field Type <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="newFieldType" class="form-control col-md-8 col-xs-12" name="newFieldType" placeholder="Write Field Type Name Without spaces" required type="text">
</div>
</div>


<div class=" row item form-group" style="display:none;" id="existingFieldDiv">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Select Existing Field Type <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">

<select onChange="get_fieldtypes();" class="form-control col-md-8" id="field_typevalue" name="field_typevalue">
<option value="">---Select Field Type----</option>
<?php
$i=1;
if(!empty($getAllMasterField))
{
foreach($getAllMasterField as $allMasterField)
{
?>
<option value="<?php echo $allMasterField['field_type']?>"><?php echo $allMasterField['field_type']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>

<div class=" row item form-group" style="display:none;" id="viewFieldDiv">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Current Fields <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<select class="form-control col-md-8" id="getFieldsValues" name="getFieldsValues">
<option value="">---View List---</option>
</select>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">New Field Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="newfFeldName" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="newfFeldName" placeholder="" required type="text">
</div>
</div

><div class="ln_solid"></div>
<div class=" row form-group">
<div class="col-md-12 col-md-offset-3">
<input type="submit" name="submitbtn" class="btn btn-success">
<button type="reset" class="btn btn-primary float right">Reset</button>
</div>
</div>
</form> 
</div>


<div class="tab-pane fade" id="addFoundation" role="tabpanel" aria-labelledby="foundationTab">

    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pza_Institution_reg/manage_institution_reg_foundation/" enctype="multipart/form-data" novalidate>      
<h3>Add New Foundation To The Database</h3>
<br>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Foundation Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="found_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="found_name" placeholder="Please Enter Foundation Name" required type="text">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Foundation User Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="found_username" type="text" name="found_username" placeholder="Please Enter the User Name for Login" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
</div>
</div>
<div class=" row item form-group">
<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="found_password" type="password" name="found_password" data-validate-length="6,8" class="form-control col-md-8 col-xs-12" required>
</div>
</div>

<div class=" row item form-group">
<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="found_password2" type="password" name="found_password2" data-validate-linked="password" class="form-control col-md-8 col-xs-12" required>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol">Role  <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="text" id="hosp_role" name="foundation_role" required value="foundation" data-validate-length-range="8,20" class="form-control col-md-8 col-xs-12" readonly>
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
</div>
</div>
<!-- /.card body End -->
</div>
</div>

</div>
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

<?php include("include/footer.php");?>


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
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

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- Script for hide and show option list in PZF entry form  -->
<script>
function toggleShared() {

payment_rec_from = document.getElementById('payment_rec_from').value;
district_list = document.getElementById('district_list');
accounthead = document.getElementById('accounthead');
hospital_list = document.getElementById('hospital_list');

if(payment_rec_from == 'District') {
district_list.style.display = 'block';
accounthead.style.display = 'block';
hospital_list.style.display = 'none';
health_account_head.style.display = 'none';
}
else if(payment_rec_from =='Hospital')
{
hospital_list.style.display = 'block';
health_account_head.style.display = 'block';
district_list.style.display = 'none';
accounthead.style.display = 'none';
}
else
{
district_list.style.display = 'none';
accounthead.style.display = 'none';
hospital_list.style.display = 'none';
health_account_head.style.display = 'none'; 
}

} 

</script>

<!-- For data tables -->
<script>
$(function () {
$("#example1").DataTable({
"responsive": true,
"autoWidth": false,
});
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>


<script>

function get_fieldtypes()
{

var field_typevalue = $("#field_typevalue").val();

if(field_typevalue != '')
{   
$.ajax({
url:"<?php echo base_url(); ?>Pza_Institution_reg/fetch_fieldTypes",
method:"POST",
beforeSend: function() 
{
$("#userstatus").html('<img src="<?php echo base_url(); ?>/assets/images/loading.gif">');
},
data:{field_typevalue : field_typevalue},
success:function(data)
{
////$("#userstatus").fadeOut(); 
$('#getFieldsValues').html(data);
}
});
}
else
{
$("#userstatus").text('Please Select District.');   
}
}

<!-- Hide and Show for Master Fields -->

$('#fieldPurpose').on('change',function(){
if( $(this).val()==="Adding New Field"){
$("#newFieldDiv").slideDown()
$("#existingFieldDiv").slideUp()
$("#viewFieldDiv").slideUp()
}
else if( $(this).val()==="Update Existing Field"){
$("#newFieldDiv").slideUp()
$("#existingFieldDiv").slideDown()
$("#viewFieldDiv").slideDown()
}
else
{
$("#newFieldDiv").slideUp()
$("#existingFieldDiv").slideUp()
$("#viewFieldDiv").slideUp()
}
});




</script>
</body>
</html>
