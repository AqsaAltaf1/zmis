<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> <?php $this->load->view('district/include/title');?></title>

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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h3 class="m-0 text-dark">Human Resource report of District <strong><?php echo $district_name; ?></strong> </h3>
          </div><!-- /.col -->
          <div class="col-sm-4 div_align">
            <!-- <?php echo $year;?> and <?php echo $inst;?>  -->

            
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
         <div class="clearfix hidden-md-up"></div>

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
          
          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Deputy Admin (B-18)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
             
            </div>
           
          </div> -->
         
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Senior DZOs (B-18)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
               <span class="info-box-number">Section Officer(B-17)</span>
                <span class="info-box-number">
                 <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
            </div>
          </div>
          <!-- fix for small devices only -->
          <!-- <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
               <span class="info-box-number">Asstnt Admin(B-17)</span>
                <span class="info-box-number">
                 <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
            </div>
          </div>
         

             <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">DZOs(B-17)</span>
                <span class="info-box-number">
                 <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
            </div>
          </div>

             <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Computer Prg(B-17)</span>
                <span class="info-box-number">
                 <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
            </div>
          </div>

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Suprentendent(B-17)</span>
                <span class="info-box-number">
                 <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
            </div>
          </div> -->

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Assistant (B-16)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
            </div>
          </div>

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Computer Opt(B-16)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Senior Clerk (B-14)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Stano Grapher (B-14)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Junior Clerk (B-11)</span>
                <span class="info-box-number">
                 <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Driver (B-07)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Naib Qasid (B-03)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Sweeper (B-03)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Total Posts: 40</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Filled: 99</h7> <br>
                  <h7 style="color: red; font-size: 15px;">Vacant: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        

        </div>


<!-- Nave bar row -->
     
<div class="row mb-2"></div>



<!-- Main Form -->
<div class="row">
	
	
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
  
<?php $this->load->view('district/include/footer');?>
 
 
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
