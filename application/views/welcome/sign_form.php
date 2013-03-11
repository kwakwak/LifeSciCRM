<div id="body">
<h3>Sign In </h2>
<?php
		echo validation_errors();
		echo form_open();
		echo form_label('Full Name ', 'name');
		echo form_input('name',set_value('name')). "<br/>";
		echo form_label('Password ', 'password');
		echo form_password('password'). "<br/>";
		echo form_label('Password Confirmation ', 'passconf');
		echo form_password('passconf'). "<br/>";
		echo form_label('Phone Number ', 'phone');
		echo form_input('phone',set_value('phone')). "<br/>";
		echo form_label('Building Name ', 'building');
		echo form_input('building',set_value('building')). "<br/>";
		echo form_label('Room Number ', 'room_num');
		echo form_input('room_num',set_value('room_num')). "<br/>";
		echo form_label('Email ', 'email');
		echo form_input('email',set_value('email')). "<br/>";
		echo form_submit('send', 'Send!');
		echo form_close();
?>
</div>