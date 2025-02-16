<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');


$esp_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (P)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_esp_amount = $esp_query->row('amount_allocated');

$esp_expense_query = $this->db->select_sum('amount')->from('mustahiqeen')
->where('district_id',$userid)->where('MustahiqType',"Educational Stipend (P)")->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_esp_expense = $esp_expense_query->row('amount');
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
<h3 class="m-0 text-dark">Educational Stipend (Academic) Mustahiqeen Registration</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year ?></b> INSTALLMENT:<b style="color: black;"> <?php echo $get_inst;?></b> </h5>

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
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Educational Stipend (P) Fund</span>
<span class="info-box-number" style="color: blue;">
<?php
echo number_format($total_esp_amount,2);
?>
 <br>
</span>
<small class="info-box-number">100%</small>
</div>
</div>
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Disbursement</span>
<span class="info-box-number" style="color: green;"> 
<?php
echo number_format($total_esp_expense,2);
?>
<br>
</span>
<small class="info-box-number">
<?php 
$x = $total_esp_amount;
$y = $total_esp_expense * 100;
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
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Balance</span>
<span class="info-box-number" style="color: red;">
<?php
$esp_balance = $total_esp_amount - $total_esp_expense;
echo number_format($esp_balance,2);
?>
 <br>
</span>
<small class="info-box-number">
<?php 
$x = $total_esp_amount;
$y = $esp_balance * 100;
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
<h3 class="text-dark">Educational Stipend (Professional) Registration Form (LZ-19)</h3>
</div>
<div class="col-md-4 col-sm-2">
<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Register GA Mustahiqeen</button> -->
</div>
</div>


<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">Educational Stipend (Professional) Mustahiq Entry Form</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
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
<form id="" action="<?php echo base_url(); ?>Dist_ESP_mustahiq_reg/manage_esp_mustahiq_reg/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2" for="m_name">Mustahiq Name <span class="required">*</span>
</label>
<input type="text" name="mustahiq_name" id="m_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name" required>

<label class="col-md-2" for="f_name">Father Name<span class="required">*</span>
</label>
<input type="text" name="f_name" id="f_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Father Name" required>
</div>

<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B<span class="required">*</span>
</label>
<input type="text" name="cnic" id="cnic" value="" class="form-control col-md-4 col-xs-12" placeholder="CNIC" data-inputmask='"mask": "99999-9999999-9"' data-mask required>

<label class="col-md-2" for="contact">Contact #<span class="required">*</span>
</label>
<input type="text" name="cell_no" id="contact" value="" class="form-control col-md-4 col-xs-12" placeholder="Contact No" data-inputmask='"mask": "9999-9999999"' data-mask required>
</div>


<div class="row form-group">
<label class="col-md-2" for="gender">Gender<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="gender" name="gender" required>
<option value="">---Select Gnder---</option>
<?php 
foreach($getGender as $gender)
{
?>
<option value="<?php echo $gender['field_name'];?>"> <?php echo $gender['field_name'];?></option>
<?php 
$i++;
}
?>
</select>

<label class="col-md-2" for="category">Category<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="category" name="category" required>
<option value="">---Select Category---</option>


<?php 
foreach($getCategory as $esCategory)
{
?>
<option value="<?php echo $esCategory['field_name'];?>"><?php echo $esCategory['field_name']; ?></option>
<?php
$i++;
}
?>
</select>

</div>



<div class="row form-group">


<label class="col-md-2" for="category">Educational Level:<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="educationalLevel" name="educationalLevel" required>
<option value="">---Select Education Level---</option>


<?php 
foreach($getEducationLevel as $educationLevel)
{
?>
<option value="<?php echo $educationLevel['rate'];?>"><?php echo $educationLevel['field_name']; ?></option>
<?php
$i++;
}
?>
</select>

<input type="hidden" name="educationalLevelText" id="educationalLevelText" >

<label class="col-md-2" for="category">Stipend Duration:<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="stipendDuration" name="stipendDuration" required>
<option value="">---Select Stipend Duration---</option>


<?php 
foreach($getStipendDuration as $stipendDuration)
{
?>
<option value="<?php echo $stipendDuration['field_name'];?>"><?php echo $stipendDuration['field_name']." Month/s"; ?></option>
<?php
$i++;
}
?>
</select>

</div>



<div class="row form-group">
<label class="col-md-2" for="madaris">University/College<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="madaris" name="college_university_name" data-dropdown-css-class="select2-purple" required>
<option value="">---Select University/College---</option>

<?php
$i=1;
if(!empty($get_all_coleges_uni_list))
{
foreach($get_all_coleges_uni_list as $get_all_coleges_uni_listvalues)
{
?>
<option value="<?php echo $get_all_coleges_uni_listvalues['institution_name']?>"><?php echo $get_all_coleges_uni_listvalues['institution_name']; ?></option>
<?php 
$i++;
}
}
?>


</select>

<label class="col-md-2" for="class">Calss/Department<span class="required">*</span>
</label>
<input type="text" name="class_department" id="class" value="" class="form-control col-md-4 col-xs-12" placeholder="Class Name" required>
</div>

