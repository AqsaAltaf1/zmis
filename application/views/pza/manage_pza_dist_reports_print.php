<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');


$financial_year;
$inst_value;
$district_name;
$district_id;


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
<body class="">
<div class="wrapper">

<br>


<!--LZC Wise List Reports-->

<div id="lzc_wise_list" style="display:none;">
<section class="content">
<div class="container-fluid">
<input type="button" style="float:right; margin-top:20px;" class="btn btn-sm btn-primary" onclick="printDiv('printableArea')" value="Print Report" />
</div>
</section>
<br>
<div id="printableArea">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
<h5>
LZC Wise GA/CH Allow Cheque List in respect of District <strong><?php echo $district_name;?></strong> for F/Y <strong><?php echo $financial_year;?></strong>  Installment: <strong><?php echo $inst_value;?></strong> : <!--Dated : <?php echo date("d-m-Y");?>-->
</h5>
</div>
<div class="col-md-2"></div>
</div>   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Cheque #</th>
<th>Date</th>
<th>Guzara Allowance</th>
<th>Marriage Assistance</th>
<th>LZC Ch.Allowance</th>
<th>Total Amount</th>
<th>No. of Beneficiaries</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_lzc_wise_report_list))
{
foreach($get_lzc_wise_report_list as $get_lzc_wise_values)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>

<?php
$lzcid = $get_lzc_wise_values['lzc_institution_madrasa'];
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$lzcid)->get();
echo $getlzc_name = $get_lzclist_query->row('lzc_name');
?>

</td>
<td>
<?php echo $get_lzc_wise_values['cheque_no'];?>
</td>
<td>
<?php echo date("d-m-Y",strtotime($get_lzc_wise_values['add_date'],2));?>
</td>
<td>

<?php
$getga_amountqry = $this->db->select('*')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$lzcid)->where('account_head','Guzara Allowance')->get();
$get_ga_amountvalue = $getga_amountqry->row('amount_allocated');
echo number_format($get_ga_amountvalue,2);
?>

</td>
<td>

<?php
$getma_amountqry = $this->db->select('*')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$lzcid)->where('account_head','Marriage Assistance')->get();
$get_ma_amountvalue = $getma_amountqry->row('amount_allocated');
//echo $this->db->last_query();
echo number_format($get_ma_amountvalue,2);
?>

</td>
<td><?php echo $ch_allownce = 0.0;?></td>
<td>
<?php 
$getsum_ga_ma = $get_ga_amountvalue + $get_ma_amountvalue;

echo number_format($getsum_ga_ma,2);

?>
</td>
<td><?php echo $get_lzc_wise_values['nob'];?></td>
</tr>

<?php 
$i++;
}
}
?>
</tbody>
</table>
</div>
</section>
</div>
</div>


<!--Guzara Allownce Reports-->

<div id="lzc_wise_list" style="display:none;">
<section class="content">
<div class="container-fluid">
<input type="button" style="float:right; margin-top:20px;" class="btn btn-sm btn-primary" onclick="printDiv('printableArea1')" value="Print Report" />
</div>
</section>
<br>
<div id="printableArea1">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
<h5>
Guzara Allowance List in respect of District <strong><?php echo $district_name;?></strong> for F/Y <strong><?php echo $financial_year;?></strong>  Installment: <strong><?php echo $inst_value;?></strong> : <!--Dated : <?php echo date("d-m-Y");?>-->
</h5>
</div>
<div class="col-md-2"></div>
</div>   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>Category</th>
<th>Amount</th>
<th>Bank Name</th>
<th>A/C#</th>
<th>Cheque#</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($guzara_allowance))
{
foreach($guzara_allowance as $guzara_allowance_values)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php
$lzcid = $guzara_allowance_values['lzc_id'];
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$lzcid)->get();
echo $getlzc_name = $get_lzclist_query->row('lzc_name');
?>
</td>

<td>
<?php 
$user_id = $guzara_allowance_values['user_id'];
$get_mustahiq_query = $this->db->select('*')->from('guzara_allowance_mustahiqeen')->where('id',$user_id)->get();
echo $getmustahiq_name = $get_mustahiq_query->row('mustahiq_name');
?>
</td>

<td>
<?php echo $get_mustahiq_query->row('father_name');?>
</td>

