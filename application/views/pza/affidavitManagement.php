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
<div class="col-sm-7">
<h3 class="m-0 text-dark">Affidavit/Zakat Entry Form Management  </h3>
</div><!-- /.col -->

<div class="col-sm-2 div_align">
<label>Financial Year:</label>
</div>
<div class="col-sm-3 div_align">
<select class="form-control">
<option value="">2021-22</option>
<option value="">2020-21</option>
</select>
</div>
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
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-desktop"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total LZCs</span>
<span class="info-box-number text_align">
<?php echo "";?> <br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col --><i class="fa-solid fa-computer"></i>
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-hospital"></i></span>

<div class="info-box-content">
<span class="info-box-number">Affidavit Received</span>
<span class="info-box-number text_align"> 
<?php echo "";?> <br>
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

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-hands-helping"></i></span>

<div class="info-box-content">
<span class="info-box-number">Remaining LZC</span>
<span class="info-box-number text_align">
<?php echo "";?><br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->


</div>

<!-- Main Body -->
<div class="row">
<div class="col-md-1"></div>
<div class="col-lg-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

<li class="nav-item">
<a class="nav-link active" id="districtTab" data-toggle="pill" href="#addDistrict" role="tab" aria-controls="addDistrict" aria-selected="true">Guzara Allowance Applicant Management</a>
</li>

<!--<li class="nav-item">
<a class="nav-link" id="users_tab" data-toggle="pill" href="#users" role="tab" aria-controls="users" aria-selected="false">Create New User</a>
</li>

<li class="nav-item">
<a class="nav-link" id="deeniMadarisTab" data-toggle="pill" href="#addMadaris" role="tab" aria-controls="addMadaris" aria-selected="false">District Users</a>
</li>

<li class="nav-item">
<a class="nav-link" id="dropDownFieldTab" data-toggle="pill" href="#dropDownField" role="tab" aria-controls="dropDownField" aria-selected="false">Hospital Users</a>
</li>-->

<!--<li class="nav-item">
<a class="nav-link" id="foundationTab" data-toggle="pill" href="#addFoundation" role="tab" aria-controls="addFoundation" aria-selected="false">Add Foundation</a>
</li>-->
</ul>
</div>


<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="addDistrict" role="tabpanel" aria-labelledby="districtTab">




<div class="row">
<div class="col-12">

<div class="card">
<div class="card-header">
<h4>Manage Existing Zakat Affidavit</h4>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="users_table" class="table table-bordered table-hover" style="font-size:14px;">
<thead>
<tr>
<th>S#</th>
<th>District</th>
<th>LZC Name</th>
<th>Target Applicant</th>
<th>CNIC Received</th>
<th>Chairman</th>
<th>CNIC #</th>
<th>Affidavit</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$counter = 1;
if(!empty($getFormReceivedLZC))
{
foreach($getFormReceivedLZC as $FormReceivedLZC)
{
?>
<tr>
<td><?php echo $counter;?></td>
<td><?php echo $FormReceivedLZC['District_Name']; ?></td>
<td><?php echo $FormReceivedLZC['LZC_Name']; ?></td>
<td><?php echo $FormReceivedLZC['FormHandedOver']; ?> </td>
<td><?php echo $FormReceivedLZC['CNICHandedOver']; ?></td>
<td><?php echo $FormReceivedLZC['ChairmanName']; ?></td>

<td><?php echo $FormReceivedLZC['ChairmanCNIC']; ?></td>
<td>
<a target="_blank" href="<?php echo base_url();?>assets/<?php echo $FormReceivedLZC['Picture3'];?>" >
<img  style="width:50px; height:50px; border:2px solid #d1d1d1;" src="<?php echo base_url();?>assets/<?php echo $FormReceivedLZC['Picture3'];?>" > </a>

</td>


<td>
<a href="<?php echo base_url(); ?>AffidavitManagement/updateZakatEntryForm/<?php echo $FormReceivedLZC['Id']; ?>"  class="fa fa-edit btn btn-success btn-sm"></a>

</td>
</tr>


<?php

$counter++;
}
}
?>
</tbody>

</table>


</div>
<!-- /.card-body -->
</div>
<!-- /.col -->
</div>


</div> 
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
