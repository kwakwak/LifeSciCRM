

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds |  
	<?php if empty(this->session->userdata('level')) {?>
		<a href="<?php echo site_url('welcome/team');?>">Team Login</a></p>
	<?php } ?>
</div>

</body>
</html>