<td><?php echo $get_mustahiq_query->row('mustahiq_cnic');?></td>
<td><?php echo $get_mustahiq_query->row('contact_number');?></td>
<td><?php echo $get_mustahiq_query->row('category');?></td>
<td><?php echo $guzara_allowance_values['payment_amount'];;?></td>
<td><?php echo $guzara_allowance_values['bank_name'];;?></td>
<td><?php echo $guzara_allowance_values['account_number'];;?></td>
<td><?php echo $guzara_allowance_values['cheque_number'];;?></td>
</tr>
<?php 
$i++;
}
}
?>


</tbody>
</table>
</div>
</section>
</div>
</div>







<!--Marriage Assist Reports-->

<div id="marriage_assist" style="display:none;">
<section class="content">
<div class="container-fluid">
<input type="button" style="float:right; margin-top:20px;" class="btn btn-sm btn-primary" onclick="printDiv('printableArea2')" value="Print Report" />
</div>
</section>
<br>
<div id="printableArea2">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
<h5>
Marriage Assistance List in respect of District <strong><?php echo $district_name;?></strong> for F/Y <strong><?php echo $financial_year;?></strong>  Installment: <strong><?php echo $inst_value;?></strong> : <!--Dated : <?php echo date("d-m-Y");?>-->
</h5>
</div>
<div class="col-md-2"></div>
</div>   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>Category</th>
<th>Amount</th>
<th>Bank Name</th>
<th>A/C#</th>
<th>Cheque#</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($marriage_assist))
{
foreach($marriage_assist as $marriage_assist_values)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php
$lzcid = $marriage_assist_values['lzc_id'];
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$lzcid)->get();
echo $getlzc_name = $get_lzclist_query->row('lzc_name');
?>
</td>

<td>
<?php 
$user_id = $marriage_assist_values['user_id'];
$get_mustahiq_query = $this->db->select('*')->from('ma_mustahiqeen')->where('id',$user_id)->get();
echo $getmustahiq_name = $get_mustahiq_query->row('mustahiq_name');
?>
</td>

<td>
<?php echo $get_mustahiq_query->row('f_name');?>
</td>

<td><?php echo $get_mustahiq_query->row('cnic');?></td>
<td><?php echo $get_mustahiq_query->row('cell_no');?></td>
<td><?php echo $get_mustahiq_query->row('category');?></td>
<td><?php echo $marriage_assist_values['payment_amount'];;?></td>
<td><?php echo $marriage_assist_values['bank_name'];;?></td>
<td><?php echo $marriage_assist_values['account_number'];;?></td>
<td><?php echo $marriage_assist_values['cheque_number'];;?></td>
</tr>
<?php 
$i++;
}
}
?>


</tbody>
</table>
</div>
</section>
</div>
</div>




<!--Deeni Madaras Reports-->


<div id="deeni_madaris" style="display:none">


<section class="content">
<div class="container-fluid">
<input type="button" style="float:right; margin-top:20px;" class="btn btn-sm btn-primary" onclick="printDiv('printableArea3')" value="Print Report" />
</div>
</section>
<br>
<div id="printableArea3">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
<h5>
Deeni Madaris Fund Summary of District <strong><?php echo $district_name;?></strong> for F/Y <strong><?php echo $financial_year;?></strong>  Installment: <strong><?php echo $inst_value;?></strong> : <!--Dated : <?php echo date("d-m-Y");?>-->
</h5>
</div>
<div class="col-md-2"></div>
</div>   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Madrassa Name</th>
<th>Fund Received </th>
<th>Fund Disbursed</th>
<th>Balance</th>

</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($deeni_madaris))
{
foreach($deeni_madaris as $deeni_madaris_list)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $deeni_madaris_list['madrassa_name'];?></td>
<td>

<?php
$madrassa_id = $deeni_madaris_list['id'];
$get_fund_amountqry = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('account_head','Deeni Madaris')->where('year',$financial_year)
->where('installment',$inst_value)->where('lzc_institution_madrasa',$madrassa_id)->get();
$get_madrassa_amount = $get_fund_amountqry->row('amount_allocated');
echo number_format($get_madrassa_amount,2);
?>
</td>


<td>
<?php
$madrassa_id = $deeni_madaris_list['id'];
$get_dist_amountqry = $this->db->select_sum('amount')->from('dm_mustahiqeen')
->where('district_id',$district_id)->where('year',$financial_year)
->where('installment',$inst_value)->where('madrassa_name',$madrassa_id)->get();
$get_madrassa_amount_disb = $get_dist_amountqry->row('amount');
echo number_format($get_madrassa_amount_disb,2);
?>

</td>

<td>

<?php
$gettotal_madrassa_balance = $get_madrassa_amount - $get_madrassa_amount_disb;
echo number_format($gettotal_madrassa_balance,2);
?>

</td>
</tr>
<?php 
$i++;
}
}
?>
</tbody>
</table>
</div>
</section>
</div>


