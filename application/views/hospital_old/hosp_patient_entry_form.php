<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$userid = $this->session->userdata('id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> <?php $this->load->view('hospital/include/title');?></title>

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


 
  <?php $this->load->view('hospital/include/nav');?>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     
    
    <?php $this->load->view('hospital/include/profile_manue');?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
      
  <!--     <?php $this->load->view('hospital/include/user_manue');?> -->

      <!-- Sidebar Menu -->
      
       <?php $this->load->view('hospital/include/sidebar');?>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-9 col-md-9">
            <h3 class="m-0 text-dark" style="font-weight: bold;">Patient's Registration Form (Regular Fund)</h3>
          </div><!-- /.col -->

          <div class="col-md-3 div_align">
            <h5>F/Year: <strong><?php echo $getfinancial_year; ?></strong> Inst: <strong><?php echo $get_inst; ?></strong> </h5> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">


        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>
              <div class="info-box-content text_align">
                <span class="info-box-number">Total Regular Fund for <strong style="color: red;"><?php echo $hospital_name; ?></strong></span>
                <span class="info-box-number" style="color: blue;">
                  74 <br>
                </span>
                <small class="info-box-number">100%</small>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>
              <div class="info-box-content text_align">
                <span class="info-box-number">Disbursement</span>
                <span class="info-box-number" style="color: green;"> 
                1,250,000,00000.0 <br>
                 </span>
                <small class="info-box-number">56%</small>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>
              <div class="info-box-content text_align">
                <span class="info-box-number">Balance</span>
                <span class="info-box-number" style="color: red;">
                996,549,399.00 <br>
                 </span>
                <small class="info-box-number">44%</small>
              </div>
            </div>
          </div>
          

        </div>

        <!-- Main Body -->
        <div class="row">
          <div class="col-md-1"></div>
           <div class="col-12 col-md-12 col-sm-6">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true" style="font-weight: bold;">Patient's Registration Form (Regular Fund)</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Add Hospital</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Add Deeni Madaris</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Add Foundation</a>
                  </li> -->
                </ul>
              </div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
  <h3 style="font-weight: bold; color: green;">Patient's Personal Information</h3>
<div class="row"></div>
<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Head_wise_fund_alloc/manage_headwise_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B<span class="required" style="color: red">*</span>
</label>

<input required type="text" name="mustahiq_cnic" class="form-control col-md-7 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask placeholder="Enter CNIC or Form-B to Fetch Patient's Personal Information">
<div class="col-md-1"></div>
<input type="submit" class="btn btn-success col-md-2" name="sbmitbtn" value="Submit">
</div>

<div class="row form-group">
<label class="col-md-2" for="opd_no">Patient OPD No<span class="required" style="color: red">*</span>
</label>
<input type="text" name="opd_no" id="opd_no" value="" class="form-control col-md-4 col-xs-12" placeholder="Patient's OPD No">

<label class="col-md-2" for="istehqaq_no">Istehqaq No<span class="required" style="color: red">*</span>
</label>
<input type="text" name="istehqaq_no" id="istehqaq_no" value="" class="form-control col-md-4 col-xs-12" placeholder="Istehqaq certificate No">
</div>

<div class="row form-group">
<label class="col-md-2" for="m_name">Patient Name <span class="required" style="color: red">*</span>
</label>
<input type="text" name="m_name" id="m_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name">

<label class="col-md-2" for="f_name">Father Name<span class="required" style="color: red">*</span>
</label>
<input type="text" name="f_name" id="f_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Father Name">
</div>

<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B<span class="required" style="color: red">*</span>
</label>

<input required type="text" name="mustahiq_cnic" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask placeholder="CNIC/Form-B">

<label class="col-md-2" for="contact">Contact #<span class="required" style="color: red">*</span>
</label>
<input required type="text" name="contact_number" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "9999-9999999"' data-mask placeholder="Contact No">
</div>

<div class="row form-group">
<label class="col-md-2" for="age">Patient's Age <span class="required" style="color: red">*</span>
</label>
<input type="number" name="age" id="age" value="" class="form-control col-md-4 col-xs-12" placeholder="Patient's Age" min="1" max="100">

<label class="col-md-2" for="gender">Gender<span class="required" style="color: red">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="gender" name="gender">
<option value="">---Select Gender---</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>



<div class="row form-group">
<label class="col-md-2" for="hospital">District<span class="required" style="color: red">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="hospital" name="hospital">
<option value="">---Select District---</option>
</select>

<label class="col-md-2" for="lzc">LZC Name<span class="required" style="color: red">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="lzc" name="lzc">
<option value="">---Select LZC---</option>
</select>
</div>

<div class="row form-group">
<label class="col-md-2" for="lzc">Year<span class="required" style="color: red">*</span>
</label>
<input type="text" name="year" id="year" value="" class="form-control col-md-4 col-xs-12" value="<?php echo $getfinancial_year;?>" readonly>

<label class="col-md-2" for="address">Installment<span class="required" style="color: red">*</span>
</label>
<input type="text" name="year" id="year" value="" class="form-control col-md-4 col-xs-12" value="<?php echo $get_inst;?>" readonly>
</div>

<div class="row form-group">
<label class="col-md-2" for="disease">Disease Name<span class="required" style="color: red">*</span>
</label>
<input type="text" name="disease" id="disease" value="" class="form-control col-md-4 col-xs-12" placeholder="Disease Name">

<label class="col-md-2" for="category">Category<span class="required" style="color: red">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="Pt_category" name="pt_category">
<option value="">---Select Patient Category---</option>
<option value="Indoor">Indoor (Admitted)</option>
<option value="Outdoor">Outdoor (OPD)</option>
</select>
</div>

<div class="row form-group" id="admission_discharge"  style="display: none;" >
<label class="col-md-2" for="lzc">Admission Date<span class="required" style="color: red">*</span>
</label>
<input type="date" name="admission_date" id="admission_date" value="" class="form-control col-md-4 col-xs-12" value="" placeholder="Patient's Admission Date" >

<label class="col-md-2" for="address">Discharge Date<span class="required" style="color: red">*</span>
</label>
<input type="date" name="discharge_date" id="discharge_date" value="" class="form-control col-md-4 col-xs-12" value="" placeholder="Patient's Discharge Date" >
</div>


<div class="row form-group">

<label class="col-md-2" for="category">Patient Type<span class="required" style="color: red">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="Pt_category" name="pt_category">
<option value="">---Select Patient Type---</option>
<option value="Regular fund patient">Regular fund patient</option>
<option value="Special health fund patient">Special health fund patient</option>
</select>
</div>



 <h3 style="font-weight: bold; color: green;">Add Treatment History</h3>

<table  class="table table-bordered table-striped small-text" id="tb_medicine">
<tr class="tr-header">
  <th style="text-align: center;">Treatment Type</th>
<th style="text-align: center;">Medicine Name</th>
<th style="text-align: center;">Unit Price</th>
<th style="text-align: center;">Quantity</th>
<th style="text-align: center;">Total Medicine Price</th>
<th style="text-align: center;">
<a href="javascript:void(0);" onclick="addsub();" title="Add More Medicine" style="font-size:12px; text-align: center;" id="addMore_medicine">
<span class="fas fa-plus" >
</span>
</a>
</th>
</tr>

<tr>
  <td>
<select class="form-control" id="medicine" name="medicine[]" required="required">
<option value="">---Select Treatment Type----</option>
<option value="">Medicine</option>
<option value="">Test</option>
<option value="">Surgery</option>
</select>
</td>
<td>
<select class="form-control" id="medicine" name="medicine[]" required="required">
<option value="">---Select Medicine----</option>
<?php
$i = 1;
$select_medicine = "SELECT * FROM medicine_list order by medicine_name ASC";
$runselectqry_medicine = mysql_query($select_medicine);
while ($getmedicine = mysql_fetch_array($runselectqry_medicine))
{
?>
<option value="<?php echo $getmedicine['id']?>"><?php echo $getmedicine['medicine_name']; ?></option>
<?php 
$i++;
}
?>
</select>
</td>
<td>
<input type="number" class="form-control has-feedback-left"  id="unit_price1" name="unit_price[]" placeholder="Price Per Unit">
</td>
<td>
<input type="number" class="form-control has-feedback-left" onkeyup="calculate_total(1,this.value)"  id="quantity1" name="quantity[]" placeholder="Quantity">
</td>
<td>
<input type="number" class="form-control totalsum" required id="total_price1" name="total_price[]" placeholder="Total Medicine Price" readonly="">
</td>
<td style="text-align: center;">
<a href='javascript:void(0);'  style="font-size:13px;"class='remove'><span class='fa fa-trash'></span></a>
</td>
</tr>

<input id="totalsub" name="totalsub" value="1" type="hidden" />

 <tbody id="addmore"></tbody>

</table>


<h3 style="font-weight: bold; color: green;">Patient's Total Espenditure</h3>


<table  class="table table-bordered table-striped small-text" id="tb_total">
<tr class="tr-header">
<th style="text-align: center;">Total Medication Amount</th>
<th style="text-align: center;">Total Test Amount</th>
<th style="text-align: center;">Total Surgary Amount</th>
<th style="text-align: center;">Grand Total</th>
</tr>

<tr>
<td>
<input type="number" class="form-control has-feedback-left"  id="medicine_total" name="medicine_total" placeholder="Medicine Total Amount" value="" readonly="">
</td>

<td>
<input type="number" class="form-control has-feedback-left"  id="test_total" name="test_total" placeholder="Test Total Amount" value="" readonly="">
</td>
<td>
<input type="number" class="form-control has-feedback-left" id="surgery_total" name="surgery_total" placeholder="Surgery Total Amount" value="" readonly="">
</td>
<td>
<input type="number" class="form-control has-feedback-left" id="grand_total" name="grand_total" placeholder="Grand Total" value="" readonly="">
</td>

</tr>
</table>


<div class="ln_solid"></div>
<div class="row">
<div class="form-group">
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit">
<!-- <div class="col-md-1"></div> -->
<button class="btn btn-primary " type="reset">Reset</button>
<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
</div>
</div>
</form>


</div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab"></div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab"></div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab"></div>
                </div>
              </div>
              <!-- /.card -->
            </div>
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

<?php $this->load->view('hospital/include/footer');?>
 
 
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


<!-- For Add More Medicine  -->
<script>

function addsub(){ 
var prev =parseInt($("#totalsub").val());
var abc = 1;
var subno = prev+abc;
$("#totalsub").val(subno);
$(".add_link").html("");
$.post( "get_categories_ajax.php",{}, function( data ) 
{
$("#addmore").append('<tr><td><select class="form-control" id="medicine'+subno+'" name="medicine[]" required="required">'+data+'</select></td><td><input type="number" class="form-control has-feedback-left"  id="unit_price'+subno+'" name="unit_price[]" placeholder="Price Per Unit"></td><td><input type="number" class="form-control has-feedback-left" onkeyup="calculate_total('+subno+',this.value)"  id="quantity'+subno+'" name="quantity[]" placeholder="Quantity"></td><td><input type="number" class="form-control totalsum" required id="total_price'+subno+'" name="total_price[]" placeholder="Total Medicine Price"></td><td style="text-align: center;"><a href="javascript:void(0);" class="remove"><span class="glyphicon glyphicon-remove"></span></a></td></tr>');
});
}



function calculate_total(id,qty){
  
  //alert(id);
  
    var price = $("#unit_price"+id).val();
    var total = price*qty;
    $("#total_price"+id).val(total);
    
    
    total_medicine_sum();
    total_grand_sum();
    
  }

function total_medicine_sum()
{
var sumis = 0;
$('.totalsum').each(function() {
sumis += Number($(this).val());
});
document.getElementById("medicine_total").value = sumis;
}

</script>

<!-- For Add More Test -->
<script>

function addsubtest(){ 
var prev_test =parseInt($("#totalsubtest").val());
var test = 1;
var subnotest = prev_test+test;
$("#totalsubtest").val(subnotest);
$(".add_link_test").html("");
$.post( "get_test_ajax.php",{}, function( testdata ) 
{
$("#addmoretest").append('<tr><td><select class="form-control" id="test'+subnotest+'" name="test[]" required="required">'+testdata+'</select></td><td><input type="number" class="form-control has-feedback-left"  id="test_unit_price'+subnotest+'" name="test_unit_price[]" placeholder="Unit Price"></td><td><input type="number" class="form-control has-feedback-left" onkeyup="calculate_total_test('+subnotest+',this.value)"  id="test_quantity'+subnotest+'" name="test_quantity[]" placeholder="Quantity"></td><td><input type="number" class="form-control totalsumtest" required id="test_total_price'+subnotest+'" name="test_total_price[]" placeholder="Total Test Price"></td><td style="text-align: center;"><a href="javascript:void(0);" class="remove"><span class="glyphicon glyphicon-remove"></span></a></td></tr>');
});
}
function calculate_total_test(id,qtytest){
  
  //alert(id);
  
    var testprice = $("#test_unit_price"+id).val();
    var test_total = testprice*qtytest;
    $("#test_total_price"+id).val(test_total);
    
    
    total_test_sum();
    total_grand_sum();
    
  }




function total_test_sum()
{
var sumtest = 0;
$('.totalsumtest').each(function() {
sumtest += Number($(this).val());
});
document.getElementById("test_total").value = sumtest;
}




</script>

<!-- For Add More Surgary -->

 <script>

function addsubsurg(){ 
var prev_surg =parseInt($("#totalsubsurg").val());
var surg = 1;
var subnosurg = prev_surg+surg;
$("#totalsubsurg").val(subnosurg);
$(".add_link_surg").html("");
$.post( "get_surgary_ajax.php",{}, function( surgdata ) 
{
$("#addmoresurg").append('<tr><td><input type="text" class="form-control" id="surgery_type'+subnosurg+'" name="surgery_type[]" required="required" placeholder="Surgery type"></td><td><input type="text" class="form-control has-feedback-left"  id="surgeon_name'+subnosurg+'" name="surgeon_name[]" placeholder="Surgeon Name"></td><td><input type="text" class="form-control has-feedback-left" onkeyup="calculate_total_surg('+subnosurg+',this.value)"  id="surgery_result'+subnosurg+'" name="surgery_result[]" placeholder="Surgery Result"></td><td><input type="number" class="form-control totalsumsurg" required id="surgeon_fee'+subnosurg+'" name="surgeon_fee[]" placeholder="Surgen Total Fee"></td><td style="text-align: center;"><a href="javascript:void(0);" class="remove"><span class="glyphicon glyphicon-remove"></span></a></td></tr>');
});
}
function calculate_total_surg(id){
  
  //alert(id);
  
    // var surgprice = $("#test_unit_price"+id).val();
    var surg_total;
    $("#surgeon_fee"+id).val(surg_total);
    
    
    total_surg_sum();
    total_grand_sum();
    
  }

function total_surg_sum()
{
var sumsurg = 0;
$('.totalsumsurg').each(function() {
sumsurg += Number($(this).val());
});
document.getElementById("surgery_total").value = sumsurg;
}
</script>

<script>
$(function(){
$('#addMore_surgary').on('click', function() {
var data_surgary = $("#tb_surgery tr:eq(1)").clone(true).appendTo("#tb_surgery");

data_surgary.find("input").val('');
});

$(document).on('click', '.remove', function() {
var trIndex_surgary = $(this).closest("tr").index();
if(trIndex_surgary>1) {
$(this).closest("tr").remove();
} else {
alert("Sorry!! You Can't remove first row!");
}
});
});      
</script> 


<!-- Add modre medicine -->
<script>
$(function(){
$('#addMore_medicine').on('click', function() {
var data_medinine = $("#tb_medicine tr:eq(1)").clone(true).appendTo("#tb_medicine");

data_medinine.find("input").val('');
});

$(document).on('click', '.remove', function() {
var trIndex_medicine = $(this).closest("tr").index();
if(trIndex_medicine>1) {
$(this).closest("tr").remove();
} else {
alert("Sorry!! You Can't remove first row!");
}
});
});      
</script> 


<!-- Add modre medicine -->
<script>
$(function(){
$('#addmore_test').on('click', function() {
var data_test = $("#tb_test tr:eq(1)").clone(true).appendTo("#tb_test");

data_test.find("input").val('');
});

$(document).on('click', '.remove', function() {
var trIndex_test = $(this).closest("tr").index();
if(trIndex_test>1) {
$(this).closest("tr").remove();
} else {
alert("Sorry!! You Can't remove first row!");
}
});
});      
</script> 


<script type="text/javascript">
  
  // For grand Total 
  function total_grand_sum()
{
var sumgrand = 0;
medicine_total = parseInt(document.getElementById("medicine_total").value);
surgery_total =parseInt(document.getElementById("surgery_total").value); 
test_total = parseInt(document.getElementById("test_total").value);
sumgrand = parseInt(medicine_total + surgery_total + test_total);

document.getElementById("grand_total").value = sumgrand;
}
</script>


<script>
// -------------Patient's  Category -------------//

$('#pt_category').on('change',function(){
if( $(this).val()==="Indoor"){
$("#admission_discharge").slideDown()
}
else{
$("#admission_discharge").slideUp()
}
});  

</script>


</body>
</html>
