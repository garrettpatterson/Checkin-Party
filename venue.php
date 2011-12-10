<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Untitled 1</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.css" />
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<link rel="stylesheet" href="style.css" />
</head>

<?php
$email = $_COOKIE['email'];
$venue = '';

if(is_null($email)){
	header('Location: start.php?return=' . $_REQUEST['venue']);
}else{

	$venue = $_REQUEST['venue'];

	$db = new PDO('sqlite:db/party.db');
	$query = $db->query('select id, name, description, funfact, image from venue where name="'.$venue.'"');
//	$cnt = count($query ->fetchAll());
	$row = $query->fetch();
	//echo 'count:' . $cnt;
	if(!is_null($row) || is_null($row['id'])){
		$venueid = $row['id'];
	}else{
		header('Location: venuecheckin.php');
	}
}



?>
<body>
<div data-role="page" id="checkin">
	<div data-role="header">
		<h1><?php echo $row['name'] ?> - Check in!</h1>
	</div><!-- /header -->

	<div data-role="content">
	<form name="checkin" action="checkin.php#success" data-ajax="false" method="post">
		<p><?php echo $row['description'] ?></p>
		<p><em><?php echo $row['funfact'] ?></em></p>
		<?php echo $email . ' you\'re at: '. $venue; ?>
		<input type="hidden" name="email" value="<?php echo $email ?>"/>
		<input type="hidden" name="venue" value="<?php echo $venueid  ?>"/>
		<button type="submit" name="submit" value="submit-value">Check In</button>
		
		</form>
	</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->

</div>

<div data-role="page" id="success">
	<div data-role="header">
		<h1>You're Registered!</h1>
	</div><!-- /header -->

	<div data-role="content">
		Head to the next spot:
		<ul>
		<li>Chinook</li>
		<li>Keg.io</li>
		<li>Cloud Drinks</li>
		
		</ul>
	</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->

</div>

</body>

</html>

