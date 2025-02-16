<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');



$dm_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Deeni Madaris')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_dm_amount = $dm_query->row('amount_allocated');

$dm_disbursement_query = $this->db->select_sum('amount')->from('mustahiqeen')
->where('district_id',$userid)->where('installment',$get_inst)->where('year',$getfinancial_year)->where('MustahiqType',"Deeni Madaris")->get();
$total_dm_disbursement = $dm_disbursement_query->row('amount');


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
     
      
   <!--    <?php $this->load->view('district/include/user_manue');?> -->

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
<h3 class="m-0 text-dark">Deeni Madaris Mustahiqeen Registration of <strong><?php echo $district_name; ?></strong></h3>
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
<strong>Success!</strong> <?php echo $error;?>
</div>
<?php	
}
?>



<!-- Info boxes -->
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Deeni Madaris Fund</span>
<span class="info-box-number" style="color: blue;">
<?php
echo number_format($total_dm_amount,2) ;
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
echo number_format($total_dm_disbursement,2);
?>
<br>
</span>
<small class="info-box-number">
<?php 
$x = $total_dm_amount;
$y = $total_dm_disbursement * 100;
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
$dm_balance = $total_dm_amount - $total_dm_disbursement;
echo number_format($dm_balance,2);
?>
 <br>
</span>
<small class="info-box-number">
<?php 
$x = $total_dm_amount;
$y = $dm_balance * 100;
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
<h3 class="text-dark">Deeni Madaris Registration Form (LZ-19)</h3>
</div>
<div class="col-md-4 col-sm-2">
<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Register GA Mustahiqeen</button> -->
</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">Deeni Madaris Mustahiq Entry Form</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
</div>



<div class="card-body">
<div class="card col-12 col-md-12 col-sm-6">
<!-- For Card heading and placing line <div class="card-header"></div> -->
<!-- /.card-header -->
<div class="card-body">
<div class="row"></div>
<form id="pzf_fund" onsubmit="return validate()" action="<?php echo base_url(); ?>Dist_DM_mustahiq_reg/dist_dm_mustahiq_register/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2" for="m_name">Mustahiq Name <span class="required">*</span>
</label>
<input type="text" required name="mustahiq_name" id="m_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name">

<label class="col-md-2" for="f_name">Father Name<span class="required">*</span>
</label>
<input type="text" required name="f_name" id="f_name" value="" class="form-control col-md-4 col-xs-12" placeholder="Father Name">
</div>

<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B<span class="required">*</span>
</label>
<input type="text" required  name="cnic" id="cnic" value="" class="form-control col-md-4 col-xs-12"  data-inputmask='"mask": "99999-9999999-9"' data-mask>

<label class="col-md-2" for="contact">Contact #<span class="required">*</span>
</label>
<input type="text" required name="cell_no" id="contact" value="" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "9999-9999999"' data-mask>
</div>

<div class="row form-group">
<label class="col-md-2" for="madaris">Select Madrassa<span class="required">*</span>
</label>
<select required class="form-control col-md-4 col-xs-12" id="madrassa_name_id" name="madrassa_name" data-dropdown-css-class="select2-purple">
<option value="">---Select Madrassa---</option>

<?php
$i=1;
if(!empty($get_all_madrassa_list))
{
foreach($get_all_madrassa_list as $madrassa_listvalue)
{
?>
<option value="<?php echo $madrassa_listvalue['madrassa_name']?>"><?php echo $madrassa_listvalue['madrassa_name']; ?></option>
<?php 
$i++;
}
}
?>



</select>


<!--<input type="hidden" name="getMadrassaname" id="getMadrassaname" value="">-->

<label class="col-md-2" for="class">Budget<span class="required">*</span>
</label>
<input readonly type="number" class="form-control col-md-4 col-xs-12" name="budgetvalue" id="budgetvalue">



</div>

<div class="row form-group">
<label class="col-md-2" for="lzc">LZC Name<span class="required">*</span>
</label>
<select required class="form-control col-md-4 col-xs-12" id="lzc" name="lzc_id">
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

<label class="col-md-2" for="accommodation">Accommodation<span class="required">*</span>
</label>
<select required class="form-control col-md-4 col-xs-12" id="accommodation" name="accommodation_type">
<option value="">---Select Residence Type---</option>
<?php 
foreach($getResidenceType as $residenceType)
{
?>
<option value="<?php echo $residenceType['field_name']?>"><?php echo $residenceType['field_name']; ?></option>
<?php 
$i++;
}

?>
</select>
</div>


<div class="row form-group">
<label class="col-md-2" for="dob">Date Of Birth<span class="required">*</span>
</label>
<input type="date" name="dob" id="dob" value="" class="form-control col-md-4 col-xs-12" placeholder="Date Of Birth">

<label class="col-md-2" for="address">Address<span class="required">*</span>
</label>
<input required type="text" name="address" id="address" value="" class="form-control col-md-4 col-xs-12" placeholder="Address">
</div>

