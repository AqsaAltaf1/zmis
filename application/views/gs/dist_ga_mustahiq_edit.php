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
	$get_mustahiq_query = $this->db->select('*')->from('mustahiqeen')->where('id',$get_mustahiq_id)->where('district_id',$userid)->get();
	$getmustahiq_name = $get_mustahiq_query->row('mustahiq_name');
	
	$get_mustahiqid = $get_mustahiq_query->row('id');
	$get_mustahiq_details_qry = $this->db->select('*')->from('mustahiqeen_details')->where('user_id',$get_mustahiqid)->get();
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


<?php $this->load->view('gs/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('gs/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('gs/include/user_manue');?> -->

<!-- Sidebar Menu -->

<?php $this->load->view('gs/include/sidebar');?>

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
<h3 class="m-0 text-dark">Update Guzara Allowance Mustahiqeen Registration (LZ-19)</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> 


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
<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_GA_Lz_19/ga_mustahiq_manage_edit/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">




<div class="row form-group">

<label class="col-md-2" style="color:#f00;" for="">LZC Name<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="lzc" name="LZC_id" required="">
<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('LZC_id');?>"><?php echo $get_mustahiq_query->row('LZCActualName');?></option>
<!-- LZC dropdown list-->
<?php
$userName = $this->session->userdata('username');
$districtID = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$districtID)->get();
$district_name = $get_dist_name->row('district_name');

$this->db->select("*");
$this->db->where('District_Name',$district_name);
$this->db->where('GS_Username',$userName);
$query = $this->db->get('zakatentryforms');
$get_gs_lzc = $query->result_array();
?>


<?php //foreach ($get_gs_lzc as $get_lzcname) { ?>
<!--<option value="<?php //echo $get_lzcname['LZC_ID']?>"><?php //echo $get_lzcname['LZC_Name'];?></option>-->
<?php //}?>
</select>

<!--New Tag-->
<label class="col-md-2" for="" style="color:#f00;">Locality of LZC<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="LzcLocality" name="LzcLocality" required="">
<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('LzcLocality');?>"><?php echo $get_mustahiq_query->row('LzcLocality');?></option>
<?php foreach ($GetLzcLocality as $LzcLocality) { ?>
<option value="<?php echo $LzcLocality['field_name']; ?>"><?php echo $LzcLocality['field_name']; ?></option>
<?php }?>
</select>



</div>
<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Istehqaq No:<span class="required">*</span>
</label>

<input type="number" value="<?php echo $get_mustahiq_query->row('istehqaqnumber');?>" name="istehqaqnumber" class="form-control col-md-4 col-xs-12" min="1" max="99999" required>

<label class="col-md-2" style="color:#f00;" for="">Gender<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="gender" name="gender" onChange="showhideStatus(this.value);" required="">
<option value="<?php echo $get_mustahiq_query->row('gender');?>"><?php echo $get_mustahiq_query->row('gender');?></option>
<?php foreach ($GetGender as $Gender){?>
<option value="<?php echo $Gender['field_name'];?>"><?php echo $Gender['field_name'];?></option>
<?php }?>
</select>

</div>

<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Mustahiq Name <span class="required">*</span>
</label>
<input type="text" name="mustahiq_name" id="m_name" value="<?php echo $get_mustahiq_query->row('mustahiq_name');?>" class="form-control col-md-4 col-xs-12" placeholder="Mustahiq Name" required>


<select class="form-control col-md-2 col-xs-12" id="GuardianType" name="MustahiqGuardianType" required="">

<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('GuardianType');?>"><?php echo $get_mustahiq_query->row('GuardianType');?></option>

<?php foreach($GetGuardianType as $GuardianType) {?>
<option value="<?php echo $GuardianType['field_name']; ?>"><?php echo $GuardianType['field_name'];?></option>
<?php }?>
</select>

<input type="text" name="father_name" id="f_name" value="<?php echo $get_mustahiq_query->row('father_name');?>" class="form-control col-md-4 col-xs-12" placeholder="Parent Name" required>
</div>

<div class="row form-group">
<!--New Tag-->
<label class="col-md-2" style="color:#f00;" for="">Identity Type<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="IdentityType" name="IdentityType" required="">
<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('IdentityType');?>"><?php echo $get_mustahiq_query->row('IdentityType');?></option>
<?php foreach($GetIdentityOption as $IdentityOption) {?>
<option value="<?php echo $IdentityOption['field_name']; ?>"><?php echo $IdentityOption['field_name'];?></option>
<?php }?>
</select>

