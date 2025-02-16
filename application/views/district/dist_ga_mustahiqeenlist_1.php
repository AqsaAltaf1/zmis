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
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Guzara Allowance Mustahiqeen</h1>
</div>
<div class="col-sm-6">

</div>
</div>
</div><!-- /.container-fluid -->
</section>

<?php 

$get_lzc_id = $this->uri->segment(3);
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$get_lzc_id)->get();
 $getlzc_name = $get_lzclist_query->row('lzc_name');
?>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">

<?php echo $getlzc_id = $this->uri->segment(3);?>

<h3 class="card-title">Selected Guzara Allowance Mustahiqeen List of Local Zakat Cmmmittee <?php echo $getlzc_name; ?></h3>


<?php
$user_type = $this->session->userdata('user_type');
if($user_type == "audit")
{
?>


<!--<a target="_blank" href="<?php //echo base_url(); ?>Dist_GA_Mustahiqeenlist/dist_selected_mustahiqeen_print/<?php //echo $getlzc_id;?>" class="btn btn-primary btn-sm float-right" id="printMustahiq2">Print Mustahiqeen List for Audit</a>-->

<?php 

} else if($user_type == "district")
{
?>


<!--<a target="_blank" href="<?php //echo base_url(); ?>Dist_GA_Mustahiqeenlist/dist_selected_mustahiqeen_print/<?php //echo $getlzc_id;?>" class="btn btn-primary btn-sm float-right" id="printMustahiq" style="display:none;">Print Mustahiqeen List for Audit</a>-->

	
<?php 
}
?>


</div>
              <!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<!-- <th>F.Name</th> -->