<div class="row form-group">
<label class="col-md-2" for="lzc">LZC Name<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="lzc" name="lzcID" required>
<option value="">---Select LZC---</option>
<?php
$i=1;
if(!empty($get_all_lzcs))
{
foreach($get_all_lzcs as $get_all_lzcsvalues)
{
?>
<option value="<?php echo $get_all_lzcsvalues['id']?>"><?php echo $get_all_lzcsvalues['lzc_name']; ?></option>
<?php 
$i++;
}
}
?>


</select>

<label class="col-md-2" for="istehqaq_no">Istehqaq No<span class="required">*</span>
</label>
<input type="text" name="Istehqaq_no" id="istehqaq_no" value="" class="form-control col-md-4 col-xs-12" placeholder="Istehqaq Certificate No" required>
</div>


<div class="row form-group">
<label class="col-md-2" for="dob">Date Of Birth<span class="required">*</span>
</label>
<input type="date" name="dob" id="dob" value="" class="form-control col-md-4 col-xs-12" placeholder="Date Of Birth" required>

<label class="col-md-2" for="age">Age<span class="required">*</span>
</label>
<input type="number" name="age" id="age" value="" class="form-control col-md-4 col-xs-12" placeholder="Student Age" required>
</div>


<div class="row form-group">


<label class="col-md-2" for="amount">Amount<span class="required">*</span>
</label>
<input type="number" name="amount" id="amount" value="" class="form-control col-md-4 col-xs-12" placeholder="Amount" min="1" max="<?php echo $esp_balance;?>" required>

<label class="col-md-2" for="address">Address<span class="required">*</span>
</label>
<input type="text" name="address" id="address" value="" class="form-control col-md-4 col-xs-12" placeholder="Address" required>
</div>


<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-2"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit" style="margin-right: 5px;">

<button class="btn btn-primary col-md-1" type="reset">Reset</button>
<div class="col-md-7"></div>
<button class="btn btn-primary col-md-1" type="button" data-dismiss="modal">Cancel</button>

</div>


<input type="hidden" name="year" value="<?php echo $getfinancial_year;?>">
<input type="hidden" name="installment" value="<?php echo $get_inst;?>">
</form>

</div>

</div>
<div class="row"></div>
</div>
</div>
</div>
</div>
</div>


<!-- Main Form -->
<div class="row"></div>

<div class="row">

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h1 class="card-title" style="font-size: 23px;">Educational Stipend (Professional) Students List of DZC <strong><?php echo $district_name; ?></strong> for Year:<strong><?php echo $getfinancial_year; ?></strong> and Inst:<strong><?php echo $get_inst; ?></strong></h1>
 <!-- Print list -->
<a target="_blank" href="<?php echo base_url(); ?>Dist_ESP_mustahiq_reg/EduStipendPrint" class="btn btn-primary btn-sm float-right">Print Edu Scholarship Mustahiqeen</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>University/College</th>
<th>Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>LZC</th>
<th>Edu-Level</th>
<th>Stipend Duration</th>
<th>Amount</th>
<th>Action</th>
</tr>
</thead>
<?php
$i=1;
if(!empty($get_esp_mustahiq_list))
{
foreach($get_esp_mustahiq_list as $dist_esp_mustahiq_listvalues)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php echo $dist_esp_mustahiq_listvalues['InstituteName'];?>
</td>
<td><?php echo $dist_esp_mustahiq_listvalues['mustahiq_name']; ?></td>
<td><?php echo $dist_esp_mustahiq_listvalues['father_name']; ?></td>
<td><?php echo $dist_esp_mustahiq_listvalues['mustahiq_cnic']; ?></td>
<td><?php echo $dist_esp_mustahiq_listvalues['contact_number']; ?></td>
<td><?php echo $dist_esp_mustahiq_listvalues['LZCActualName'];?></td>
<td><?php echo $dist_esp_mustahiq_listvalues['Qualification'];?></td>
<td><?php echo $dist_esp_mustahiq_listvalues['stipendDuration'];?></td>
<td><?php echo $dist_esp_mustahiq_listvalues['amount']; ?></td>
<td><a  href="<?php echo base_url();?>Dist_ESP_mustahiq_reg/deleteESPRecord/<?php echo $dist_esp_mustahiq_listvalues['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
</tr>
<?php 
$i++;
}
}
?>
</table> 
</div>
<!-- /.card-body -->
</div>


</div>

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


//On Change function of educational level amount
$('#stipendDuration').on('change',function()
{

var educationalLevel = $("#educationalLevel").val();
var stipendDuration = $("#stipendDuration").val();
//alert(educationalLevel);
//alert(stipendDuration);
var finalEduStipend = educationalLevel * stipendDuration;

document.getElementById("amount").value = finalEduStipend;

var educationalLevelValue = $("#educationalLevel option:selected").text();
 
document.getElementById("educationalLevelText").value = educationalLevelValue;

});





<!-- For data tables -->
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