<div class="row form-group">
<label class="col-md-2" for="istehqaq_no">Istehqaq No<span class="required">*</span>
</label>
<input required type="text" name="Istehqaq_no" id="istehqaq_no" value="" class="form-control col-md-4 col-xs-12" placeholder="Istehqaq Certificate No">

<!--<label class="col-md-2" for="address">New<span class="required">*</span>
</label>
<input type="text" name="address" id="address" value="" class="form-control col-md-4 col-xs-12" placeholder="Address">
-->

<label class="col-md-2" for="category">Category<span class="required">*</span>
</label>
<select required class="form-control col-md-4 col-xs-12" id="category" name="category">
<option value="">---Select Category---</option>
<?php 
foreach($getDMCategory as $category)
{
?>
<option value="<?php echo $category['field_name']?>"><?php echo $category['field_name']; ?></option>
<?php 
$i++;
}
?>
</select>


</div>

<div class="row form-group">


<label class="col-md-2" for="amount">Amount<span class="required">*</span>
</label>
<input type="number" name="amount" readonly id="amount" value="" class="form-control col-md-4 col-xs-12" placeholder="Amount">


<label class="col-md-2" for="class">Calss/Darja<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="class" name="class_darja">
<option value="">---Select Class Darja---</option>
<?php 
foreach($getClassDarja as $classDarja)
{
?>
<option value="<?php echo $classDarja['field_name']?>"><?php echo $classDarja['field_name']; ?></option>
<?php 
$i++;
}
?>
</select>



</div>



<div class="row form-group">
<p class="col-md-12" id="error_div" style="display:none; font-size:16px; text-align:center; color:#F00;"></p>
</div>


<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-2"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
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
<div class="row"></div>

</div>
</div>
</div>
</div>


<!-- Main Form -->
<div class="row"></div>

<div class="row">

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h1 class="card-title" style="font-size: 25px;">Deeni Madaris Mustahiqeen List of District <strong><?php echo $district_name; ?></strong> during Year:<strong><?php echo $getfinancial_year; ?></strong> and Inst:<strong><?php echo $getfinancial_installment; ?></strong></h1>
 <!-- Print list -->
<a target="_blank" href="<?php echo base_url(); ?>Dist_DM_mustahiq_reg/DeeniMadarisPrint" class="btn btn-primary btn-sm float-right">Print Deeni Madaris Mustahiqeen</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Madrassa</th>
<th>Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell#</th>
<th>LZC</th>
<th>Amount</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_all_madrassa_tablevalues))
{
foreach($get_all_madrassa_tablevalues as $get_all_madrassavalueslist)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_all_madrassavalueslist['InstituteName'];?></td>
<td><?php echo $get_all_madrassavalueslist['mustahiq_name']; ?></td>
<td><?php echo $get_all_madrassavalueslist['father_name']; ?></td>
<td><?php echo $get_all_madrassavalueslist['mustahiq_cnic']; ?></td>
<td><?php echo $get_all_madrassavalueslist['contact_number']; ?></td>
<td><?php echo $get_all_madrassavalueslist['LZCActualName'];?></td>
<td><?php echo $get_all_madrassavalueslist['amount']; ?></td>
<td><a  href="<?php echo base_url();?>Dist_DM_mustahiq_reg/deleteMadarisRecord/<?php echo $get_all_madrassavalueslist['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
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



<script type="text/javascript">


$('#accommodation').on('change',function()
{
var residential_value = $(this).val();

if(residential_value == "Residential")
{
document.getElementById("amount").value = 18000;	
}
else if(residential_value == "Non-Residential")
{
document.getElementById("amount").value = 12000;	
}
});



$('#madrassa_name_id').on('change',function()

{
var getmadrassaid = $(this).val();	
	//alert(getmadrassaid);
	//var myname = $( "#madrassa_name_id option:selected" ).text();
	//alert(myname);
if(getmadrassaid != "")
{
$.ajax({
url:"<?php echo base_url();?>Dist_DM_mustahiq_reg/get_madrassa_budget",
method:"POST",
dataType: "JSON",
beforeSend: function() 
{
$("#userstatus").html('<img src="<?php echo base_url(); ?>/assets/loading.gif">');
},
data: {getmadrassaid:getmadrassaid},
success:function(response)
{
//alert(response);	
var get_madrassa_budget = parseInt(response);
document.getElementById("budgetvalue").value = get_madrassa_budget;
//document.getElementById("getMadrassaname").value = myname;



}
});
}
else
{
alert("Please Select Madrassa.?");
document.getElementById("budgetvalue").value = 0;
document.getElementById("amount").value = 0;
}


});







function validate()
{
	
var get_budgetvalue = parseInt(document.getElementById('budgetvalue').value);	
var get_amount = parseInt(document.getElementById('amount').value);
	
if(get_budgetvalue < get_amount)	
{

$("#error_div").hide().fadeIn('slow').html('You are out of Balance in Selected Madrassa...');

return false;	

}

return true;

}







</script>



















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
