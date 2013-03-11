<?php
	echo $this->session->userdata('name');
	echo $this->session->userdata('id');

	$hidden = array('action' => 'logout');
	echo form_open('', '', $hidden);
	echo form_submit('mysubmit', 'Logout!');
	echo form_close();
?>