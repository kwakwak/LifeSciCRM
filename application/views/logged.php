 <div id="logged">
 Welcome <?php if ($this->session->userdata('level')=="Team") echo "<b>Team</b> Member "; ?>
 <a class='link' href="<?php echo site_url('user');?>"> 
 	<?php echo $this->session->userdata('name'); ?> 
 </a> - 
 <a href="<?php echo site_url('user/logout');?>">Logout</a> - 
 <a href="<?php echo site_url('calls/open');?>">Open Calls</a> - 
 <a href="<?php echo site_url('user/newCall');?>">New Call</a>
</div>