<section class="content">
<div class="container-fluid">
<input type="button" style="float:right; margin-top:20px;" class="btn btn-sm btn-primary" onclick="printDiv('printableArea4')" value="Print Report" />
</div>
</section>
<br>
<div id="printableArea4">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
<h5>
Deeni Madaris Mustahiqeen List in respect of District <strong><?php echo $district_name;?></strong> for F/Y <strong><?php echo $financial_year;?></strong>  Installment: <strong><?php echo $inst_value;?></strong> : <!--Dated : <?php echo date("d-m-Y");?>-->
</h5>
</div>
<div class="col-md-2"></div>
</div>   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Madrassa Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>Class/Darja</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($deeni_madaris_paid))
{
foreach($deeni_madaris_paid as $deeni_madaris_paid_mustahiqeen)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>

<?php
$lzcid = $deeni_madaris_paid_mustahiqeen['lzc_id'];
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$lzcid)->get();
echo $getlzc_name = $get_lzclist_query->row('lzc_name');
?>

</td>
<td>

<?php
$madrassaid = $deeni_madaris_paid_mustahiqeen['madrassa_name'];
$get_madrassa_query = $this->db->select('*')->from('madrassa_list')->where('id',$madrassaid)->get();
echo $getmadrassa_name = $get_madrassa_query->row('madrassa_name');
?>


</td>
<td><?php echo $deeni_madaris_paid_mustahiqeen['mustahiq_name'];?></td>
<td><?php echo $deeni_madaris_paid_mustahiqeen['f_name'];?></td>
<td><?php echo $deeni_madaris_paid_mustahiqeen['cnic'];?></td>
<td><?php echo $deeni_madaris_paid_mustahiqeen['cell_no'];?></td>
<td><?php echo $deeni_madaris_paid_mustahiqeen['class_darja'];?></td>
<td><?php echo $deeni_madaris_paid_mustahiqeen['amount'];?></td>
</tr>
<?php 
$i++;
}
}
?>
</tbody>
</table>
</div>
</section>
</div>
</div>




<!--Health Care Reports-->


<div id="hc_mustahiqeen_paid" style="display:none;">


<section class="content">
<div class="container-fluid">
<input type="button" style="float:right; margin-top:20px;" class="btn btn-sm btn-primary" onclick="printDiv('printableArea5')" value="Print Report" />
</div>
</section>
<br>
<div id="printableArea5">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
<h5>
District Health Care Mustahiqeen List in respect of District <strong><?php echo $district_name;?></strong> for F/Y <strong><?php echo $financial_year;?></strong>  Installment: <strong><?php echo $inst_value;?></strong> : <!--Dated : <?php echo date("d-m-Y");?>-->
</h5>
</div>
<div class="col-md-2"></div>
</div>   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>Category</th>
<th width="200">Hospital</th>
<th>Disease</th>
<th>Amount</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($hc_mustahiqeen_paid))
{
foreach($hc_mustahiqeen_paid as $hc_mustahiqeen_paidvalue)
{
?>

<tr>
<td><?php echo $i;?></td>
<td>
<?php
$lzcid = $hc_mustahiqeen_paidvalue['lzc_id'];
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$lzcid)->get();
echo $getlzc_name = $get_lzclist_query->row('lzc_name');
?>
</td>
<td><?php echo $hc_mustahiqeen_paidvalue['mustahiq_name'];?></td>
<td><?php echo $hc_mustahiqeen_paidvalue['f_name'];?></td>
<td><?php echo $hc_mustahiqeen_paidvalue['cnic'];?></td>
<td><?php echo $hc_mustahiqeen_paidvalue['cell_no'];?></td>

<td><?php echo $hc_mustahiqeen_paidvalue['category'];?></td>
<td>
<?php 
$hospital_id = $hc_mustahiqeen_paidvalue['hospital_id'];
$get_hospital_query = $this->db->select('*')->from('hospital_users')->where('id',$hospital_id)->get();
echo $gethospital_name = $get_hospital_query->row('name');
?>
</td>
<td><?php echo $hc_mustahiqeen_paidvalue['disease_type'];?></td>
<td><?php echo $hc_mustahiqeen_paidvalue['amount'];?></td>
</tr>
<?php 
$i++;
}
}
?>

</tbody>
</table>
</div>
</section>
</div>


</div>






<!-- Edu-Stipend(A) Reports-->


<div id="esa_mustahiqeen_paid">


