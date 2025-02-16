<?php
// error_reporting(0);
$runpzf_query = $this->db->select_sum('payment_received')->from('pzf_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query->row('payment_received');


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


  <?php include("include/nav.php");?>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include("include/profile_manue.php");?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     <!--  <?php include("include/user_manue.php");?> -->

      <!-- Sidebar Menu -->
      <?php include("include/sidebar.php");?>
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
            <h3 class="m-0 text-dark">Provincial Zakat Administration (PZA) Yearly Fund Allocation</h3>
          </div><!-- /.col -->
          <div class="col-sm-4 div_align">
            <!-- <?php echo $year;?> and <?php echo $inst;?>  -->
<h5 class="m-0 text-dark" class="pull-right"> Financial Year: <b> 2019-20</b> </h5>
            <!-- <button type="button" class="btn btn-primary div_align" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Fund Deposit To PZF</button> --> 
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
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Fund at PZF</span>
<span class="info-box-number" style="color: blue;">
<?php
$runpzf_query_amount = $this->db->select_sum('payment_received')->from('pzf_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query_amount->row('payment_received');
echo number_format($runpzf_query_amount->row('payment_received'),2); 
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
<span class="info-box-number">Amount Reserve for the Year <?php echo $getfinancial_year;?></span>
<span class="info-box-number" style="color: green;"> 

<?php
$yearlyFundReserved = $this->db->select_sum('yearly_fund')->from('pza_yearly_fund_allocation')->where('status',1)->where('financial_year',$getfinancial_year)->get();
//$this->db->last_query();
$total_reserved_amount = $yearlyFundReserved->row('yearly_fund');
echo number_format($total_reserved_amount,2);
?>

<br>
 </span>
<small class="info-box-number">

<?php 
$x = $total_pzfreceived_amount;
$y = $total_reserved_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">PZF Balance after <?php echo $getfinancial_year;?> Allocation</span>
<span class="info-box-number" style="color: red;">

<?php


$net_balance =  $total_pzfreceived_amount - $total_reserved_amount;
echo $net_balance_pzf= number_format($net_balance,2);
?>

<br>
 </span>
<small class="info-box-number">

<?php 
$x = $total_pzfreceived_amount;
$y = $net_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

</div>

<!-- Main row -->
<div class="row">
  <div class="col-md-1"></div>
<div class="card card-primary col-md-12 col-sm-12 col-xs-12">
<div class="card-header">
<h3 class="card-title">Allocate Fund to PZA for the Year <?php echo $getfinancial_year; ?> From PZF Account # 03</h3>
</div>
<!-- /.card-header -->
<!-- form start -->

<form role="form" id="pzafund" action="<?php echo base_url(); ?>pza_yearly_fund_allocation/manage_yearly_pza_payment" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
<div class="card-body">

<div class="form-group row">
<label for="pzfFund" class="control-label col-md-3 col-sm-3 col-xs-12">Fund Available At PZF </label>
<input id="pzf_fund" class="form-control col-md-6 col-sm-6 col-xs-12" data-validate-length-range="" name="pzf_fund" type="text" placeholder="Fetch from PZF table" value="<?php echo $net_balance_pzf;?>" readonly>


</div>

<div class="form-group row">
<label for="pzfFund" class="control-label col-md-3 col-sm-3 col-xs-12">Allocate Yearly fund to PZA </label>

<input type="number" id="yearly_fund" min="1" max="<?php echo $net_balance;?>" name="yearly_fund" required data-validate-minmax="" class="form-control col-md-6 col-sm-6 col-xs-12">
</div>

<div class="form-group row">
<label for="year" class="control-label col-md-3 col-sm-3 col-xs-12">Financial Year </label>

<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getfinancial_year;?>" readonly>                       
</div>


<div class="form-group row">
<label for="pzfFund" class="control-label col-md-3 col-sm-3 col-xs-12">Description/Remarks</label>
<textarea id="remarks" required name="remarks" class="form-control col-md-6 col-sm-6 col-xs-12" rows="5"></textarea>                       
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

<?php include("include/footer.php");?>
 
 
</div>
<!-- ./wrapper -->

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
