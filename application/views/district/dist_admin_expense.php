<?php

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');


$userid = $this->session->userdata('id');
$adminexp_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('district_id',$userid)->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('account_head','Adminnistrative_Expenses')->get();
$total_adminexp__amount = $adminexp_query->row('amount_allocated');

//echo $this->db->last_query();

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

$admin_expns_query = $this->db->select_sum('admin_expns')->from('district_payment')
->where('district_id',$userid)->where('installment',$getfinancial_installment)->where('financial_year',$getfinancial_year)->get();
$total_adminexp_amount = $admin_expns_query->row('admin_expns');

$admin_expns_disb_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->get();
$total_adminexp_disb_amount = $admin_expns_disb_query->row('amount');

$admin_headwise_disb_query = $this->db->select_sum('amount_allocated')->from('admin_expense_headwise_allocation')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_admin_headwise_amount = $admin_headwise_disb_query->row('amount_allocated');


$admin_headwise_balance =  $total_adminexp_amount - $total_admin_headwise_amount;
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
  <!-- Select 2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

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
     
      
    <!--   <?php $this->load->view('district/include/user_manue');?> -->

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
<div class="col-sm-7 col-md-7 col-lg-7">
<h3 class="m-0 text-dark">District <strong><?php echo $district_name;?></strong> Administrative Expenses Details</h3>
</div><!-- /.col -->
<div class="col-sm-2 col-lg-2 col-md-2 div_align">
<h5 class="m-0 text-dark"> F/Year: <b> <?php echo $getfinancial_year ?></b> Inst:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>
</div>
<div class="col-sm-3 col-lg-3 col-md-3 div_align">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".AE_headwise_model_form"><i class="fa fa-plus"></i>Administrative Expenses Allocation</button>

</div>
</div>
</div>
<!-- /.content-header -->

<!-- Model for Admin expense head Wise allocation -->
<div class="modal fade AE_headwise_model_form" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Head Wise Administrative Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_admin_expense/manage_admin_headwise_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Admin Expense Fund <span class="required">*</span>
</label>

<input type="number" name="admin_exp_fund" id="pza_budget" value="<?php echo $admin_headwise_balance;?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-3" for="staff">Select Zakat Paid Staff<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="zakat_paid_staff" name="zakat_paid_staff">
<option value="">---Select Zakat Paid Staff----</option>

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
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year1" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="installment" name="installment1" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="salary">Amount <span class="required">*</span> </label>
<input type="number" id="amount" name="amount1" min="1" max="<?php echo $total_adminexp_amount;?>" required class="form-control col-md-8 col-xs-12">
</div>


<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit">
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




<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Group Secretary & Audit Staff Salary Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_admin_expense/manage_adminexp_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Admin Expense Fund <span class="required">*</span>
</label>
<!-- <br />
<b>Notice</b>:  Undefined variable: net_balance_pza in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>93</b><br />
-->
<input type="number" name="admin_exp_fund" id="pza_budget" value="<?php echo $total_adminexp_amount;?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-3" for="staff">Select Zakat Paid Staff<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="staff_category" name="staff_category">
<option value="">---Select Zakat Paid Staff----</option>

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

<div id="gs_div" style="display: none;">
<div class="row form-group">
<label class="col-md-3" for="gs_name">Select Group Secretary<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="gs_name" name="gs_name_id">
<option value="">---Select Group Secretary----</option>

<?php
$i=1;
if(!empty($get_zakatpaid_staff_secretary))
{
foreach($get_zakatpaid_staff_secretary as $secretaryvalues)
{
?>
<option value="<?php echo $secretaryvalues['id']?>"><?php echo $secretaryvalues['name']; ?></option>
<?php 
$i++;
}
}
?>

</select>
</div>
</div>