<section class="content">
<div class="container-fluid">
<input type="button" style="float:right; margin-top:20px;" class="btn btn-sm btn-primary" onclick="printDiv('printableArea6')" value="Print Report" />
</div>
</section>
<br>
<div id="printableArea6">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
<h5>
District Health Care Mustahiqeen List in respect of District <strong><?php echo $district_name;?></strong> for F/Y <strong><?php echo $financial_year;?></strong>  Installment: <strong><?php echo $inst_value;?></strong> : <!--Dated : <?php echo date("d-m-Y");?>-->
</h5>
</div>
<div class="col-md-2"></div>
</div>   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>Category</th>
<th width="200">Hospital</th>
<th>Istehqaq_no</th>
<th>Amount</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($esa_mustahiqeen_paid))
{
foreach($esa_mustahiqeen_paid as $esa_mustahiqeen_paidvalue)
{
?>

<tr>
<td><?php echo $i;?></td>
<td>
<?php
$lzcid = $esa_mustahiqeen_paidvalue['lzc_id'];
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$lzcid)->get();
echo $getlzc_name = $get_lzclist_query->row('lzc_name');
?>
</td>
<td><?php echo $esa_mustahiqeen_paidvalue['mustahiq_name'];?></td>
<td><?php echo $esa_mustahiqeen_paidvalue['f_name'];?></td>
<td><?php echo $esa_mustahiqeen_paidvalue['cnic'];?></td>
<td><?php echo $esa_mustahiqeen_paidvalue['cell_no'];?></td>

<td><?php echo $esa_mustahiqeen_paidvalue['category'];?></td>
<td>
<?php 
$college_university_name_id = $esa_mustahiqeen_paidvalue['college_university_name'];
$get_college_query = $this->db->select('*')->from('institution_list')->where('id',$college_university_name_id)->get();
echo $getcollege_name = $get_college_query->row('institution_name');
?>
</td>
<td><?php echo $esa_mustahiqeen_paidvalue['Istehqaq_no'];?></td>
<td><?php echo $esa_mustahiqeen_paidvalue['amount'];?></td>
</tr>
<?php 
$i++;
}
}
?>

</tbody>
</table>
</div>
</section>
</div>


</div>









<!-- Edu-Stipend(P) Reports-->


<div id="esp_mustahiqeen_paid">


<section class="content">
<div class="container-fluid">
<input type="button" style="float:right; margin-top:20px;" class="btn btn-sm btn-primary" onclick="printDiv('printableArea7')" value="Print Report" />
</div>
</section>
<br>
<div id="printableArea7">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
<h5>
District Health Care Mustahiqeen List in respect of District <strong><?php echo $district_name;?></strong> for F/Y <strong><?php echo $financial_year;?></strong>  Installment: <strong><?php echo $inst_value;?></strong> : <!--Dated : <?php echo date("d-m-Y");?>-->
</h5>
</div>
<div class="col-md-2"></div>
</div>   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>Category</th>
<th width="200">Hospital</th>
<th>Istehqaq_no</th>
<th>Amount</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($esa_mustahiqeen_paid))
{
foreach($esa_mustahiqeen_paid as $esa_mustahiqeen_paidvalue)
{
?>

<tr>
<td><?php echo $i;?></td>
<td>
<?php
$lzcid = $esa_mustahiqeen_paidvalue['lzc_id'];
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$lzcid)->get();
echo $getlzc_name = $get_lzclist_query->row('lzc_name');
?>
</td>
<td><?php echo $esa_mustahiqeen_paidvalue['mustahiq_name'];?></td>
<td><?php echo $esa_mustahiqeen_paidvalue['f_name'];?></td>
<td><?php echo $esa_mustahiqeen_paidvalue['cnic'];?></td>
<td><?php echo $esa_mustahiqeen_paidvalue['cell_no'];?></td>

<td><?php echo $esa_mustahiqeen_paidvalue['category'];?></td>
<td>
<?php 
$college_university_name_id = $esa_mustahiqeen_paidvalue['college_university_name'];
$get_college_query = $this->db->select('*')->from('institution_list')->where('id',$college_university_name_id)->get();
echo $getcollege_name = $get_college_query->row('institution_name');
?>
</td>
<td><?php echo $esa_mustahiqeen_paidvalue['Istehqaq_no'];?></td>
<td><?php echo $esa_mustahiqeen_paidvalue['amount'];?></td>
</tr>
<?php 
$i++;
}
}
?>

</tbody>
</table>
</div>
</section>
</div>


</div>






</div>



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
