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


  
  <?php $this->load->view('pza/include/nav');?>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
    
    <?php $this->load->view('pza/include/profile_manue');?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <?php $this->load->view('pza/include/user_manue');?>

      <!-- Sidebar Menu -->
      
      <?php $this->load->view('pza/include/sidebar');?>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h3 class="m-0 text-dark">Provincial Zakat Administration Hospital Allocation</h3>
          </div><!-- /.col -->
          <div class="col-sm-4 div_align">
            <!-- <?php echo $year;?> and <?php echo $inst;?>  -->
<h5 class="m-0 text-dark" class="pull-right"> F/YEAR: <b> 2019-20</b> INSTALLMENT:<b style="color: black;"> 1</b> </h5>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<div class="modal fade" id="regular_fund" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
  <h4 class="modal-title" id="myModalLabel">Allocate Regular Fund to Hospital (Provincial Level)</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="manage_pzf_payment.php" method="post" data-parsley-validate class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>
<!-- <?php echo $net_balance_pza;?> -->
<input type="number" name="pza_budget" id="pza_budget" value="798980" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Select Hospital<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="hospital" name="hospital"  onChange='toggleShared();'>
<option value="">---Select One----</option>
<!-- <?php
$i = 1;
$select_hospitals = "SELECT * FROM hospital_users order by name ASC";
$runselectqry_hospitals = mysql_query($select_hospitals);
while ($gethospitals = mysql_fetch_array($runselectqry_hospitals))
{
?>
<option value="<?php echo $gethospitals['id']?>"><?php echo $gethospitals['name']; ?></option>
<?php 
$i++;
}
?> -->
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="financial year" readonly >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="inst" required class="form-control col-md-8" value="installmentg" readonly >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Payment Amount <span class="required">*</span> </label>
<!-- <?php echo $net_balance;?> -->
<input type="number" name="amount_allocated" min="1" max="" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>

<!-- <div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>

<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks">
</textarea>

</div> -->

<div class="row form-group">
  <div class="col-md-3"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit" class="col-md-4">
<div class="col-md-1"></div>
<button class="btn btn-primary col-md-1" type="reset">Reset</button>
<div class="col-md-4"></div>
<button class="btn btn-primary col-md-1" type="button" data-dismiss="modal">Cancel</button>

</div>

</form>
</div>
</div>
</div>
</div>

<!-- Special Health fund form -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="special_health">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
  <h4 class="modal-title" id="myModalLabel">Allocate Special Health Fund to Hospital (Provincial Level)</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="manage_pzf_payment.php" method="post" data-parsley-validate class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget For Special Health <span class="required">*</span>
</label>
<!-- <?php echo $sf_balance_nf;?> -->
<input type="number" name="special_fund" id="special_fund" value="798980" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Select Hospital<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="hospital" name="hospital"  onChange='toggleShared();'>
<option value="">---Select One----</option>
<!-- <?php
$i = 1;
$select_hospitals = "SELECT * FROM hospital_users order by name ASC";
$runselectqry_hospitals = mysql_query($select_hospitals);
while ($gethospitals = mysql_fetch_array($runselectqry_hospitals))
{
?>
<option value="<?php echo $gethospitals['id']?>"><?php echo $gethospitals['name']; ?></option>
<?php 
$i++;
}
?> -->
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="p_name">Patient's Name <span class="required">*</span> </label>
<input type="text" id="pt_name" name="pt_name" required class="form-control col-md-8" value="" placeholder="Patient's Name">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="p_cnic">Patient's CNIC/Form-B <span class="required">*</span> </label>
<input type="text" id="pt_cnic" name="pt_cnic" required class="form-control col-md-8" data-inputmask="'mask' : '99999-9999999-9'" data-mask value="" placeholder="Patient's CNIC/Form-B">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="disease">Disease <span class="required">*</span> </label>
<input type="text" id="disease" name="disease" required class="form-control col-md-8" value="" placeholder="Disease">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="financial year" disabled="disabled" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="inst" required class="form-control col-md-8" value="installmentg" disabled="disabled" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Payment Amount <span class="required">*</span> </label>
<!-- <?php echo $net_balance;?> -->
<input type="number" name="amount_allocated" min="1" max="" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>

