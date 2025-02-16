<?php
//error_reporting(0);

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$username = $this->session->userdata('username');

$entityName = $this->session->userdata('entityName');
$user_type = $this->session->userdata('user_type');
$getAffidavitID = $this->uri->segment(3);



if(isset($getAffidavitID))
{
	$getAffidavit = $this->db->select('*')->from('zakatentryforms')->where('id',$getAffidavitID)->get();
	$getAffidavitForm = $getAffidavit->row('LZC_Name');
	
		
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> <?php include("include/title.php");?></title>

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
            <h3 class="m-0 text-dark">Update Affidavit Page </h3>
          </div><!-- /.col -->
          <div class="col-sm-4 div_align">
            <!-- <?php echo $year;?> and <?php echo $inst;?>  -->
<h5 class="m-0 text-dark" class="pull-right"> F/YEAR: <b> <?php echo  $getfinancial_year; ?></b> INSTALLMENT:<b style="color: black;"> <?php echo  $getfinancial_installment; ?></b> </h5>
            
          </div>
        </div>
      </div>
    </div>








<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- Info boxes -->


<!-- Main row -->
<div class="row">
  <div class="col-md-1"></div>
<div class="card card-primary col-md-12 col-sm-12 col-xs-12">
<div class="card-header">
<h3 class="card-title">Update Zakat Entry Form of LZC <strong><?php echo $getAffidavit->row('LZC_Name'); ?> </strong>district <strong><?php echo $getAffidavit->row('District_Name');?></strong></h3>
</div>
<!-- /.card-header -->
<!-- form start -->

<form role="form" id="pzafund" action="<?php echo base_url(); ?>AffidavitManagement/editAffidavitForm" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
<div class="card-body">

<div class="form-group row">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lzc">LZC Name<span class="required">*</span></label>


<input type="text" id="lzc" name="LZC_Name" required class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getAffidavit->row('LZC_Name');?>" readonly>                  
</div>

<div class="form-group row">
<label for="fy" class="control-label col-md-3 col-sm-3 col-xs-12">Financial Year </label>

<input type="text" id="FinYear" name="FinYear" required class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getAffidavit->row('FinYear');?>" readonly>                       
</div>

<div class="form-group row">
<label for="pzfFund" class="control-label col-md-3 col-sm-3 col-xs-12">Installment </label>

<input type="text" id="InstallmentNo" name="InstallmentNo" required class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getAffidavit->row('InstallmentNo');?>" readonly >
                        
</div>


<div class="form-group row">
<label for="chairmanName" class="control-label col-md-3 col-sm-3 col-xs-12">Chairman Name: </label>

<input id="ChairmanName" class="form-control col-md-6 col-sm-6 col-xs-12" data-validate-length-range="" name="ChairmanName" type="text" placeholder="" value="<?php echo $getAffidavit->row('ChairmanName');?>" readonly>

</div>

<div class="form-group row">
<label for="fname" class="control-label col-md-3 col-sm-3 col-xs-12">Father Name: </label>

<input type="text" id="ChairmanFather" name="ChairmanFather" required data-validate-minmax="" class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getAffidavit->row('ChairmanFather');?>" readonly>
</div>


<div class="form-group row">
<label for="cnic" class="control-label col-md-3 col-sm-3 col-xs-12">Chairman CNIC: </label>

<input type="text" id="ChairmanCNIC" name="ChairmanCNIC" required class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getAffidavit->row('ChairmanCNIC');?>" data-inputmask='"mask": "99999-9999999-9"' data-mask readonly>                       
</div>




<div class="form-group row">
<label for="contact" class="control-label col-md-3 col-sm-3 col-xs-12">Contact #: </label>

<input type="text" id="ChairmanPhone1" name="ChairmanPhone1" required class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getAffidavit->row('ChairmanPhone1');?>" data-inputmask='"mask": "9999-9999999"' data-mask readonly>                       
</div>



<div class="form-group row">
<label for="forms" class="control-label col-md-3 col-sm-3 col-xs-12">No. of Forms Handing Over: </label>

<input type="number" id="FormHandedOver" name="FormHandedOver" required class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getAffidavit->row('FormHandedOver');?>" >                       
</div>

<div class="form-group row">
<label for="forms" class="control-label col-md-3 col-sm-3 col-xs-12">No. of CNICs Handing Over: </label>

<input type="number" id="CNICHandedOver" name="CNICHandedOver" required class="form-control col-md-6 col-sm-6 col-xs-12" value="<?php echo $getAffidavit->row('CNICHandedOver');?>" >                       
</div>


<div class="form-group row">

<label for="" class="control-label col-md-3 col-sm-2 col-xs-6">Affidavit Picture:<br><span style="font-weight:normal; font-size:13px;">Size:400KB - Format:jpg,png,gif</span></label>

<input type="file" class="form-control col-md-6 col-sm-4 col-xs-6" id="affidavit" name="affidavit" >

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

<input type="hidden" name="affidavitID" value="<?php echo $this->uri->segment(3);?>">
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

<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>


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
