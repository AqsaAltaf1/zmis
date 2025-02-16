<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

// Count all entries in GA table
$this->db->select("*");
$this->db->from("mustahiqeen");
//$this->db->where('year',$getfinancial_year);
$this->db->where('district_id',$userid);
$this->db->where('status',1);
$get_all_mustahiq = $this->db->get()->num_rows();

// Current Year Mustahiqeen
$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('district_id',$userid);
$get_current_year_mustahiq = $this->db->get()->num_rows();
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
<strong>error!</strong> <?php echo $error;?> 
</div>
<?php 
}
?>


  
<div class="row mb-2">
<div class="col-sm-8 col-md-10">
<h3 class="m-0 text-dark">Approval Summary of Most Vulnerable Mustahiqeen Regarding Guzara Allowance </h3>
</div><!-- /.col -->
<div class="col-sm-2 col-md-2 div_align">

<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year ?></b> INST:<b style="color: black;"> <?php echo $get_inst;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->




<!-- Main content -->
<section class="content">
<div class="container-fluid">

<!-- Info boxes -->
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Registered NOBs In <strong><?php echo $district_name;?></strong></span>
<span class="info-box-number" style="color: blue;">
<?php
echo $get_all_mustahiq;
?>
 <br>
</span>
<small class="info-box-number">100%</small>
</div>
</div>
</div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Registered NOBs During <strong><?php echo $getfinancial_year;?></strong></span>
<span class="info-box-number" style="color: blue;">
<?php
echo $get_current_year_mustahiq;
?>
 <br>
</span>
<small class="info-box-number">100%</small>
</div>
</div>
</div>

</div>

<div class="row">

<!-- /.col -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Allocated NOBs</span>
<span class="info-box-number"> 
<?php
$allocated_nobs_query = $this->db->select_sum('nob')->from('dist_head_wise_fund')->where('district_id',$userid)->where('account_head','Guzara Allowance')->where('year',$getfinancial_year)->where('status',1)->get();
echo $total_allocated_nobs = $allocated_nobs_query->row('nob');


?>
<br>
</span>
<small class="info-box-number">
<?php 
$x = $get_all_mustahiq;
$y = $total_allocated_nobs * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>
<!-- /.col -->

<!-- fix for small devices only -->
 <div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-hand-holding-usd"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Paid Mustahiqeen</span>
<span class="info-box-number">
<?php


$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('district_id',$userid);
$this->db->where('payment_status',1);
echo $paid_mustahiqeen = $this->db->get()->num_rows();
?>
 <br>
</span>
<small class="info-box-number">
<?php 
$x = $total_allocated_nobs;
$y = $paid_mustahiqeen * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div> 

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Remaining</span>
<span class="info-box-number" style="color: red;">
<?php
echo $remaining_mustahiqeen = $total_allocated_nobs - $paid_mustahiqeen;
?>
 <br>
</span>
<small class="info-box-number">
<?php 
$x = $total_allocated_nobs;
$y = $remaining_mustahiqeen * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>
<!-- /.col -->

</div>


<!-- Nave bar row -->

<div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Guzara Allowance Mustahiqeen Registration List (LZ-11)</h3>
</div>
<div class="col-md-4 col-sm-2">
<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Register GA Mustahiqeen</button> -->
</div>
</div>

<!-- Main Form -->
<div class="row">
<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="lz_19-tab" data-toggle="pill" href="#lz_19" role="tab" aria-controls="lz_19" aria-selected="true">LZ-11 Mustahiqeen List</a>
</li>

</ul>
</div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="lz_19" role="tabpanel" aria-labelledby="lz_19-tab">
  
<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Guzara Allowance (LZ-11) Mustahiqeen List of District <?php echo $district_name; ?> during Year: <?php echo $getfinancial_year; ?></h3>
 <!-- Print list -->
<a target="_blank" href="<?php echo base_url(); ?>Dist_GA_Lz_11/dist_lzcwise_print" class="btn btn-primary btn-sm float-right">Print LZC Wise List</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<div class="row"></div>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Registered NOBs</th>
<th>Targeted NOBs</th>
<th>Allocated NOBs</th>
<th>Paid Mustahiqeen</th>
<th>Remaining</th>

<th>Action</th>

</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_all_lzclist))
{
foreach($get_all_lzclist as $lzclist)
{
?>

<tr>
<td><?php echo $i;?></td>
<td><?php  echo $lzclist['LZCActualName']; ?></td>
    <?php  $lzcid = $lzclist['id']; ?>
<td>
<?php // echo $lzclist['NOB'];?>

<?php 
/*$lzcid = $lzclist['id']; 
$this->db->where('LZC_name',$lzcid);
$this->db->where('status',1);
echo $result = $this->db->get('guzara_allowance_mustahiqeen')->num_rows();*/
echo $registeredNOBs = $lzclist['NOB'];
?>

</td>
<td>
<?php //echo $targeted_nob = $get_nob * 2;

$targetNobQuery = $this->db->select('FormHandedOver, LZC_ID,District_Name')->from('zakatentryforms')->where('LZC_ID',$lzcid)->where('FinYear',$getfinancial_year)->where('InstallmentNo',$get_inst)->get();
echo $targetNob = $targetNobQuery->row('FormHandedOver');
//echo $this->db->last_query();


?></td>
<td>
<?php
$getfinancialdata = $this->db->select('nob, district_id')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$lzcid)->where('account_head','Guzara Allowance')->where('year',$getfinancial_year)->where('installment',$get_inst)->get();
echo $get_nob = $getfinancialdata->row('nob');
$districtid = $getfinancialdata->row('district_id');
//echo $this->db->last_query();
?>
</td>
<td>


<?php
$this->db->select('lzc_id');
$this->db->where('financial_Year',$getfinancial_year);
$this->db->where('installment',$get_inst);
$this->db->where('lzc_id',$lzcid);
echo $resultpaid = $this->db->get('guzara_allowance_mustahiqeen_payments')->num_rows();
?>


</td>
<td>
<?php
echo $get_nob - $resultpaid;
?>
</td>

<td>

<?php

if(($get_nob == "") || ($get_nob == 0) || ($registeredNOBs <  $targetNob))
{
	?>
<button class="btn btn-danger btn-sm">Incomplete Registration</button>
  <?php
}
else
{
?>
<a href="<?php echo base_url(); ?>Dist_GA_Mustahiqeenlist/getmustahiqeenlist/<?php echo $lzcid; ?>" class="btn btn-success btn-sm" target="_blank"> View List</a></td>
<?php
}
?>


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
</div>
</div>

<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab"></div>



</div>
</div>
<!-- /.card -->
</div>
</div>
</div>


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
