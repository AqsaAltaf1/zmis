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
<div class="col-sm-10">
<h3 class="m-0 text-dark"> ZMIS, Hospital, Guzara Allowance App and Audit User Management</h3>
</div><!-- /.col -->

<div class="col-sm-2 div_align">
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
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-desktop"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total ZMIS Users</span>
<span class="info-box-number text_align">
<?php echo "32";?> <br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col --><i class="fa-solid fa-computer"></i>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-hospital"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total Hospitals Users</span>
<span class="info-box-number text_align"> 
<?php echo "26";?> <br>
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
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-hands-helping"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total Guzara Allowance APP User</span>
<span class="info-box-number text_align">
<?php echo "421";?><br>
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
<span class="info-box-number" >Total Audit Users</span>
<span class="info-box-number text_align">
<?php echo "32";?><br>
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
<a class="nav-link active" id="districtTab" data-toggle="pill" href="#addDistrict" role="tab" aria-controls="addDistrict" aria-selected="true">Manage Zakat Paid Users</a>
</li>

<li class="nav-item">
<a class="nav-link" id="users_tab" data-toggle="pill" href="#users" role="tab" aria-controls="users" aria-selected="false">Create Zakat Paid staff User</a>
</li>
<li class="nav-item">
<a class="nav-link" id="existingDistrictUserTab" data-toggle="pill" href="#existingDistrictUser" role="tab" aria-controls="existingDistrictUser" aria-selected="false">Existing District Users</a>
</li>
<li class="nav-item">
<a class="nav-link" id="deeniMadarisTab" data-toggle="pill" href="#addMadaris" role="tab" aria-controls="addMadaris" aria-selected="false">New District Users</a>
</li>

<li class="nav-item">
<a class="nav-link" id="dropDownFieldTab" data-toggle="pill" href="#dropDownField" role="tab" aria-controls="dropDownField" aria-selected="false">Hospital Users</a>
</li>

</ul>
</div>


<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="addDistrict" role="tabpanel" aria-labelledby="districtTab">
<div class="row">
<div class="col-12">

<div class="card">
<div class="card-header">
<h4>Manage Existing Users</h4>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="users_table" class="table table-bordered table-hover" style="font-size:14px;">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Username</th>
<th>Password</th>
<th>Type</th>
<th>District</th>
<th>Status</th>
<th style="width:50px;">Edit</th>
</tr>
</thead>
<tbody>

<?php
$usercounter = 1;
$this->db->select("*");
//$this->db->where("record_id",$get_auditsalarypaid_staffvalues['id']);
$zakatPaidStaff = $this->db->get('users');
$zakatPaidStaff = $zakatPaidStaff->result();
foreach ($zakatPaidStaff as $zakatPaidStaffInfo) 
{
?>
<tr>
<td><?php echo $usercounter;?></td>
<td style="text-transform:capitalize;"><?php echo $zakatPaidStaffInfo->entity_name;?></td>
<td><?php echo $zakatPaidStaffInfo->user_name;?></td>
<td><?php echo $zakatPaidStaffInfo->password;?></td>
<td><?php echo $zakatPaidStaffInfo->role;?></td>
<td><?php echo $zakatPaidStaffInfo->districtName; ?></td>
<td><?php
$status = $zakatPaidStaffInfo->Active;
if($status == 1)
{
echo "Active";
}
else if($status == 0)
{
echo "De-Active";}
?>
</td>

<td><a href="#" data-target=".zakatPaidStaffCounter<?php echo $usercounter;?>" class="fa fa-edit btn btn-success btn-xs" data-toggle="modal"></a>
</td>
</tr>


<div class="modal fade zakatPaidStaffCounter<?php echo $usercounter;?>" tabindex="-1" role="dialog" style="display:none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update Username & Password </h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>UserManagement/manage_users_passwords/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Name<span class="required">*</span> </label>
<input type="text" id="inst" value="<?php echo $zakatPaidStaffInfo->entity_name;?>" name="entity_name" required class="form-control col-md-8" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Username<span class="required">*</span> </label>
<input type="text" id="inst" value="<?php echo $zakatPaidStaffInfo->user_name;?>" name="user_name" required class="form-control col-md-8" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Password<span class="required">*</span> </label>
<input type="password" required name="password" value="<?php echo $zakatPaidStaffInfo->password;?>" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">District<span class="required">*</span> </label>

<select name="district_id" class="form-control col-md-8 col-xs-12">
<?php foreach ($get_districts as $districtinfo) { ?>
<option value="<?= $districtinfo->id; ?>" <?php if($zakatPaidStaffInfo->district_id == $districtinfo->id) echo "selected";?>><?= $districtinfo->district_name; ?></option>
<?php }?>
</select>

</div>




<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Status<span class="required">*</span> </label>
<select name="status"  class="form-control col-md-8 col-xs-12">
<option value="1">Activate</option>
<option value="0">De-Activate</option>
</select>
</div>



<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
</div>

<input type="hidden" name="user_id" value="<?php echo $zakatPaidStaffInfo->user_id;?>">

</form>
</div>
</div>
</div>
</div>

<?php
$usercounter++;
}
?>

