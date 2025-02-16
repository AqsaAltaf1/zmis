<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$selectqry_zakat = $this->db->select('*')->from('head_wise_fund')->where('account_head','Regular Zakat Fund')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_RZF = $selectqry_zakat->row('amount_allocated');

$totalRZFMerged = 246295400;
$totalRZFSettled = $total_RZF - $totalRZFMerged;
$RZF_nf = number_format($totalRZFSettled,2);






//$this->db->last_query();


//Settled District Population
$getSettledPopulation = $this->db->select_sum('population')->from('district_shares')->where('districtType','Settled')->where('status',1)->get();
$settledPopulation = $getSettledPopulation->row('population');
 $settledPopulation_nf = number_format($getSettledPopulation->row('population'),2).'<br>';

//Merged District Population
$getMergedPopulation = $this->db->select_sum('population')->from('district_shares')->where('districtType','Merged')->where('status',1)->get();
$mergedPopulation = $getMergedPopulation->row('population');
 $mergedPopulation_nf = number_format($getMergedPopulation->row('population'),2);
//Zakat Head Percentage 
$zakatPercentage = $this->db->query("SELECT * FROM `year_installment` WHERE `financial_Year` = '".$getfinancial_year."' AND `installment` = '".$getfinancial_installment."'  AND `status` = 1");
$percentage = $zakatPercentage->result_array();
/*echo $this->db->last_query();
echo "<pre>";
print_r($percentage);
echo "</pre>";
echo "sss";*/

$gaPercentage = $percentage[0]['ga_percentage'];
$maPercentage = $percentage[0]['ma_percentage'];
$dmPercentage =$percentage[0]['dm_percentage'];
$hcPercentage =$percentage[0]['hc_percentage'];
$esPercentage =$percentage[0]['es_percentage'];
$espPercentage =$percentage[0]['esp_percentage'];




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

<div class="row" style="display: none;">
	
<!-- /.col -->
<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-hands-helping"></i></span>
<div class="info-box-content">
<span class="info-box-number">Guzara Allowance</span>
<span class="info-box-number" style="color: green;">
Percentage: <h7 style="color: black;"><?php echo $ga_percent."%";?></h7></span> 
<span class="info-box-number" style="color: blue;">
Amount: <h7 style="color: black; font-size: 13px;">

<?php 
$ga_percent_amount = $ga_percent/100;
$GA_68 = $total_RZF * $ga_percent_amount;
echo $GA_nf = number_format($GA_68,1); 
?>

</h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="fas fa-restroom"></i></span>
<div class="info-box-content">
<span class="info-box-number">Marriage Assistance</span>
<span class="info-box-number" style="color: green;">
Percentage: <h7 style="color: black;"><?php echo $ma_percent."%";?> </h7></span> 
<span class="info-box-number" style="color: blue;">
Amount: <h7 style="color: black; font-size: 13px;">

<?php 
$ma_percent_amount = $ma_percent/100;
$MA_12 = $total_RZF * $ma_percent_amount;
echo $MA_nf = number_format($MA_12,1); 
?>

</h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-info"><i class="fas fa-mosque"></i></span>
<div class="info-box-content">
<span class="info-box-number">Deeni Madaris</span>
<span class="info-box-number" style="color: green;">
Percentage: <h7 style="color: black;"><?php echo $dmPercentage."%";?></h7></span> 
<span class="info-box-number" style="color: blue;">
Amount: <h7 style="color: black; font-size: 13px;">

<?php 
$dm_percent_amount = $dmPercentage/100;
$DM_08 = $totalRZFSettled * $dm_percent_amount;
echo $DM_nf = number_format($DM_08,1); 
?>

</h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-school"></i></span>
<div class="info-box-content">
<span class="info-box-number">Edu-Stipend(A)</span>
<span class="info-box-number" style="color: green;">
Percentage: <h7 style="color: black;"><?php echo $esPercentage."%";?> </h7></span> 
<span class="info-box-number" style="color: blue;">
Amount: <h7 style="color: black; font-size: 13px;">

