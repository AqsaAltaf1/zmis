<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');


$username = $this->session->userdata('username');
$entityName = $this->session->userdata('entityName');
$user_type = $this->session->userdata('user_type');

// $get_finyear = $this->db->select('*')->from('zakatentryforms')->where('FinYear',$year)->get();







?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('district/include/title');?>
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
<section>

<?php $this->load->view('district/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('district/include/profile_manue');?>



<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('district/include/user_manue');?> -->




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
<div class="alert alert-success alert-dismissible" id="success">
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
<div class="col-md-12">
<h3 class="m-0 text-dark">No. of Zakat Form Received During Financial Year <strong><?php echo $getfinancial_year; ?></strong> </h3></div>
<!-- /.col -->

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
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Local Zakat Committees</span>
<span class="info-box-number" style="color: blue;">
<?php
$querycountLZC = $this->db->query('SELECT * FROM `lzc_list` WHERE district_id = "'.$userid.'" AND status = 1');
$countLZC =  $querycountLZC->num_rows();

echo $countLZC; 


?>
  <br>
</span>
<small class="info-box-number">100%</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->


<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Zakat Forms from LZCs</span>
<span class="info-box-number" style="color: green;"> 

<?php 
$queryZakatForm = $this->db->query('SELECT * FROM `zakatentryforms` WHERE District_Name = "'.$district_name.'" AND FinYear = "'.$getfinancial_year.'" AND status = 1');
$countqueryZakatForm =  $queryZakatForm->num_rows();

echo $countqueryZakatForm; 
?>

<br>
 </span>
<small class="info-box-number">
<?php 
$x = $countLZC;
$y = $countqueryZakatForm * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Remaining Zakat Forms</span>
<span class="info-box-number" style="color: red;">
<?php
$RemainingForms =  $countLZC - $countqueryZakatForm;
echo $RemainingForms;
?>
<br>
 </span>
<small class="info-box-number">
<?php 
$x = $countLZC;
$y = $RemainingForms * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>





</div>





</div>

<div class="row">
<div class="col-12">

<!-- /.card -->

<div class="card">
<div class="card-header">
<h3 class="card-title">LZCs Wise Summary of Zakat Form Collection of District <strong><?php echo $district_name ?></strong>  during  Financial Year:<strong><?php echo $getfinancial_year;?></strong></h3>

</div>

<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>No. of Forms Received</th>
<th>No. of CNIC Received</th>
<th>Delivered By</th>
<th>CNIC Front</th>
<th>CNIC Back</th>
<th>Affidavit</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($getAllZakatForm))
{
foreach($getAllZakatForm as $FormReceivedLZC)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $FormReceivedLZC['LZC_Name']; ?></td>
<td><?php echo $FormReceivedLZC['FormHandedOver']; ?> </td>
<td><?php echo $FormReceivedLZC['CNICHandedOver']; ?></td>
<td><?php echo $FormReceivedLZC['ChairmanName']; ?></td>
<td>
<a target="_blank" href="<?php echo base_url();?>assets/<?php echo $FormReceivedLZC['Picture1'];?>" >
<img style="width:50px; height:50px; border:2px solid #d1d1d1;" src="<?php echo base_url();?>assets/<?php echo $FormReceivedLZC['Picture1'];?> " >
</td>
<td>
<a target="_blank" href="<?php echo base_url();?>assets/<?php echo $FormReceivedLZC['Picture2'];?>">
<img  style="width:50px; height:50px; border:2px solid #d1d1d1;" src="<?php echo base_url();?>assets/<?php echo $FormReceivedLZC['Picture2'];?>" >
</td>
<td>
<a target="_blank" href="<?php echo base_url();?>assets/<?php echo $FormReceivedLZC['Picture3'];?>" >
<img  style="width:50px; height:50px; border:2px solid #d1d1d1;" src="<?php echo base_url();?>assets/<?php echo $FormReceivedLZC['Picture3'];?>" >

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
<!-- /.card -->
</div>
<!-- /.col -->
</div>

</div>
</section>

</div>



<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->


<footer class="main-footer">
<?php $this->load->view('district/include/footer');?>
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

$(document).ready(function() 
{
$('#example1').DataTable( {
dom: 'Bfrtip',
buttons: [
{
extend: 'print', text: 'Print Report', className: 'btn btn-sm btn-primary',
},
]
} );
} );

/*$(function () {
$("#example1").DataTable({
	dom: 'Bfrtip',
buttons: [
{
extend: 'print', text: 'Print Report', className: 'btn btn-sm btn-primary',
},
]
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
});*/
</script>


<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
}
</script>



<script type="text/javascript">

$(document).ready(function(){
setTimeout(function()
{ 
$('#success').slideUp();
}, 3000);
});


</script>



</script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js">
</script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js">
</script>


</body>
</html>