<label class="col-md-2" style="color:#f00;" for="">CNIC/Form-B<span class="required">*</span>
</label>

<input readonly type="text" value="<?php echo $get_mustahiq_query->row('mustahiq_cnic');?>" name="mustahiq_cnic" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask >

</div>


<div id="GuardianTypeDiv" style="display:none;">

<div class="row form-group">
<!--New Tag-->
<label class="col-md-2" style="color:#f00;">Guardian Type<span class="required">*</span>
</label>
<select class="form-control col-md-2 col-xs-12" id="GuardianType" name="GuardianType" >
<option value="">---Guardian Type---</option>
<?php foreach($GetIdentityOptionSubType as $IdentityOptionSubType) {?>
<option value="<?php echo $IdentityOptionSubType['field_name']; ?>"><?php echo $IdentityOptionSubType['field_name'];?></option>
<?php }?>
</select>


<input type="text" name="GuardianName" class="form-control col-md-2 col-xs-12" placeholder="Guardian Name" style="margin-left:25px;">


<input type="text" name="GuardianFatherName" class="form-control col-md-2 col-xs-12" placeholder="Guardian Father Name" style="margin-left:25px;">

<input type="text" name="GuardianCnic" class="form-control col-md-2 col-xs-12" data-inputmask='"mask": "99999-9999999-9"' data-mask placeholder="Gurdian CNIC" style="margin-left:25px;">

</div>
</div>





<div class="row form-group">
<label class="col-md-2" style="color:#f00;" for="">Mobile Network<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="ConnectionType" name="MobileNetwork" required="">
<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('MobileNetwork');?>"><?php echo $get_mustahiq_query->row('MobileNetwork');?></option>
<?php foreach($GetContectType as $ContectType) {?>
<option value="<?php echo $ContectType['field_name']; ?>"><?php echo $ContectType['field_name'];?></option>
<?php }?>

</select>

<label class="col-md-2" style="color:#f00;" for="">Contact #<span class="required">*</span>
</label>

<input required type="text" name="contact_number" class="form-control col-md-4 col-xs-12" data-inputmask='"mask": "9999-9999999"' data-mask value="<?php echo $get_mustahiq_query->row('contact_number');?>">


</div>

<div class="row form-group">
<label class="col-md-2" for="" style="color:#f00;">Date Of Birth<span class="required">*</span>
</label>
<input type="date" readonly name="dob" onChange="findage(this.value);" id="dob" class="form-control col-md-4 col-xs-12" placeholder="Date Of Birth" value="<?php echo $get_mustahiq_query->row('dob');?>">

<label class="col-md-2" for="" style="color:#f00;">Age<span class="required">*</span>
</label>
<input type="text" name="age" id="age" min="1" value="<?php echo $get_mustahiq_query->row('age');?>" class="form-control col-md-4 col-xs-12" placeholder="Age of Mustahiq" readonly>
</div>

<div class="row form-group">
<!--New Tag-->
<label class="col-md-2" for="" style="color:#f00;">Sehat Sahulat Card<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="SehatSahulatCard" name="SehatCard" required="">
<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('SehatCard');?>"><?php echo $get_mustahiq_query->row('SehatCard');?></option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>
</select>


<label class="col-md-2" for="" style="color:#f00;">Marital Status<span class="required">*</span>
</label>
<select disabled class="form-control col-md-4 col-xs-12" onChange="checkMaritalStatus(this.value);"  id="marital_status" name="marital_status" required="">
<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('marital_status');?>"><?php echo $get_mustahiq_query->row('marital_status');?></option>
<?php foreach($GetMaritalStatus as $MaritalStatus) {?>
<option value="<?php echo $MaritalStatus['field_name']; ?>"><?php echo $MaritalStatus['field_name'];?></option>
<?php }?>
</select>

</div>


<div class="row form-group">
<!--New Tag-->
<label class="col-md-2" for="" style="color:#f00;">Skills<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="Skills" name="Skills" required="">
<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('Skills');?>"><?php echo $get_mustahiq_query->row('Skills');?></option>
<?php foreach($GetSkills as $Skills) {?>
<option value="<?php echo $Skills['field_name']; ?>"><?php echo $Skills['field_name'];?></option>
<?php }?>
</select>