<th>CNIC</th>
<th>Category</th>
<th>Gender</th>
<!-- <th>Score</th> -->
<th>Date</th>
<th>Manual</th>
<th>Online</th>
<?php
$user_type = $this->session->userdata('user_type');
if($user_type == "audit")
{
?>
<th>Audit</th>
<?php
}
else
{
?>
<th>Audit</th>
<?php	
}
?>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_lzc_mustahiqeen_limitwise))
{
foreach($get_lzc_mustahiqeen_limitwise as $getmustahiqinfo)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $getmustahiqinfo['mustahiq_name']?></td>
<!-- <td><?php echo $getmustahiqinfo['father_name']?></td> -->
<td><?php echo $getmustahiqinfo['mustahiq_cnic']?></td>
<td><?php echo $getmustahiqinfo['category']?></td>
<td><?php echo $getmustahiqinfo['gender']?></td>
<!-- <td><?php echo $getmustahiqinfo['total_marks']?></td> -->
<td><?php echo date("d-m-Y",strtotime($getmustahiqinfo['add_date']));?></td>
<td align="center">


<?php
$this->db->where('user_id',$getmustahiqinfo['id']);
$this->db->where('financial_Year',$getfinancial_year);
$this->db->where('installment',$getfinancial_installment);
$this->db->where('lzc_id',$getmustahiqinfo['LZC_name']);
$result = $this->db->get('guzara_allowance_mustahiqeen_payments')->num_rows();
if($result == 1)
{
?>
<a style="color:#fff;" class="btn btn-success btn-sm">Paid Mustahiq</a>

<?php
}
else
{
?>
<a style="color:#fff;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#issue_check<?php echo $i;?>">Issue Check</a>
<?php
}
?>

</td>

<td>
<a style="color:#fff;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pay_online<?php echo $i;?>">Pay Online</a>
</td>

<?php
if($getmustahiqinfo['Remarks'] == "Approve")
{
?>

<td>
<a href="#" class="btn btn-success btn-sm">Approved</a>
<input type="hidden" value="auditYes" name="approvedStatus" class="auditConfirmation" >
</td>

<?php
}
else
{
?>

<?php
$user_type = $this->session->userdata('user_type');
if($user_type == "audit")
{
?>
<td>
<a href="<?php echo base_url(); ?>Dist_GA_lz_19/ga_mustahiq_details_audit/<?php echo $getmustahiqinfo['id'];?>/<?php echo $this->uri->segment(3);?>" class="btn btn-success btn-sm">Audit</a>
</td>
<?php
}
else
{
?>
<td>
<input type="hidden" value="auditNo" name="approvedStatus" class="auditConfirmation">
<a href="#" class="btn btn-danger btn-sm">Not Audited</a></td>
<?php	
}
?>


<?php
}
?>


</tr>

<!-- Online Payment -->

<div class="modal fade" id="pay_online<?php echo $i;?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Online Payment Guzara Allowance Mustahiqeen </h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_GA_Mustahiqeenlist1/manage_mustahiqeen_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2" for="name">Name<span class="required">*</span>
</label>
<input type="text" name="name" id="name" value="<?php echo $getmustahiqinfo['mustahiq_name']?>" disabled="disabled" class="form-control col-md-4 col-xs-12">

<label class="col-md-2" for="">Mobile No <span class="required">*</span>
</label>
<input type="text" name="contact_no" id="contact_no" value="<?php echo $getmustahiqinfo['contact_number']?>" disabled="disabled" class="form-control col-md-4 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-2" for="">CNIC <span class="required">*</span>
</label>
<input type="text" name="mustahiq_cnic" id="mustahiq_cnic" value="<?php echo $getmustahiqinfo['mustahiq_cnic']?>" disabled="disabled" class="form-control col-md-4 col-xs-12">

<label class="control-label col-md-2" for="salary">Amount <span class="required">*</span> </label>
<input type="number" name="payment_amount" id="amount" required class="form-control col-md-4 col-xs-12" value="6000" readonly>
</div>


<div class="row form-group">
<label class="control-label col-md-2" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_Year" required class="form-control col-md-4" value="<?php echo $getfinancial_year;?>" readonly>

<label class="control-label col-md-2" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="installment" name="installment" required class="form-control col-md-4" value="<?php echo $getfinancial_installment;?>" readonly>
</div>

<div class="ln_solid"></div>
<hr>
<div class="row form-group">
<div class="col-md-2"></div>
<input style="margin-right:3px;" type="submit" class="btn btn-success" name="sbmitbtn" value="Submit">

<button style="margin-right:3px;" class="btn btn-primary col-md-2" type="reset">Reset</button>

<button  style="margin-right:3px;"class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>

</div>


<input type="hidden" name="user_id" value="<?php echo $getmustahiqinfo['id']?>">
<input type="hidden" name="lzc_id" value="<?php echo $getmustahiqinfo['LZC_name'];?>">


</form>
</div>
</div>
</div>
</div>


<!-- Manual Payment -->
<div class="modal fade" id="issue_check<?php echo $i;?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Guzara Allowance Mustahiq Checque out Details </h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_GA_Mustahiqeenlist/manage_mustahiqeen_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2" for="name">Name <?php echo $i;?> <span class="required">*</span>
</label>
<input type="text" name="name" id="name" value="<?php echo $getmustahiqinfo['mustahiq_name']?>" disabled="disabled" class="form-control col-md-4 col-xs-12">

<label class="col-md-2" for="f_name">Father Name <span class="required">*</span>
</label>
<input type="text" name="f_name" id="f_name" value="<?php echo $getmustahiqinfo['father_name']?>" disabled="disabled" class="form-control col-md-4 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B <span class="required">*</span>
</label>
<input type="text" name="cniccnic" id="cnic" value="<?php echo $getmustahiqinfo['mustahiq_cnic']?>" disabled="disabled" class="form-control col-md-4 col-xs-12">

<label class="col-md-2" for="mustahiq_category">Category <span class="required">*</span>
</label>
<input type="text" name="mustahiq_category" id="mustahiq_category" value="<?php echo $getmustahiqinfo['category']?>" disabled="disabled" class="form-control col-md-4 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-2" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_Year" required class="form-control col-md-4" value="<?php echo $getfinancial_year;?>" readonly>

<label class="control-label col-md-2" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="installment" name="installment" required class="form-control col-md-4" value="<?php echo $getfinancial_installment;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-2" for="bank_name">Bank Name <span class="required">*</span> </label>
<input type="text" name="bank_name" id="bank_name" required class="form-control col-md-4 col-xs-12">

<label class="control-label col-md-2" for="account">Account No <span class="required">*</span> </label>
<input type="text" name="account_number" id="account" required class="form-control col-md-4 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-2" for="cheque_no">Cheque No <span class="required">*</span> </label>
<input type="text" name="cheque_number" id="cheque_no" required class="form-control col-md-4 col-xs-12">

<label class="control-label col-md-2" for="salary">Amount <span class="required">*</span> </label>
<input type="number" name="payment_amount" id="amount" required class="form-control col-md-4 col-xs-12" value="12000" readonly>

</div>

<div class="ln_solid"></div>
<hr>
<div class="row form-group">
<div class="col-md-2"></div>
<input style="margin-right:3px;" type="submit" class="btn btn-success" name="sbmitbtn" value="Submit">

<button style="margin-right:3px;" class="btn btn-primary col-md-2" type="reset">Reset</button>

<button  style="margin-right:3px;"class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>

</div>


<input type="hidden" name="user_id" value="<?php echo $getmustahiqinfo['id']?>">
<input type="hidden" name="lzc_id" value="<?php echo $getmustahiqinfo['LZC_name'];?>">


</form>
</div>
</div>
</div>
</div>



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
<!-- /.card -->

<div class="card">
<div class="card-header">
<h3 class="card-title">LZ-19 Mustahiqeen List of <strong><?php echo $getlzc_name; ?></strong> </h3>
<a target="_blank" href="<?php echo base_url(); ?>Dist_GA_Mustahiqeenlist/dist_lz19_mustahiqeen_print/<?php echo $getlzc_id;?>" class="btn btn-primary btn-sm float-right">Print LZ-19 Mustahiqeen List</a>
</div>

<!-- <div class="card-header">
<h3 class="card-title">LZC WISE ALL - Guzara Allowance Mustahiqeen </h3>
<a target="_blank" href="<?php echo base_url(); ?>Dist_GA_Mustahiqeenlist/dist_selected_mustahiqeen_print" class="btn btn-primary btn-sm float-right">Print All Mustahiqeen List</a>
</div> -->
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>F.Name</th>
<th>CNIC</th>
<th>Category</th>
<!-- <th>Score</th> -->
<th>Date</th>

</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_alllzc_mustahiqeen))
{
foreach($get_alllzc_mustahiqeen as $getmustahiqinfo)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $getmustahiqinfo['mustahiq_name']?></td>
<td><?php echo $getmustahiqinfo['father_name']?></td>
<td><?php echo $getmustahiqinfo['mustahiq_cnic']?></td>
<td><?php echo $getmustahiqinfo['category']?></td>
<!-- <td><?php echo $getmustahiqinfo['total_marks']?></td> -->
<td><?php echo date("d-m-Y",strtotime($getmustahiqinfo['add_date']));?></td>


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
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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


<script>
$(document).ready(function(){
	
 $('.auditConfirmation').each(function() {
    if ($(this).val() == 'auditYes') {
		
		$("#printMustahiq").show();
         
    }
    else{
        $("#printMustahiq").hide();
        return false
    }
});	
	
	
	
	
	
});
</script>


</body>
</html>
