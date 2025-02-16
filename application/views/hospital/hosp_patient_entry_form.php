<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$userid = $this->session->userdata('hospital_id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');


foreach($patient_info as $pt_info_values)
{
$pt_info_values['mustahiq_name'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('hospital/include/title');?></title>



<!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
-->

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
<span class="info-box-number">Total Regular Fund</span>
<span class="info-box-number" style="color: blue;">
<?php
$Regular_total_fund_query = $this->db->select('*')->from('hospital_payment')
->where('hospital_id',$userid)->where('financial_year',$getfinancial_year)
->where('installment',$get_inst)->get();
$total_hosp_fund = $Regular_total_fund_query->row('payment_amount');
echo number_format($total_hosp_fund,2); 
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
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Regular Fund Disbursement</span>
<span class="info-box-number" style="color: green;"> 

<?php


$hospital_disbursement_query = $this->db->select_sum('total_expense')->from('patients')->where('hospital_id',$userid)->where('patient_type','Regular Fund Patient')->where('status',1)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$hosp_disbursement = $hospital_disbursement_query->row('total_expense');
echo number_format($hosp_disbursement,2);

?> 
<br>
 </span>
<small class="info-box-number">
<?php echo "%";
?>
</small>
</div>
</div>
</div>

<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Regular Fund Balance</span>
<span class="info-box-number" style="color: red;">

<?php
$net_hosp_balance =  $total_hosp_fund - $hosp_disbursement;
echo number_format($net_hosp_balance,2);
?>
<br>
 </span>
<small class="info-box-number">
<?php 
echo "%";
?>
</small>
</div>
</div>
</div></div>

<div class="row">
<div class="col-md-12">

<?php 
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');
if(isset($success))
{
?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success . </strong> <?php echo $success;?>
</div>
<?php
}
else if(isset($error))
{
?>
<div class="alert alert-danger alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error . </strong> <?php echo $error;?>
</div>
<?php	
}
?>

</div>
</div>

<!-- Main Body -->


<div class="row">

<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<h3 style="font-weight: bold; color: green;">Search Patient's Personal Information</h3>
<div class="row"></div>
<form id="pzf_fund" action="<?php echo base_url(); ?>Hosp_patient_entry_form/manage_fetch_details/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row">
<div class="col-md-7">
<label>Enter CNIC#</label>
<input required type="text" name="mustahiq_cnic_value" class="form-control" data-inputmask='"mask": "99999-9999999-9"' data-mask placeholder="Enter CNIC or Form-B to Fetch Patient's Personal Information">
</div>

<div class="col-md-3">
<label>Istehqaq No.</label>
<input required type="text" name="mustahiq_istehqaqno" class="form-control" placeholder="Istehqaq No">
</div>
<div class="col-md-2">
<label>&nbsp;</label><br>

<input type="submit" class="btn btn-success btn-block" name="sbmitbtn" value="Submit">
</div>
</div>
<input type="hidden" name="get_hospital_id" value="<?php echo $userid;?>">
</form>
</div>
</div>
</div>
<!-- /.card -->
</div>
</div>

</div>

<?php
if(isset($pt_info_values['mustahiq_name']))
{
?>
<div class="row">
<?php
}
else
{
?>
<div class="row" style="display:none;">
<?php
}
?>




<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<h3 style="font-weight: bold; color: green;"> Patient's Personal Information</h3>

<form action="<?php echo base_url(); ?>Hosp_patient_entry_form/manage_details_submit/" method="post" enctype="multipart/form-data">


<div class="pt_personal_info">

<div class="row form-group">
<label class="col-md-2" for="m_name">Patient Name <span class="required" style="color: red">*</span>
</label>
<input type="text" readonly name="pt_name" id="m_name" value="<?php echo $pt_info_values['mustahiq_name'];?>" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name">

<label class="col-md-2" for="f_name" style="text-align:center;">Father Name<span class="required" style="color: red">*</span>
</label>
<input type="text" readonly name="f_name" id="f_name" value="<?php echo $pt_info_values['f_name'];?>" class="form-control col-md-4 col-xs-12" placeholder="Father Name">
</div>

<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B<span class="required" style="color: red">*</span>
</label>

<input type="text" readonly  data-inputmask='"mask": "99999-9999999-9"' data-mask value="<?php echo $pt_info_values['cnic'];?>" name="mustahiq_cnic" class="form-control col-md-4 col-xs-12" placeholder="CNIC/Form-B">

<label class="col-md-2" for="contact" style="text-align:center;">Contact #<span class="required" style="color: red">*</span>
</label>
<input type="text" readonly value="<?php echo $pt_info_values['cell_no'];?>" name="contact_number" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "9999-9999999"' data-mask placeholder="Contact No">
</div>

<div class="row form-group">
<label class="col-md-2" for="age">Patient's Age <span class="required" style="color: red">*</span>
</label>
<input type="text" readonly name="age" id="age" value="<?php echo $pt_info_values['age'];?>" class="form-control col-md-4 col-xs-12" min="1" max="100">

<label class="col-md-2" for="gender" style="text-align:center;">Gender<span class="required" style="color: red">*</span>
</label>
<input type="text" readonly name="gender" id="gender" value="<?php echo $pt_info_values['gender'];?>" class="form-control col-md-4 col-xs-12" min="1" max="100">
</div>



<div class="row form-group">
<label class="col-md-2" for="hospital">District<span class="required" style="color: red">*</span>
</label>


<?php
$district_id = $pt_info_values['district_id'];
$lzc_id = $pt_info_values['lzc_id'];

$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
$district_name = $get_dist_name->row('district_name');

$get_lza_qry = $this->db->select('*')->from('lzc_list')->where('id',$lzc_id)->get();
$lzc_name = $get_lza_qry->row('lzc_name');

?>



<input type="text"  readonly value="<?php echo $district_name;?>" name="" class="form-control col-md-4 col-xs-12">


<label class="col-md-2" for="lzc" style="text-align:center;">LZC Name<span class="required" style="color: red">*</span>
</label>
<input type="text"  readonly value="<?php echo $lzc_name;?>" name="" class="form-control col-md-4 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-2" for="lzc">Year<span class="required" style="color: red">*</span>
</label>
<input type="text" name="year" id="year"  class="form-control col-md-4 col-xs-12" value="<?php echo $pt_info_values['year'];?>" readonly>

<label class="col-md-2" for="address" style="text-align:center;">Installment<span class="required" style="color: red">*</span>
</label>
<input type="text" name="installment" id="installment" class="form-control col-md-4 col-xs-12" value="<?php echo $pt_info_values['installment'];?>" readonly>
</div>




<div class="row form-group">

<label class="col-md-2" for="disease">Disease Name<span class="required" style="color: red">*</span>
</label>
<input type="text"  readonly name="disease" id="disease" value="<?php echo $pt_info_values['disease_type'];?>" class="form-control col-md-4 col-xs-12" placeholder="Disease Name">


<label class="col-md-2" style="text-align:center;">Istehqaq No<span class="required" style="color: red">*</span>
</label>
<input readonly type="text" name="istehqaq_no" id="istehqaq_no" value="<?php echo $pt_info_values['istehqaq_no'];?>" class="form-control col-md-4 col-xs-12" placeholder="Istehqaq certificate No">
</div>


</div>


<hr>


<div class="row" style="background:#E6E6E6; padding:15px 10px;">


<div class="col-md-4">
<label for="search">Patient OPD No</label>
<input type="text" required name="opd_no" id="opd_no" class="form-control" />
</div>
<div class="col-md-4">
<label for="created_at_gt">Category</label>
<select class="form-control" required id="pt_inout_catgory" name="pt_category">
<option value="">---Select Patient Category---</option>
<option value="Outdoor">Outdoor (OPD)</option>
<option value="Indoor">Indoor (Admitted)</option>
</select>

</div>
<div class="col-md-4">
<label for="created_at_lt">Patient Type</label>
<select class="form-control" required id="Pt_category" name="pt_type">
<option value="">---Select Patient Type---</option>
<option value="Regular Fund Patient">Regular Fund Patient</option>
<option value="Special Health Fund Patient">Special Health Fund Patient</option>
</select>
</div>
</div>


<div style="display:none;"id="admission_discharge_div">
<div class="row" style="background:#E6E6E6; padding:15px 10px; margin-top:3px;" >
<label class="col-md-2" for="lzc">Admission Date<span class="required" style="color: red">*</span>
</label>
<input type="date" name="admission_date" id="admission_date" value="" class="form-control col-md-4 col-xs-12" placeholder="Patient's Admission Date" >

<label class="col-md-2" for="address">Discharge Date<span class="required" style="color: red">*</span>
</label>
<input type="date" name="discharge_date" id="discharge_date" value="" class="form-control col-md-4 col-xs-12" placeholder="Patient's Discharge Date" >
</div>
</div>


<br>



<div>

<h3 style="font-weight: bold; color: green;">Add Treatment History</h3>

<table class="table table-bordered table-striped small-text" id="tb_medicine">
<tr>
<th>Treatment Type</th>
<th width="250">Medicine / Test / Surgery</th>
<th>Unit Price</th>
<th>Quantity</th>
<th>Total Price</th>
<th>
<a href="javascript:void(0);" onclick="addsub();" title="Add More Medicine" style="font-size:12px; text-align: center;" id="addMore_medicine">
<span class="fas fa-plus">
</span>
</a>
</th>
</tr>

<tr>
<td>
<select class="form-control" required="required" id="treatment_type1" onChange="getlistings(this.value,1);" name="treatment_type[]">
<option value="">---Select Treatment Type----</option>
<option value="1">Medicines</option>
<option value="2">Medical Tests</option>
<option value="3">Surgeries</option>
</select>
</td>
<td>
<select class="form-control"  id="getmedicinelist1" name="medicine[]" required="required" >
<option value="">---Select Medicine----</option>
</select>
</td>
<td>
<input type="number" required="required" class="form-control has-feedback-left" id="unit_price1" name="unit_price[]" placeholder="Price Per Unit">
</td>
<td>
<input type="number" class="form-control has-feedback-left" id="quantity1" onkeyup="calculate_total(1,this.value)" required="required"  name="quantity[]" placeholder="Quantity">
</td>
<td>
<input type="number" class="form-control totalsum" id="total_price1" name="total_price[]" readonly>
</td>
<td>
<a href="javascript:void(0);" style="font-size:13px;" class="remove"><span class="fa fa-trash"></span></a>
</td>
</tr>



<tbody id="addmore"></tbody>

</table>


<h3 style="font-weight: bold; color: green;">Patient's Total Expenditure</h3>


<table  class="table table-bordered table-striped small-text" id="tb_total">
<tr class="tr-header">

<th style="text-align: center;"><strong style="margin-top:20px;">Grand Total</strong></th>
<th style="text-align: center;"><input type="number" class="form-control has-feedback-left" id="grand_total" name="grand_total" placeholder="Grand Total" value="" readonly>
</th>


</tr>


</table>


</div>


<div class="ln_solid"></div>
<div class="row">
<div class="form-group">
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit">
<!-- <div class="col-md-1"></div> -->
<button class="btn btn-primary " type="reset">Reset</button>
<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
</div>
</div>

<input id="totalsub" name="totalsub" value="1" type="hidden" />
<input name="district_id" value="<?php echo $district_id;?>" type="hidden" />
<input name="lzc_id" value="<?php echo $lzc_id;?>" type="hidden" />

<input name="record_id" value="<?php echo $pt_info_values['id'];?>" type="hidden" />


<input name="pt_hc_category" value="<?php echo $pt_info_values['category'];?>" type="hidden" />


</form>

</div>
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

<?php //echo site_url('Hosp_patient_entry_form/get_sub_category')?>



<script type="text/javascript">
function getlistings(gettypeid,rowid)
{	


$.ajax({
url:"<?php echo site_url('Hosp_patient_entry_form/get_medicine_list')?>",
method:"POST",
cache: false,
dataType:"JSON",
data:{gettypeid:gettypeid},
success:function(response)
{

var html = '';
var i;
for(i=0; i<response.length; i++)
{
html += '<option value='+response[i].id+'>'+response[i].name+'</option>';
}
$('#getmedicinelist'+rowid).html(html);

}
});
}
</script>






<script>

function addsub()
{ 
var prev =parseInt($("#totalsub").val());
var abc = 1;
var subno = prev+abc;
$("#totalsub").val(subno);
$(".add_link").html("");
$.post("get_categories_ajax.php",{}, function( data ) {
$("#addmore").append('<tr><td><select class="form-control" id="treatment_type'+subno+'" onChange="getlistings(this.value,'+subno+');" name="treatment_type[]" required="required"><option value="">---Select Treatment Type----</option><option value="1">Medicines</option><option value="2">Medical Tests</option><option value="3">Surgeries</option></select></td><td><select class="form-control" id="getmedicinelist'+subno+'" name="medicine[]" required="required"><option value="">---Select Medicine----</option></select></td><td><input type="number" class="form-control has-feedback-left" id="unit_price'+subno+'" name="unit_price[]" placeholder="Price Per Unit"></td><td><input type="number" class="form-control has-feedback-left" id="quantity'+subno+'" onkeyup="calculate_total('+subno+',this.value)" name="quantity[]" placeholder="Quantity"></td><td><input type="number" class="form-control totalsum" required id="total_price'+subno+'" name="total_price[]" placeholder="Total Medicine Price" readonly></td><td><a href="javascript:void(0);" style="font-size:13px;" class="remove"><span class="fa fa-trash"></span></a></td></tr>');
});
}

function calculate_total(rowid,qty)
{
var price = $("#unit_price"+rowid).val();
var total = price*qty;
$("#total_price"+rowid).val(total);

calculate_grand_total();

}


function calculate_grand_total()
{
var sumis = 0;
$('.totalsum').each(function() {
sumis += Number($(this).val());
});
document.getElementById("grand_total").value = sumis;
}


$(document).on("click", ".remove", function() {
$(this).parent().parent().remove();
});


$('#pt_inout_catgory').on('change',function()
{
if($(this).val() == "Indoor")
{
$("#admission_discharge_div").slideDown();
}
else
{
$("#admission_discharge_div").slideUp();
}
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

});


</script>



</body>
</html>
