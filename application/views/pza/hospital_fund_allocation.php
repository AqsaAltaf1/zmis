<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$selectqry_sf = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('account_head','Special Health Care Program')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_sf_amount = $selectqry_sf->row('amount_allocated');
$total_sf_amount_hospital= number_format($total_sf_amount,2);

$selectqry_hospital = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('account_head','Health Care (Provincial Level)')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_hospital_amount = $selectqry_hospital->row('amount_allocated');
$total_received_amount_hospital= number_format($total_hospital_amount,2);

$selectqry_hosp_dis = $this->db->select_sum('payment_amount')->from('hospital_payment')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_hosp_dis = $selectqry_hosp_dis->row('payment_amount');
$total_hosp_dis_nf= number_format($total_hosp_dis,2);

$hospital_balance = $total_hospital_amount - $total_hosp_dis;
$hospital_balance_nf= number_format($hospital_balance,2);

 

$select_dis_sf = $this->db->select_sum('amount')->from('special_health_fund')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_sf_dis = $select_dis_sf->row('amount');

$total_sf_dis_nf= number_format($total_sf_dis,2);
$sf_balance = $total_sf_amount - $total_sf_dis;
$sf_balance_nf= number_format($sf_balance,2);

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



<?php $this->load->view('pza/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('pza/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->

<!-- <?php $this->load->view('pza/include/user_manue');?> -->

<!-- Sidebar Menu -->

<?php $this->load->view('pza/include/sidebar');?>

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
<h3 class="m-0 text-dark">Provincial Zakat Administration Hospital Allocation</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<h5 class="m-0 text-dark" class="pull-right"> F/YEAR: <b> <?php echo $getfinancial_year;?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="modal fade" id="regular_fund" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Allocate Regular Fund to Hospital (Provincial Level)</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Hospital_fund_allocation/manage_hospital_payment" method="post" data-parsley-validate class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>

<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($hospital_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Select Hospital<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="hospital" required name="hospitalid"  onChange='toggleShared();'>
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_hospitalslist))
{
foreach($get_all_hospitalslist as $get_all_hospitalslistvalues)
{
?>
<option value="<?php echo $get_all_hospitalslistvalues['id']?>"><?php echo $get_all_hospitalslistvalues['name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installment" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Payment Amount <span class="required">*</span> </label>

<input type="number" name="payment_amount" min="1" max="<?php echo $hospital_balance;?>" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>

<!-- <div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>

<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks">
</textarea>

</div> -->

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

<!-- Special Health fund form -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="special_health">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Allocate Special Health Fund to Hospital (Provincial Level)</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Hospital_fund_allocation/manage_hospital_sfpayment" method="post" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget For Special Health <span class="required">*</span>
</label>

<input type="text" name="special_fund" id="special_fund" value="<?php echo number_format($sf_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Select Hospital<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="hospital" name="hospitalid"  onChange='toggleShared();'>
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_hospitalslist))
{
foreach($get_all_hospitalslist as $get_all_hospitalslistvalues)
{
?>
<option value="<?php echo $get_all_hospitalslistvalues['id']?>"><?php echo $get_all_hospitalslistvalues['name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="p_name">Patient's Name <span class="required">*</span> </label>
<input type="text" id="pt_name" name="pt_name" required class="form-control col-md-8" value="" placeholder="Patient's Name">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="p_cnic">Patient's CNIC/Form-B <span class="required">*</span> </label>
<input type="text" id="pt_cnic" name="pt_cnic" required class="form-control col-md-8" data-inputmask='"mask": "99999-9999999-9"' data-mask value="" placeholder="Patient's CNIC/Form-B">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="disease">Disease <span class="required">*</span> </label>
<input type="text" id="disease" name="disease" required class="form-control col-md-8" value="" placeholder="Disease">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_years" class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installments" class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Payment Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated" min="1" max="<?php echo $sf_balance;?>" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>

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
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Regular Fund</span>
<span class="info-box-number" style="color: blue;">
  
  
<?php 
echo $total_received_amount_hospital;
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
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Fund Disbursement</span>
<span class="info-box-number" style="color: green;"> 
<?php echo $total_hosp_dis_nf;?>
 </span>
 <span class="info-box-number" style="color: red;">Balance=<?php echo $hospital_balance_nf;?></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Special Fund</span>
<span class="info-box-number" style="color: blue;">
  <?php echo $total_sf_amount_hospital;?> <br>
</span>
<small class="info-box-number">100%</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Fund Disbursement</span>
<span class="info-box-number" style="color: green;"> 
<?php echo $total_sf_dis_nf; ?>
</span>
<span class="info-box-number" style="color: red;">Balance=<?php echo $sf_balance_nf;?></span>
</div>
</div>
</div>
<!-- /.col -->
<!--  <div class="col-12 col-sm-6 col-md-2">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-text" >PZA Balance</span>
<span class="info-box-number">
  0.00
  0
  <small>%</small>
</span>
</div>
</div>
</div> -->

</div>


<!-- Nave bar row -->

<div class="row mb-2">
<div class="col-md-4 col-sm-4">
<h3 class="text-dark">Hospital Fund Allocation</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#regular_fund"><i class="fa fa-plus"></i>Regular Hospital Fund (Provincial Level)</button>
</div>

<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#special_health"><i class="fa fa-plus"></i>Special Health Fund (Provincial Level)</button>
</div>



</div>



<!-- Main Form -->
<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Allocation of Regular Health Fund (Provincial Level) </h3> <small>For Current Financial Year <strong><?php echo $getfinancial_year;?></strong> & installemnt:<strong> <?php echo $getfinancial_installment;?></strong></small>
<a target="_blank" href="<?php echo base_url(); ?>Pza_Hospital_fund_allocation/pza_print_hosp_payment" class="btn btn-primary btn-sm float-right">Print Regular Fund List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Hospital Name</th>
<th>F/Year</th>
<th>Inst</th>
<th>Allocated/Fund</th>
<th>Disbursement</th>
<th>Balance</th>
<th width="70">Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_hospitalpayment))
{
foreach($get_all_hospitalpayment as $get_all_hospitalpayments)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php
$select_hostpitals_qry = $this->db->select('*')->from('hospital_users')->where('id',$get_all_hospitalpayments['hospital_id'])->get();
echo $hospt_name = $select_hostpitals_qry->row('name');
?>
</td>
<td><?php echo $get_all_hospitalpayments['financial_year'];?></td>
<td><?php echo $get_all_hospitalpayments['installment'];?></td>
<td><?php echo $get_all_hospitalpayments['payment_amount'];?></td>
<td>

<?php
$selecthospital_dis = $this->db->select_sum('total_price')->from('pt_treatment')->where('hospital_id',$get_all_hospitalpayments['hospital_id'])->where('installment',$getfinancial_installment)->where('financial_Year',$getfinancial_year)->get();
$total_reg_hosp_dis = $selecthospital_dis->row('total_price');
$total_reg_hosp_dis_nf = number_format($total_reg_hosp_dis,2);
echo $total_reg_hosp_dis_nf;
?>

</td>
<td>

<?php 
$net_hosp_balannce = $get_all_hospitalpayments['payment_amount'] - $total_reg_hosp_dis;
echo number_format($net_hosp_balannce,2);
?>

</td>
<td><?php echo date("d-m-Y",strtotime($get_all_hospitalpayments['add_date']));?></td>
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



<!--Special health Fund Allocation  -->

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Allocation of Special Health Fund (Provincial Level) </h3> <small>For Current Financial Year <strong><?php echo $getfinancial_year;?></strong> & installemnt:<strong> <?php echo $getfinancial_installment;?></strong></small>
<a target="_blank" href="<?php echo base_url(); ?>Pza_Hospital_fund_allocation/pza_print_sf_hosp_payment" class="btn btn-primary btn-sm float-right">Print Special Fund List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Hospital Name</th>
<th>PatientName</th>
<th>CNIC#</th>
<th>Disease</th>
<th>Allocated/Fund</th>
<th>Disbursement</th>
<th>Balance</th>
<th width="120">Date</th>
</tr>
</thead>
<tbody>

<?php
$i1=1;
if(!empty($get_all_hospitalpayment_sf))
{
foreach($get_all_hospitalpayment_sf as $get_all_hospitalpayment_sfvalues)
{
?>
<tr>
<td><?php echo $i1;?></td>
<td>
<?php
$select_hostpitals_qry = $this->db->select('*')->from('hospital_users')->where('id',$get_all_hospitalpayment_sfvalues['hospital_id'])->get();
echo $hospt_name = $select_hostpitals_qry->row('name');
?>
</td>
<td><?php echo $get_all_hospitalpayment_sfvalues['p_name'];?></td>
<td><?php echo $get_all_hospitalpayment_sfvalues['pt_cnic'];?></td>
<td><?php echo $get_all_hospitalpayment_sfvalues['disease'];?></td>
<td><?php echo number_format($get_all_hospitalpayment_sfvalues['amount'],2);?></td>

<td>
<?php
$selecthospital_dis_sf = $this->db->select_sum('total_price')->from('pt_treatment')->where('hospital_id',$get_all_hospitalpayment_sfvalues['hospital_id'])->where('patient_type','Special Health Patient')->where('installment',$getfinancial_installment)->where('financial_Year',$getfinancial_year)->get();
$total_hosp_dis_sf = $selecthospital_dis_sf->row('total_price');
$total_hosp_dis_nf_sf = number_format($total_hosp_dis_sf,2);
echo $total_hosp_dis_nf_sf;
?>
</td>

<td>
<?php 
$net_sf =$get_all_hospitalpayment_sfvalues['amount'] -$total_hosp_dis_sf; 
echo number_format($net_sf,2);
?>
</td>

<td><?php echo date("d-m-Y",strtotime($get_all_hospitalpayment_sfvalues['get_date']));?></td>
</tr>
<?php 
$i1++;
}
}
?>

</tbody>

</table>
</div>
<!-- /.card-body -->
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

<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

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

  });
  
 
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
