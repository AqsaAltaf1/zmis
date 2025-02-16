<?php
$runpzf_query = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query->row('pza_amount');
$runpza_query = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->get();
$total_pzareceived_amount = $runpza_query->row('amount_allocated');
$gettotalnet_balance =  $total_pzfreceived_amount - $total_pzareceived_amount;

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');


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
     
      
      <?php $this->load->view('pza/include/user_manue');?>

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
        <div class="row mb-2">
          <div class="col-sm-8">
            <h3 class="m-0 text-dark">Posting Transfer Portal of Zakat & Ushr Department</h3>
          </div><!-- /.col -->
          <div class="col-sm-4 div_align">
        
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Nave bar row -->
<!-- <div class="row navbar-white navbar-light">
     
<div class="col-sm-6 col-md-12">
<h3 class="m-0 text-dark">Welcome to Provincial Zakat Administration (PZA) Fund Allocation</h3>
</div>
</div>
<br> -->

<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- Info boxes -->
        <div class="row"></div>

<!-- Main row -->
<div class="row">
  <div class="col-md-1"></div>
<div class="card card-primary col-md-12 col-sm-12 col-xs-12">
<div class="card-header">
<h3 class="card-title">Posting Transfer Form</h3>
</div>
<!-- /.card-header -->
<!-- form start -->

<form role="form" id="pzafund" action="manage_pza_payment.php" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
<div class="card-body">

<!-- <div class="row form-group">
<label class="col-md-3" for="check">Select Designation<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="desig" name="desig">
<option value="">---Select One----</option>
<option value="Senior District Zakat Officer (B-18)" >Senior District Zakat Officer (B-18)</option>
<option value="District Zakat Officer (B-17)" >District Zakat Officer (B-17)</option>
<option value="Assistant (B-16)" >Assistant (B-16)</option>
<option value="Computer Operator (B-16)">Computer Operator (B-16)</option>
<option value="Senior Clerk (B-14)">Senior Clerk (B-14</option>
<option value="Junior Clerk (B-11)" >Junior Clerk (B-11)</option>
<option value="Naib Qasid (B-03)">Naib Qasid (B-03)</option>
</select>
</div> -->
<div class="row form-group">
<label class="col-md-3" for="check">Employee CNIC<span class="required">*</span>
</label>
<input type="text" id="emp_cnic" name="emp_cnic" required class="form-control col-md-7 col-sm-6 col-xs-12" value="">
<button class="btn btn-success col-md-1 col-sm-1 col-xs-1">Find</button>
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Personal No<span class="required">*</span>
</label>
<input type="text" id="personal_no" name="personal_no" required class="form-control col-md-8 col-sm-6 col-xs-12" value="7998" readonly>
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Employee Name<span class="required">*</span>
</label>
<input type="text" id="emp_name" name="emp_name" required class="form-control col-md-8 col-sm-6 col-xs-12" value="Akhtar" readonly>
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Employee Designation<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="desig" name="desig">
<option value="">---Select One----</option>
<option value="Senior District Zakat Officer (B-18)" >Senior District Zakat Officer (B-18)</option>
<option value="District Zakat Officer (B-17)" >District Zakat Officer (B-17)</option>
<option value="Assistant (B-16)" >Assistant (B-16)</option>
<option value="Computer Operator (B-16)">Computer Operator (B-16)</option>
<option value="Senior Sclae Stano Grapher (B-16)">Senior Sclae Stano Grapher (B-16)</option>
<option value="Senior Clerk (B-14)">Senior Clerk (B-14</option>
<option value="junior Sclae Stano Grapher (B-14)">junior Sclae Stano Grapher (B-14)</option>
<option value="Junior Clerk (B-11)" >Junior Clerk (B-11)</option>
<option value="Driver (B-07)">Driver (B-07)</option>
<option value="Naib Qasid (B-03)">Naib Qasid (B-03)</option>
<option value="Sweeper (B-03)">Sweeper (B-03)</option>
</select>
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Current Posting Station<span class="required">*</span>
</label>
<input type="text" id="current_posting" name="current_posting" required class="form-control col-md-8 col-sm-6 col-xs-12" value="Peshawar" readonly>
</div>



<div class="form-group row">
<label for="transfer_date" class="control-label col-md-3 col-sm-3 col-xs-12">Transfer Date </label>
<input type="date" id="transfer_date" name="transfer_date" required class="form-control col-md-8 col-sm-6 col-xs-12">            
</div>

<div class="form-group row">
<label for="transfer_to" class="control-label col-md-3 col-sm-3 col-xs-12">Transfer To </label>
<select class="form-control col-md-8" id="desig" name="desig">
<option value="">---Select One----</option>

</select>            
</div>


<div class="form-group row">
<label for="pzfFund" class="control-label col-md-3 col-sm-3 col-xs-12">Description/Remarks</label>
<textarea id="remarks" required name="remarks" class="form-control col-md-8 col-sm-6 col-xs-12" rows="5"></textarea>                       
</div>
</div>
<!-- /.card-body -->

<div class="card-footer">
<input type="submit" class="btn btn-primary" name="sbmit_btn" value="Submit">
<button type="reset" class="btn btn-success float-right">Reset Form</button>
</div>
</form>
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

</body>
</html>
