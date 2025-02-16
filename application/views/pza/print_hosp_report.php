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

<h2 style="text-align: center;">Hospital Fund Receving & Disbursement Report Regarding  Financial Year: <b style="color: black;"><?php echo $year;?></b> Installment:<b style="color: black;"> <?php echo $inst;?></b></h2>


<table border="1" class="table table-striped table-bordered">
<thead>
<tr>
<th>S#</th>
<th>Hospital Name</th>
<th>F/Year</th>
<th>Inst</th>
<th>Allocated/Fund</th>
<th>Disbursement</th>
<th>Balance</th>
<th>Date</th>



</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($print_hosp_report))
{
foreach($print_hosp_report as $getdata)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php 
$hospital_id =  $getdata['hospital_id'];
$select_hostpitals_qry = $this->db->select('*')->from('hospital_users')->where('id',$hospital_id)->get();
echo $hospt_name = $select_hostpitals_qry->row('name');
?>
</td>

<td><?php echo $getdata['financial_year'];?></td>
<td><?php echo $getdata['installment'];?></td>
<td><?php echo number_format($getdata['payment_amount'],2);?></td>
<td>
<?php 
// Regular Fund disbusrement hospital wise

$selecthospital_dis = $this->db->select_sum('total_expense')->from('pt_expense')->where('hospital_id',$hospital_id)->where('installment',$getdata['installment'])->where('financial_year',$getdata['financial_year'])->get();
$total_reg_hosp_dis = $selecthospital_dis->row('total_expense');
$total_reg_hosp_dis_nf = number_format($total_reg_hosp_dis,2);
echo $total_reg_hosp_dis_nf;

?>
</td>
<td>
<?php 
$net_hosp_balannce =$getdata['payment_amount'] - $total_reg_hosp_dis;
echo number_format($net_hosp_balannce,2);
?></td>
<td><?php echo date("F j, Y",strtotime($getdata['add_date']));?></td>

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