<?php 
$es_percent_amount = $esPercentage/100;
$ES_08 = $totalRZFSettled * $es_percent_amount;
echo $ES_nf = number_format($ES_08,1); 
?>

</h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="fas fa-university"></i></span>
<div class="info-box-content">
<span class="info-box-number">Edu-Stipend(P)</span>
<span class="info-box-number" style="color: green;">
Percentage: <h7 style="color: black;"><?php echo $esp_percent."%";?> </h7></span> 
<span class="info-box-number" style="color: blue;">
Amount: <h7 style="color: black; font-size: 13px;">

<?php 
$esp_percent_amount = $esp_percent/100;
$ESP_04 = $total_RZF * $esa_percent_amount;
echo $ESP_nf = number_format($ESP_04,1); 
?>

</h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-lg-4 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-info"><i class="fas fa-hospital"></i></span>
<div class="info-box-content">
<span class="info-box-number">Health Care</span>
<span class="info-box-number" style="color: green;">
Percentage: <h7 style="color: black;"><?php echo $hcPercentage."%";?></h7></span> 
<span class="info-box-number" style="color: blue;">
Amount: <h7 style="color: black; font-size: 13px;">

<?php 
$hc_percent_amount = $hcPercentage/100;
$HC_8 = $totalRZFSettled * $hc_percent_amount;
echo $HC_nf = number_format($HC_8,1); 
?>

</h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<!--  <div class="col-12 col-sm-6 col-md-2">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-text" >PZA Balance</span>
<span class="info-box-number">
0.00
0
<small>%</small>
</span>
</div>
</div>
</div> -->


</div>



<h3 align="center">
Share in Zakat Fund of Each District Based on Population (Provincial Level) For F/Y <strong><?php echo $getfinancial_year;?></strong>
</h3>



