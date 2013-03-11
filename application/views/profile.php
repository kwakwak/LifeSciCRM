<div id="body">
<?php
echo "<b>location:</b>" . $building . " " . $room_num . "<br/>";
echo "<b>phone:</b>" . $phone . "<br/>";
echo "<b>email:</b>" . safe_mailto($email) . "<br/>";
?>
</div>