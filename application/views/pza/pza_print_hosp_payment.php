<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$selectqry_sf = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('account_head','Special Health Care Program')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_sf_amount = $selectqry_sf->row('amount_allocated');
$total_sf_amount_hospital= number_format($total_sf_amount,2);

$selectqry_hospital = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('account_head','Health Care (Provincial Level)')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_hospital_amount = $selectqry_hospital->row('amount_allocated');
$total_received_amount_hospital= number_format($total_hospital_amount,2);

$selectqry_hosp_dis = $this->db->select_sum('payment_amount')->from('hospital_payment')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_hosp_dis = $selectqry_hosp_dis->row('payment_amount');
$total_hosp_dis_nf= number_format($total_hosp_dis,2);

$hospital_balance = $total_hospital_amount - $total_hosp_dis;
$hospital_balance_nf= number_format($hospital_balance,2);



$select_dis_sf = $this->db->select_sum('amount')->from('special_health_fund')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_sf_dis = $select_dis_sf->row('amount');

$total_sf_dis_nf= number_format($total_sf_dis,2);
$sf_balance = $total_sf_amount - $total_sf_dis;
$sf_balance_nf= number_format($sf_balance,2);


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
Allocation of Regular Health Fund (Provincial Level) <strong><?php echo $getfinancial_year; ?></strong>
</h3>



<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Hospital Name</th>
<th>F/Year</th>
<th>Inst</th>
<th>Allocated/Fund</th>
<th>Disbursement</th>
<th>Balance</th>
<th width="70">Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_hospital_print))
{
foreach($get_all_hospital_print as $get_all_hospitalpayments)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php
$select_hostpitals_qry = $this->db->select('*')->from('hospital_users')->where('id',$get_all_hospitalpayments['hospital_id'])->get();
echo $hospt_name = $select_hostpitals_qry->row('name');
?>
</td>
<td><?php echo $get_all_hospitalpayments['financial_year'];?></td>
<td><?php echo $get_all_hospitalpayments['installment'];?></td>
<td><?php echo $get_all_hospitalpayments['payment_amount'];?></td>
<td>

<?php
$selecthospital_dis = $this->db->select_sum('total_expense')->from('pt_expense')->where('hospital_id',$get_all_hospitalpayments['hospital_id'])->where('installment',$getfinancial_installment)->where('financial_Year',$getfinancial_year)->get();
$total_reg_hosp_dis = $selecthospital_dis->row('total_expense');
$total_reg_hosp_dis = number_format($total_reg_hosp_dis,2);
echo $total_reg_hosp_dis;
?>

</td>
<td>

<?php 
$net_hosp_balannce = $get_all_hospitalpayments['payment_amount'] - $total_reg_hosp_dis;
echo number_format($net_hosp_balannce,2);
?>

</td>
<td><?php echo date("d-m-Y",strtotime($get_all_hospitalpayments['add_date']));?></td>
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
