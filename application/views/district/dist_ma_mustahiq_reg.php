<?php

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
<div class="row mb-2">
<div class="col-sm-8">
<h3 class="m-0 text-dark">Marriage  Mustahiqeen Registration Form (LZ-19)</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year ?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
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
<strong>Error!</strong> <?php echo $error;?>
</div>
<?php	
}
?>





<!-- Main Form -->
<div class="row">
<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="lz_19-tab" data-toggle="pill" href="#lz_19" role="tab" aria-controls="lz_19" aria-selected="true">Marriage Assistance Mustahiq Entry Form</a>
</li>
</ul>
</div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="lz_19" role="tabpanel" aria-labelledby="lz_19-tab">
  
<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<!-- For Card heading and placing line <div class="card-header"></div> -->
<!-- /.card-header -->
<div class="card-body">
<div class="row"></div>
<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_MA_mustahiq_reg/manage_ma_mustahiq_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2" for="m_name">Bride Name <span class="required">*</span>
</label>
<input type="text" name="mustahiq_name" id="mustahiq_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name">

<label class="col-md-2" for="">Bride CNIC/Form-B<span class="required">*</span>
</label>

<input required type="text" name="cnic" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask >


</div>



<div class="row form-group">

<label class="col-md-2" for="">Date of Birth<span class="required">*</span>
</label>
<input type="date" name="dob" id="dob" value="" class="form-control col-md-4 col-xs-12" required>

<label class="col-md-2" for="age">Age<span class="required">*</span>
</label>
<input type="number" name="age" id="age" min="15" max="40" value="" class="form-control col-md-4 col-xs-12" placeholder="Age" required>

</div>


<div class="row form-group">
<label class="col-md-2" for="">No. of Unmarried Sisters<span class="required">*</span>
</label>
<input type="number" name="unmarriedSisters" id="unmarriedSisters" value="" class="form-control col-md-4 col-xs-12" placeholder="Number of Unmarried Sisters" required>


<label class="col-md-2" for="">Contact #<span class="required">*</span>
</label>

<input required type="text" name="cell_no" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "9999-9999999"' data-mask >


</div>


<div class="row form-group">

<label class="col-md-2" for="f_name">Father/Guardian Name<span class="required">*</span>
</label>
<input type="text" name="f_name" id="f_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Father Name">

<label class="col-md-2" for="">Father/Guardian Occupation<span class="required">*</span>
</label>
<input type="text" name="fatherOccupation" id="fatherOccupation" value="" class="form-control col-md-4 col-xs-12" placeholder="Father Occupation">

</div>


<div class="row form-group">

<label class="col-md-2" for="">Father/Guardian income<span class="required">*</span>
</label>
<input type="text" name="fatherIncome" id="fatherIncome" value="" class="form-control col-md-4 col-xs-12" placeholder="Father Monthly Income">


<label class="col-md-2" for="district">LZC Name<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="lzc" name="lzc_id" required>
<option value="">----- Select LZC -----</option>

<?php
$i=1;
if(!empty($get_all_lzcs))
{
foreach($get_all_lzcs as $get_all_lzcsvalues)
{
?>

<?php echo $i;?>

<option value="<?php echo $get_all_lzcsvalues['id']?>"><?php echo $get_all_lzcsvalues['lzc_name']; ?></option>
<?php 
$i++;
}
}
?>


</select>
</div>

<div class="row form-group">
<label class="col-md-2" for="nikah">Nikah Date<span class="required">*</span>
</label>
<input type="date" name="nikah_date" id="nikah" value="" class="form-control col-md-4 col-xs-12" required>

<label class="col-md-2" for="">Expected Rukhsati Date<span class="required">*</span>
</label>
<input type="date" name="rukhsatiDate" id="rukhsatiDate" value="" class="form-control col-md-4 col-xs-12" required>

</div>

<div class="row form-group">
<label class="col-md-2" for="category">Category<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="category" name="category" required>
<option value="">---Select Category ---</option>
<?php 

foreach($getCategory as $category)
{
?>
<option value="<?php echo $category['field_name'];?>"><?php echo $category['field_name'];?></option>

<?php
$i++; 
}
?>
</select>

<label class="col-md-2" for="address">Address<span class="required">*</span>
</label>
<input type="text" name="address" id="address" value="" class="form-control col-md-4 col-xs-12" placeholder="Address">

</div>


<div class="row form-group">
<label class="col-md-2" for="">Bridegroom Name<span class="required">*</span>
</label>
<input type="text" name="bridegroomName" id="bridegroomName" class="form-control col-md-4 col-xs-12" placeholder="Bridegroom Name" required>

<label class="col-md-2" for="category">Bridegroom CNIC<span class="required">*</span>
</label>

<input required type="text" name="bridegroomCnic" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask >
</div>



<div class="row form-group">
<label class="col-md-2" for="">Bride CNIC (Front):<br><span style="font-weight:normal; font-size:13px; color:red;">Size:400KB - Format:jpg,png,gif</span>
</label>
<input type="file" name="brideCnicFront" id="brideCnicFront" class="form-control col-md-4 col-xs-12" required>

<label class="col-md-2" for="">Bride CNIC (Back):<br><span style="font-weight:normal; font-size:13px; color:red;">Size:400KB - Format:jpg,png,gif</span>
</label>
<input type="file" name="brideCnicBack" id="brideCnicBack" class="form-control col-md-4 col-xs-12" required>

</div>

<div class="row form-group">
<label class="col-md-2" for="category">Father/Guardian CNIC (Front):<br><span style="font-weight:normal; font-size:13px; color:red;">Size:400KB - Format:jpg,png,gif</span>
</label>
<input type="file" name="fatherCnicFront" id="fatherCnicFront" class="form-control col-md-4 col-xs-12" required >

<label class="col-md-2" for="category">Father/Guardian CNIC (Back):<br><span style="font-weight:normal; font-size:13px; color:red;">Size:400KB - Format:jpg,png,gif</span>
</label>
<input type="file" name="fatherCnicBack" id="fatherCnicBack" class="form-control col-md-4 col-xs-12" required>
</div>

<div class="row form-group">
<label class="col-md-2" for="">Nikahnama (Front):<br><span style="font-weight:normal; font-size:13px; color:red;">Size:400KB - Format:jpg,png,gif</span>
</label>
<input type="file" name="nikahnamFront" id="nikahnamFront" class="form-control col-md-4 col-xs-12" required>

<label class="col-md-2" for="">Nikahnama (Back):<br><span style="font-weight:normal; font-size:13px; color:red;">Size:400KB - Format:jpg,png,gif</span>
</label>
<input type="file" name="nikahnamBack" id="nikahnamBack" class="form-control col-md-4 col-xs-12" required>

</div>

<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-2"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<!-- <div class="col-md-1"></div> -->
<button class="btn btn-primary col-md-1" type="reset">Reset</button>
<div class="col-md-7"></div>
<button class="btn btn-primary col-md-1" type="button" data-dismiss="modal">Cancel</button>
</div>


<input type="hidden" name="year" value="<?php echo $getfinancial_year;?>">
 <input type="hidden" name="installment" value="<?php echo $get_inst;?>">
</form>
  

</div>
<!-- /.card-body -->
</div>
</div>
</div>




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
