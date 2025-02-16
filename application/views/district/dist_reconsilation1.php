<?php

$runpzf_query = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query->row('pza_amount');

$runpza_query = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->get();
$total_pzareceived_amount = $runpza_query->row('amount_allocated');
$gettotalnet_balance =  $total_pzfreceived_amount - $total_pzareceived_amount;

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
<strong>Success!</strong> <?php echo $error;?>
</div>
<?php	
}
?>







<div class="row mb-2">
<div class="col-sm-8">
<h3 class="m-0 text-dark">District <strong><?php echo $district_name; ?></strong> Pass Book</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> F/YEAR: 
<b> <?php echo $getfinancial_year; ?></b> INSTALLMENT:<b style="color: black;"> <?php echo $get_inst;?></b> 

</h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">

<!--<div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Head Wise Fund Allocation</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Pass Book Entries</button>
</div>
</div>-->



<!-- Main Form -->
<div class="row">

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h1 class="card-title" style="font-size: 25px;">District <strong><?php echo $district_name; ?></strong> PassBook Details during Year:<strong><?php echo $getfinancial_year; ?></strong> and Inst:<strong><?php echo $get_inst; ?></strong></h1>
 <!-- Print list -->
<a target="_blank" href="printlist.php" class="btn btn-sm btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Pass Book Cheque#</th>
<th>Amount</th>
<th>Date</th>


<th>Cash Book Cheque#</th>
<th>Amount</th>


<th>Year</th>

<th>Status</th>

</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_passcheques))
{
foreach($get_passcheques as $get_passcheques_values)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_passcheques_values['cheque_no'];?></td>
<td><?php echo $get_passcheques_values['amount'];?></td>

<td><?php echo date("d-m-Y",strtotime($get_passcheques_values['add_date']));?></td>

<td>

<?php
$this->db->select("*");
$this->db->from("dist_head_wise_fund");
$this->db->where("year",$getfinancial_year);
$this->db->where("cheque_no",$get_passcheques_values['cheque_no']);
$this->db->where("district_id",$userid);
$getcheque_status = $this->db->get()->num_rows();
if($getcheque_status > 0)
{

echo $get_passcheques_values['cheque_no'];
	
}
else
{
echo "---";	
}
?>

</td>

<td>

<?php
if($getcheque_status > 0)
{
$query_amount = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where("year",$getfinancial_year)
->where("cheque_no",$get_passcheques_values['cheque_no'])
->where("district_id",$userid)
->get();
echo $total_query_amount = $query_amount->row('amount_allocated');
}
else
{
echo "---";	
}
?>


</td>
<td><?php echo $get_passcheques_values['year'];?></td>


<td>
<?php
if($getcheque_status > 0)
{
?>
<button class="btn btn-sm btn-success"><?php echo "Cleared";?></button>
<?php
}
else
{
?>
<button class="btn btn-sm btn-danger"><?php echo "Not Cleared";?></button>
<?php
}
?>

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

<!-- Table no 2 -->
<div class="row"></div>

<!-- Table No 3 -->
<div class="row"></div>




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


<!-- For data tables -->


<script>

// ------------- Local Zakat Committee -------------//

$('#account_head').on('change',function()
{
if( $(this).val()==="Guzara Allowance")
{
$("#lzc_div").slideDown()
$("#guzara_allownce_div").slideDown();
$("#marriage_assistance_div").slideUp();
$("#institution_div").slideUp();

$("#allocate_amount_div").slideUp();
$("#madrassa_div").slideUp();
}
else if($(this).val()==="Marriage Assistance")
{
$("#lzc_div").slideDown();
$("#marriage_assistance_div").slideDown();
$("#guzara_allownce_div").slideUp();
$("#institution_div").slideUp();

$("#allocate_amount_div").slideUp();
$("#madrassa_div").slideUp();
} 
else if( $(this).val() === "Deeni Madaris") 
{
$("#lzc_div").slideUp();
$("#madrassa_div").slideDown();
$("#allocate_amount_div").slideDown();
$("#institution_div").slideUp();

$("#guzara_allownce_div").slideUp();
$("#marriage_assistance_div").slideUp();	
}
else if( $(this).val() === "Adminnistrative_Expenses") 
{
$("#madrassa_div").slideUp();
$("#guzara_allownce_div").slideUp();
$("#marriage_assistance_div").slideUp();
$("#institution_div").slideUp();

$("#allocate_amount_div").slideDown();	
}

else if( $(this).val() === "Health Care")
{
$("#institution_div").slideUp();
$("#lzc_div").slideUp();	
$("#madrassa_div").slideUp();
$("#guzara_allownce_div").slideUp();
$("#marriage_assistance_div").slideUp();

$("#allocate_amount_div").slideDown();		
}

else if(($(this).val() === "Educational Stipend (A)") ||  ($(this).val() === "Educational Stipend (P)"))
{
$("#institution_div").slideDown();
$("#allocate_amount_div").slideDown();

$("#lzc_div").slideUp();
$("#madrassa_div").slideUp();
$("#guzara_allownce_div").slideUp();
$("#marriage_assistance_div").slideUp();	
}






});


function calculatenobs_ga(getnobs)
{
var grandtotal = getnobs * 12000;
document.getElementById("amount_allocatedvalue").value = grandtotal;
}



function calculatenobs_ma(getnobs)
{
var grandtotal = getnobs * 20000;
document.getElementById("amount_allocatedvalues").value = grandtotal;
}


</script>

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
