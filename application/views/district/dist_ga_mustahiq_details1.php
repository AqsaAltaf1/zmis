<?php
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

$get_mustahiq_id = $this->uri->segment(3);

if(isset($get_mustahiq_id))
{
	$get_mustahiq_query = $this->db->select('*')->from('guzara_allowance_mustahiqeen')->where('id',$get_mustahiq_id)->where('district_id',$userid)->get();
	$getmustahiq_name = $get_mustahiq_query->row('mustahiq_name');
	
	$get_mustahiqid = $get_mustahiq_query->row('id');
	$get_mustahiq_details_qry = $this->db->select('*')->from('guzara_allowance_mustahiqeen_details')->where('user_id',$get_mustahiqid)->get();
	$district_name = $get_mustahiq_details_qry->row('disable_type');	
}




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
<div class="content-wrapper" style="min-height: 202px;">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h3 class="m-0 text-dark">Guzara Allowance Mustahiqeen Registration (LZ-19)</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> 

<a class="btn btn-sm btn-primary" style="color:#fff; float:right;" onclick="printDiv('printableArea')">Print Details</a>

</h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">

<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="lz_19" role="tabpanel" aria-labelledby="lz_19-tab">

<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<!-- For Card heading and placing line <div class="card-header"></div> -->
<!-- /.card-header -->
<div class="card-body">
<div class="row"></div>



<div id="printableArea">
<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_GA_mustahiq_reg/guzara_allowance_mustahiqeen/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">





<div class="row form-group">

<label class="col-md-2" style="color:#f00;" for="">Mustahiq Name <span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('mustahiq_name');?> </div>

<label class="col-md-2" style="color:#f00;" for="">Father Name<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('father_name');?> </div>

</div>

<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">CNIC/Form-B<span class="required">*</span>
</label>


<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('mustahiq_cnic');?> </div>


<label class="col-md-2" style="color:#f00;" for="">Contact #<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('contact_number');?> </div>


</div>






<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Gender<span class="required">*</span>
</label>
<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('gender');?> </div>

<label class="col-md-2" style="color:#f00;" for="">LZC Name<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12"> 
<?php 
$LZC_name = $get_mustahiq_query->row('LZC_name');
$get_lzcqery_name = $this->db->select('*')->from('lzc_list')->where('id',$LZC_name)->get();
echo $lzc_name = $get_lzcqery_name->row('lzc_name');
?> 
</div>

</div>

<div class="row form-group">
<label class="col-md-2" style="color:#f00;">Postal Address<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('postal_address');?> </div>

<label class="col-md-2" style="color:#f00;">Permanent Address<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('permanent_address');?> </div>

</div>

<div class="row form-group">
<label class="col-md-2" for="" style="color:#f00;">Date Of Birth<span class="required">*</span>
</label>
<div class="col-md-4 col-xs-12"> <?php echo date("d-m-Y",strtotime($get_mustahiq_query->row('dob')));?> </div>
<label class="col-md-2" for="" style="color:#f00;">Age<span class="required">*</span>
</label>
<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('age');?> </div>
</div>

<div class="row form-group">
<label class="col-md-2" for="" style="color:#f00;">Marital Status<span class="required">*</span>
</label>
<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('marital_status');?> </div>
<label class="col-md-2" style="color:#f00;" for="">Istehqaq No:<span class="required">*</span>
</label>
<div class="col-md-4 col-xs-12"> <?php echo $get_mustahiq_query->row('istehqaqnumber');?> </div>
</div>


<div class="row form-group">
<label class="col-md-2" for="">Category<span class="required">*</span></label>
<div class="col-md-10 col-xs-12"><?php echo $get_mustahiq_query->row('category');?></div>
</div>

<?php
if($get_mustahiq_query->row('category') == 'Disable')
{
?>
<div id="disable_status_div">
<div class="row form-group">
<label class="col-md-2" for="">If Disable then Type<span class="required">*</span>
</label>
<div class="col-md-10 col-xs-12"><?php echo $get_mustahiq_details_qry->row('disable_type');?></div>
</div>
</div>
<?php
}
?>



<div class="row form-group">
<label class="col-md-2" for="">Financial Assistance<span class="required">*</span></label>
<div class="col-md-10 col-xs-12"><?php echo $get_mustahiq_query->row('financial_assistance');?></div>
</div>

