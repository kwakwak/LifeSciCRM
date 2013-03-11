<?php

	$segments = array('user',
				      'profile',
				       $this->session->userdata('id')
				     );

	echo "<a href='" . site_url($segments) ."'>";
	echo $this->session->userdata('name');
	echo "</a>";


	$hidden = array('action' => 'logout');
	echo form_open('user', '', $hidden);
	echo form_submit('mysubmit', 'Logout!');
	echo form_close();
?>