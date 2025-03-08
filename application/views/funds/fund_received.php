
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

<!-- Main Content -->
<div class="content-wrapper p-3">
  <div class="container-fluid">
      <!-- Button Positioned on Right -->
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#fundModal">
        <i class="fas fa-plus"></i> Add Fund
      </button>
    </div>

    <div class="modal fade" id="fundModal" tabindex="-1" role="dialog" aria-labelledby="fundModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="fundModalLabel">Add received fund details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('funds/store') ?>" method="post">
          <div class="modal-body">
          
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="payment_received">Payment received</label>
                <input type="text" class="form-control" name="payment_received" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="total_expenditure">Total Expenditure</label>
                <input type="text" class="form-control" name="total_expenditure" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="check_no">Check No</label>
                <input type="text" class="form-control" name="check_no" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="check_date">Check Date</label>
                <input type="date" class="form-control" name="check_date" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="financial_year">Financial Year</label>
                <select class="form-control" name="financial_year" required>
                  <option value="">-- Select Financial Year --</option>
                  <?php
                  $currentYear = date('Y');
                  for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
                      $nextYear = $i + 1;
                      echo "<option value='{$i}-{$nextYear}'>{$i}-{$nextYear}</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label for="payment_rec_from">Payment received From</label>
                <input type="text" class="form-control" name="payment_rec_from" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="account_head">Account Head</label>
                <input type="text" class="form-control" name="account_head" required>
              </div>
              <div class="col-md-12 form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" name="remarks"></textarea>
              </div>
              <div class="col-md-6 form-group">
                <label for="received_date">received Date</label>
                <input type="date" class="form-control" name="received_date" required>
              </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save Fund</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <h2 class="mb-4">Zakat Fund received List</h2>
  <table class="table table-bordered table-striped">
      <thead class="text-white" style="background-color: #28a745;">
          <tr>
              <th>ID</th>
              <th>Amount received</th>
              <th>Total Expenditure</th>
              <th>Cheque/Challan #</th>
              <th>Cheque/Challan Date</th>
              <th>Financial Year</th>
              <th>received From</th>
              <th>Account Head</th>
              <th>Remarks</th>
              <th>received Date</th>
          </tr>
      </thead>
      <tbody>
      <?php if (!empty($funds)) : ?>
          <?php foreach ($funds as $row) : ?>
                  <tr>
                      <td><?= $row['id']; ?></td>
                      <td><?= $row['payment_received']; ?></td>
                      <td><?= $row['total_expenditure']; ?></td>
                      <td><?= $row['check_no']; ?></td>
                      <td><?= $row['check_date']; ?></td>
                      <td><?= $row['financial_year']; ?></td>
                      <td><?= $row['payment_rec_from']; ?></td>
                      <td><?= $row['account_head']; ?></td>
                      <td><?= $row['remarks']; ?></td>
                      <td><?= $row['received_date']; ?></td>
                  </tr>
              <?php endforeach; ?>
          <?php else : ?>
              <tr><td colspan="9" class="text-center">No records found</td></tr>
          <?php endif; ?>
      </tbody>
  </table>
</div>

<!-- Footer -->
<?php $this->load->view('pza/include/footer');?>

</div> <!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

</body>
</html>