<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>District Name</th>  
<th>Popu-Ratio</th>
<th>GA-NOBs</th>
<th>MA-NOBs</th>
<th>GA</th>
<th>MA</th>
<th>DM</th>
<th>ES</th>
<th>HC</th> 
<th>Total</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($getSettledDistrictShares))
{
foreach($getSettledDistrictShares as $settledDistrictShares)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $settledDistrictShares['district_name'].'<br>';
echo $population = $settledDistrictShares['population']; ?></td>
<td><?php echo $populationRatio = $settledDistrictShares['populationRatio']; ?></td>
<td> 
<?php  
/*$population_percent = $population * 100;
$dist_ratio = $population_percent/$total_population;
echo round($dist_ratio,1)."%";*/
echo $guzaraNOB = $settledDistrictShares['NOB']; 
?>
</td>
<td><?php echo $marriageNOBs =  $settledDistrictShares['marriageNOB'];?> </td>
<td>
<?php 
$settledDistrictGAShare = $guzaraNOB * 12000;
echo number_format($settledDistrictGAShare);
?> 
</td>
<td>
<?php 
$settledDistrictMAShare = $marriageNOBs * 30000;
echo number_format($settledDistrictMAShare);
?>  
</td>
<td>
<?php 
$settledDistrictDMRatio = $populationRatio /100;
$settledDistrictDMShare = floor((($settledDistrictDMRatio* $DM_08)/1000))*1000;
echo $dist_DM_amount_nf =number_format($settledDistrictDMShare);

?> 
</td>
<td>
<?php 
$settledDistrictESRatio = $populationRatio/100;
$settledDistrictESShare = floor((($settledDistrictESRatio * $ES_08)/1000))*1000;
echo $dist_ES_amount_nf =number_format($settledDistrictESShare);
?> 
</td>

<td>
<?php 
$settledDistrictHCRatio = $populationRatio/100;
$settledDistrictHCShare = floor((($settledDistrictHCRatio * $HC_8)/1000))*1000;
echo $dist_HC_amount_nf =number_format($settledDistrictHCShare);
?> 
</td>
<td>

<?php 
$districtWiseSettledFund = $settledDistrictGAShare + $settledDistrictMAShare + $settledDistrictDMShare +$settledDistrictESShare + $settledDistrictHCShare; 
echo $total_fund_nf = number_format($districtWiseSettledFund);
?> 

</td>



<td>

<?php
$this->db->select("*");
$this->db->from("district_payment");
$this->db->where("district_id",$settledDistrictShares['id']);
$this->db->where("financial_year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$query=$this->db->get();
if($query->num_rows()>0)
{
?>
<button class="btn btn-success">Fund Allocated</button>
<?php
}
else
{
?>
<button class="btn btn-danger">Not-Allocated</button>
<?php	
}
?>   

</td>
</tr>



<div class="modal fade bs-example-modal-lg<?php echo $i;?>" id="allocation_form" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Allocate Fund to District (Provincial Level)</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form action="<?php echo base_url(); ?>Pza_District_shares/manage_district_payment" method="post" enctype="multipart/form-data" onsubmit="return validateForm(<?php echo $i;?>)" name="district_allocation">

<!-- <div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>
<input type="text" name="pza_budget" id="pza_budget" value="<?php echo $selectqry_zakat->row('amount_allocated');?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div> -->

<div class="row form-group">
<label class="col-md-3" for="check">Selected District<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="district" name="district">
<option value="<?php echo $getdistricts['id'];?>"><?php echo $getdistricts['district_name'];?></option>
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installment" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Payment for Guzara Allowance <span class="required">*</span> </label>

<input type="number" name="GA" id="ga" value="<?php echo round($dist_GA_amount);?>" required class="form-control col-md-8 col-xs-12" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Payment for Marriage Assistance <span class="required">*</span> </label>
<input type="number" name="MA" id="ma" value="<?php echo round($dist_MA_amount);?>" required class="form-control col-md-8 col-xs-12" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Deeni Madaris <span class="required">*</span> </label>
<input type="number" name="DM" id="dm" value="<?php echo round($dist_DM_amount);?>" required class="form-control col-md-8 col-xs-12" readonly> 
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Health Care <span class="required">*</span> </label>

<input type="number" name="HC" id="hc" value="<?php echo round($dist_HC_amount);?>" required class="form-control col-md-8 col-xs-12"  readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Educational Stipend (Academic) <span class="required">*</span> </label>

<input type="number" name="ESA" id="esa" value="<?php echo round($dist_ESA_amount);?>" required class="form-control col-md-8 col-xs-12" readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Educational Stipend (Professional) <span class="required">*</span> </label>

<input type="number" name="ESP" id="esp" value="<?php echo round($dist_ESP_amount);?>" required class="form-control col-md-8 col-xs-12" readonly>
</div>

<?php 
 $district_id = $getdistricts['id'];
$get_dist_admin_expense = $this->db->select_sum('admin_expns')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();

$dist_admin_expense = $get_dist_admin_expense->row('admin_expns');

$get_total_admin_expense = $this->db->select('*')->from('head_wise_fund')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('account_head','Adminnistrative_Expenses')->where('status',1)->get();

$total_admin_expense = $get_total_admin_expense->row('amount_allocated');
$net_admin_balance = $total_admin_expense - $dist_admin_expense;

?>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Admin Expense Budget <span class="required">*</span> </label>

<input type="number" name="admin_budget" id="admin_budget" required class="form-control col-md-8 col-xs-12" value="<?php echo $net_admin_balance;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Administrative Expenditure <span class="required">*</span> </label>

<input type="number" name="admin_expns" id="admin_expns_values<?php echo $i;?>" required class="form-control col-md-8 col-xs-12" min="1" max="<?php echo $net_admin_balance;?>">
</div>

<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:10px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" type="reset">Reset</button>
<div class="col-md-3"></div>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>

</div>

</form>
</div>
</div>
</div>
</div>


<?php
$i++;
}
}
?>
</tbody>

</table>

</body>
</html>