<?php
if($get_mustahiq_query->row('financial_assistance') == "Yes")
{
?>
<div id="financial_status_div">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then from<span class="required">*</span>
</label>
<div class="col-md-10 col-xs-12"><?php echo $get_mustahiq_details_qry->row('financial_assistance_type');?></div>
</div>
</div>
<?php
}
?>



<div class="row form-group">
<label class="col-md-2" for="">Gold Status<span class="required">*</span>
</label>
<div class="col-md-10 col-xs-12"><?php echo $get_mustahiq_query->row('gold_status');?></div>
</div>


<?php
if($get_mustahiq_query->row('gold_status') == "Yes")
{
?>
<div id="gold_status_div">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then<span class="required">*</span>
</label>
<div class="col-md-10 col-xs-12">
<?php 
$gold_status_value = $get_mustahiq_details_qry->row('gold_status_value');
if($gold_status_value == 3)
echo "1 Tola or Less";
if($gold_status_value == 2)
echo "2-3 Tolas";
if($gold_status_value == 1)
echo "4-5 Tolas";
if($gold_status_value == 0)
echo "6-7 Tolas";
?>

</div>
</div>
</div>
<?php
}
?>






<div class="row form-group">
<label class="col-md-2" for="">House Status<span class="required">*</span>
</label>
<div class="col-md-10 col-xs-12"><?php echo $get_mustahiq_query->row('house_status');?></div>
</div>

<?php
if($get_mustahiq_query->row('house_status') == "Yes")
{
?>
<div id="house_status_div">
<div class="row form-group">
<label class="col-md-2" for="">If Yes then type<span class="required">*</span>
</label>
<?php 
echo $house_status_type = $get_mustahiq_details_qry->row('house_status_type');
?>
</div>
</div>
<?php
}
?>




<?php
if($get_mustahiq_query->row('marital_status') == 'Married')
{
?>

<div id="marital_status_div">

<div class="row form-group">
<label class="col-md-2" for="">No of Dependences:<span class="required">*</span>
</label>


<?php echo $no_of_dependences = $get_mustahiq_query->row('no_of_dependences');?>


</div>



<div class="row form-group" id="financial_status">
<label class="col-md-2" for="">Son<span class="required">(Below 18)</span>
</label>

<div class="col-md-2 col-xs-12"><?php echo $get_mustahiq_details_qry->row('dependences_sons');?></div>

<label class="col-md-3" for="">Daughters<span class="required">(Un-married)</span>
</label>


<div class="col-md-2 col-xs-12">
<?php echo $dependences_daughters = $get_mustahiq_details_qry->row('dependences_daughters');?>

</div>


<label class="col-md-1" for="category">Others<span class="required">()</span>
</label>

<div class="col-md-2 col-xs-12">
<?php echo $get_mustahiq_details_qry->row('dependences_others');?>
</div>

</div>

</div>


<?php
}
?>






<div class="row form-group">
<label class="col-md-2" for="">Monthly Income Source:<span class="required">*</span>
</label>
<div class="col-md-10 col-xs-12">
<?php 
echo $monthly_income_source = $get_mustahiq_query->row('monthly_income_source');
?>
</div>
</div>

<?php
if($monthly_income_source == "Yes")
{
?>
<div id="monthly_income_source_div">
<div class="row form-group">
<label class="col-md-2" for="">Monthly Income:<span class="required">*</span></label>
<?php 
echo $monthly_income_value = $get_mustahiq_details_qry->row('monthly_income_value');
?>
</div>
</div>
<?php
}
?>


<div class="row form-group">
<label class="col-md-2" for="">Other Source of Income:<span class="required">*</span>
</label>
<div class="col-md-10 col-xs-12"><?php echo $get_mustahiq_query->row('other_source_of_income');?></div>
</div>

<?php
if($get_mustahiq_query->row('other_source_of_income') == "Agriculture")
{
?>
<div id="Other_source_income_marla">
<div class="row form-group">
<label class="col-md-2" for="">No of Marla<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12">
<?php echo $get_mustahiq_details_qry->row('other_source_income_value1');?>
</div>

<label class="col-md-2" for="">Monthly Income Rs.<span class="required">*</span></label>



<div class="col-md-4 col-xs-12">
<?php 
echo $other_source_income_value2 = $get_mustahiq_details_qry->row('other_source_income_value2');
?>
</div>

</div>
</div>
<?php
}
else if($get_mustahiq_query->row('other_source_of_income') == "Commercial")
{
?>
<div id="Other_source_income_shops">
<div class="row form-group">
<label class="col-md-2" for="">No of Shops<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12">
<?php echo $get_mustahiq_query->row('other_source_income_value1');?>
</div>

<label class="col-md-2" for="">Monthly Income Rs.<span class="required">*</span>
</label>


<div class="col-md-4 col-xs-12">
<?php 
$other_source_income_value2 = $get_mustahiq_details_qry->row('other_source_income_value2');
if($other_source_income_value2 == 1)
echo "5000 Or Less";
if($other_source_income_value2 == 0)
echo "6000 or above";
?>
</div>
</div>
</div>
<?php
}
?>


