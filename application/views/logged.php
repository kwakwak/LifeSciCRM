 <div id="logged">
<?php

	$hidden = array('action' => 'logout');
	echo form_open('user', '', $hidden);

		$segments = array('user',
					      'profile',
					       $this->session->userdata('id')
					     );

		echo "Welcome <a class='link' href='" . site_url($segments) ."'>";
		echo $this->session->userdata('name');
		echo "</a></span> - ";
		$attributes = array(
		    'class' => 'link',
		);

		echo form_submit($attributes,'Log me out!');

	echo form_close();

?>

</div>
