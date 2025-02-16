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



// CashBook Payment
$get_cashbook_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('district_id',$userid)->where('year',$getfinancial_year)->get();
  $cashbook_headwise_amount = $get_cashbook_query->row('amount_allocated');

$get_cashbook_admin_expense = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->get();
  $cashbook_admin_expense_amount = $get_cashbook_admin_expense->row('amount');

 $cashbook_total_amount = $cashbook_headwise_amount + $cashbook_admin_expense_amount;



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
<h3 class="m-0 text-dark">District <strong><?php echo $district_name; ?></strong> Cash Book</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year; ?></b> INSTALLMENT:<b style="color: black;"> <?php echo $get_inst;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">District <strong><?php echo $district_name; ?></strong> Head Wise Zakat Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_head_wise_fund_alloc/manage_dist_headwise_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget at <strong><?php echo $district_name; ?></strong> <span class="required">*</span>
</label>


<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($get_remaining_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Select Account Head<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="account_head" name="account_head">
<option value="">---Select One----</option>
<option value="Guzara Allowance">Guzara Allowance</option>
<option value="Marriage Assistance">Marriage Assistance</option>
<option value="Deeni Madaris">Deeni Madaris</option>
<option value="Adminnistrative_Expenses">Administrative Expenditure (Salaries of Zakat Paid Staff &amp; Allowance of Chairmen, LZCs)
</option>
<option value="Health Care">Health Care</option>
<option value="Educational Stipend (A)">Educational Stipend (A)</option>
<option value="Educational Stipend (P)">Educational Stipend (P)</option>
</select>
</div>

<div class="row form-group" id="lzc_div" style="display:none;">
<label class="col-md-3" for="check">Select LZC<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="lzc" name="lzc">
<option value="">---Select LZCs---</option>

<?php
$i=1;
if(!empty($get_all_lzc))
{
foreach($get_all_lzc as $get_lzcname)
{
?>
<option value="<?php echo $get_lzcname['id']?>"><?php echo $get_lzcname['lzc_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>

<div class="row form-group" id="madrassa_div" style="display:none;">
<label class="col-md-3" for="check">Select Madarassa<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="madarassa" name="madarassa">


<?php
$i=1;
if(!empty($get_all_deeni_madaris))
{
foreach($get_all_deeni_madaris as $get_all_deeni_madarisvalue)
{
?>
<option value="<?php echo $get_all_deeni_madarisvalue['id']?>"><?php echo $get_all_deeni_madarisvalue['madrassa_name']; ?></option>
<?php 
$i++;
}
}
?>


</select>
</div>
<div class="row form-group" id="institution_div" style="display: none;">
<label class="col-md-3" for="check">Select Institution<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="institution" name="institution">

<?php
$i=1;
if(!empty($get_all_inst_list))
{
foreach($get_all_inst_list as $get_all_instlist)
{
?>
<option value="<?php echo $get_all_instlist['id']?>"><?php echo $get_all_instlist['institution_name']; ?></option>
<?php 
$i++;
}
}
?>


</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="cheque_no">Cheque No <span class="required">*</span> </label>
<input type="text" name="cheque_no" id="cheque_no" required class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="year" name="year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="installment" name="installment" required class="form-control col-md-8" value="<?php echo $get_inst;?>" readonly>
</div>



<div>

<div id="guzara_allownce_div" style="display:none;">
<div class="row form-group">
<label class="control-label col-md-3" for="mustahiq_no">No of Mustahiqeen <span class="required">*</span> </label>
<input type="number" name="nob_ga" onKeyUp="calculatenobs_ga(this.value);" min="1" id="nobvalues" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated_ga" min="1" max="<?php echo $total_fund_received;?>" id="amount_allocatedvalue" class="form-control col-md-8 col-xs-12">
</div>
</div>


<div id="marriage_assistance_div" style="display:none;">
<div class="row form-group">
<label class="control-label col-md-3" for="mustahiq_no">No of Mustahiqeen <span class="required">*</span> </label>
<input type="number" name="nob_ma" onKeyUp="calculatenobs_ma(this.value);" min="1" id="nobvalues" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated_ma" min="1" max="<?php echo $total_fund_received;?>" data-validate-minmax="" id="amount_allocatedvalues" class="form-control col-md-8 col-xs-12">
</div>
</div>

<div id="allocate_amount_div" style="display:none;">
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated_all" min="1" max="<?php echo $total_fund_received;?>" data-validate-minmax="" id="amount_allocatedvaluev" class="form-control col-md-8 col-xs-12">
</div>
</div>


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


<!-- Info boxes -->
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">CashBook Opening Balance</strong> </span>
<span class="info-box-number" style="color: blue;">

<?php
$cashbook_OB = $total_fund_received + $get_ncf_dist_allocation;
echo number_format($cashbook_OB,2); 
?>


<br>
</span>
<small class="info-box-number">100%</small>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">CashBook Payment</span>
<span class="info-box-number" style="color: green;"> 
<?php
echo number_format($cashbook_total_amount,2);
?>
<br>
</span>
<small class="info-box-number">

</small>
</div>
</div>
</div>
<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">CashBook Closing Balance</span>
<span class="info-box-number" style="color: red;">

<?php
$net_balance =  $total_fund_received - $cashbook_total_amount;
echo $net_balance_nf= number_format($net_balance,2);
?>

<br>
</span>
<small class="info-box-number">

</small>
</div>
</div>
</div>
</div>





<!-- Main Form -->
<div class="row">

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h1 class="card-title" style="font-size: 25px;">District <strong><?php echo $district_name; ?></strong> CashBook Details during Year:<strong><?php echo $getfinancial_year; ?></strong> and Inst:<strong><?php echo $get_inst; ?></strong></h1>
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
<th>Paid To</th>
<th>Account Head</th>
<th>F/Year</th>
<th>Inst</th>

</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_all_cashbook_entries))
{
foreach($get_all_cashbook_entries as $get_cashbook_entries)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_cashbook_entries['cheque_no']; ?></td>
<td>

<?php 
$cheque_no = $get_cashbook_entries['cheque_no'];
$query_amount = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('cheque_no',$cheque_no)->where('district_id',$userid)->get();
echo $total_sum_amount = $query_amount->row('amount_allocated');

?>



</td>
<td><?php echo $get_cashbook_entries['add_date']; ?></td>
<td>


<?php 
$lzc_institution_madrasa_id = $get_cashbook_entries['lzc_institution_madrasa'];

$account_head = $get_cashbook_entries['account_head']; 
if($account_head == "Guzara Allowance")
{
$get_lzc_name = $this->db->select('*')->from('lzc_list')->where('id',$lzc_institution_madrasa_id)->get();
echo $lzc_name = $get_lzc_name->row('lzc_name');

}
else if($account_head == "Marriage Assistance")
{
$get_lzc_name = $this->db->select('*')->from('lzc_list')->where('id',$lzc_institution_madrasa_id)->get();
echo $lzc_name = $get_lzc_name->row('lzc_name');

}
else if($account_head == "Educational Stipend (P)")
{
$get_institution_name = $this->db->select('*')->from('institution_list')->where('id',$lzc_institution_madrasa_id)->get();
echo $institution_name = $get_institution_name->row('institution_name');

}
else if($account_head == "Educational Stipend (A)")
{
$get_institution_name = $this->db->select('*')->from('institution_list')->where('id',$lzc_institution_madrasa_id)->get();
echo $institution_name = $get_institution_name->row('institution_name');

}
else if($account_head == "Health Care (District Level)")
{

echo "Health Care (District Level)";

}
else if($account_head == "Administrative Expenditure")
{

echo "Administrative Expenditure";

}
else if($account_head == "Deeni Madaris")
{
$get_dm_name = $this->db->select('*')->from('madrassa_list')->where('id',$lzc_institution_madrasa_id)->get();
echo $dm_name = $get_dm_name->row('madrassa_name');

}

?>


</td>
<td>
<?php 

//echo $get_cashbook_entries['account_head']; 

$this->db->select("*");
$this->db->where("cheque_no",$cheque_no);
$this->db->where("district_id",$userid);
$this->db->where("year",$getfinancial_year);
$query = $this->db->get('dist_head_wise_fund');
$query = $query->result();

//echo $this->db->last_query();

foreach ($query as $getmonth) 
{
echo $getmonth->account_head;
echo " , ";
}



?>
</td>
<td>
<?php 
// $lzc_id = $get_all_madrassavalueslist['lzc_id'];
// $run_lzc_list_qry = $this->db->select('*')->from('lzc_list')->where('id',$lzc_id)->get();
// echo $get_lzc_name = $run_lzc_list_qry->row('lzc_name');
echo $get_cashbook_entries['year'];
?>
</td>
<td><?php echo $get_cashbook_entries['installment']; ?></td>
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
