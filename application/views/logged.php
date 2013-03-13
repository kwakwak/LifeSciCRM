 <div id="logged">
 Welcome 
 <a class='link' href="<?php echo site_url('user/index/'. $this->session->userdata('id') );?>"> 
 	<?php echo $this->session->userdata('name'); ?> 
 	<?php echo $this->session->userdata('level'); ?>
 </a> - 
 <a href="<?php echo site_url('user/logout');?>"> Logout! </a>
</div>
