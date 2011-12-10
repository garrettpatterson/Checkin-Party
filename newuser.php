<?php

$email = $_REQUEST['email'];
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$prereg = isset($_POST['prereg'])==true&& $_POST['prereg'] =='true'?1:0;
$nophone = isset($_POST['nophone'])==true&& $_POST['nophone'] =='true'?1:0;
$result = '';

//echo "prereg:" . $prereg;
//echo "nophone:" . $nophone;


if(is_null($email) || $email == ""){

	$result .= '<div data-role="page" id="error">'
	
		. 'Invalid email <a href="start.php#start">try again</a>'
	
	. '</div>';
}else{ 
	$cookie = setcookie('email',$email, time() + 60*60*24*7,'/');
	$db = new PDO('sqlite:db/party.db');
	//echo 'email:' .'select id from user where email = "'. $email . '";';
	$user = $db->query('select id from user where email = "'. $email . '";');
	//echo 'count($user->fetchAll()):' .count($user->fetchAll());
	$cnt = count($user->fetchAll());
	if($cnt==0){
		//echo 'insert into user(email,first_name,last_name,prereg,nophone) values("'. $email . '","'.$firstname .'","'.$lastname.'",'.$prereg.', '.$nophone.');';
		try{
			$newuser = $db->exec('insert into user(email,first_name,last_name,prereg,nophone) values("'. $email . '","'.$firstname .'","'.$lastname.'",'.$prereg.', '.$nophone.');');
			
		}catch(PDOException $e){
			echo $e;
		}
	}
	
	if(isset($_REQUEST['return']) && $_REQUEST['return'] > ""){
		//echo("return???". isset($_REQUEST['return']).':'. $_REQUEST['return']);
		header('Location: venue.php?venue=' . $_REQUEST['return']);
	}
	$venues = $db->query('select id, name from venue;');
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Signup</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.css" />
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<div data-role="page" id="success">
	<div data-role="header">
		<h1>You're Registered!</h1>
	</div><!-- /header -->

	<div data-role="content">
	<!--<?php echo $_COOKIE['email'] . $cookie . ' :fucking cookie!'; ?>-->
	
		<?php 
		//echo 'isset?:' . isset($POST_['nophone']) . ', setto:' . $_POST['nophone'];
		
		if(isset($_POST['nophone']) && $_POST['nophone']=='true'){
			
			echo '<h2> Party Pass for:'.$email.'</h2>';
			echo '<img src="http://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . rawurlencode('http://www.vivakiparty.com/venuecheckin.php?email='. $email) . '" />';
			?>
			
			<p>
	Print this and bring it along with you if you're <strong>Not using your smartphone</strong>.  Show this at each station to have it scanned, and be eligible for PRIZES!!!
	
</p>
			
			<?php
			
			
			
		}else{
			
			?>
		<ul data-role="listview">
		<li data-role="list-divider" role="heading">Head to the next spot:</li>
		<?php
		foreach($venues as $venue){
			echo '<li><a href="venues.php#' . $venue['name'] . '" data-ajax="false">'. $venue['name'] .'</a></li>';	
		}
		?>
		</ul>
		<?php
		} 
		?>
</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->

</div>
<?php
}

echo $result;
?>
</body></html>