<div class="row form-group">
<label class="col-md-2" for="">Bank Account:<span class="required">*</span></label>

<div class="col-md-10 col-xs-12">
<?php echo $get_mustahiq_query->row('bankaccount_value');?>
</div>
</div>

<?php
if($get_mustahiq_query->row('bankaccount_value') == "Yes")
{
?>
<div id="bankaccount_div">
<div class="row form-group">
<label class="col-md-2" for="">Account Number<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12">
<?php echo $get_mustahiq_details_qry->row('bank_account_number');?>
</div>

<label class="col-md-2" for="">Account Balance .<span class="required">*</span>
</label>

<div class="col-md-4 col-xs-12">
<?php 
echo $bankaccount_value_marks = $get_mustahiq_details_qry->row('account_balance');
?>
</div>
</div>
</div>
<?php
}
?>






<div class="row form-group">
<label class="col-md-2" for="">Live Stock:<span class="required">*</span>
</label>
<div class="col-md-4 col-xs-12">
<?php echo $get_mustahiq_query->row('live_stock');?>
</div>
</div>

<?php
if($get_mustahiq_query->row('live_stock') == "Yes")
{
?>
<div id="live_stock_div">
<div class="row form-group">
<label class="col-md-2" for="">Select Type:<span class="required">*</span>
</label>

<div class="col-md-10 col-xs-12">
<?php 
echo $live_stock_type = $get_mustahiq_details_qry->row('live_stock_type');
?>

</div>

</div>
</div>
<?php
}
?>

<div class="row form-group">
<label class="col-md-2" for="">Mode of Transportation<span class="required">*</span></label>


<div class="col-md-10 col-xs-12">

<?php 
echo $mode_of_transportation = $get_mustahiq_query->row('mode_of_transportation');
?>
</div>

</div>



<div class="row form-group">
<label class="col-md-2" for="">Utilities Coverage<span class="required">*</span>
</label>

<div class="col-md-4">
<label for="">Electricity</label>

<br>

<?php 
$electricity_type = $get_mustahiq_query->row('electricity_type');
if($electricity_type == "Provided by Govt (WAPDA)")
{
echo "Provided by Govt (WAPDA)";
?>
<div id="pesodiv">
Monthly Average Bill : <?php echo $get_mustahiq_details_qry->row('pesco_bill');?>
</div>
<?php
}
else
{
echo $get_mustahiq_query->row('electricity_type');
}





?>






</div>

<div class="col-md-3">
<label for="">Fuel</label>
<br>

<?php 
echo $fuel_type = $get_mustahiq_query->row('fuel_type');
?>


</div>

<div class="col-md-3">
<label for="">Water</label>

<br>

<?php 
echo $water_type = $get_mustahiq_query->row('water_type');

?>



</div>




</div>




</form>
</div>

</div>
<!-- /.card-body -->
</div>
</div>
</div>



<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">    
<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pza_Institution_reg/manage_institution_reg_hospital/" enctype="multipart/form-data" novalidate>      
<h3>Add New LZCs To The Database</h3>
<br>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Select District <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">

