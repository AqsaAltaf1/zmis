<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

$get_lzc_id = $this->uri->segment(3);
$get_lzclist_query = $this->db->select('*')->from('lzc_list')->where('id',$get_lzc_id)->get();
$getlzc_name = $get_lzclist_query->row('lzc_name');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('district/include/title');?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
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

.text_align{
text-align: right;
}
.div_align {
align-items: right;
}

</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">



<div class="row" style="display: none;"></div>
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
    <td width="15%"><img src="<?php echo base_url(); ?>/assets/images/logo.png" style="width:80px"></td>
    <td width="35%"><h4 class="card-title">Guzara Allowance Mustahiqeen LZ-11 List: <strong> <?php echo $getfinancial_year; ?></strong> <br />
	District :  <strong><?php echo  $district_name;?></strong> </h4> </td>
    <td> Local Zakat Committee : <strong><?php echo $getlzc_name; ?></strong></td>
    <td width="15%"></strong>Copy: <strong>District / LZC</strong></td>
    <td width="15%"><strong>Dated</strong> : <?php echo date("d-m-Y");?></td>
  </tr>
</table>



<br />




<table id="tbl_exporttable_to_xls" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>F.Name</th>
<th>CNIC Type</th> 
<th>CNIC</th>
<th>Category</th>
<th>Gender</th>
<th>Contact#</th>
<th>Audit Status</th>


</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_selected_mustahiqeen_print))
{
foreach($get_selected_mustahiqeen_print as $getmustahiqinfo)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $getmustahiqinfo['mustahiq_name']?></td>
<td><?php echo $getmustahiqinfo['father_name']?></td> 
<td><?php echo $getmustahiqinfo['IdentityType'];?></td>
<td><?php echo $getmustahiqinfo['mustahiq_cnic']?></td>
<td><?php echo $getmustahiqinfo['category']?></td>
<td><?php echo $getmustahiqinfo['gender']?></td>
<td><?php echo $getmustahiqinfo['contact_number']?>  </td>
<td><?php echo $getmustahiqinfo['Remarks']?>  </td>


</tr>

<?php 
$i++;
}
}
?>



</tbody>

</table>
<br>
<?php  $getlzc_id = $this->uri->segment(3);?>
<!-- District Code/LZC Code(User Id)/No. of Persons ---- Printed On  :       Printed By:-->
<pre>System generated document in accordance with ZMIS/<strong><?php echo $userid; ?></strong>/<strong><?php echo $getlzc_id; ?>/<?php echo $i-1; ?></strong>(Printed On:<?php echo date("Y-m-d H:i:s");?>/Printed By:<strong><?php echo $district_name; ?></strong>)/ZMIS V2.0 
* Errors & omissions excepted
<!--<img src="<?php //echo base_url(); ?>assets/images/zmis-2318-18.jpeg" alt="ZHMIS" class="brand-image img-rectangle" >-->
</pre>
</body>
</html>
<script>

function ExportToExcel(type, fn, dl) {
var elt = document.getElementById('tbl_exporttable_to_xls');
var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
return dl ?
XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
XLSX.writeFile(wb, fn || ('LZ-11 list of <?php echo $getlzc_name; ?>.' + (type || 'xlsx')));
}

</script>