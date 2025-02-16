
 <?php 

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

 ?>
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><strong><?php echo $district_name;?></strong>-Admin</a>
        </div>
      </div>