</tfoot>
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.col -->
</div>


</div> 
</div>





<div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users_tab">    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Direct_institution_reg/add_institutes_users/" enctype="multipart/form-data" novalidate>      
<h3>Zakat Paid Staff Users Management Page</h3><br>
<p align="center" id="userstatus"></p>



<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Role Of Users <span class="required">*</span>
</label>
<select required class="form-control col-md-6 col-sm-6 col-xs-12" onChange="get_role_types();" id="role_types" name="role">
<option value="0">---Select User Role---</option>
<option value="audit">Audit Officer</option>
<option value="gs">Group Secretary</option>

</select>
</div>

<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Select District <span class="required">*</span>
</label>
<select class="form-control col-md-6 col-sm-4 col-lg-6" onChange="get_institutes();" id="district_getvalue" name="district_id">
<option value="">---Select---</option>
<?php foreach($get_districts as $districts){?>
<option value="<?=$districts->id;?>"><?=$districts->district_name;?></option>
<?php }?>
</select>
</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Entity Name <span class="required">*</span>
</label>

<input type="text" id="focalPersonCNIC" name="entity_name" required placeholder="Please Enter Focal Person Name" class="form-control col-md-6 col-sm-6 col-xs-12">

</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">User CNIC (User Name) <span class="required">*</span>
</label>

<input type="text" id="focalPersonCNIC" name="user_name" required placeholder="Please Enter CNIC" class="form-control col-md-6 col-sm-6 col-xs-12">

</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Password <span class="required">*</span>
</label>

<input type="password" id="password" name="password" required  class="form-control col-md-6 col-sm-6 col-xs-12">

</div>


<div id="permission_div" style="display:none;">
<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Users Previllages <span class="required">*</span>
</label>

<select class="form-control col-md-6 col-sm-4 col-lg-6" id="previllages" name="users_previllages">
<option value="">---Select One---</option>
<option value="admin">Admin Level</option>
<option value="user">User Level</option>
</select>
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



<div class="tab-pane fade" id="existingDistrictUser" role="tabpanel" aria-labelledby="existingDistrictUserTab">
<div class="row">
<div class="col-12">

<div class="card">
<div class="card-header">
<h4>Manage Existing District Users</h4>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>District Name</th>
<th>Username</th>
<th>Password</th>
<th>No. of LZC</th>
<th>Status</th>
<th>Edit</th>
</tr>
</thead>
<tbody>

<?php
$distCounter = 1;
$this->db->select("*");
//$this->db->where("record_id",$get_auditsalarypaid_staffvalues['id']);
$districtUsers = $this->db->get('district_users');
$districtUsers = $districtUsers->result();
foreach ($districtUsers as $userinfo) 
{
?>
<tr>
<td><?php echo $distCounter;?></td>
<td style="text-transform:capitalize;"><?php echo $userinfo->district_name;?></td>
<td><?php echo $userinfo->username;?></td>
<td><?php echo $userinfo->password;?></td>
<td><?php echo $userinfo->number_of_lzc;?></td>
<td><?php
$status = $userinfo->status;
if($status == 1)
{
echo "Active";
}
else if($status == 0)
{
echo "De-Active";}
?>
</td>

<td><a href="#" data-target=".districtPasswordUpdate<?php echo $distCounter;?>" class="fa fa-edit btn btn-success btn-sm" data-toggle="modal"></a>
</td>
</tr>


<div class="modal fade districtPasswordUpdate<?php echo $distCounter;?>" tabindex="-1" role="dialog" style="display:none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update Username & Password </h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>UserManagement/districtUserPassword/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="control-label col-md-3" for="installment">District Name<span class="required">*</span> </label>
<input type="text" id="" value="<?php echo $userinfo->district_name;?>" name="entity_name" required class="form-control col-md-8" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">User Name<span class="required">*</span> </label>
<input type="text" id="" value="<?php echo $userinfo->username;?>" name="user_name" required class="form-control col-md-8" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Password<span class="required">*</span> </label>
<input type="password" required name="password" value="<?php echo $userinfo->password;?>" class="form-control col-md-8 col-xs-12">
</div>






<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Status<span class="required">*</span> </label>
<select name="status"  class="form-control col-md-8 col-xs-12">
<option value="1">Activate</option>
<option value="0">De-Activate</option>
</select>
</div>



<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
</div>

<input type="hidden" name="user_id" value="<?php echo $userinfo->id;?>">

</form>
</div>
</div>
</div>
</div>

<?php
$distCounter++;
}
?>

