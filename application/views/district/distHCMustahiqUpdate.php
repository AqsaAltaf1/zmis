<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

$hc_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)
->where('account_head','Health Care (District Level)')
->where('lzc_institution_madrasa','DHQ')
->where('installment',$get_inst)
->where('year',$getfinancial_year)
->get();

 $total_dhq_amount = $hc_query->row('amount_allocated');


$hc_thq_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)
->where('account_head','Health Care (District Level)')
->where('lzc_institution_madrasa','THQ')
->where('installment',$get_inst)
->where('year',$getfinancial_year)
->get();

$total_thq_amount = $hc_thq_query->row('amount_allocated');

$hc_bhu_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)
->where('account_head','Health Care (District Level)')
->where('lzc_institution_madrasa','BHU')
->where('installment',$get_inst)
->where('year',$getfinancial_year)
->get();

$total_bhu_amount = $hc_bhu_query->row('amount_allocated');

$hc_disbursement_query = $this->db->select_sum('amount')->from('hc_mustahiqeen')
->where('district_id',$userid)->where('dhq_id',$userid)->where('hospital_type','DHQ')->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_hc_disbursement = $hc_disbursement_query->row('amount');



$thq_disbursement_query = $this->db->select_sum('amount')->from('hc_mustahiqeen')
->where('district_id',$userid)->where('dhq_id',$userid)->where('hospital_type','THQ')->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_thq_disbursement = $thq_disbursement_query->row('amount');

$bhu_disbursement_query = $this->db->select_sum('amount')->from('hc_mustahiqeen')
->where('district_id',$userid)->where('dhq_id',$userid)->where('hospital_type','BHU')->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_bhu_disbursement = $bhu_disbursement_query->row('amount');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> <?php $this->load->view('pza/include/title');?></title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
     
      
     <!--  <?php $this->load->view('district/include/user_manue');?> -->

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
<h3 class="m-0 text-dark">Health Care <strong><?php echo $district_name; ?></strong> Mustahiqeen Update</h3>
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






<!-- Nave bar row -->

<div class="row mb-2">

<div class="col-md-4 col-sm-2">
<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Register GA Mustahiqeen</button> -->
</div>
</div>


<div class="card card-primary ">
<div class="card-header">
<h3 class="card-title">Health Care <strong><?php echo $district_name; ?></strong> Mustahiq Update Form</h3>

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
<form id="pzf_fund" onsubmit="return validate()" action="<?php echo base_url(); ?>Dist_HC_mustahiq_reg/updatePatientRecord/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2" for="m_name">Mustahiq Name <span class="required">*</span>
</label>
<input required type="text" name="mustahiq_name" id="m_name" value="<?php echo $patientInfo[0]->mustahiq_name; ?>" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name" disabled>

<label class="col-md-2" for="f_name">Father Name<span class="required">*</span>
</label>
<input required type="text" name="f_name" id="f_name" value="<?php echo $patientInfo[0]->f_name; ?>" class="form-control col-md-4 col-xs-12" placeholder="Father Name" disabled>
</div>

<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B<span class="required">*</span>
</label>
<input required type="text" name="cnic" id="cnic" value="<?php echo $patientInfo[0]->cnic; ?>" class="form-control col-md-4 col-xs-12" placeholder="CNIC" data-inputmask='"mask": "99999-9999999-9"' data-mask disabled>

<label class="col-md-2" for="contact">Contact #<span class="required">*</span>
</label>
<input required type="text" name="cell_no" id="contact" value="<?php echo $patientInfo[0]->cell_no; ?>" class="form-control col-md-4 col-xs-12" placeholder="Contact No" data-inputmask='"mask": "9999-9999999"' data-mask disabled>
</div>

<div class="row form-group">

<label class="col-md-2" for="category">Gender<span class="required">*</span>
</label>
<select required class="form-control col-md-4 col-xs-12" id="gender" name="gender">
<option value="<?php echo $patientInfo[0]->gender; ?>"><?php echo $patientInfo[0]->gender; ?></option>
<option value="">---Select Gender---</option>
<option value="Male">Male</option>
<option value="Female">Female</option>

</select>
<label class="col-md-2" for="istehqaq_no">Age<span class="required">*</span>
</label>
<input required type="number" name="age" id="age" value="<?php echo $patientInfo[0]->age; ?>" class="form-control col-md-4 col-xs-12" placeholder="Please Enter Age">


</div>


<div class="row form-group">
<label class="col-md-2" for="lzc">LZC Name<span class="required">*</span>
</label>
<select required class="form-control col-md-4 col-xs-12" id="lzc" name="lzc_id">
<option value="<?php echo $patientInfo[0]->LZCActualName; ?>"><?php echo $patientInfo[0]->LZCActualName; ?></option>
<option value="">---Select---</option>
<?php
$lzcCount=1;
if(!empty($get_all_lzcs))
{
foreach($get_all_lzcs as $get_all_lzcsvalues)
{
?>
<option value="<?php echo $get_all_lzcsvalues['id']?>"><?php echo $get_all_lzcsvalues['lzc_name']; ?></option>
<?php 
$lzcCount++;
}
}
?>
</select>

