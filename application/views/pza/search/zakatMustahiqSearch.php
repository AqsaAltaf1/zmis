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

	<title> WELCOME TO ZAKAT BENEFICIARY SEARCH PORTAL </title>

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
			<div class="row">

				<div class="col-lg-12 mx-auto">
					<h1 class="text-uppercase">
						<br>
						<strong style="color:black;text-shadow:2px 2px #fff;">WELCOME TO ZAKAT MUSTAHIQ SEARCH PORTAL</strong>
					</h1>
					<hr>
					<?php
					$error = $this->session->flashdata('error');
					$success = $this->session->flashdata('success');
					if (isset($success)) {
					?>
						<div class="alert alert-success alert-dismissible" id="success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success . </strong> <?php echo $success; ?>
						</div>
					<?php
					} else if (isset($error)) {
					?>
						<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Error . </strong> <?php echo $error; ?>
						</div>
					<?php
					}
					?>
				</div>
                
				<div class="col-lg-12 mx-auto">

					

					<form action="<?php echo base_url(); ?>ZakatMustahiqSearch/MustahiqSearch" target="" method="POST">
						<div class="form-group col-lg-6 mx-auto">
							<input type="text" value="<?php if(!empty($mustahiqCnic))echo $mustahiqCnic;?>" class="form-control" id="cnic" placeholder="Please Enter CNIC Without Dashes" data-rule="minlen:13" data-msg="Please enter at least 13 chars of CNIC" name="mustahiqCnic" required>
						</div>
						<div class="col-lg-6 mx-auto">
							<button type="submit" class="btn btn-success btn-lg">Search Mustahiq</button>
						</div>
					</form>
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