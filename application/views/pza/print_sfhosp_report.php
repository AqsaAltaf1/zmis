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

<h2 style="text-align: center;">Special Health Fund Receving & Disbursement Report Regarding  Financial Year: <b style="color: black;"><?php echo $year;?></b> Installment:<b style="color: black;"> <?php echo $inst;?></b></h2>


<table border="1" class="table table-striped table-bordered">
<thead>
<tr>
<th>S#</th>
<th>Hospital Name</th>
<th>Patient's Name</th>
<th>CNIC#</th>
<th>Disease</th>
<th>Allocated/Fund</th>
<th>Disbursement</th>
<th>Balance</th>
<th>Date</th>



</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($print_sfhosp_report))
{
foreach($print_sfhosp_report as $getdata)
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

<td><?php echo $getdata['p_name'];?></td>
<td><?php echo $getdata['pt_cnic'];?></td>
<td><?php echo $getdata['disease'];?></td>
<td><?php echo number_format($getdata['amount'],2);?></td>
<td>
<?php 
$selecthospital_dis_sf = $this->db->select_sum('total_expense')->from('sf_pt_expense')->where('hospital_id',$hospital_id)->where('installment',$getdata['installment'])->where('financial_year',$getdata['financial_year'])->get();
$total_hosp_dis_sf = $selecthospital_dis_sf->row('total_expense');
$total_hosp_dis_nf_sf = number_format($total_hosp_dis_sf,2);
echo $total_hosp_dis_nf_sf;
?>
</td>
<td>
<?php 
$net_sf = $getdata['amount'] -$total_hosp_dis_sf; 
echo number_format($net_sf,2);
?>
</td>
<td><?php echo date("F j, Y",strtotime($getdata['get_date']));?></td>

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
