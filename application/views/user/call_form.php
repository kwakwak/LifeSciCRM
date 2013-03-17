<div id="body">

<?php
		echo validation_errors();
		echo form_open();
		echo form_label('Title ', 'title');
		echo form_input('title',set_value('title')). "<br/>";
		echo form_label('Body ', 'body');
		echo form_input('body',set_value('body')). "<br/>";

		echo form_submit('send', 'Send!');
		echo form_close();
?>
<br/>

</div>