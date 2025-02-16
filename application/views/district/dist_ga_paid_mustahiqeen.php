<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

// Count all entries in GA table
$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('district_id',$userid);
$this->db->where('MustahiqType','Guzara Allowance');
//$this->db->where('status',1);
$get_all_mustahiq = $this->db->get()->num_rows();

// Current Year Mustahiqeen
$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('district_id',$userid);
$this->db->where('MustahiqType','Guzara Allowance');
$get_current_year_mustahiq = $this->db->get()->num_rows();

// Count all entries After Rejection
$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('district_id',$userid);
$this->db->where('status',1);
$this->db->where('MustahiqType','Guzara Allowance');
$mustahiqeenAfterRejection = $this->db->get()->num_rows();



$CategoryQuery = $this->db->query("SELECT category, COUNT(*)as mustaghiqCategory FROM `mustahiqeen` WHERE `year` = '".$getfinancial_year."' AND `district_id` = '".$userid."' AND MustahiqType = 'Guzara Allowance' AND  Remarks != 'Reject' AND payment_status = '1' GROUP BY category");
$category = $CategoryQuery->result_array();

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
<div class="row mb-2">
<div class="col-sm-8 col-md-10">
<h3 class="m-0 text-dark">List of Paid Mustahiqeen Regarding Guzara Allowance in respect of District <strong><?php echo $district_name;?></strong></h3>
</div><!-- /.col -->
<div class="col-sm-2 col-md-2 div_align">

<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year ?></b> INST:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

  

<!-- Main content -->
<section class="content">
<div class="container-fluid">

<!-- Info boxes -->


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
$allocated_nobs_query = $this->db->select_sum('nob')->from('dist_head_wise_fund')->where('district_id',$userid)->where('account_head','Guzara Allowance')->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
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
$this->db->where('MustahiqType','Guzara Allowance');
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
</div></div>

<div class="row">

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-wheelchair"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Disables</span>
<span class="info-box-number" style="color: green;"> 
<?php
echo $category[0]['mustaghiqCategory'];
?>
<br>
</span>
<small class="info-box-number">
<?php 
$x = $get_all_mustahiq;
$y = $category[0]['mustaghiqCategory'] *100;
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

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-pray"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Orphan</span>
<span class="info-box-number">
<?php
echo $category[1]['mustaghiqCategory'];
?>
 <br>
</span>
<small class="info-box-number">
<?php 
$x = $get_all_mustahiq;
$y = $category[1]['mustaghiqCategory'] * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>
<!-- /.col -->

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-pray"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Senior Citizen</span>
<span class="info-box-number">
<?php
echo $category[2]['mustaghiqCategory'];
?>
 <br>
</span>
<small class="info-box-number">
<?php 
$x = $get_all_mustahiq;
$y = $category[2]['mustaghiqCategory'] * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>


<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-female"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Widows</span>
<span class="info-box-number">
<?php
echo $category[3]['mustaghiqCategory'];
?>
 <br>
</span>
<small class="info-box-number">
<?php 
$x = $get_all_mustahiq;
$y = $category[3]['mustaghiqCategory'] * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>

</div>


<!-- Nave bar row -->

<div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Guzara Allowance Paid Mustahiqeen List</h3>
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
<a class="nav-link active" id="lz_19-tab" data-toggle="pill" href="#lz_19" role="tab" aria-controls="lz_19" aria-selected="true">Guzara Allowance Paid Mustahiqeen List</a>
</li>

</ul>
</div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="lz_19" role="tabpanel" aria-labelledby="lz_19-tab">
  
<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Guzara Allowance Paid Mustahiqeen List of District <strong><?php echo $district_name;?></strong> during Year: <strong><?php echo $getfinancial_year;?></strong></h3>
 <!-- Print list -->
<a target="_blank" href="<?php echo base_url(); ?>Dist_GA_paid_mustahiqeen/dist_paidMustahiqeenPrint" class="btn btn-primary btn-sm float-right">Print Paid Mustahiqeen List</a>
</div>
<!-- /.card-header -->
<div class="card-body" >
<div class="row"></div>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Name</th>
<th>F/Name</th>
<th>Gender</th>
<th>CNIC</th>
<th>Mobile</th>
<th>Category</th>
<th>LZC</th>
<!-- <th>Bank</th> -->
<th>A/C#</th>
<th>Cheque#</th>
<th>Amount</th>

</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_paid_mustahiqeen))
{
foreach($get_paid_mustahiqeen as $getmustahiqinfo)
{
?>

<tr>
<td><?php echo $i;?></td>
<td><?php echo $getmustahiqinfo['mustahiq_name']?></td>
<td><?php echo $getmustahiqinfo['father_name']?></td>
<td><?php echo $getmustahiqinfo['gender']?></td>
<td><?php echo $getmustahiqinfo['mustahiq_cnic']?></td>
<td><?php echo $getmustahiqinfo['contact_number']?></td>
<td><?php echo $getmustahiqinfo['category']?></td>

<td>

<?php 
/*$LZC_name = $getmustahiqinfo['LZC_name']; 
$getlzc_query = $this->db->select('*')->from('lzc_list')->where('id',$LZC_name)->get();
echo $gelzc_name = $getlzc_query->row('lzc_name');*/
echo $getmustahiqinfo['LZCActualName']
?>

</td>

<!-- <td>
<?php
/*$mustahiq_id = $getmustahiqinfo['id'];
$paidMustahiqQuery = $this->db->select('*')->from('guzara_allowance_mustahiqeen_payments')->where('user_id',$mustahiq_id)->get();*/
echo $getmustahiqinfo['bank_name']
?>
</td> -->

<td>

<?php
echo $getmustahiqinfo['account_number']
?>


</td>
<td>

<?php

echo $getmustahiqinfo['cheque_number']
?>


</td>
<td>

<?php

echo $getmustahiqinfo['payment_amount']
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
</div>
</div>
<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab"></div>
</div>
</div>
<!-- /.card -->
</div>
</div>
</div>

<div class="row"></div>

<!-- Table no 2 -->
<div class="row"></div>

<!-- Table No 3 -->
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


<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
}
</script>



</body>
</html>