<div id="auditor_div" style="display: none;">
<div class="row form-group">
<label class="col-md-3" for="auditor">Select Auditor<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="auditor" name="auditor_name_id">
<option value="">---Select Auditor----</option>
<?php
$i=1;
if(!empty($get_zakatpaid_staff_auditor))
{
foreach($get_zakatpaid_staff_auditor as $staff_auditorvalues)
{
?>
<option value="<?php echo $staff_auditorvalues['id']?>"><?php echo $staff_auditorvalues['name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>
<div id="audit_div" style="display: none;">
<div class="row form-group">
<label class="col-md-3" for="audit_staff">Select Audit Officer<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="audit_staff" name="audit_staff_id">
<option value="">---Select Audit Officer----</option>
<?php
$i=1;
if(!empty($get_zakatpaid_staff_audit_officer))
{
foreach($get_zakatpaid_staff_audit_officer as $audit_officervalues)
{
?>
<option value="<?php echo $audit_officervalues['id']?>"><?php echo $audit_officervalues['name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>

<div class="row form-group">
<label class="col-md-3" for="salary_month">Select Month/s<span class="required">*</span>
</label>
<div class="select2-purple col-md-8">
<select class="select2 form-control" multiple="multiple" data-placeholder="Select Payment Months" id="salary_month" name="salary_month[]" data-dropdown-css-class="select2-purple">
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="May">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="Octuber">Octuber</option>
<option value="November">November</option>
<option value="December">December</option>
</select>
</div>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="cheque_no">Cheque No <span class="required">*</span> </label>
<input type="text" name="cheque_no" id="cheque_no" required class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>

<!-- <div class="row form-group">
<label class="control-label col-md-3" for="mustahiq_no">No of Mustahiqeen <span class="required">*</span> </label>
<input type="number" name="mustahiq_no" data-validate-minmax="" min="1" id="mustahiq_no" required class="form-control col-md-8 col-xs-12">
</div> -->

<div class="row form-group">
<label class="control-label col-md-3" for="salary">Amount <span class="required">*</span> </label>
<input type="number" name="amount" min="1" max="<?php echo $total_adminexp_amount;?>" data-validate-minmax="" id="salary" required class="form-control col-md-8 col-xs-12">
</div>

<!-- <div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>

<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks"></textarea>

</div> -->

<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit">
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
<span class="info-box-number">Total Administrative Fund</span>
<span class="info-box-number" style="color: blue;">

<?php
echo number_format($total_adminexp_amount,2);
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
<span class="info-box-number">Fund Disbursed</span>
<span class="info-box-number" style="color: green;"> 
<?php


echo number_format($total_admin_headwise_amount,2);
?>
<br>
</span>
<small class="info-box-number">

<?php 
$x = $total_adminexp_amount;
$y = $total_adminexp_disb_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>

</div>

</div>

<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Balance Available</span>
<span class="info-box-number" style="color: red;">

<?php
$admin_headwise_balance =  $total_adminexp_amount - $total_admin_headwise_amount;
echo $admin_headwise_balance_nf= number_format($admin_headwise_balance,2);
?>

 <br>
</span>
<small class="info-box-number">

<?php 
$x = $total_adminexp_amount;
$y = $admin_headwise_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->


<!-- Second Row -->
<div class="col-lg-3 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Group Secretary Salary</span>
<span class="info-box-number" style="color: blue;">

<?php

$select_gs_amount_query = $this->db->select('*')->from('admin_expense_headwise_allocation')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('designation_id',1)->get();
$total_gs_amount = $select_gs_amount_query->row('amount_allocated');

echo number_format($total_gs_amount,2);
?>


 <br>
</span>
<small class="info-box-number">
<?php 
$x = $total_adminexp_amount;
$y = $total_gs_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>  

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-lg-3 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Audit Officer Salary</span>
<span class="info-box-number" style="color: green;"> 
<?php
$select_ao_amount_query = $this->db->select('*')->from('admin_expense_headwise_allocation')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('designation_id',2)->get();
$total_ao_amount = $select_ao_amount_query->row('amount_allocated');

echo number_format($total_ao_amount,2);
?>
<br>
</span>
<small class="info-box-number">

<?php 
$x = $total_adminexp_amount;
$y = $total_ao_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-l-3 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Auditor Salary</span>
<span class="info-box-number">

<?php
$select_auditor_amount_query = $this->db->select('*')->from('admin_expense_headwise_allocation')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('designation_id',3)->get();
$total_auditor_amount = $select_auditor_amount_query->row('amount_allocated');

echo number_format($total_auditor_amount,2);
?>

 <br>
</span>
<small class="info-box-number">

<?php 
$x = $total_adminexp_amount;
$y = $total_auditor_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>
</div>
</div>


<div class="col-l-3 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Chairman LZCs Allowance</span>
<span class="info-box-number">

<?php
$select_chairman_amount_query = $this->db->select('*')->from('admin_expense_headwise_allocation')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('designation_id',4)->get();
$total_chairman_amount = $select_chairman_amount_query->row('amount_allocated');

echo number_format($total_chairman_amount,2);
?>

 <br>
</span>
<small class="info-box-number">

<?php 
$x = $total_adminexp_amount;
$y = $total_chairman_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->




</div>


<!-- Nave bar row -->

<div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Group Secretary and Audit Staff Expenses Allocation</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Zakat Paid Staff Salary</button>
</div>
</div>



<!-- Main Form -->
<div class="row">

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Details of Group Secretary Salary of District <strong><?php echo $district_name;?></strong> for Year : <strong><?php echo $getfinancial_year;?></strong> </h3>
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
<div class="row"><div class="col-sm-12 col-md-6">
<div class="dataTables_length" id="example1_length">
<label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable no-footer dtr-inline" role="grid" aria-describedby="example1_info">
<thead>
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S #: activate to sort column descending">S #</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Zakat Head: activate to sort column ascending">Field Clerk Name</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Zakat Head: activate to sort column ascending">Salary Month/s</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Year: activate to sort column ascending">Year</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Fund: activate to sort column ascending">Cheque #</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Disbursement: activate to sort column ascending">Amount</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_salarypaid_staff))
{
foreach($get_salarypaid_staff as $get_salarypaid_staffvalues)
{
?>
<tr role="row" class="odd">
<td tabindex="0" class="sorting_1"><?php echo $i;?></td>
<td>
<?php 
$staff_name = $get_salarypaid_staffvalues['staff_name'];
$get_staffqry_name = $this->db->select('*')->from('zakat_paid_staff_list')->where('id',$staff_name)->get();
echo $districtquery_name = $get_staffqry_name->row('name');
?>
</td>
<td>

<?php
$this->db->select("*");
$this->db->where("record_id",$get_salarypaid_staffvalues['id']);
$query = $this->db->get('adminexp_payment_months');
$query = $query->result();

//echo $this->db->last_query();


foreach ($query as $getmonth) 
{
 echo $getmonth->month_id;
 echo " ,";
}


?>



</td>
<td><?php echo $get_salarypaid_staffvalues['financial_year'];?></td>
<td><?php echo $get_salarypaid_staffvalues['cheque_no'];?></td>
<td><?php echo $get_salarypaid_staffvalues['amount'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_salarypaid_staffvalues['add_date']));?></td>


</tr>

<?php 
$i++;
}
}
?>
</tbody>

</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
</div>
<!-- /.card-body -->
</div>

</div>

<!-- Table no 2 -->
<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Details of Audit Officer Salary of District <strong><?php echo $district_name;?></strong> for Year:<strong><?php echo $getfinancial_year;?></strong> </h3>
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable no-footer dtr-inline" role="grid" aria-describedby="example1_info">
<thead>
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S #: activate to sort column descending">S #</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Zakat Head: activate to sort column ascending">Audit Staff Name</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Zakat Head: activate to sort column ascending">Salary Month/s</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Year: activate to sort column ascending">Year</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Inst: activate to sort column ascending">Cheque #</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Fund: activate to sort column ascending">Amount</th>
<!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Disbursement: activate to sort column ascending">Disbursement</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Balance</th> -->
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_audit_salarypaid_staff))
{
foreach($get_audit_salarypaid_staff as $get_auditsalarypaid_staffvalues)
{
?>
<tr role="row" class="odd">
<td tabindex="0" class="sorting_1"><?php echo $i;?></td>
<td>
<?php 
$staff_name = $get_auditsalarypaid_staffvalues['staff_name'];
$get_staffqry_name = $this->db->select('*')->from('zakat_paid_staff_list')->where('id',$staff_name)->get();
echo $districtquery_name = $get_staffqry_name->row('name');
?>
</td>
<td>

<?php
$this->db->select("*");
$this->db->where("record_id",$get_auditsalarypaid_staffvalues['id']);
$query = $this->db->get('adminexp_payment_months');
$query = $query->result();

//echo $this->db->last_query();

foreach ($query as $getmonth) 
{
 echo $getmonth->month_id;
 echo " ,";
}


?>



</td>
<td><?php echo $get_auditsalarypaid_staffvalues['financial_year'];?></td>
<td><?php echo $get_auditsalarypaid_staffvalues['cheque_no'];?></td>
<td><?php echo $get_auditsalarypaid_staffvalues['amount'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_auditsalarypaid_staffvalues['add_date']));?></td>


</tr>

<?php 
$i++;
}
}
?>
</tbody>

</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
</div>
<!-- /.card-body -->
</div>


</div>

<!-- Table No 3 -->

<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Details of Auditor Salary of District <strong><?php echo $district_name;?></strong> for Year:<strong><?php echo $getfinancial_year;?></strong> </h3>
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable no-footer dtr-inline" role="grid" aria-describedby="example1_info">
<thead>
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S #: activate to sort column descending">S #</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Zakat Head: activate to sort column ascending">Audit Staff Name</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Zakat Head: activate to sort column ascending">Salary Month/s</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Year: activate to sort column ascending">Year</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Inst: activate to sort column ascending">Cheque #</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Fund: activate to sort column ascending">Amount</th>
<!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Disbursement: activate to sort column ascending">Disbursement</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Balance</th> -->
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_auditor_salarypaid_staff))
{
foreach($get_auditor_salarypaid_staff as $get_auditorsalarypaid_staffvalues)
{
?>
<tr role="row" class="odd">
<td tabindex="0" class="sorting_1"><?php echo $i;?></td>
<td>
<?php 
$staff_name = $get_auditorsalarypaid_staffvalues['staff_name'];
$get_staffqry_name = $this->db->select('*')->from('zakat_paid_staff_list')->where('id',$staff_name)->get();
echo $districtquery_name = $get_staffqry_name->row('name');
?>
</td>
<td>

<?php
$this->db->select("*");
$this->db->where("record_id",$get_auditorsalarypaid_staffvalues['id']);
$query = $this->db->get('adminexp_payment_months');
$query = $query->result();

//echo $this->db->last_query();

foreach ($query as $getmonth) 
{
 echo $getmonth->month_id;
 echo " ,";
}


?>



</td>
<td><?php echo $get_auditorsalarypaid_staffvalues['financial_year'];?></td>
<td><?php echo $get_auditorsalarypaid_staffvalues['cheque_no'];?></td>
<td><?php echo $get_auditorsalarypaid_staffvalues['amount'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_auditorsalarypaid_staffvalues['add_date']));?></td>


</tr>

<?php 
$i++;
}
}
?>
</tbody>

</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
  
<?php $this->load->view('pza/include/footer');?>
 
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 4 -->
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

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

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


<!-- For Selection of Zakat Paid Staff -->
<script>



// ------------- Select group Secretary -------------//

$('#staff_category').on('change',function(){
if( $(this).val()==="1"){
$("#gs_div").slideDown();
  $("#audit_div").slideUp();
  $("#auditor_div").slideUp();
}
 else if( $(this).val()==="2"){
$("#audit_div").slideDown();
$("#auditor_div").slideUp();
$("#gs_div").slideUp();
}
 else if ( $(this).val()==="3"){
$("#auditor_div").slideDown();
 $("#gs_div").slideUp();
  $("#audit_div").slideUp();

}
else 
{
  $("#gs_div").slideUp();
  $("#audit_div").slideUp();
  $("#auditor_div").slideUp();
}


});

// ------------- Audit Officer -------------//




</script>

</body>
</html>