<label class="col-md-2" for="address">Address<span class="required">*</span>
</label>
<input required type="text" name="address" id="address" value="<?php echo $patientInfo[0]->address; ?>" class="form-control col-md-4 col-xs-12" placeholder="Address">
</div>

<div class="row form-group">
<label class="col-md-2" for="istehqaq_no">Istehqaq No<span class="required">*</span>
</label>
<input required type="text" name="istehqaq_no" id="istehqaq_no" value="<?php echo $patientInfo[0]->istehqaq_no; ?>" class="form-control col-md-4 col-xs-12" placeholder="Istehqaq Certificate No">

<label class="col-md-2" for="category">Category<span class="required">*</span>
</label>
<select required class="form-control col-md-4 col-xs-12" id="category" name="category">
<option value="<?php echo $patientInfo[0]->category; ?>"><?php echo $patientInfo[0]->category; ?></option>
<option value="">---Select Category---</option>
<option value="Poor">Poor</option>
<option value="Widow">Widow</option>
<option value="Disable">Disable</option>
<option value="Orphan">Orphan</option>
</select>
</div>

<div class="row form-group">
<label class="col-md-2" for="disease">Disease Name<span class="required">*</span>
</label>
<input required type="text" name="disease_type" id="disease" value="<?php echo $patientInfo[0]->disease_type; ?>" class="form-control col-md-4 col-xs-12" placeholder="Disease Name">

<label class="col-md-2" for="hospital">Hospital Type<span class="required">*</span>
</label>
<select required class="form-control col-md-4 col-xs-12" id="hospital_type" name="dhq_id">
<option value="DHQ.<?php $patientInfo[0]->district_id;;?>"> <?php echo $patientInfo[0]->hospitalName; ?></option>
<option value="">---Select Hospital---</option>
<option value="DHQ.<?php echo $userid;?>"> DHQ <?php echo $district_name; ?></option>
<option value="THQ.<?php echo $userid;?>"> THQ <?php echo $district_name; ?></option>
<option value="BHU.<?php echo $userid;?>"> BHU <?php echo $district_name; ?></option>
<option value="provincial_hospital"> Provincial Level Hospital</option>

</select>
</div>

<input type="hidden" name="hospitalType" id="hospitalType" >


<?php
$getdistrict_hc_fund = $this->db->select('*')->from('dist_head_wise_fund')
->where('account_head','Health Care (District Level)')->where('district_id',$userid)
->where('installment',$get_inst)->where('year',$getfinancial_year)->where('lzc_institution_madrasa','DHQ')->get();
$getdistrict_hc_fund = $getdistrict_hc_fund->row('amount_allocated');

echo "<br>";
$query_amount_disb = $this->db->select_sum('amount')->from('hc_mustahiqeen')
->where('district_id',$userid)->where('installment',$get_inst)->where('hospital_type','DHQ')->where('year',$getfinancial_year)->get();
$total_disburse_amount = $query_amount_disb->row('amount');

$getfinal_hc_amount = $getdistrict_hc_fund - $total_disburse_amount;




?>





<div class="row form-group" style="display: none;" id="pt_expense_div">
<label class="col-md-2" for="amount">Amount<span class="required">*</span>
</label>
<input type="number" name="amount" id="amount" value="<?php echo $patientInfo[0]->amount; ?>" class="form-control col-md-4 col-xs-12" placeholder="Patient's Expense Amount for DHQ" min="1" max="<?php echo $getfinal_hc_amount;?>">

<label class="col-md-2" for="amount">Available Budget<span class="required">*</span>
</label>
<input type="number" name="budget" id="budget" value="<?php echo $getfinal_hc_amount;?>" class="form-control col-md-4 col-xs-12" readonly>



</div>


<div class="row form-group" style="display: none;" id="thq_div">
<label class="col-md-2" for="amount">Amount<span class="required">*</span>
</label>
<input type="number" name="thqAmount" id="amount" value="<?php echo $patientInfo[0]->amount; ?>" class="form-control col-md-4 col-xs-12" placeholder="Patient's Expense Amount for THQ" min="1" max="<?php echo $thq_balance;?>">

<label class="col-md-2" for="">THQ Available Budget<span class="required">*</span>
</label>
<input type="number" name="budget" id="budget" value="<?php echo $thq_balance;?>" class="form-control col-md-4 col-xs-12" readonly>



</div>
<div class="row form-group" style="display: none;" id="bhu_div">
<label class="col-md-2" for="">Amount<span class="required">*</span>
</label>
<input type="number" name="bhuAmount" id="amount" value="<?php echo $patientInfo[0]->amount; ?>" class="form-control col-md-4 col-xs-12" placeholder="Patient's Expense Amount for BHU" min="1" max="<?php echo $bhu_balance;?>">

<label class="col-md-2" for="amount">BHU Available Budget<span class="required">*</span>
</label>
<input type="number" name="budget" id="budget" value="<?php echo $bhu_balance;?>" class="form-control col-md-4 col-xs-12" readonly>



</div>




