
 <?php 

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

 ?>
<a href="index3.html" class="brand-link">
<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="ZHMIS" class="brand-image img-circle ">
<!-- style="opacity: 1" -->
<span class="brand-text"><strong><?php echo $district_name;?></strong>-Admin</span>
</a>
