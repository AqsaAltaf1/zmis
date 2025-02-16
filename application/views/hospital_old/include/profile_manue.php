
 <?php 

$userid = $this->session->userdata('id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');


 ?>
<a href="index3.html" class="brand-link">
<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="ZHMIS" class="brand-image img-circle ">
<!-- style="opacity: 1" -->
<span class="brand-text font-weight-light">ZHMIS-<strong><?php echo $hospital_name;?></strong></span>
</a>
