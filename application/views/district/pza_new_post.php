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
          <div class="col-sm-9">
            <h3 class="m-0 text-dark">Add New Posts</h3>
          </div><!-- /.col -->

          <div class="col-sm-3 div_align">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol> -->

           <!--  <button type="button" class="btn btn-primary div_align" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Fund Deposit To PZF</button> --> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>
              <div class="info-box-content text_align">
                <span class="info-box-number">Total Sanctions Posts</span>
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
                <span class="info-box-number">Total Filled Posts</span>
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
                <span class="info-box-number">Total Vacant Posts</span>
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
           <div class="col-12 col-md-10 col-sm-6">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Add New Post</a>
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
<form class="form-horizontal form-label-left" method="post" action="manage_institution_reg.php" enctype="multipart/form-data" novalidate>      
<h3>Add New Post To The Database</h3>
<br>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="post_name">Post Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<select class="form-control col-md-8" id="desig" name="desig">
<option value="">---Select One----</option>
<option value="Senior District Zakat Officer (B-18)" >Senior District Zakat Officer (B-18)</option>
<option value="District Zakat Officer (B-17)" >District Zakat Officer (B-17)</option>
<option value="Assistant (B-16)" >Assistant (B-16)</option>
<option value="Computer Operator (B-16)">Computer Operator (B-16)</option>
<option value="Senior Sclae Stano Grapher (B-16)">Senior Sclae Stano Grapher (B-16)</option>
<option value="Senior Clerk (B-14)">Senior Clerk (B-14</option>
<option value="junior Sclae Stano Grapher (B-14)">junior Sclae Stano Grapher (B-14)</option>
<option value="Junior Clerk (B-11)" >Junior Clerk (B-11)</option>
<option value="Driver (B-07)">Driver (B-07)</option>
<option value="Naib Qasid (B-03)">Naib Qasid (B-03)</option>
<option value="Sweeper (B-03)">Sweeper (B-03)</option>
</select>
</div>
</div>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="bps">BPS <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<select class="form-control col-md-8 col-sm-3 col-xs-12" name="bps" id="bps">
<option value="">---Select One---</option>
<option value="BPS-18">BPS-18</option>
<option value="BPS-17">BPS-17</option>
<option value="BPS-18">BPS-16</option>
<option value="BPS-17">BPS-14</option>
<option value="BPS-18">BPS-12</option>
<option value="BPS-17">BPS-11</option>
<option value="BPS-18">BPS-07</option>
<option value="BPS-17">BPS-03</option>
</select>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="post_status">Post Status <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<select class="form-control col-md-8 col-sm-3 col-xs-12" name="post_status" id="post_status">
<option value="">---Select One---</option>
<option value="Sechduled">Sechduled</option>
<option value="Non-Sechduled">Non-Sechduled</option>
</select>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Location of Post <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<select class="form-control col-md-8 col-sm-3 col-xs-12" name="post_location" id="post_location">
<option value="">---Select One---</option>
<option value="Head Quarter Level">Head Quarter Level</option>
<option value="District Level">District Level</option>
</select>
</div>
</div>

<div class=" row item form-group" hidden="true">
<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Select District</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<select class="form-control col-md-8 col-sm-3 col-xs-12" name="district_name" id="district_name">
<option value="">---Select One---</option>

</select>
</div>
</div>

<div class=" row item form-group">
<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Job Description</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<textarea class="form-control col-md-8 col-xs-12" cols="10" rows="5">
</textarea>
</div>
</div>

<div class="ln_solid"></div>
<div class=" row form-group">
<div class="col-md-12 col-md-offset-3">
<input type="submit" name="submitbtn" class="btn btn-success">
<button type="reset" class="btn btn-primary float right">Reset</button>
</div>
</div>
</form> 
</div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab"><!--     
<form class="form-horizontal form-label-left" method="post" action="manage_institution_reg.php" enctype="multipart/form-data" novalidate>      
<h3>Add New Hospital To The Database</h3>
<br>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hospital Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="hosp_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="hosp_name" placeholder="Please Enter Hospital Name" required="required" type="text">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Hospital User Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="hosp_username" type="text" name="hosp_username" placeholder="Please Enter the User Name for Login" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
</div>
</div>
<div class=" row item form-group">
<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="hosp_password" type="password" name="hosp_password" data-validate-length="6,8" class="form-control col-md-8 col-xs-12" required="required">
</div>
</div>

<div class=" row item form-group">
<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="hosp_password2" type="password" name="hosp_password2" data-validate-linked="password" class="form-control col-md-8 col-xs-12" required="required">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol">Role  <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="text" id="hosp_role" name="hosp_role" required="required" value="hospital" data-validate-length-range="8,20" class="form-control col-md-8 col-xs-12" readonly="">
</div>
</div>
<div class="ln_solid"></div>
<div class=" row form-group">
<div class="col-md-12 col-md-offset-3">
<input type="submit" name="submitbtn" class="btn btn-success">
<button type="reset" class="btn btn-primary float right">Reset</button>
</div>
</div>
</form> 
 --></div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab"><!-- 
                        
<form class="form-horizontal form-label-left" method="post" action="manage_institution_reg.php" enctype="multipart/form-data" novalidate>      
<h3>Add New Deeni Madrassa To The Database</h3>
<br>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Madrassa Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="mad_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="mad_name" placeholder="Please Enter Hospital Name" required="required" type="text">
</div>
</div>
<div class="ln_solid"></div>
<div class=" row form-group">
<div class="col-md-12 col-md-offset-3">
<input type="submit" name="submitbtn" class="btn btn-success">
<button type="reset" class="btn btn-primary float right">Reset</button>
</div>
</div>
</form> 
 --></div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab"><!-- 
                    
                        
<form class="form-horizontal form-label-left" method="post" action="manage_institution_reg.php" enctype="multipart/form-data" novalidate>      
<h3>Add New Foundation To The Database</h3>
<br>
<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_name">Foundation Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="found_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="found_name" placeholder="Please Enter Foundation Name" required="required" type="text">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Foundation User Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="found_username" type="text" name="found_username" placeholder="Please Enter the User Name for Login" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
</div>
</div>
<div class=" row item form-group">
<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="found_password" type="password" name="found_password" data-validate-length="6,8" class="form-control col-md-8 col-xs-12" required="required">
</div>
</div>

<div class=" row item form-group">
<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="found_password2" type="password" name="found_password2" data-validate-linked="password" class="form-control col-md-8 col-xs-12" required="required">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol">Role  <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input type="text" id="hosp_role" name="hosp_role" required="required" value="foundation" data-validate-length-range="8,20" class="form-control col-md-8 col-xs-12" readonly="">
</div>
</div>
<div class="ln_solid"></div>
<div class=" row form-group">
<div class="col-md-12 col-md-offset-3">
<input type="submit" name="submitbtn" class="btn btn-success">
<button type="reset" class="btn btn-primary float right">Reset</button>
</div>
</div>
</form> 
 --></div>
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

<?php $this->load->view('pza/include/footer');?>
 
 
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
