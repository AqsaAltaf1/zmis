<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

$runpzf_query = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query->row('pza_amount');

$runpza_query = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->get();
$total_pzareceived_amount = $runpza_query->row('amount_allocated');
$gettotalnet_balance =  $total_pzfreceived_amount - $total_pzareceived_amount;

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

// Get total Fund for district
$dist_total_fund_query = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_fund_received = $dist_total_fund_query->row('total_fund');
//$this->db->last_query();















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

<!-- Nave bar row -->

<h3 align="center">
	  
LZC Fund Allocation Summary of District <strong><?php echo $district_name; ?></strong> during Year: <strong> <?php echo $getfinancial_year; ?></strong>
</h3>

<!-- Main Form -->

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>LZC name</th>
<th>Zakat Head</th>
<th>Cheque</th>
<th>Chq Date</th>
<th>NOBs</th>
<th>Fund</th>
<th>Disbursed</th>
<th>Balance</th>
<th>Date</th>

</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($getFundPrint))
{
foreach($getFundPrint as $FundPrint)
{
?>

<tr>
<td><?php echo $i;?></td>
<td>
<?php 
$LZC_name = $FundPrint['lzc_institution_madrasa']; 
$getlzc_query = $this->db->select('*')->from('lzc_list')->where('id',$LZC_name)->get();
echo $getlzc_name = $getlzc_query->row('lzc_name');?>
</td>
<td><?php echo $FundPrint['account_head'];?></td>
<td><?php echo $FundPrint['cheque_no'];?></td>
<td><?php echo date("d-m-Y",strtotime($FundPrint['cheque_date']));?></td>
<td><?php echo $FundPrint['nob'];?></td>
<td><?php echo $amount_allocated = $FundPrint['amount_allocated'];?></td>
<td>
<?php
if($FundPrint['account_head'] == "Guzara Allowance")
{	
$query_amount_ga = $this->db->select_sum('payment_amount')->from('mustahiqeen_payments')
->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)->where('MustahiqType',"Guzara Allowance")
->where('lzc_id',$LZC_name)->where('district_id',$userid)
->get();
$get_final_amount = $query_amount_ga->row('payment_amount');
echo number_format($get_final_amount,2);			
}
else if($FundPrint['account_head'] == "Marriage Assistance")
{
$query_amount_ma = $this->db->select_sum('payment_amount')->from('mustahiqeen_payments')
->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)->where('MustahiqType',"Marriage Assistance")
->where('lzc_id',$LZC_name)->where('district_id',$userid)
->get();
$get_final_amount = $query_amount_ma->row('payment_amount');
echo number_format($get_final_amount,2);
}
?>
</td>
<td><?php 
$get_total_balance = $amount_allocated - $get_final_amount;
echo number_format($get_total_balance,2);
?></td>

<td><?php echo date("d-m-Y",strtotime($FundPrint['add_date']));?></td>

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
