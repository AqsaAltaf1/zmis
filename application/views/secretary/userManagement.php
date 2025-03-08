<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title><?php $this->load->view('pza/include/title');?></title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<style>
  .text_align {
    text-align: right;
  }
  .div_align {
    align-items: right;
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

<?php $this->load->view('secretary/include/nav_1');?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <?php $this->load->view('secretary/include/profile_manue');?>
  <div class="sidebar">
    <?php $this->load->view('secretary/include/sidebar_sec');?>
  </div>
</aside>
<?php
$query = $this->db->query("SELECT SUM(population) AS total_population FROM district_users");
$total_population = ($query->num_rows() > 0) ? $query->row()->total_population : 0;
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<?php 
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');

$this->session->unset_userdata('error');
$this->session->unset_userdata('success');
?>

<?php if ($success): ?>
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $success; ?>
  </div>
<?php endif; ?>

<?php if ($error): ?>
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> <?php echo $error; ?>
  </div>
<?php endif; ?>





<div class="row mb-2">
<div class="col-sm-10">
<h3 class="m-0 text-dark"> ZMIS, Hospital, Guzara Allowance App and Audit User Management</h3>
</div><!-- /.col -->

<div class="col-sm-2 div_align">
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
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-desktop"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total ZMIS Users</span>
<span class="info-box-number text_align">
<?php echo "32";?> <br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col --><i class="fa-solid fa-computer"></i>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-hospital"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total Hospitals Users</span>
<span class="info-box-number text_align"> 
<?php echo "26";?> <br>
</span>
<small class="info-box-number"></small>
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
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-hands-helping"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total Guzara Allowance APP User</span>
<span class="info-box-number text_align">
<?php echo "421";?><br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-dungeon"></i></span>

<div class="info-box-content">
<span class="info-box-number" >Total Audit Users</span>
<span class="info-box-number text_align">
<?php echo "32";?><br>
</span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

</div>

<!-- Main Body -->
<div class="row">
<div class="col-md-1"></div>
<div class="col-lg-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="addNewDistrictTab" data-toggle="pill" href="#addNewDistrict" role="tab" aria-controls="addNewDistrict" aria-selected="true">Add New District</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="allDistrictTab" data-toggle="pill" href="#allDistrict" role="tab" aria-controls="allDistrict" aria-selected="false">All District</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="addDistrictStaffTab" data-toggle="pill" href="#addDistrictStaff" role="tab" aria-controls="addDistrictStaff" aria-selected="false">Add District Staff</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="allDistrictStaffTab" data-toggle="pill" href="#allDistrictStaff" role="tab" aria-controls="allDistrictStaff" aria-selected="false">All District Staff</a>
      </li>
    </ul>

  </div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade" id="addDistrict" role="tabpanel" aria-labelledby="districtTab">
<div class="row">
<div class="col-12">

<div class="card">
<div class="card-header">
</div>

<!-- /.card-body -->
</div>
<!-- /.col -->
</div>


</div> 
</div>





  <div class="tab-pane fade  show active" id="addNewDistrict" role="tabpanel" aria-labelledby="addNewDistrictTab">
    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url('DistrictUsers/store'); ?>" enctype="multipart/form-data" novalidate>      
      <h3>Add New District</h3><br>
      <p align="center" id="districtStatus"></p>
      <input type="hidden" id="total_population" name="total_population" value="">
      <input type="hidden" id="population_percentage" name="population_percentage" value="">

      <div class="row item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district_name">District Name <span class="required">*</span></label>
        <input type="text" id="district_name" name="district_name" required placeholder="Enter District Name" class="form-control col-md-6 col-sm-6 col-xs-12" required>
      </div>

      <div class="row item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="population">Population <span class="required">*</span></label>
        <input type="number" id="population" name="population" required placeholder="Enter Population" class="form-control col-md-6 col-sm-6 col-xs-12" required>
      </div>

      <div class="row item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NOB">Number of Beneficiaries (NOB) <span class="required">*</span></label>
        <input type="number" id="NOB" name="NOB" required placeholder="Enter Number of Beneficiaries" class="form-control col-md-6 col-sm-6 col-xs-12" required>
      </div>

      <div class="row item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_of_lzc">Number of LZC <span class="required">*</span></label>
        <input type="number" id="number_of_lzc" name="number_of_lzc" required placeholder="Enter Number of LZC" class="form-control col-md-6 col-sm-6 col-xs-12" required>
      </div>

      <div class="row item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span></label>
        <input type="text" id="username" name="username" required placeholder="Enter Username" class="form-control col-md-6 col-sm-6 col-xs-12" required>
      </div>

      <div class="row item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span></label>
        <input type="password" id="password" name="password" required placeholder="Enter Password" class="form-control col-md-6 col-sm-6 col-xs-12" required>
      </div>

      <div class="row item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span></label>
        <select class="form-control col-md-6 col-sm-6 col-xs-12" id="status" name="status" required>
          <option value="1">Active</option>
          <option value="0">Inactive</option>
        </select>
      </div>

      <input type="hidden" name="role" value="district">

      <div class="ln_solid"></div>
      <div class="row form-group">
        <div class="col-md-12 col-md-offset-3">
          <input type="submit" name="submitbtn" class="btn btn-success">
          <button type="reset" class="btn btn-primary float-right">Reset</button>
        </div>
      </div>
    </form>
  </div>

  <?php
  // Load database
  $this->load->database();

  // Fetch all district users
  $this->db->select("*");
  $districtUsers = $this->db->get('district_users')->result();
  ?>

  <div class="tab-pane fade" id="allDistrict" role="tabpanel" aria-labelledby="allDistrictTab">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>All Districts</h4>
          </div>

          <div class="card-body">
            <table id="all_district" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>District Name</th>
                  <th>Population</th>
                  <th>NOB</th>
                  <th>Number of LZC</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter = 1; foreach ($districtUsers as $district): ?>
                <tr>
                  <td><?= $counter++; ?></td>
                  <td><?= $district->district_name; ?></td>
                  <td><?= $district->population; ?></td>
                  <td><?= $district->NOB; ?></td>
                  <td><?= $district->number_of_lzc; ?></td>
                  <td><?= ($district->status == 1) ? 'Active' : 'Inactive'; ?></td>
                  <td>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editdistrictModal<?= $district->id; ?>">
                      <i class="fa fa-edit"></i>
                    </button>
                  </td>
                </tr>

                <!-- District Edit Modal -->
                <div class="modal fade" id="editdistrictModal<?= $district->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update District Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('DistrictUsers/update'); ?>" method="post">
                          <input type="hidden" name="district_id" value="<?= $district->id; ?>">

                          <div class="row form-group">
                            <label class="control-label col-md-3">District Name<span class="required">*</span></label>
                            <input type="text" class="form-control col-md-8" name="district_name" value="<?= $district->district_name; ?>" required>
                          </div>

                          <div class="row form-group">
                            <label class="control-label col-md-3">Population<span class="required">*</span></label>
                            <input type="number" class="form-control col-md-8 population-input" name="population" value="<?= $district->population; ?>" required>
                          </div>

                          <div class="row form-group">
                            <label class="control-label col-md-3">NOB<span class="required">*</span></label>
                            <input type="number" class="form-control col-md-8" name="NOB" value="<?= $district->NOB; ?>" required>
                          </div>

                          <div class="row form-group">
                            <label class="control-label col-md-3">Number of LZC<span class="required">*</span></label>
                            <input type="number" class="form-control col-md-8" name="number_of_lzc" value="<?= $district->number_of_lzc; ?>" required>
                          </div>

                          <div class="row form-group">
                            <label class="control-label col-md-3">Status<span class="required">*</span></label>
                            <select name="status" class="form-control col-md-8">
                              <option value="1" <?= ($district->status == 1) ? 'selected' : ''; ?>>Active</option>
                              <option value="0" <?= ($district->status == 0) ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                          </div>

                          <div class="row form-group">
                            <div class="col-md-3"></div>
                            <input type="submit" class="btn btn-success" name="submitbtn" value="Submit">
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Modal -->

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="addDistrictStaff" role="tabpanel" aria-labelledby="addDistrictStaffTab">
    <form action="<?= base_url('DistrictStaff/store'); ?>" method="post">
      <h3>Add District Staff</h3><br>

      <div class="row form-group">
        <label class="control-label col-md-3">Username<span class="required">*</span></label>
        <input type="text" class="form-control col-md-8" name="username" required>
      </div>

      <div class="row form-group">
        <label class="control-label col-md-3">Password<span class="required">*</span></label>
        <input type="password" class="form-control col-md-8" name="password" required>
      </div>

      <div class="row form-group">
        <label class="control-label col-md-3">User Type<span class="required">*</span></label>
        <select name="user_type" class="form-control col-md-8">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div class="row form-group">
        <label class="control-label col-md-3">District<span class="required">*</span></label>
        <select name="district_id" class="form-control col-md-8">
          <option value="">Select District</option>
          <?php
            $this->db->select("id, district_name");
            $districts = $this->db->get('district_users')->result();
            foreach ($districts as $district):
          ?>
          <option value="<?= $district->id; ?>"><?= $district->district_name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="row form-group">
        <label class="control-label col-md-3">Phone Number<span class="required">*</span></label>
        <input type="text" class="form-control col-md-8" name="phone_number" required>
      </div>

      <div class="row form-group">
        <div class="col-md-3"></div>
        <input type="submit" class="btn btn-success" name="submitbtn" value="Submit">
      </div>
    </form>

  </div>

  <!-- All District Staff Tab -->
  <div class="tab-pane fade" id="allDistrictStaff" role="tabpanel" aria-labelledby="allDistrictStaffTab">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>All District Staff</h4>
          </div>
          <div class="card-body">
            <table id="all_district_staff" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>User Type</th>
                  <th>District</th>
                  <th>Phone</th>
                  <th>Created At</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $this->db->select("ds.*, du.district_name");
                  $this->db->from("district_staff ds");
                  $this->db->join("district_users du", "ds.district_id = du.id", "left");
                  $districtStaff = $this->db->get()->result();
                  $counter = 1; 
                  foreach ($districtStaff as $staff): 
                ?>
                <tr>
                  <td><?= $counter++; ?></td>
                  <td><?= $staff->username; ?></td>
                  <td><?= ucfirst($staff->user_type); ?></td>
                  <td><?= $staff->district_name; ?></td>
                  <td><?= $staff->phone_number; ?></td>
                  <td><?= date("d-m-Y H:i", strtotime($staff->created_at)); ?></td>
                  <td>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editDistrictStaffModal<?= $staff->id; ?>">
                      <i class="fa fa-edit"></i>
                    </button>
                  </td>
                  <!-- District Staff Edit Modal -->
                  <div class="modal fade" id="editDistrictStaffModal<?= $staff->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Update District Staff Information</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        
                          <!-- Success and Error Messages -->
                          <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                          <?php endif; ?>

                          <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                          <?php endif; ?>

                          <form action="<?= base_url('DistrictStaff/update'); ?>" method="post">
                            <input type="hidden" name="staff_id" value="<?= $staff->id; ?>">

                            <div class="row form-group">
                              <label class="control-label col-md-3">Username<span class="required">*</span></label>
                              <input type="text" class="form-control col-md-8" name="username" value="<?= $staff->username; ?>" required>
                            </div>

                            <div class="row form-group">
                              <label class="control-label col-md-3">Phone Number<span class="required">*</span></label>
                              <input type="text" class="form-control col-md-8" name="phone_number" value="<?= $staff->phone_number; ?>" required>
                            </div>

                            <div class="row form-group">
                              <label class="control-label col-md-3">User Type<span class="required">*</span></label>
                              <select name="user_type" class="form-control col-md-8">
                                <option value="admin" <?= ($staff->user_type == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="user" <?= ($staff->user_type == 'user') ? 'selected' : ''; ?>>User</option>
                              </select>
                            </div>

                            <div class="row form-group">
                              <label class="control-label col-md-3">District<span class="required">*</span></label>
                              <select name="district_id" class="form-control col-md-8">
                                <?php foreach ($districts as $district): ?>
                                  <option value="<?= $district->id; ?>" <?= ($staff->district_id == $district->id) ? 'selected' : ''; ?>>
                                    <?= $district->district_name; ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            </div>

                            <div class="row form-group">
                              <div class="col-md-3"></div>
                              <input type="submit" class="btn btn-success" name="submitbtn" value="Update">
                            </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
<!-- End of Edit District Staff Modal -->

                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>



    
<!-- Edit Modal -->
<!-- Edit Modal -->





</div>
</div>
<!-- /.card body End -->
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
  $(document).ready(function () {
    $("#all_district").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true
    });
  });
</script>
</body>
</html>