<!-- <div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>

<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks">
</textarea>

</div> -->

<div class="row form-group">
  <div class="col-md-3"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit" class="col-md-4">
<div class="col-md-1"></div>
<button class="btn btn-primary col-md-1" type="reset">Reset</button>
<div class="col-md-4"></div>
<button class="btn btn-primary col-md-1" type="button" data-dismiss="modal">Cancel</button>

</div>

</form>
</div>
</div>
</div>
</div>


<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content text_align">
                <span class="info-box-number">Regular Fund</span>
                <span class="info-box-number" style="color: blue;">
                  2,246,549,399.00 <br>
                </span>
                <small class="info-box-number">100%</small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content text_align">
                <span class="info-box-number">Fund Disbursement</span>
                <span class="info-box-number" style="color: green;"> 
                1,250,000,00.0
                 </span>
                 <span class="info-box-number" style="color: red;">Balance=1,250,0000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content text_align">
                <span class="info-box-number">Special Fund</span>
                <span class="info-box-number" style="color: blue;">
                  2,246,549,399.00 <br>
                </span>
                <small class="info-box-number">100%</small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content text_align">
                <span class="info-box-number">Fund Disbursement</span>
                <span class="info-box-number" style="color: green;"> 
                1,250,000,00.0
                 </span>
                 <span class="info-box-number" style="color: red;">Balance=1,250,0000</span>
              </div>
            </div>
          </div>
          <!-- /.col -->
       <!--  <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content text_align">
                <span class="info-box-text" >PZA Balance</span>
                <span class="info-box-number">
                  0.00
                  0
                  <small>%</small>
                </span>
              </div>
            </div>
          </div> -->

        </div>


<!-- Nave bar row -->
     
<div class="row mb-2">
<div class="col-md-4 col-sm-4">
<h3 class="text-dark">Hospital Fund Allocation</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#regular_fund"><i class="fa fa-plus"></i>Regular Hospital Fund (Provincial Level)</button>
</div>

<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#special_health"><i class="fa fa-plus"></i>Special Health Fund (Provincial Level)</button>
</div>



</div>



<!-- Main Form -->
<div class="row">
  

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Allocation of Regular Health Fund (Provincial Level) </h3> <small>For Current Financial Year <strong>2015-16</strong> & installemnt:<strong> 01</strong></small>
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Hospital Name</th>
<th>F/Year</th>
<th>Inst</th>
<th>Allocated/Fund</th>
<th>Disbursement</th>
<th>Balance</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Interne</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
<td>Trident</td>
<td>Interne</td>
<td>Win 95+</td>
<td>Edit</td>
</tbody>
<!-- update_pzf_fund.php?pid=<?php echo $getdata['id'];?> -->

    <!-- <?php
$i = 1;
$selectqry = "SELECT * FROM hospital_payment WHERE  financial_Year = '".$year."' AND installment = '".$inst."' order by id ASC";
$runselectqry = mysql_query($selectqry);
while($getdata = mysql_fetch_array($runselectqry))
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php 
$hospital_id =  $getdata['hospital_id'];
$select_hostpitals_qry = "SELECT * FROM hospital_users WHERE id = '".$hospital_id."'";
$run_hostpical_qry = mysql_query($select_hostpitals_qry);
$fetch_hostpital_qry = mysql_fetch_array($run_hostpical_qry);
echo $hospt_name =  $fetch_hostpital_qry['name'];
?>
</td>

<td><?php echo $getdata['financial_year'];?></td>
<td><?php echo $getdata['installment'];?></td>
<td><?php echo number_format($getdata['payment_amount'],2);?></td>
<td>
<?php 
// Regular Fund disbusrement hospital wise