<select class="form-control col-md-8" id="distt" name="district_idget">
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_districtslist))
{
foreach($get_all_districtslist as $getdistricts)
{
?>
<option value="<?php echo $getdistricts['id']?>"><?php echo $getdistricts['district_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Tehsil Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="tehsil_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="tehsil_name" placeholder="Please Enter Hospital Name" required type="text">
</div>
</div>

<div class=" row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">LZC Name <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="lzc_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="" name="lzc_name" placeholder="Please Enter Hospital Name" required type="text">
</div>
</div>
<div class="row item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">LZC Code <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-6 col-xs-12">
<input id="lzc_code" type="text" name="lzc_code" placeholder="Please Enter Address" data-validate-length-range="3,20" class="optional form-control col-md-8 col-xs-12">
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
<div class="tab-pane fade" id="lz_11" role="tabpanel" aria-labelledby="lz_11-tab">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Guzara Allowance LZ-11 Mustahiqeen List of District_____ during Year:___</h3>
<!-- Print list -->
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<div class="row"></div>
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Cell #</th>
<th>LZC</th>
<th>Category</th>
<th>A/C#</th>
<th>Score</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
</tbody>
</table>
</div>
<!-- /.card-body -->
</div>
</div>

<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab"></div>



</div>
</div>
<!-- /.card -->
</div>
</div>
</div>

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



<!-- For data tables -->
<script>

// ------------- Category -------------//

$('#category').on('change',function(){
if( $(this).val()==="Disable"){
$("#disable_status_div").slideDown()
}
else{
$("#disable_status_div").slideUp()
}
});


// ------------- Financial Assistance -------------//

$('#finan_assiatance').on('change',function(){
if( $(this).val()==="Yes"){
$("#financial_status_div").slideDown()
}
else{
$("#financial_status_div").slideUp()
}
});


// ------------- Gold Status -------------//

$('#gold_status').on('change',function(){
if( $(this).val()==="Yes"){
$("#gold_status_div").slideDown()
}
else{
$("#gold_status_div").slideUp()
}
});




// ------------- House Status -------------//

$('#house_status').on('change',function(){
if( $(this).val()==="Yes"){
$("#house_status_div").slideDown()
}
else{
$("#house_status_div").slideUp()
}
});

// ------------- Monthly Income Source -------------//

$('#monthly_income_source').on('change',function(){
if( $(this).val()==="Yes"){
$("#monthly_income_source_div").slideDown()
}
else{
$("#monthly_income_source_div").slideUp()
}
});


// ------------- Other Source of Income -------------//
$('#Other_source_income').on('change',function(){
if( $(this).val()==="Agriculture")
{
$("#Other_source_income_marla").slideDown();
$("#Other_source_income_shops").slideUp();
}
else if($(this).val()==="Commercial")
{
$("#Other_source_income_shops").slideDown();
$("#Other_source_income_marla").slideUp();
}
else if($(this).val()==="")
{
$("#Other_source_income_marla").slideUp();
$("#Other_source_income_shops").slideUp();	
}
});


// ------------- Live Stock -------------//

$('#live_stock').on('change',function(){
if( $(this).val()==="Yes"){
$("#live_stock_div").slideDown()
}
else{
$("#live_stock_div").slideUp()
}
});



// -------------  passport -------------//

$('#passport_number').on('change',function(){
if( $(this).val()==="Yes"){
$("#passport_div").slideDown()
}
else{
$("#passport_div").slideUp()
}
});



// -------------  bank account -------------//

$('#bankaccount_value').on('change',function(){
if( $(this).val()==="Yes"){
$("#bankaccount_div").slideDown()
}
else{
$("#bankaccount_div").slideUp()
}
});


// -------------  martial status -------------//

$('#marital_status').on('change',function(){
if( $(this).val()==="Married"){
$("#marital_status_div").slideDown()
}
else{
$("#marital_status_div").slideUp()
}
});




$('#marital_status').on('change',function(){
if( $(this).val()==="Married"){
$("#marital_status_div").slideDown()
}
else{
$("#marital_status_div").slideUp()
}
});


function doSomething(getvalue)
{
	if(getvalue == 1){
	$("#pesodiv").slideDown();
	}
	else{
	$("#pesodiv").slideUp();
	}

}

function findage(getvalue)
{
var birthDate = getvalue;
var d = new Date(birthDate);
var mdate = birthDate.toString();
var yearThen = parseInt(mdate.substring(0,4), 10);
var monthThen = parseInt(mdate.substring(5,7), 10);
var dayThen = parseInt(mdate.substring(8,10), 10);
var today = new Date();
var birthday = new Date(yearThen, monthThen-1, dayThen);
var differenceInMilisecond = today.valueOf() - birthday.valueOf();
var year_age = Math.floor(differenceInMilisecond / 31536000000);
var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);
var month_age = Math.floor(day_age/30);
day_age = day_age % 30;
var tMnt= (month_age + (year_age*12));
var tDays =(tMnt*30) + day_age;
if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
alert("Invalid Date - Please try again!");
}
else 
{
document.getElementById("age").value = year_age;
}
}



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

  });
  
 
</script>


<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
}
</script>

</body>
</html>
