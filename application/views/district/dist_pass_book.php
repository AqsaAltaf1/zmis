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

// Get total Fund for district
$dist_total_fund_query = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_fund_received = $dist_total_fund_query->row('total_fund');
//$this->db->last_query();

$get_ncf_dist_fund = $this->db->select('*')->from('natural_calamity_fund')
->where('district_id',$userid)
->where('financial_year',$getfinancial_year)
->get();
$get_ncf_dist_allocation = $get_ncf_dist_fund->row('amount_allocated');



$ga_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Guzara Allowance')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_ga_amount = $ga_query->row('amount_allocated');

$ma_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)
->where('account_head','Marriage Assistance')->where('installment',$get_inst)
->where('year',$getfinancial_year)->get();
$total_ma_amount = $ma_query->row('amount_allocated');

$dm_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Deeni Madaris')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_dm_amount = $dm_query->row('amount_allocated');

$hc_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Health Care')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_hc_amount = $hc_query->row('amount_allocated');

$esa_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (A)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_esa_amount = $esa_query->row('amount_allocated');

$esp_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (P)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_esp_amount = $esp_query->row('amount_allocated');

$total_amount_sum = $total_ga_amount + $total_ma_amount + $total_dm_amount + $total_hc_amount + $total_esa_amount + $total_esp_amount;

$get_remaining_balance = $total_fund_received - $total_amount_sum;

// CashBook Balance
$get_cashbook_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('district_id',$userid)->where('year',$getfinancial_year)->get();
  $cashbook_headwise_amount = $get_cashbook_query->row('amount_allocated');


$get_cashbook_admin_expense = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->get();
  $cashbook_admin_expense_amount = $get_cashbook_admin_expense->row('amount');

 $cashbook_total_amount = $cashbook_headwise_amount + $cashbook_admin_expense_amount;


 $get_passbook_amount = $this->db->select_sum('amount')->from('district_passbook')->where('district_id',$userid)->where('year',$getfinancial_year)->get();
 $passbook_amount = $get_passbook_amount->row('amount');

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

<!-- 
<?php $this->load->view('district/include/user_manue');?> -->

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
<div class="col-sm-4">
<h4 class="m-0 text-dark">District <strong><?php echo $district_name; ?></strong> Pass Book</h4>
</div><!-- /.col -->
<div class="col-sm-6">

<h5 class="m-0 text-dark"> F/YEAR: 
<b> <?php echo $getfinancial_year; ?></b> INSTALLMENT:<b style="color: black;"> <?php echo $get_inst;?></b> 

</h5>
</div>
<div class="col-sm-2">
	<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Pass Book Entries</button>
</div>

</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">District <strong><?php echo $district_name; ?></strong> PassBook Details</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_pass_book/manage_passbook_entries/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="control-label col-md-3" for="cheque_no">Cheque No <span class="required">*</span> </label>
<input type="text" name="cheque_no" id="cheque_no" required class="form-control col-md-8 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="cheque_no">Amount<span class="required">*</span> </label>
<input type="text" name="amount" id="amount" required class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="pass_date">Pass Date<span class="required">*</span> </label>
<input type="date" name="pass_date" id="pass_date" required class="form-control col-md-8 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="year" name="year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="installment" name="installment" required class="form-control col-md-8" value="<?php echo $get_inst;?>" readonly>
</div>


<div class="row form-group">

<label class="control-label col-md-3" for="installment">Remarks <span class="required">*</span> </label>

<textarea class="form-control col-md-8" name="remarks"></textarea>

</div>




<div>

</div>




<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button style="margin-right:3px;"  class="btn btn-primary col-md-1" type="reset">Reset</button>
<button style="margin-right:3px;"  class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>

</div>

</form>
</div>
</div>
</div>
</div>





<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">

<div class="row">

<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number"> PassBook Opening Balance</span>
<span class="info-box-number" style="color: blue;">

<?php
$passbook_balance = $total_fund_received + $get_ncf_dist_allocation;
echo number_format($passbook_balance,2);
?>


<br>
</span>
<small class="info-box-number">100%</small>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">PassBook Payment</span>
<span class="info-box-number" style="color: green;"> 
<?php


echo number_format($passbook_amount,2);
?>
<br>
</span>
<small class="info-box-number">

</small>
</div>
</div>
</div>
<div class="clearfix hidden-md-up"></div>

<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Passbooks Closing Balance</span>
<span class="info-box-number" style="color: red;">

<?php
$cash_pass_book_difference =  $passbook_balance - $passbook_amount;
echo number_format($cash_pass_book_difference,2);
?>

<br>
</span>
<small class="info-box-number">

</small>
</div>
</div>
</div>

</div>

</div>
<!-- <div class="row mb-2">
<div class="col-md-8 col-sm-4">

</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Pass Book Entries</button>
</div>
</div> -->



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
<th>Cheque#</th>
<th>Amount</th>
<th>Date</th>
<th>Year</th>
<th>Installment</th>
<th>Remarks</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_passbook_entries))
{
foreach($get_passbook_entries as $get_passbook_entries_values)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_passbook_entries_values['cheque_no'];?></td>
<td><?php echo $get_passbook_entries_values['amount'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_passbook_entries_values['add_date']));?></td>
<td><?php echo $get_passbook_entries_values['year'];?></td>
<td><?php echo $get_passbook_entries_values['installment'];?></td>
<td><?php echo $get_passbook_entries_values['remarks'];?></td>
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
