<div id="body">
<h3>LogIn </h2>
<?php
		echo 'Welcome '.$level.'!';
		echo validation_errors();
		echo form_open();
		echo form_label('Full Name ', 'name');
		echo form_input('name',set_value('name')). "<br/>";
		echo form_label('Password ', 'password');
		echo form_password('password'). "<br/>";
		echo form_submit('send', 'Send!');
		echo form_close();
?>
<br/>
<a href="<?php echo site_url('welcome/new_user');?>">Sign in! </a>
</div>