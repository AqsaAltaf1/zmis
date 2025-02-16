<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$getuserid = $this->uri->segment(3);
$getpaymentqry = $this->db->select('*')->from('pzf_fund')->where('id',$getuserid)->get();
$getpayment_received = $getpaymentqry->row('payment_received');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('pza/include/title');?>
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


<?php $this->load->view('pza/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('pza/include/profile_manue');?>



<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('pza/include/user_manue');?> -->




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

</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content">
<div class="container-fluid">

<form id="pzf_fund" action="<?php echo base_url(); ?>pza_dashboard/manage_pzf_payment_update/" method="post" data-parsley-validate class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Amount Received <span class="required">*</span>
</label>
<input type="number" value="<?php echo $getpaymentqry->row('payment_received');?>" name="payment_received" id="payment_received" required class="form-control col-md-8">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">cheque/Chalan # <span class="required">*</span>
</label>
<input type="text" value="<?php echo $getpaymentqry->row('check_no');?>" name="cheque_no" id="cheque_no" class="form-control col-md-8">
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="date">Cheque/Chalan Date <span class="required">*</span>
</label>
<input type="date" value="<?php echo date("Y-m-d",strtotime($getpaymentqry->row('check_date')));?>" name="cheque_date" id="cheque_date"  required="required" class="form-control datetimepicker-input col-md-8">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="occupation">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getpaymentqry->row('financial_year');?>" readonly>
</div>


<div class="row form-group">
<label for="payment_received" class="control-label col-md-3">Payment Received From</label>
<select class="form-control col-md-8" id="payment_rec_from" name="payment_rec_from"  onChange='toggleShared();'>
<option value="">---Select One----</option>
<option value="Ehsaas">Ehsaas</option>
<option value="District">As Un-Spent Balance From Districts</option>
<option value="Hospital">As Un-Spent Balance From Hospitals</option>
<option value="Other">Any Other Resource</option>
</select>
</div>


<div id="district_list" style="display:none;">
<div class="row form-group">
<label for="district" class="control-label col-md-3">Select District</label>
<select class="form-control col-md-8" id="distt" name="district">
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistricts)
{
?>
<option value="<?php echo $getdistricts['id']?>"><?php echo $getdistricts['district_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>


<div style="display:none;" id="hospital_list">
<div class="row form-group">
<label for="hospital" class="control-label col-md-3">Select Hospital</label>

<select class="form-control col-md-8" id="hosp" name="hospital">
<option value="">---Select One----</option>
<!-- Select hospital list from teh database -->
<?php
$i=1;
if(!empty($get_all_hospitals))
{
foreach($get_all_hospitals as $getallhospitals)
{
?>
<option value="<?php echo $getallhospitals['id']?>"><?php echo $getallhospitals['name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>


<div style="display:none;" id="health_account_head">

<div class="row form-group">
<label for="head" class="control-label col-md-3">Hospital Account Head (Provincial)</label>

<select class="form-control col-md-8" id="hosp_acc_head" name="hosp_acc_head">
<option value="">---Select One----</option>
<option value="Regular Health Care" >Regular Health Care</option>
<option value="Special Health Program" >Special Health Program</option>
<option value="Other resources">Any Other resource</option>
</select>
</div>

</div>



<div  style="display:none;" id="accounthead">
<div class="row form-group">
<label for="head" class="control-label col-md-3">Head of Account</label>

<select class="form-control col-md-8" id="dist_acc_head" name="dist_acc_head">
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_headofaccounts))
{
foreach($get_all_headofaccounts as $getheadofaccounts)
{
?>
<option value="<?php echo $getheadofaccounts['zakat_head']?>"><?php echo $getheadofaccounts['zakat_head']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>



<div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>

<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks"><?php echo $getpaymentqry->row('remarks');?>
</textarea>

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


<input type="hidden" name="getid" value="<?php echo $this->uri->segment(3);?>">
</form>

</div>
</section>

</div>





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
      "lengthChange": false,
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
