<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');






?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> <?php $this->load->view('pza/include/title');?></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

</head>
<style type="text/css">

@media print
{    
    #btn1, #btn2
    {
        display: none !important;
    }	
}


@media print
{    
    #footer {
	position: fixed;
	bottom: 0;
	display: block !important;
	width:100%;
	}
}

</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- Nave bar row -->


<table width="100%" border="0" style="margin:5px 10;">
  <tr align="center">
    <td width="22%">&nbsp;</td>
    <td width="56%">&nbsp;</td>
    <td width="22%">
    <button onclick="window.print()" id="btn1" class="btn btn-primary btn-sm">Print List</button>
    <button id="btn2" onclick="ExportToExcel();" class="btn btn-primary btn-sm">Export as Excel</button>
    </td>
  </tr>
</table>


<table width="100%" border="0" style="background:#E1E1E1;">
  <tr align="center">
    <td width="22%"><img src="<?php echo base_url(); ?>/assets/images/logo.png" style="width:80px"></td>
    <td width="56%"><h4 class="card-title">Educational Stipend (Professional) Students List of District <br />
	District :  <strong><?php echo  $district_name;?></strong>
     for the Year:<strong><?php echo $getfinancial_year; ?></strong> and Inst:<strong><?php echo $getfinancial_installment; ?></strong></h4></td>
    <td width="22%">Print Date: <?php echo date("d-M-Y");?></td>
  </tr>
</table>



<!-- Main Table -->

 <table id="tbl_exporttable_to_xls" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>University/College</th>
<th>Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>LZC</th>
<th>Amount</th>

</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($getEduStipendPrint))
{
foreach($getEduStipendPrint as $EduStipendPrint)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php echo $EduStipendPrint['InstituteName']; ?>
</td>
<td><?php echo $EduStipendPrint['mustahiq_name']; ?></td>
<td><?php echo $EduStipendPrint['father_name']; ?></td>
<td><?php echo $EduStipendPrint['mustahiq_cnic']; ?></td>
<td><?php echo $EduStipendPrint['contact_number']; ?></td>
<td>
<?php echo $EduStipendPrint['LZCActualName'];?>
</td>
<td><?php echo $EduStipendPrint['amount']; ?></td>
</tr>
<?php 
$i++;
}
}
?>
</tbody>
</table>

<div id="footer" style="display:none;">
<p align="center">
Copyright © <?php echo date(Y)?> Zakat & Ushr Department Khyber Pakhtunkhwa. All rights reserved
</p>
</div>
<script>

function ExportToExcel(type, fn, dl) {
var elt = document.getElementById('tbl_exporttable_to_xls');
var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
return dl ?
XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
XLSX.writeFile(wb, fn || ('Educational_Stipend(A) Mustahiqeen list.' + (type || 'xlsx')));
}

</script>
</body>
</html>
