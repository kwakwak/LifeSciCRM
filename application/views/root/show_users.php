 <div id="body">
<?php
foreach ($usersArray as $row)
{
	if ($row->level==1) 
		echo '<b>Team</b> | ';

	echo mailto($row->email,$row->name) .
		 ' | '.
		 $row->phone .
		 ' | '.
		 $row->building .
		 ' ' .
		 $row->room_num .
		 '<br>' ;
}
?>
</div>
