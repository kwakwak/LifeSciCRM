<?php
		echo form_open();
		echo form_input('name');
		echo form_password('password');
		echo form_submit('mysubmit', 'Submit Post!');
		echo form_close();
?>