<div style="display: none;" id="hospital_div">
<div class="row form-group">
<label class="col-md-2" for="hospital">Hospital<span class="required">*</span>
</label>
<select class="form-control col-md-10 col-xs-12" id="hospitalUpdate" name="hospital_id">
<option value="">---Select Hospital---</option>
<?php
$hospitalCount=1;
if(!empty($get_all_hostpital_list))
{
foreach($get_all_hostpital_list as $get_all_hostpital_values)
{
?>
<option value="<?php echo $get_all_hostpital_values['id']?>"><?php echo $get_all_hostpital_values['name']; ?></option>
<?php 
$hospitalCount++;
}
}
?>

</select>
</div>
</div>


</div>

<div class="row form-group">
<div class="col-md-2"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Update" style="margin-right: 5px;">
<!-- <div class="col-md-1"></div> -->
<button class="btn btn-primary col-md-1" type="reset">Reset</button>

</div>

<input type="hidden" name="getrecord_id" value="<?php echo $this->uri->segment(3);?>">
</form>

</div>
<!-- /.card-body -->
</div>
<div class="row"></div>
</div>
</div>


<!-- Main Form -->
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


<script type="text/javascript">

function validate()
{
	
var get_budgetvalue = parseInt(document.getElementById('budget').value);	
var get_amount = parseInt(document.getElementById('amount').value);
	
if(get_budgetvalue < get_amount)	
{

$("#error_div").hide().fadeIn('slow').html('You have not sufficient amount...');

return false;	

}

return true;

}

</script>





<script>
// View records
$(document).ready(function() {
	$.ajax({
		url: "<?php echo base_url("Dist_HC_mustahiq_reg/ViewHospRecord");?>",
		type: "POST",
		cache: false,
		success: function(dataResult){
			//alert(data);
			$('#table').html(dataResult); 
		}
	});
	
	// Delete Records
	
	$(document).on("click", ".delete", function() { 
	//alert("Success");
		var $ele = $(this).parent().parent();
		var confirmation = confirm("are you sure you want to remove the item?");
		
		if (confirmation) {
		$.ajax({
			url: "<?php echo base_url("Dist_HC_mustahiq_reg/DeleteHospRecord");?>",
			type: "POST",
			cache: false,
			data:{
				type: 2,
				id: $(this).attr("data-id")
			},
			success: function(dataResult){
				//alert("Data removed ");
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
				}
			}
		});
		alert('Record removed Successfully...');
		}
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


<script>
  
// -------------  Pateients Expense div -------------//
$('#hospital_type').on('change',function(){
if( $(this).val()==="DHQ.<?php echo $userid;?>")
{
$("#pt_expense_div").slideDown();
$("#hospital_div").slideUp();
$("#thq_div").slideUp();
$("#bhu_div").slideUp();
}
else if($(this).val()==="THQ.<?php echo $userid;?>")
{
$("#pt_expense_div").slideUp();
$("#hospital_div").slideUp();
$("#thq_div").slideDown();
$("#bhu_div").slideUp();
}
else if($(this).val()==="BHU.<?php echo $userid;?>")
{
$("#pt_expense_div").slideUp();
$("#hospital_div").slideUp();
$("#thq_div").slideUp();
$("#bhu_div").slideDown();
}
else if ($(this).val()==="provincial_hospital")
{
$("#hospital_div").slideDown(); 
$("#pt_expense_div").slideUp();
$("#thq_div").slideUp();
$("#bhu_div").slideUp();
}
else
{
$("#hospital_div").slideUp();
$("#pt_expense_div").slideUp();	
$("#thq_div").slideUp();
$("#bhu_div").slideUp();
}
});






// -------------  Pateients Expense Update div -------------//
$('#hospital_typeUpdate').on('change',function(){
if( $(this).val()==="DHQ.<?php echo $userid;?>")
{
$("#pt_expense_divUpdate").slideDown();
$("#hospital_divUpdate").slideUp();
$("#thq_divUpdate").slideUp();
$("#bhu_divUpdate").slideUp();
}
else if($(this).val()==="THQ.<?php echo $userid;?>")
{
$("#pt_expense_divUpdate").slideUp();
$("#hospital_divUpdate").slideUp();
$("#thq_divUpdate").slideDown();
$("#bhu_divUpdate").slideUp();
}
else if($(this).val()==="BHU.<?php echo $userid;?>")
{
$("#pt_expense_divUpdate").slideUp();
$("#hospital_divUpdate").slideUp();
$("#thq_divUpdate").slideUp();
$("#bhu_divUpdate").slideDown();
}
else if ($(this).val()==="provincial_hospitalUpdate")
{
$("#hospital_divUpdate").slideDown(); 
$("#pt_expense_divUpdate").slideUp();
$("#thq_divUpdate").slideUp();
$("#bhu_divUpdate").slideUp();
}
else
{
$("#hospital_divUpdate").slideUp();
$("#pt_expense_divUpdate").slideUp();	
$("#thq_divUpdate").slideUp();
$("#bhu_divUpdate").slideUp();
}
});

</script>
</body>
</html>
