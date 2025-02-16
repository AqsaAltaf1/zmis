<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('pza/include/title');?>
</title>

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

<h3 align="center">
List Regarding Summary Of Un-Spent Balance From District During F/Y <strong><?php echo $getfinancial_year;?></strong>
</h3>


<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>


<th>S#</th>
<th>District</th>
<th>GA</th>
<th>MA</th>
<th>DM</th>
<th>ESA</th>
<th>ESP</th>
<th>HC</th>
<th>EST</th>
<th>AE</th>
<th>ChLZC</th>
<th>Total</th>



</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistricts)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdistricts['district_name']; ?></td>

<td>
<?php
$runpzf_query_hoa = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Guzara Allowance')->where('financial_year',$getfinancial_year)->get();
$getGA_unspent = $runpzf_query_hoa->row('payment_received');
echo number_format($runpzf_query_hoa->row('payment_received'));
?>
</td>

<td> 
<?php
$select_MA_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Marriage Assistance')->where('financial_year',$getfinancial_year)->get();
$getMA_unspent= $select_MA_unspent->row('payment_received');
echo number_format($select_MA_unspent->row('payment_received'));
?>
</td>



<td>
<?php
$select_DM_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Deeni Madaris')->where('financial_year',$getfinancial_year)->get();
$getDM_unspent= $select_DM_unspent->row('payment_received');
echo number_format($select_DM_unspent->row('payment_received'));
//echo $this->db->last_query();
?>
</td>
<td>

<?php
$select_ESA_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Educational Stipend (A)')->where('financial_year',$getfinancial_year)->get();
$getESA_unspent= $select_ESA_unspent->row('payment_received');
echo number_format($select_ESA_unspent->row('payment_received'));
//echo $this->db->last_query();
?></td>


<td>

<?php
$select_ESP_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Educational Stipend (P)')->where('financial_year',$getfinancial_year)->get();
$getESP_unspent= $select_ESP_unspent->row('payment_received');
echo number_format($select_ESP_unspent->row('payment_received'));
//echo $this->db->last_query();
?>

</td>


<td>

<?php
$select_HC_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Health Care (District Level)')->where('financial_year',$getfinancial_year)->get();
$getHC_unspent = $select_HC_unspent->row('payment_received');
echo number_format($select_HC_unspent->row('payment_received'));
//echo $this->db->last_query();
?>


</td>
<td> 

<?php
$select_EST_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Educational Stipends (Technical)')->where('financial_year',$getfinancial_year)->get();
$getEST_unspent= $select_EST_unspent->row('payment_received');
echo number_format($select_EST_unspent->row('payment_received'));
//echo $this->db->last_query();
?></td>
<td>

<?php
$select_AE_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Administrative Expenditure')->where('financial_year',$getfinancial_year)->get();
$getAE_unspent= $select_AE_unspent->row('payment_received');
echo number_format($select_AE_unspent->row('payment_received'));
//echo $this->db->last_query();
?>

</td>
<td> 
<?php 
$select_CHLZC_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','LZC chairman Allow')->where('financial_year',$getfinancial_year)->get();
$getCHLZC_unspent= $select_CHLZC_unspent->row('payment_received');
echo number_format($select_CHLZC_unspent->row('payment_received'));
?>
</td>
<td>

<?php
$total_unspent = $getGA_unspent + $getMA_unspent + $getDM_unspent + $getESA_unspent + $getESP_unspent + $getHC_unspent + $getEST_unspent + $getLZF_unspent + $getDZF_unspent + $getAE_unspent + $getCHLZC_unspent;
echo number_format($total_unspent,1);
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

</body>
</html>
