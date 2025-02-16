<?php
//error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');



?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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

</style>


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
    <td width="56%"><h4 class="card-title">Guzara Allowance Paid Mustahiqeen List of District <br />
	District :  <strong><?php echo  $district_name;?></strong>
    </h4></td>
    <td width="22%">Dated : <?php echo date("d-m-Y");?></td>
  </tr>
</table>






<br />
<div class="card-body">
<table width="" class="table table-bordered table-striped" id="tbl_exporttable_to_xls">
<thead>
<tr>
<th>S#</th>
<th>Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Mobile</th>
<th>Category</th>
<th>LZC</th>
<th>Bank</th>
<th>A/C#</th>
<th>Cheque#</th>
<th>Amount</th>
<th>Date</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_paid_mustahiqeen))
{
foreach($get_paid_mustahiqeen as $getmustahiqinfo)
{
?>

<tr>
<td><?php echo $i;?></td>
<td><?php echo $getmustahiqinfo['mustahiq_name'];?></td>
<td><?php echo $getmustahiqinfo['father_name'];?></td>
<td><?php echo $getmustahiqinfo['mustahiq_cnic'];?></td>
<td><?php echo $getmustahiqinfo['contact_number'];?></td>
<td><?php echo $getmustahiqinfo['category'];?></td>
<td><?php echo $getmustahiqinfo['LZCActualName'];?></td>
<td><?php echo $getmustahiqinfo['bank_name'];?></td> 
<td><?php echo $getmustahiqinfo['account_number'];?></td>
<td><?php echo $getmustahiqinfo['cheque_number'];?></td>
<td><?php echo $getmustahiqinfo['payment_amount'];?></td>
<td><?php echo $getmustahiqinfo['add_date'];?></td>
</tr>
<?php 
$i++;
}
}
?>
</tbody>
</table> 
</div>




<div id="footer" style="display:none;">
<p align="center">
Copyright © 2020-21 Zakat & Ushr Department Khyber Pakhtunkhwa. All rights reserved
</p>
</div>




<script>

function ExportToExcel(type, fn, dl) {
var elt = document.getElementById('tbl_exporttable_to_xls');
var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
return dl ?
XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
XLSX.writeFile(wb, fn || ('GA Paid Mustahiqeen list of <?php echo $district_name;?>.' + (type || 'xlsx')));
}

</script>
