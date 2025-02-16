<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('hospital_id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('hospital/include/title');?>
</title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

<style type="text/css">

#example1{ font-size:13px;}

</style>

</head>

<body>

<div class="wrapper">

<section class="content">
<div class="container-fluid">

<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">List of Patients Served by  <strong><?php echo $hospital_name ?></strong>  during  Financial Year : <strong><?php echo $getfinancial_year;?></strong> </h3>

</div>
</div>




<table id="example1" class="table table-bordered table-striped">
<thead>

<tr>
<th>S#</th>
<th>OPD#</th>
<th>Name</th>
<th>F/Name</th>
<th>Age</th>
<th>CNIC</th>
<th>District</th>
<th>LZC</th>
<th>Gender</th>
<th>Type</th>
<th>Istehqaq#</th>
<th>Cell#</th>
<th>Disease</th>
<th>Expense</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_all_regular_patients))
{
foreach($get_all_regular_patients as $get_regular_patient)
{
$district_id = $get_regular_patient['district'];
$lzc_id = $get_regular_patient['lzc'];

$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
$district_name = $get_dist_name->row('district_name');

$get_lza_qry = $this->db->select('*')->from('lzc_list')->where('id',$lzc_id)->get();
$lzc_name = $get_lza_qry->row('lzc_name');

?>	


<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_regular_patient['opd_no'];?></td>
<td><?php echo $get_regular_patient['pt_name'];?></td>
<td><?php echo $get_regular_patient['fh_name']; ?></td>
<td><?php echo $get_regular_patient['age']; ?></td>
<td><?php echo $get_regular_patient['pt_cnic']; ?></td>

<td><?php echo $district_name; ?></td>

<td><?php echo $lzc_name; ?></td>

<td><?php echo $get_regular_patient['gender']; ?></td>
<td><?php echo $get_regular_patient['pt_hc_category']; ?></td>
<td><?php echo $get_regular_patient['Istehqaq_no']; ?></td>
<td><?php echo $get_regular_patient['cell_no']; ?></td>
<td><?php echo $get_regular_patient['disease']; ?></td>
<td><?php echo $get_regular_patient['total_expense']; ?></td>
<td><?php echo date("d-m-Y",strtotime($get_regular_patient['add_date'])); ?></td>
</tr>
<?php 
$i++;
}
}
?>
</tbody>
</table>

</div>
</div>
</div>
</div>



</body>
</html>
