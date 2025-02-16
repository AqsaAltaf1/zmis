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
          <div class="col-sm-10">
            <h1 class="m-0 text-dark">PZA Fund Allocation Reports & Analysis Dashboard</h1> 
          </div><!-- /.col -->
          <div class="col-sm-2">
            <h6>F/Y: <strong>2019-20</strong> & Inst: <strong>1</strong></h6>
           <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i>Fund Deposit To PZF</button>  -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

<style>
.text_align{
text-align: right;
}
</style>

        

<div class="row">
          <div class="col-md-4">
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total PZF Fund</span>
                <span class="info-box-number">5,200</span>
              </div>  
            </div>
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total PZA Fund</span>
                <span class="info-box-number">92,050</span>
              </div>
            </div>
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total District Allocation</span>
                <span class="info-box-number">114,381</span>
              </div>
            </div>
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Hospital Allocation</span>
                <span class="info-box-number">163,921</span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">PZA Allocation</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">District/Hospital Allocation</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Disbursement</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Disbursement</span>
                <span class="info-box-number">163,921</span>
              </div>
            </div>
          </div> 

          <div class="col-md-4 col-sm-">
            
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">PZF Balance</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">PZA Balance</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Balance</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Balance</span>
                <span class="info-box-number">163,921</span>
              </div>
            </div>
          

          </div>
          <!-- /.col -->
</div>

<h3>Head Wise Zakat fund disbursement(Provincial Level) report during  Year:_____</h3>
<!-- Info Boxes -->
<div class="row">

           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Guzara Allowance</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% of zakat fund
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-primary">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Marriage Assistance</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of zakat fund
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">District Health Care</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">

                  30% of zakat fund
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
         <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Deeni Madaris</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of zakat fund
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Educational Stipend(A)</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of zakat fund
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-primary">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Educational Stipend(P)</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of zakat fund
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Health Care (Provin)</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of zakat fund
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
         <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Any Other</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of zakat fund
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <h3>Category Wise Zakat fund disbursement(Provincial Level) report during  Year:_____</h3>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Widows</span>
                <span class="info-box-number">3809</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of total Mustahiqeen
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Orphans</span>
                <span class="info-box-number">3809</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of total Mustahiqeen
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-primary">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Poors</span>
                <span class="info-box-number">3809</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of total Mustahiqeen
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Disables</span>
                <span class="info-box-number">3809</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30% of total Mustahiqeen
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
        
        
</div>





        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Annual Un-Spent Balance Report with respect to Account Head</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Total Un-Spent Balance during F/Y 2015-16: 8908090</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Head Wise Un-Spent Balance</strong>
                    </p>

                    <div class="progress-group">
                      Guzara Allowance
                      <span class="float-right"><b>160</b>/60%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 60%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Merriage Assistance
                      <span class="float-right"><b>310</b>/20%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 20%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Health Care</span>
                      <span class="float-right"><b>480</b>/30%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 30%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Deeni Madaris
                      <span class="float-right"><b>250</b>/40%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 40%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Educational Stipend (A&P)
                      <span class="float-right"><b>250</b>/40%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width: 40%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Administrative Expenditure
                      <span class="float-right"><b>250</b>/25%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 25%"></div>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-primary"><i class="fas fa-caret-up"></i> 100%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL FUND ALLOCATION</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-left"></i> 70%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL DISBURSEMENT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-up"></i> 30%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL UN-SPENT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">TOTAL HOSPITAL UN_SPENT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

<div class="col-md-12 col-sm-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Browser Usage</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="far fa-circle text-danger"></i> Chrome</li>
                      <li><i class="far fa-circle text-success"></i> IE</li>
                      <li><i class="far fa-circle text-warning"></i> FireFox</li>
                      <li><i class="far fa-circle text-info"></i> Safari</li>
                      <li><i class="far fa-circle text-primary"></i> Opera</li>
                      <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-white p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      United States of America
                      <span class="float-right text-danger">
                        <i class="fas fa-arrow-down text-sm"></i>
                        12%</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      India
                      <span class="float-right text-success">
                        <i class="fas fa-arrow-up text-sm"></i> 4%
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      China
                      <span class="float-right text-warning">
                        <i class="fas fa-arrow-left text-sm"></i> 0%
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.footer -->
            </div>
</div>
        <!-- /.row -->

        <!-- Main row -->
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