$selecthospital_dis = "SELECT SUM(total_expense) as hosp_dis FROM pt_expense WHERE hospital_id = '".$hospital_id."' AND installment = '".$inst."' AND financial_year = '".$year."' ";
$run_select_hosp_dis = mysql_query($selecthospital_dis);
$fetch_hosp_dis = mysql_fetch_array($run_select_hosp_dis);
$total_reg_hosp_dis = $fetch_hosp_dis['hosp_dis'];
$total_reg_hosp_dis_nf = number_format($total_reg_hosp_dis,2);
echo $total_reg_hosp_dis_nf;
?>
</td>
<td>
<?php 
$net_hosp_balannce =$getdata['payment_amount'] - $total_reg_hosp_dis;
echo number_format($net_hosp_balannce,2);
?></td>
<td><?php echo date("F j, Y",strtotime($getdata['add_date']));?></td>
<td>Edit</td>
</tr>

<?php
$i++;
}
?> 
-->
                             
<!--  <tfoot>
<tr>
<th>1</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
</tr>
</tfoot> -->
</table>
</div>
<!-- /.card-body -->
</div>

</div>



  <!--Special health Fund Allocation  -->

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Allocation of Special Health Fund (Provincial Level) </h3> <small>For Current Financial Year <strong>2015-16</strong> & installemnt:<strong> 01</strong></small>
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Hospital Name</th>
<th>PatientName</th>
<th>CNIC#</th>
<th>Disease</th>
<th>Allocated/Fund</th>
<th>Disbursement</th>
<th>Balance</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Interne</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
<td>Trident</td>
<td>Interne</td>
<td>Win 95+</td>
<td>kljlj</td>
</tbody>
<!-- update_pzf_fund.php?pid=<?php echo $getdata['id'];?> -->

    <!-- 
<?php
$i = 1;
$selectqry = "SELECT * FROM special_health_fund WHERE  financial_Year = '".$year."' AND installment = '".$inst."' order by id DESC";
$runselectqry = mysql_query($selectqry);
while($getdata = mysql_fetch_array($runselectqry))
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php 
$hospital_id =  $getdata['hospital_id'];
$select_hostpitals_qry = "SELECT * FROM hospital_users WHERE id = '".$hospital_id."'";
$run_hostpical_qry = mysql_query($select_hostpitals_qry);
$fetch_hostpital_qry = mysql_fetch_array($run_hostpical_qry);
echo $hospt_name =  $fetch_hostpital_qry['name'];
?>
</td>

<td><?php echo $getdata['p_name'];?></td>
<td><?php echo $getdata['pt_cnic'];?></td>
<td><?php echo $getdata['disease'];?></td>
<td><?php echo number_format($getdata['amount'],2);?></td>
<td>
<?php 
$selecthospital_dis_sf = "SELECT SUM(total_expense) as hosp_dis_sf FROM sf_pt_expense WHERE hospital_id = '".$hospital_id."' AND installment = '".$inst."' AND financial_year = '".$year."' ";
$run_select_hosp_dis_sf = mysql_query($selecthospital_dis_sf);
$fetch_hosp_dis_sf = mysql_fetch_array($run_select_hosp_dis_sf);
$total_hosp_dis_sf = $fetch_hosp_dis_sf['hosp_dis_sf'];
$total_hosp_dis_nf_sf = number_format($total_hosp_dis_sf,2);
echo $total_hosp_dis_nf_sf;
?>
</td>
<td>
<?php 
$net_sf =$getdata['amount'] -$total_hosp_dis_sf; 
echo number_format($net_sf,2);
?>
</td>
<td><?php echo date("F j, Y",strtotime($getdata['get_date']));?></td>

</tr>

<?php
$i++;
}
?> 
-->
                             
<!--  <tfoot>
<tr>
<th>1</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
</tr>
</tfoot> -->
</table>
</div>
<!-- /.card-body -->
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
</body>
</html>
