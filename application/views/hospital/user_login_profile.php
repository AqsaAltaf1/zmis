<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('hospital/include/title');?></title>

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
<br>
<br>

<!-- /.content-header -->
<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">

<?php 
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');
if(isset($success))
{
?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Attention . </strong> <?php echo $success;?>
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


<!-- Info boxes -->


<!-- Main Body -->
<div class="row">
<div class="col-md-1"></div>
<div class="col-12 col-md-10 col-sm-6">
<div class="card card-primary card-tabs">

<?php
$userid = $this->session->userdata('hospital_id');
$getdistrictquery = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$getusername = $getdistrictquery->row('username');
$getdistrict_name = $getdistrictquery->row('name');
?>

<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Hosp_login/user_login_profile_update/" enctype="multipart/form-data" novalidate>      
<h3>Update your Profile</h3>
<br>



<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Username <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="text" readonly value="<?php echo $getusername;?>" class="form-control col-md-8 col-xs-12">
</div>
</div>


<?php
$userid = $this->session->userdata('hospital_id');
$get_dist_qry = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$district_password = $get_dist_qry->row('password');
if($district_password == 1234)
{
?>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Old Password <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="text" name="password1" required value="<?php echo $getdistrictquery->row('password');?>" class="form-control col-md-8 col-xs-12">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">New Password <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="password" name="password" required value="" class="form-control col-md-8 col-xs-12">
</div>
</div>

<?php
}
else
{
?>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Password <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="password" name="password" required value="" class="form-control col-md-8 col-xs-12">
</div>
</div>
<?php
}
?>

<div class="ln_solid"></div>
<div class=" row form-group">
<div class="col-md-12 col-md-offset-3">
<input type="submit" name="submitbtn" class="btn btn-success">
<button type="reset" class="btn btn-primary float right">Reset</button>
</div>
</div>
</form> 
</div>
<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Dist_Institution_reg/manage_institution_reg_lzc/" enctype="multipart/form-data" novalidate>      
<h3>Add New LZCs To The Database</h3>
<br>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Select District <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">


<?php
$userid = $this->session->userdata('id');
$getdistrictquery = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$getdistrict_name = $getdistrictquery->row('district_name');
?>
<select class="form-control col-md-8" id="distt" name="district_id">
<option value="<?php echo $userid;?>"><?php echo $getdistrict_name; ?></option>
</select>



</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tehsil Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">


<select class="form-control col-md-8" id="getlzcid" name="tehsil_id">
<?php
$i=1;
if(!empty($get_all_lzclists))
{
foreach($get_all_lzclists as $get_all_lzcs)
{
?>
<option value="<?php echo $get_all_lzcs['id']; ?>"><?php echo $get_all_lzcs['tehsil_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>



</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">LZC Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="lzc_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="lzc_name" placeholder="Please Enter Hospital Name" required type="text">
</div>
</div>


<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lzc_code">LZC Code <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="lzc_code" type="text" name="lzc_code" placeholder="Please Enter Address" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
</div>
</div>



<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lzc_code">LZC Population<span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="lzc_population" type="text" name="lzc_population" placeholder="Please Enter LZC Population" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
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
<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Dist_Institution_reg/manage_dist_institution_reg/" enctype="multipart/form-data" novalidate>      
<h3>Add New Educational Institution To The Database</h3>
<br>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Select District <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">

<?php
$userid = $this->session->userdata('id');
$getdistrictquery = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$getdistrict_name = $getdistrictquery->row('district_name');
?>
<select class="form-control col-md-8" id="distt" name="district_id">
<option value="<?php echo $userid;?>"><?php echo $getdistrict_name; ?></option>
</select>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="inst_name"> Institution Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="inst_name" class="form-control col-md-8 col-xs-12" name="inst_name" placeholder="Please Enter Madrassa Name" required type="text">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="inst_address">Institution Address <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="inst_address" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="inst_address" placeholder="" required type="text">
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
<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">

    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Dist_Institution_reg/manage_institution_reg_madrassa/" enctype="multipart/form-data" novalidate>      
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

<select class="form-control col-md-8" id="distt" name="district_id">
<option value="<?php echo $userid;?>"><?php echo $getdistrict_name; ?></option>
</select>



</div>
</div>


<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Select LZC <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">


<select class="form-control col-md-8" id="distt" name="lzcget_id">
<option value="">----- Select -----</option>
<?php
$i=1;
if(!empty($get_all_lzcsnames))
{
foreach($get_all_lzcsnames as $get_all_lzcsvalues)
{
?>
<option value="<?php echo $get_all_lzcsvalues['id']?>"><?php echo $get_all_lzcsvalues['lzc_name']; ?></option>
<?php 
$i++;
}
}
?>


</select>



</div>
</div>



<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Address <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="mad_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="mad_address" placeholder="" required type="text">
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
<!-- /.card -->
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
</body>
</html>