</tfoot>
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.col -->
</div>


</div> 
</div>










<div class="tab-pane fade" id="addMadaris" role="tabpanel" aria-labelledby="deeniMadarisTab">
    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Direct_institution_reg/add_institutes_users/" enctype="multipart/form-data" novalidate>      
<h3>District Users Management Page</h3><br>
<p align="center" id="userstatus"></p>



<!--<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Role Of Users <span class="required">*</span>
</label>
<select required class="form-control col-md-6 col-sm-6 col-xs-12" onChange="get_role_types();" id="role_types" name="role">
<option value="0">---Select User Role---</option>
<option value="audit">District Zakat Officer</option>
<option value="gs">Group Secretary</option>

</select>
</div>-->

<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Select District <span class="required">*</span>
</label>
<select class="form-control col-md-6 col-sm-4 col-lg-6" onChange="get_institutes();" id="district_getvalue" name="district_id">
<option value="">---Select---</option>
<?php foreach($get_districts as $districts){?>
<option value="<?=$districts->id;?>"><?=$districts->district_name;?></option>
<?php }?>
</select>
</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Entity Name <span class="required">*</span>
</label>

<input type="text" id="focalPersonCNIC" name="entity_name" required placeholder="Please Enter Focal Person Name" class="form-control col-md-6 col-sm-6 col-xs-12">

</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">User CNIC (User Name) <span class="required">*</span>
</label>

<input type="text" id="focalPersonCNIC" name="user_name" required placeholder="Please Enter CNIC" class="form-control col-md-6 col-sm-6 col-xs-12">

</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Password <span class="required">*</span>
</label>

<input type="password" id="password" name="password" required  class="form-control col-md-6 col-sm-6 col-xs-12">

</div>


<div id="permission_div" style="display:none;">
<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Users Previllages <span class="required">*</span>
</label>

<select class="form-control col-md-6 col-sm-4 col-lg-6" id="previllages" name="users_previllages">
<option value="">---Select One---</option>
<option value="admin">Admin Level</option>
<option value="user">User Level</option>
</select>
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
    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Direct_institution_reg/add_institutes_users/" enctype="multipart/form-data" novalidate>      
<h3>Hospital Users Management Page</h3><br>
<p align="center" id="userstatus"></p>



<!--<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Role Of Users <span class="required">*</span>
</label>
<select required class="form-control col-md-6 col-sm-6 col-xs-12" onChange="get_role_types();" id="role_types" name="role">
<option value="0">---Select User Role---</option>
<option value="audit">District Zakat Officer</option>
<option value="gs">Group Secretary</option>

</select>
</div>-->

<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Select Hospital <span class="required">*</span>
</label>
<select class="form-control col-md-6 col-sm-4 col-lg-6" onChange="get_institutes();" id="district_getvalue" name="district_id">
<option value="">---Select Hospital---</option>
<?php foreach($get_districts as $districts){?>
<option value="<?=$districts->id;?>"><?=$districts->district_name;?></option>
<?php }?>
</select>
</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Entity Name <span class="required">*</span>
</label>

<input type="text" id="focalPersonCNIC" name="entity_name" required placeholder="Please Enter Focal Person Name" class="form-control col-md-6 col-sm-6 col-xs-12">

</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">User CNIC (User Name) <span class="required">*</span>
</label>

<input type="text" id="focalPersonCNIC" name="user_name" required placeholder="Please Enter CNIC" class="form-control col-md-6 col-sm-6 col-xs-12">

</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Password <span class="required">*</span>
</label>

<input type="password" id="password" name="password" required  class="form-control col-md-6 col-sm-6 col-xs-12">

</div>


<!--<div id="permission_div" style="display:none;">
<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Users Previllages <span class="required">*</span>
</label>

<select class="form-control col-md-6 col-sm-4 col-lg-6" id="previllages" name="users_previllages">
<option value="">---Select One---</option>
<option value="admin">Admin Level</option>
<option value="user">User Level</option>
</select>
</div>
</div>-->



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
$("#users_table").DataTable({
"responsive": true,
"autoWidth": false,
});
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": true,
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
