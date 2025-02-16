<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> ZAKAT BENEFICIARY SEARCH RESULT </title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url(); ?>assets/landing/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="<?php echo base_url(); ?>assets/landing/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/landing/css/searchMustahiq.css" rel="stylesheet">



</head>


<body id="page-top">

  <header class="masthead text-center text-white d-flex">
    <div class="container">
      <br>
      <table width="100%">
        <tr align="center">
          <td width="22%"><img src="<?php echo base_url(); ?>/assets/images/logo.png" style="width:80px"></td>
          <td width="56%">
            <h3 style="color:black;text-shadow:2px 2px #fff;"> <strong>Zakat & Ushr, Social Welfare Department
                Khyber Pakhtunkhwa</strong>
            </h3>
          </td>
          <td width="22%" style="color:black; font-weight:bold;">Dated : <?php echo date("d-m-Y"); ?>
            <a href="<?php echo base_url(); ?>ZakatMustahiqSearch"> <button type="submit" class="btn btn-primary btn-lg">Back To Search Page</button> </a>
          </td>
        </tr>

      </table>


      <div class="row">
        <div class="brochure-box-title col-md-12" style=" margin-top:5px;">
          <p style="; font-size:25px; color:black; ">
            <?php
            echo $resultmsg;
            ?>
          </p>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-6 ">
          <?php
          if ($flag == 1) {
          ?>
            <table class="table table-bordered table-striped center" id="tbl_exporttable_to_xls" style="background-color:#28691C;">
              <thead>
                <tr>
                  <th colspan="2">Mustahiq Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Name</td>
                  <td><?php echo $mustahiq_name; ?></td>
                </tr>
                <tr>
                  <td>F/Name</td>
                  <td><?php echo $father_name; ?></td>
                </tr>
                <tr>
                  <td>CNIC</td>
                  <td><?php echo $mustahiq_cnic; ?></td>
                </tr>
                <tr>
                  <td>District</td>
                  <td><?php echo $District_Name; ?></td>
                </tr>
                <tr>
                  <td>Assistance Taken From</td>
                  <td><?php echo $MustahiqType; ?></td>
                </tr>
                <tr>
                  <td>Category</td>
                  <td><?php echo $category; ?></td>
                </tr>
                <tr>
                  <td>Registration Year</td>
                  <td><?php echo $year; ?></td>
                </tr>
                <tr>
                  <td>Payment Year</td>
                  <td><?php echo $payment_year; ?></td>
                </tr>
                <tr>
                  <td>Payment Status</td>
                  <td><?php if ($payment_status == 1) {
                        echo "Payment Received";
                      } else {
                        echo "Payment Not received";
                      }; ?></td>
                </tr>
                <tr>
                  <td>Audit Remarks</td>
                  <td><?php echo $Remarks; ?></td>
                </tr>
                <tr>
                  <td>Audit Observation</td>
                  <td><?php echo $rejectionReason; ?></td>
                </tr>

              </tbody>

            </table>
          <?php
          }
          ?>
        </div>
      </div>

  </header>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/landing/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url(); ?>assets/landing/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/landing/vendor/scrollreveal/scrollreveal.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/landing/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url(); ?>assets/landing/js/creative.min.js"></script>

</body>

</html>