<label class="col-md-2" for="" style="color:#f00;">School going Child/Sisters<span class="required">*</span>
</label>
<select class="form-control col-md-4 col-xs-12" id="SchoolGoingChild" name="SchoolGoingChild" required="">
<option style="background:#0F0;" value="<?php echo $get_mustahiq_query->row('SchoolGoingChild');?>"><?php echo $get_mustahiq_query->row('SchoolGoingChild');?></option>
<?php foreach($GetYesNo as $YesNo) {?>
<option value="<?php echo $YesNo['field_name']; ?>"><?php echo $YesNo['field_name'];?></option>
<?php }?>
</select>

</div>


<div id="BrotherSistersDiv" style="display:none;">
<div class="row form-group">

<select class="form-control col-md-2 col-xs-12" id="ChildType1" name="SchoolGoingType1">
<option value="">---Child Type---</option>
<?php foreach($GetChildType1 as $ChildType1) {?>
<option value="<?php echo $ChildType1['field_name']; ?>"><?php echo $ChildType1['field_name'];?></option>
<?php }?>
</select>
<input type="number" name="SchoolGoingSonBrothers" class="form-control col-md-4 col-xs-12" min="0">

<select class="form-control col-md-2 col-xs-12" id="ChildType2" name="SchoolGoingType2">
<option value="">---Child Type---</option>
<?php foreach($GetChildType2 as $ChildType2) {?>
<option value="<?php echo $ChildType2['field_name']; ?>"><?php echo $ChildType2['field_name'];?></option>
<?php }?>
</select>
<input type="number" name="NoSchoolGoingSisters" class="form-control col-md-4 col-xs-12" min="0">

</div>
</div>


<div class="row form-group">
<label class="col-md-2" style="color:#f00;">Postal Address<span class="required">*</span>
</label>
<input type="text" name="postal_address" id="" value="<?php echo $get_mustahiq_query->row('postal_address');?>" class="form-control col-md-4 col-xs-12" placeholder="Postal Address" required>

<label class="col-md-2" style="color:#f00;">Permanent Address<span class="required">*</span>
</label>
<input type="text" name="permanent_address" id="" value="<?php echo $get_mustahiq_query->row('permanent_address');?>" class="form-control col-md-4 col-xs-12" placeholder="Permanent Address" required>
</div>






<div class="row form-group">
<label class="col-md-2" for="">Remarks/Description</label>
<textarea cols="10" rows="5" class="form-control col-md-10 col-xs-12" id="comments" name="comments"><?php echo $get_mustahiq_query->row('Remarks');?></textarea>
</div>



<div class="row form-group">
<div class="col-md-2"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="updatebtn" value="Submit">
<button class="btn btn-primary" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>


</div>



<br>


<input type="hidden" name="mustahiq_id" value="<?php echo $this->uri->segment(3);?>">

</form>





</div>

</div>
<!-- /.card-body -->
</div>
</div>
</div>




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


// ------------- Identity Type -------------//

$('#IdentityType').on('change',function(){
if( $(this).val()==="Guardian CNIC" || $(this).val()==="Form-B"){
$("#GuardianTypeDiv").slideDown()
}
else{
$("#GuardianTypeDiv").slideUp()
}
});



// ------------- School Going Child -------------//

$('#SchoolGoingChild').on('change',function(){
if( $(this).val()==="Yes"){
$("#BrotherSistersDiv").slideDown()
}
else{
$("#BrotherSistersDiv").slideUp()
}
});

// ------------- Category -------------//

$('#category').on('change',function(){
if( $(this).val()==="Disable"){
$("#disable_status_div").slideDown()
$("#guardian_div").slideUp()
$("#disable_div").slideUp()
}
else if ( $(this).val()==="Orphan")
{
	var orphan_age = parseInt($('#age').val());
	if((orphan_age >= 17) || (orphan_age <= 0))
	{
	 alert('Invalid Age Selection for Orphan');
	 $("#dob").css("border", "1px solid red");
	 $("#dob").val("");	
	 $("#dob").focus();	
	 $("#age").val("");
	 return false;	
	}
$("#guardian_div").slideDown()
$("#disable_div").slideDown()
$("#disable_status_div").slideUp()
}
else if($(this).val()==="Senior Citizen")
{
$("#guardian_div").slideUp()
$("#disable_status_div").slideUp()
$("#disable_div").slideDown()
}
else if($(this).val()==="Widow/Divorced")
{
$("#guardian_div").slideUp()
$("#disable_status_div").slideUp()
$("#disable_div").slideDown()
}
});

