<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('hospital_id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('hospital/include/title');?>
</title>

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


<?php $this->load->view('hospital/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('hospital/include/profile_manue');?>



<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('hospital/include/user_manue');?> -->




<?php $this->load->view('hospital/include/sidebar');?>

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
<div class="col-sm-6 col-md-10">
<h3 class="m-0 text-dark"><strong><?php echo $hospital_name;?></strong> Hospital Medicines Tests Surgeries List</h3>

</div>

<div class="col-sm-6 col-md-2">
F/Year: <strong><?php echo $getfinancial_year;?></strong> & Inst: <strong><?php echo $get_inst; ?></strong>

</div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="row"></div>


<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<div class="row"><div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Medicines</span>
<span class="info-box-number" style="color: blue;">
<?php
$this->db->select("*");
$this->db->from("treatment_types_values");
$this->db->where("hospital_id",$userid);
$this->db->where("type_id",1);
echo $this->db->get()->num_rows();
?>
  <br>
</span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Tests</span>
<span class="info-box-number" style="color: green;"> 

<?php
$this->db->select("*");
$this->db->from("treatment_types_values");
$this->db->where("hospital_id",$userid);
$this->db->where("type_id",2);
echo $this->db->get()->num_rows();
?> 
<br>
</span>

</div>
</div>
</div>

<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Surgeries</span>
<span class="info-box-number" style="color: red;">
<?php
$this->db->select("*");
$this->db->from("treatment_types_values");
$this->db->where("hospital_id",$userid);
$this->db->where("type_id",3);
echo $this->db->get()->num_rows();
?>
<br>
 </span>
</div>
</div>
</div></div>

<!-- Search form -->
<div class="row">


<!-- Search form 2 -->
<div class=" col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">Add Medicines / Tests /  Surgeries</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">


<form class="form-inline" action="<?php echo base_url(); ?>Hosp_medicines_manage/add_medicines" method="post">


<div class="col-md-5">
<div class="form-group">   
<label for="date">Enter Name</label>
<input type="text" required name="medicine_name" value="" class="form-control" style="width:100%;">
</div>
</div>



<div class="col-md-5">
<div class="form-group">   
<label for="date">Select Type</label>
<select required class="form-control" id="get_types" name="get_types" style="width:100%;">
<option value="">--- Select Type ----</option>
<?php
$i=1;
if(!empty($get_all_types))
{
foreach($get_all_types as $get_types)
{
?>
<option value="<?php echo $get_types['id']?>"><?php echo $get_types['treatment_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>


<div class="col-md-2">
<div class="form-group">   
<input type="submit" style="margin-top:22px;" class="btn btn-success btn-block" name="submit" value="Submit">
</div>
</div>
</div>

</form>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>

</div>

<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title" style="margin-top:10px; font-weight:bold;"> Hospital Medicines / Tests / Surgeries List </h3>


<a target="_blank" href="<?php echo base_url(); ?>Hosp_medicines_manage/manage_medicines_print/3" style="margin:0 3px;" class="btn btn-primary float-right">Print Surgeries</a>
<a target="_blank" href="<?php echo base_url(); ?>Hosp_medicines_manage/manage_medicines_print/2" style="margin:0 3px;" class="btn btn-primary float-right">Print Tests</a>
<a target="_blank" href="<?php echo base_url(); ?>Hosp_medicines_manage/manage_medicines_print/1" style="margin:0 3px;" class="btn btn-primary float-right">Print Medicines</a>



</div>
<!-- /.card-header -->

<div class="card-body">

<!-- Search form 1-->
<div class="row"></div>
<table id="example1" class="table table-bordered table-striped">
<thead>

<tr>
<th>S#</th>
<th>Name</th>
<th>Type</th>
<th>Add Date</th>
<th style="width:50px;">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_all_medicinces))
{
foreach($get_all_medicinces as $get_allvalues)
{
?>	

<tr>
<td><?php echo $i;?></td>
<td style="text-transform:capitalize;"><?php echo $get_allvalues['name'];?></td>
<td>
<?php 
$type_id = $get_allvalues['type_id']; 
$get_type_name = $this->db->select('*')->from('treatment_types')->where('id',$type_id)->get();
echo $treatment_name = $get_type_name->row('treatment_name');
?>
</td>
<td><?php echo date("d-m-Y",strtotime($get_allvalues['add_date']));?></td>



<td>
<!--
<a type="button" class="glyphicon glyphicon-check btn btn-success btn-sm" href="#"> <i class="fas fa-edit"></i> </a>
-->

<a type="button" onClick="return confirm('Sure to Delete..?')" class="glyphicon glyphicon-check btn btn-danger btn-sm" href="<?php echo base_url(); ?>Hosp_medicines_manage/manage_medicines_delete/<?php echo $get_allvalues['id'];?>"> <i class="fas fa-trash"></i> </a>

</td>


</tr>
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

<div class="row"></div>



<!-- Main row -->

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
Copyright © 2020 

<footer class="main-footer">
<strong>Copyright &copy; 2020 <a href="#">Government of Khyber Pakhtunkhwa</a>.</strong>
All rights reserved
<div class="float-right d-none d-sm-inline-block">
<b>Developed By:</b> Muhammad Shahzad
</div>
</footer>
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
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>
</body>
</html>
