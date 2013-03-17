 <div id="body">

<?php
if ($status==0)
	echo '<h3>Open Calls</h3>';
elseif ($status==1) {
	echo '<h3>Closed Calls</h3>';
}

foreach ($openArray as $row)
{
	echo $row->title .
		 ' | '.
		 $row->body .
		 ' | '.
		 $row->call_time ;

	if ($status==0)
		echo ' | <a href="' .
		  site_url('calls/closeCall/'.$row->id ).
		   '">Close Call</a>' ;
	echo '<br/>';
}
?>

</div>
