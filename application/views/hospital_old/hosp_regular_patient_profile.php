<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$userid = $this->session->userdata('id');
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
#td_size 
{
font-size: 14px;
}

</style>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-footer-fixed">
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
<div class="col-sm-6 col-md-8">
<h3 class="m-0 text-dark"><strong><?php echo $hospital_name;?></strong> Hospital Patient's Profile</h3>

</div>

<div class="col-md-4">
	<a href="dashboard.php" style="color: white;"><button class="btn btn-primary" > Go Back to Dashboard </button></a>
<input type="button" class="btn btn-success float-right" onclick="printDiv('printableArea')" value="Print Report" />


</div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="row"></div>


<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">


<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title"> <strong>Patient's Complete Profile</strong> </h3>

</div>
<!-- /.card-header -->

<div class="card-body">
<h3 style="font-style: oblique;"><u>Patient's Personal Details</u></h3>
<!-- Search form 1-->
<div class="row"></div>
<table id="" class="table table-bordered table-striped">
<thead>
<tr>
<th colspan="2" style="font-size: 20px;">Hospital Name</th>

<td colspan="6" style="font-size: 20px; font-weight: bold;">
<?php 

echo $hospital_name = $get_hosp_name->row('name');
?></td>
</tr>
</thead>
<tbody>

<tr>

<th id="td_size">OPD No</th>
<td id="td_size"><!-- <?php echo $fetchvalue['opd_no'];?> --> 67</td>
<th id="td_size">Istehqaq No</th>
<td id="td_size"><!-- <?php echo $fetchvalue['Istehqaq_no'];?> --> 443</td>
<th id="td_size">Patient' Name</th>
<td id="td_size"><!-- <?php echo $fetchvalue['pt_name'];?> -->Muhammad Shahzad</td>
<th id="td_size">Father Name</th>
<td id="td_size"><!-- <?php echo $fetchvalue['fh_name'];?> --> Muhamamd Asghar</td>
</tr>
<tr>
<th id="td_size">CNIC/Form-B</th>
<td id="td_size"><!-- <?php echo $fetchvalue['pt_cnic'];?> -->13302-4773929-9</td>
<th id="td_size">Age</th>
<td id="td_size"><!-- <?php echo $fetchvalue['age'];?> --> 40 Years</td>
<th id="td_size">Gender</th>
<td id="td_size"><!-- <?php echo $fetchvalue['gender'];?> -->Male</td>
<th id="td_size">District Name</th>
<td id="td_size">
<!-- <?php 
$district_id =  $fetchvalue['district'];
$select_district_name = "SELECT * FROM district_users WHERE id = '".$district_id."'";
$run_district_name = mysql_query($select_district_name);
$fetch_district_name = mysql_fetch_array($run_district_name);
echo $district_name =  $fetch_district_name['district_name'];
?> -->
Haripur
</td>
</tr>
<tr>
<th id="td_size">LZC Name</th>
<td id="td_size"><!-- <?php echo $fetchvalue['lzc'];?> --> Bareela</td>
<th id="td_size">Patient's Catagory</th>
<td id="td_size"><!-- <?php echo $fetchvalue['pt_catagory'];?> --> Outdoor</td>
<th id="td_size">Admission Date</th>
<td id="td_size"><!-- <?php echo $fetchvalue['admin_date'];?> --> 9090</td>
<th id="td_size">Discharge Date</th>
<td id="td_size"><!-- <?php echo $fetchvalue['discharge_date'];?> -->909</td>
</tr>
<tr>
<th id="td_size">Cell No</th>
<td id="td_size"><!-- <?php echo $fetchvalue['cell_no'];?> --> 0331-5426692</td>
<th id="td_size">Disease Type</th>
<td colspan="5"><!-- <?php echo $fetchvalue['disease'];?> --> Temprature</td>
</tr>
</tbody>
</table>
<br>
<h3 style="font-style: oblique;"><u>Patient's Medication History</u></h3>
<table id="" class="table table-bordered table-striped">
<tbody>

<tr>
<th>Sr#</th>
<th>Medicine Name</th>
<th>Price Per Unit</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Date</th>
</tr>
<tr>

<?php
$i = 1;
// Patient's Medication History 
// $select_medication = "SELECT * FROM pt_medicine WHERE pt_id = '".$pid_content."' order by id DESC";
// $run_medication_qry = mysql_query($select_medication);
// while($fetch_medication = mysql_fetch_array($run_medication_qry))
// {
?>
<td><?php echo $i;?></td>
<td><?php
// $med_id = $fetch_medication['medicine_name'];

