<html>
	<head></head>
	<body>
<?php

$db = new PDO('sqlite:db/party.db');
$us = $db->query('select id from user where email is null');

$i = 1;
foreach($us as $u){
echo '<strong>User #'. $i .  '</strong><br />';
echo '<img src="http://chart.googleapis.com/chart?chs=200x200&cht=qr&chl='.urlencode('http://www.vivakiparty.com/venuecheckin.php?uid=' . $u['id']). '" /><br /><br /><hr />';
$i++;
}


?>





</body>
	
</html>