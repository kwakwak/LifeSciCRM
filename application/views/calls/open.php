 <div id="body">
 	<h3>Open Calls</h3>
<?php
foreach ($openArray as $row)
{
	echo $row->title .
		 ' | '.
		 $row->body .
		 ' | '.
		 $row->call_time .
		 '<br>' ;
}
?>

</div>
