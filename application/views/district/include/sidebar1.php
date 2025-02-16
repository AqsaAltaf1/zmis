<?php
$user_type = $this->session->userdata('user_type');
if($user_type == "audit")
{
?>
<?php include('sidebar_audit.php');?>
<?php
}
else
{
?>
<?php include('sidebar_district.php');?>
<?php	
}
?>