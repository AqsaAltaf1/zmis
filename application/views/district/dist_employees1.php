<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('district/include/title');?></title>

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


.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color:#03F;
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
<div class="col-sm-8">
<h3 class="m-0 text-dark">Employees/Staff Lists of District <strong><?php echo $district_name; ?></strong> </h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">


</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Zakat Paid Staff Registration Form</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_employees/manage_dist_employees/" method="post" data-parsley-validate class="" enctype="multipart/form-data">


<div class="row form-group">
<label class="col-md-3" for="name">Name <span class="required">*</span>
</label>
<input type="Text" name="name" id="name" value="" placeholder="Zakat Paid Name" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="f_name">Father Name<span class="required">*</span> </label>
<input type="text" id="f_name" name="f_name" required class="form-control col-md-8" value="" placeholder="Father Name">
</div>

<div class="row form-group">
<label class="col-md-3" for="designation">Select Designation<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="designation" name="designation">
<option value="">---Select Designation----</option>

<?php
$i=1;
if(!empty($get_zakat_staff))
{
foreach($get_zakat_staff as $zakat_staff_type)
{
?>
<option value="<?php echo $zakat_staff_type['id']?>"><?php echo $zakat_staff_type['designation']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="cnic">CNIC<span class="required">*</span> </label>
<input type="text" id="cnic" name="cnic" required class="form-control col-md-8" value="" placeholder="CNIC" >
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="cnic">Password<span class="required">*</span> </label>
<input type="text" id="password" name="password" required class="form-control col-md-8" value="" placeholder="password" >
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="cnic">Select LZCs<span class="required">*</span> </label>

<select class="select2 form-control col-md-8" style="width:65%;" multiple="multiple" data-placeholder="Select LZCs" id="getlzc_list" name="getlzc_list[]" data-dropdown-css-class="select2-purple">
<?php
$i=1;
if(!empty($get_all_lzcs))
{
foreach($get_all_lzcs as $getdistrict_lzcs)
{
?>
<option value="<?php echo $getdistrict_lzcs['lzc_name']?>"><?php echo $getdistrict_lzcs['lzc_name']; ?></option>
<?php 
$i++;
}
}
?>

</select>


</div>



<div class="row form-group">
<label class="control-label col-md-3" for="dob">Date of Birth<span class="required">*</span> </label>
<input type="date" id="dob" name="dob" required class="form-control col-md-8" value="" placeholder="Date of Birth">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="domicile">Domicile<span class="required">*</span> </label>
<select class="form-control col-md-8" id="domicile" name="domiciles">
<option value="">---Select District----</option>
<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistricts)
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

<div class="row form-group">
<label class="control-label col-md-3" for="marital_status">Marital Status:<span class="required">*</span> </label>
<select class="form-control col-md-8" id="marital_status" name="marital_status">
<option value="">---Select One----</option>
<option value="Married">Married</option>
<option value="Un-Married">Un-Married</option>
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="contact_no">Contact No<span class="required">*</span> </label>
<input type="text" id="contact_no" name="contact_no" required class="form-control col-md-8" value="" placeholder="Contact No">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="qualification">Qualification:<span class="required">*</span> </label>

<select class="form-control col-md-8" id="qualification" name="qualification">
<option value="">---Select Highest Qualification----</option>
<option value="Matric">Matric</option>
<option value="FA/FSc">FA/FSc</option>
<option value="BA/BSc">BA/BSc</option>
<option value="MA/MSC">MA/MSC</option>
</select>

</div>
<div class="row form-group">
<label class="control-label col-md-3" for="address">Address:<span class="required">*</span> </label>
<input type="test" id="address" name="address" required class="form-control col-md-8" value="" placeholder="Home Address" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="appointment_date">Appointment Date:<span class="required">*</span> </label>
<input type="date" id="appointment_date" name="appointment_date" required class="form-control col-md-8" value="" placeholder="Appointment Date" >
</div>

<div class="row form-group">
<label for="picture" class="control-label col-md-3">Pasport Size Picture</label>
<div class="input-group col-md-8">
<div class="custom-file">
<input type="file" class="custom-file-input" name="emp_img" id="picture">
<label class="custom-file-label" for="picture">Choose file</label>
</div>
<div class="input-group-append">
<span class="input-group-text" id="">Upload</span>
</div>
</div>
</div>

<div class="row form-group">
<label class="control-label col-md-3">Job Description</label>
<textarea class="form-control col-md-8" rows="5" name="job_description" id="job_description">
</textarea>
</div>

<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit" class="col-md-4">
<div class="col-md-1"></div>
<button class="btn btn-primary col-md-1" type="reset">Reset</button>
<div class="col-md-4"></div>
<button class="btn btn-primary col-md-1" type="button" data-dismiss="modal">Cancel</button>

</div>

</form>
</div>
</div>
</div>
</div>

<!-- Update Employee Record Form-->



<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<div class="row">

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-landmark"></i></span>
<div class="info-box-content">
<span class="info-box-number" style="font-size: 15px;">Regular (Dist-Level)</span>
<span class="info-box-number">
<h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
<span class="info-box-number" style="color: blue;">
<h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> 
<h7 style="color: red; font-size: 15px; float: right;">Vacant: 0.00</h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
<div class="info-box-content">
<span class="info-box-number" style="font-size: 13px;">Zakat Paid (Group Secretary)</span>
<span class="info-box-number">
<h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
<span class="info-box-number" style="color: blue;">
<h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> 
<h7 style="color: red; font-size: 15px;float: right;">Vacant: 0.00</h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
<div class="info-box-content">
<span class="info-box-number">Zakat Paid (Audit Staff)</span>
<span class="info-box-number">
<h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
<span class="info-box-number" style="color: blue;">
<h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> 
<h7 style="color: red; font-size: 15px; float: right;">Vacant: 0.00</h7></span>
<small class="info-box-number"></small>
</div>

</div>

</div>

<!-- <div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info"><i class="fas fa-tag"></i></span>
<div class="info-box-content">
<span class="info-box-number" style="font-size: 15px;">Zakat Paid (Dist-Level)</span>
<span class="info-box-number">
<h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
<span class="info-box-number" style="color: blue;">
<h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
<h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
<small class="info-box-number"></small>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info"><i class="fas fa-tag"></i></span>
<div class="info-box-content">
<span class="info-box-number" style="font-size: 15px;">ADP</span>
<span class="info-box-number">
<h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
<span class="info-box-number" style="color: blue;">
<h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
<h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
<small class="info-box-number"></small>
</div>

</div>

</div> -->



</div>


<!-- Nave bar row -->

<div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Registration Proforma for Zakat Paid Staff</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Register New Zakat Paid Staff</button>
</div>
</div>



<!-- Main Form -->
<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">List of Regular Zakat & Ushr Employees of District <strong><?php echo $district_name; ?></strong> </h3>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Name</th>
<th>CNIC</th>
<th>Designation</th>
<th>BPS</th>
<th>Appointment Date</th>
<th>Retirement Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Interne</td>
<td> 4</td>
<td>89</td>
<td>Trident</td>
<td>hjhj</td>
<td> knkolokmk</td>
<td>
<a type="button" class="glyphicon glyphicon-check btn btn-success" href="<?php echo base_url();?>dist_user_profile"> <i class="fas fa-eye"></i>Profile</a>

<!-- <button type="button" class="glyphicon glyphicon-check btn btn-primary" data-toggle="modal" data-target=".update"> <i class="fas fa-edit"></i> </button></td> -->
</tbody>

</table>
</div>
<!-- /.card-body -->
</div>

</div>

<!-- "Zakat Paid Staff list" -->
<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">List of Zakat Paid Staff of District <strong><?php echo $district_name; ?> </strong> </h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Name</th>
<th>CNIC</th>
<th>Designation</th>
<th>Appointment Date</th>
<th>Photo</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_zakat_staff_listing))
{
foreach($get_zakat_staff_listing as $get_zakat_staff_values)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_zakat_staff_values['name']; ?></td>
<td><?php echo $get_zakat_staff_values['cnic']; ?></td>
<td>
<?php 
$designation_id = $get_zakat_staff_values['designation_id']; 
$getdesginationqry = $this->db->select('*')->from('zakat_paid_staff_type')->where('id',$designation_id)->get();
echo $getdesgination_name = $getdesginationqry->row('designation');

?></td>
<td><?php echo date("d-m-Y",strtotime($get_zakat_staff_values['appointment_date'])); ?></td>
<td> 

<a target="_blank" href="<?php echo base_url(); ?>assets/uploads/<?php echo $get_zakat_staff_values['picture'];?>">
<img style="width:50px; height:50px; border:2px solid #d1d1d1;" src="<?php echo base_url(); ?>assets/uploads/<?php echo $get_zakat_staff_values['picture'];?>">
</a>

</td>
<td>
<a class="glyphicon glyphicon-check btn btn-success btn-sm" href="<?php echo base_url();?>Dist_employees/dist_zakatpaid_user/<?php echo $get_zakat_staff_values['id'];?>"> <i class="fas fa-eye"></i> </a>
<button type="button" class="glyphicon glyphicon-check btn btn-primary btn-sm" data-toggle="modal" data-target="#update<?php echo $i;?>"> <i class="fas fa-edit"></i> </button>
<a onClick="return confirm('Sure to Delete.?')" class="glyphicon glyphicon-check btn btn-danger btn-sm" href="<?php echo base_url(); ?>Dist_employees/manage_delete_dist_employees/<?php echo $get_zakat_staff_values['id'];?>"> <i class="fas fa-trash"></i> </a>
</td>
</tr>





<div class="modal fade" id="update<?php echo $i;?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update Zakat Paid Staff Record</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_employees/manage_dist_editemployees/" method="post" data-parsley-validate class="" enctype="multipart/form-data">


<div class="row form-group">
<label class="col-md-3" for="r_amount">Name <span class="required">*</span>
</label>
<input type="Text" name="name" id="name" value="<?php echo $get_zakat_staff_values['name']; ?>" placeholder="Employees Name" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Father Name<span class="required">*</span> </label>
<input type="text" id="f_name" name="f_name" required class="form-control col-md-8" value="<?php echo $get_zakat_staff_values['f_name']; ?>" placeholder="Father Name">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Select Designation<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="desig" name="designation">

<?php
$designation_id = $get_zakat_staff_values['designation_id'];
$getdesignationqry = $this->db->select('*')->from('zakat_paid_staff_type')->where('id',$designation_id)->get();
$getdesignation_name = $getdesignationqry->row('designation');
?>
<option style="background:#3C0;" value="<?php echo $designation_id;?>"><?php echo $getdesignation_name;?></option>


<?php
$i=1;
if(!empty($get_zakat_staff))
{
foreach($get_zakat_staff as $zakat_staff_type)
{
?>
<option value="<?php echo $zakat_staff_type['id']?>"><?php echo $zakat_staff_type['designation']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">CNIC<span class="required">*</span> </label>
<input type="text" id="cnic" name="cnic" required class="form-control col-md-8" value="<?php echo $get_zakat_staff_values['cnic']; ?>" placeholder="CNIC" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Date of Birth<span class="required">*</span> </label>
<input type="date" id="dob" name="dob" required class="form-control col-md-8" value="<?php echo date("Y-m-d",strtotime($get_zakat_staff_values['dob'])); ?>" placeholder="Date of Birth">
</div>
<?php 
$domicileid = $get_zakat_staff_values['domicile']; 
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$domicileid)->get();
$district_name = $get_dist_name->row('district_name');
?>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Domicile<span class="required">*</span> </label>
<select class="form-control col-md-8" id="domicile" name="domiciles" required>
<option style="background:#0C0;" value="<?php echo $domicileid;?>"><?php echo $district_name;?></option>
<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistricts)
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

<div class="row form-group">
<label class="control-label col-md-3" for="year">Marital Status:<span class="required">*</span> </label>
<select class="form-control col-md-8" id="marital_status" name="marital_status">
<option style="background:#0C0;" value="<?php echo $get_zakat_staff_values['marital_status']; ?>"><?php echo $get_zakat_staff_values['marital_status']; ?></option>
<option value="Married">Married</option>
<option value="Un-Married">Un-Married</option>
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Contact No<span class="required">*</span> </label>
<input type="text" id="contact" name="contact_no" required class="form-control col-md-8" value="<?php echo $get_zakat_staff_values['contact_no']; ?>" placeholder="Contact No">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Qualification:<span class="required">*</span> </label>
<select class="form-control col-md-8" id="qualification" name="qualification">
<option style="background:#0C0;" value="<?php echo $get_zakat_staff_values['qualification']; ?>"><?php echo $get_zakat_staff_values['qualification']; ?></option>
<option value="Matric">Matric</option>
<option value="FA/FSc">FA/FSc</option>
<option value="BA/BSc">BA/BSc</option>
<option value="MA/MSC">MA/MSC</option>
</select></div>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Address:<span class="required">*</span> </label>
<input type="test" id="address" name="address" required class="form-control col-md-8" value="<?php echo $get_zakat_staff_values['address']; ?>" placeholder="Home Address" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Appointment Date:<span class="required">*</span> </label>
<input type="date" id="doa" name="appointment_date" required class="form-control col-md-8" value="<?php echo date("Y-m-d",strtotime($get_zakat_staff_values['appointment_date'])); ?>" placeholder="Appointment Date" >
</div>

<div class="row form-group">
<label for="exampleInputFile" class="control-label col-md-3">Pasport Size Picture</label>
<div class="input-group col-md-7">
<div class="custom-file">
<input type="file" name="emp_img" class="custom-file-input" id="exampleInputFile">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>
</div>
</div>

<div class="col-md-2">
<p>
<a target="_blank" href="<?php echo base_url(); ?>assets/uploads/<?php echo $get_zakat_staff_values['picture'];?>">
<img style="width:50px; height:50px; border:2px solid #d1d1d1;" src="<?php echo base_url(); ?>assets/uploads/<?php echo $get_zakat_staff_values['picture'];?>">
</a>
</p>
</div>

</div>

<div class="row form-group">
<label class="control-label col-md-3">Job Description</label>
<textarea class="form-control col-md-8" rows="5" name="job_description" id="des_remarks"><?php echo $get_zakat_staff_values['job_description']; ?>
</textarea>
</div>

<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>

<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
<input type="hidden" name="get_emp_id" value="<?php echo $get_zakat_staff_values['id'];?>">
</div>

</form>
</div>
</div>
</div>
</div>










<?php 
$i++;
}
}
?>
</tbody>

</table>
</div>
<!-- /.card-body -->
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

<?php $this->load->view('district/include/footer');?>


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



<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>


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

  })

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
</body>
</html>