// $select_medicine_name = "SELECT * FROM medicine_list WHERE id = '".$med_id."'";
// $run_med_qry = mysql_query($select_medicine_name);
// $fet_med_name = mysql_fetch_array($run_med_qry);
// echo $medcine_name =  $fet_med_name['medicine_name'];

?> 
Panadol</td>
<td><!-- <?php echo $fetch_medication['unit_price'];?> --> 12</td>
<td><!-- <?php echo $fetch_medication['quantity'];?> --> 4</td>
<td><!-- <?php echo $fetch_medication['total_price'];?> --> 80</td>
<td><!-- <?php echo $fetch_medication['add_date'];?> --> 12-10-2009</td>
</tr>


</tbody>
                    
</table>

<br>

<h3 style="font-style: oblique;"><u>Patient's Tests History</u></h3>
<table id="" class="table table-bordered table-striped">
<tbody>

<tr>
<th>Sr#</th>
<th>Test Name</th>
<th>Price Per Unit</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Date</th>
</tr>
<tr>

<?php
$i = 1;
// Patient's Medication History 
// $select_medication = "SELECT * FROM pt_medicine WHERE pt_id = '".$pid_content."' order by id DESC";
// $run_medication_qry = mysql_query($select_medication);
// while($fetch_medication = mysql_fetch_array($run_medication_qry))
// {
?>
<td><?php echo $i;?></td>
<td><?php

?> 
Blood test</td>
<td><!-- <?php echo $fetch_medication['unit_price'];?> --> 12</td>
<td><!-- <?php echo $fetch_medication['quantity'];?> --> 4</td>
<td><!-- <?php echo $fetch_medication['total_price'];?> --> 80</td>
<td><!-- <?php echo $fetch_medication['add_date'];?> --> 12-10-2009</td>
</tr>


</tbody>
                    
</table>

<br>

<h3 style="font-style: oblique;"><u>Patient's Surgery Details</u></h3>

<table id="" class="table table-striped table-bordered">
<tbody>

<tr>
<th>Sr#</th>
<th>Surgery Type</th>
<th>Surgen Name</th>
<th>Surgery Result</th>
<th>Surgen Fee</th>
<th>Date</th>
</tr>
<tr>
<!-- <?php
$surg = 1;
$select_surgary = "SELECT * FROM pt_surgary WHERE pt_id = '".$pid_content."' order by id DESC";
$run_surgary_qry = mysql_query($select_surgary);
while($fetch_surgary = mysql_fetch_array($run_surgary_qry))
{
?> -->
<td><!-- <?php echo $surg;?> --> 1</td>
<td><!-- <?php echo $fetch_surgary['surgery_type'];?> --> Internal</td>
<td><!-- <?php echo $fetch_surgary['surgeon_name'];?> --> Muhammad Afzal</td>
<td><!-- <?php echo $fetch_surgary['surgery_result'];?> --> Okay</td>
<td><!-- <?php echo $fetch_surgary['surgeon_fee'];?> --> 2999</td>
<td><!-- <?php echo $fetch_surgary['add_date'];?> --> 2020-08-30</td>
</tr>
<!-- <?php
$surg++;
}
?> -->

</tbody>
</table>
	

<br>
<h3 style="font-style: oblique;"> <u> Patient's Total Expenditure</u> </h3>
<table class="table table-striped table-bordered">
<tbody>

<tr style="color: black; font-weight: bold;">
<hr>
<div class="row">
<div class="col-md-3">
<h4 style="font-variant: ;">Total Amount</h4>
</div>
<div class="col-md-3">
</div>
<div class="col-md-4">
</div>
<div class="col-md-2">
<!-- <?php 
$select_total_expense = "SELECT SUM(total_expense) as total_amount FROM  pt_expense WHERE pt_id = '".$pid_content."' order by id DESC";
$run_expense_qry = mysql_query($select_total_expense);
$fetch_pt_expense = mysql_fetch_array($run_expense_qry);
$total_pt_expense = $fetch_pt_expense['total_amount'];

?> -->
<h3 class="heading_style">Rs.<!-- <?php echo $total_pt_expense;?> -->3000/-</h3>
</div>
</tr>
</tbody>
</div>
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
