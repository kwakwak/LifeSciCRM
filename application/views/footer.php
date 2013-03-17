

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds   
	<?php 
		if ($this->session->userdata('level')=="")
			echo "| <a href='" . site_url('welcome/team') ."''>Team Login</a></p>";
	?>
</div>

</body>
</html>