// ------------- Other Disable Type -------------//

$('#OtherDisableType').on('change',function(){
if( $(this).val()==="Yes"){
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

// ------------- Gold Status -------------//

$('#no_of_dependences').on('change',function(){
if( $(this).val()==="Nil"){
$("#Dependences_div").slideUp()
}
else{
$("#Dependences_div").slideDown()
}
});


// ------------- House Status -------------//

$('#house_status').on('change',function(){
if( $(this).val()==="Own House"){
$("#house_status_div").slideDown();
$("#OnRent_div").slideUp();
}
else if( $(this).val()==="On Rent"){
$("#OnRent_div").slideDown();
$("#house_status_div").slideUp();
} 
else
{
$("#house_status_div").slideUp();
$("#OnRent_div").slideUp();
}
});

// ------------- Monthly Income Source -------------//

$('#monthly_income_source').on('change',function(){
if( $(this).val()==="Employed (Non Govt. Employee)"){
$("#monthly_income_source_div").slideDown();
$("#SourceOfExpenseDiv").slideUp();
$("#Other_source_income_marla").slideUp();
$("#Other_source_income_shops").slideUp();
}
else if($(this).val()==="Unemployed")
{
$("#SourceOfExpenseDiv").slideDown();
$("#monthly_income_source_div").slideUp();
$("#Other_source_income_marla").slideUp();
$("#Other_source_income_shops").slideUp();
}
else if($(this).val()==="Agriculture")
{
$("#SourceOfExpenseDiv").slideUp();
$("#monthly_income_source_div").slideUp();
$("#Other_source_income_marla").slideDown();
$("#Other_source_income_shops").slideUp();
}
else if($(this).val()==="Commercial")
{
$("#SourceOfExpenseDiv").slideUp();
$("#monthly_income_source_div").slideUp();
$("#Other_source_income_marla").slideUp();
$("#Other_source_income_shops").slideDown();
}
});


// ------------- Other Source of Income -------------//


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
else if ((year_age > 100) || (year_age <= 0))
{
 alert('Age Limit is 0-100');
 $("#dob").css("border", "1px solid red");
 $("#dob").val("");	
 $("#dob").focus();	
 $("#age").val("");
 return false;	
}
else 
{
document.getElementById("age").value = year_age;
$("#dob").css("border", "1px solid #ced4da");
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
  
  
  
  
  
function sumtotals()
{
	var dependences_sons = parseInt($('#dependences_sons').val());
	var dependences_daughters = parseInt($('#dependences_daughters').val());
	var dependences_others = parseInt($('#dependences_others').val());
	var totalsum = dependences_sons + dependences_daughters + dependences_others;
	$("#Dependences_totals").val(totalsum);

}  
  
  
  
  
function showhideStatus(gender)
{
	if(gender === 'Male')
	{
	$("#category").children("option[value^='Widow/Divorced']").hide();	
	}
	else if(gender === 'Female')
	{
	$("#category").children("option[value^='Widow/Divorced']").show();		
	}
	else if(gender === 'Female' ||maritalStatus === 'Married')
	{
	$("#category").children("option[value^='Widow/Divorced']").hide();	
	}
	
	else
	{
	$("#category").children("option[value^='Widow/Divorced']").show();	
	}	
}  


function checkMaritalStatus(maritalStatus)
{
	if(maritalStatus === 'Married')
	{
	$("#category").children("option[value^='Widow/Divorced']").hide();
	$("#category").children("option[value^='Orphan']").hide();
	}
	else if(maritalStatus === 'Un-Married' || gender === 'Male' )
	{	
	$("#category").children("option[value^='Widow/Divorced']").hide();
	}
	
	else
	{
	$("#category").children("option[value^='Orphan']").show();	
	$("#category").children("option[value^='Widow/Divorced']").show();
	}	
}







  
  
  
  
  
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
