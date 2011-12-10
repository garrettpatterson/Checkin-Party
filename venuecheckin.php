<?php
//error_reporting(E_ALL);
require_once('prizes.php');
$email = $_GET['email'];
$uid =  $_GET['uid'];

$db = new PDO('sqlite:db/party.db');


//$venues = $dbv->query('select id, name from venue');

if(isset($_GET['uid'])){
	//echo 'select id, email from user where id =' . $uid . ';';
		$uq = $db->query('select id, email from user where id =' . $uid . ';');
		$user = $uq->fetch();
		$email = $user['email'];
}
	

$venues = $db->query('select id, name from venue');
//echo 'postback???'. $_POST['postback'];
if($_POST['postback']=='checkin'){
	$venueid = $_POST['pickvenue'];
	$email = $_POST['email'];
	$userid = $_POST['uid'];

	$pw = $_POST['password'];
	//set your admin password here
	if($pw == 'AdminPass'){
		echo 'doooo it for user: id=' . $userid . ',email=' . $email;
		$db->exec('insert into checkin(venueid,userid) select distinct '.$venueid.', u.id from user u where u.id = '.$userid.' OR email = "'.$email.'";');
		//$dbu = new PDO('sqlite:db/party.db');
		//$dbu->exec('Update user Set email = "'.$email.'" where id="'.$userid.'" and email != "'.$email.'";');		
		$query = "Update user Set email = '".$email."' where id='".$userid."' AND ( email is null OR email != '".$email."');";
		
		$db->exec($query);
		//echo 'update user set email = "'.$email.'" where id='. $userid . ' and (email is null OR email != "'.$email.'");';
		setcookie('venuecheckin',$venueid,time()+7200,'/');
		setcookie('venue_pass',$pw,time()+7200,'/');
		echo 'checked in! <a href="#chooser">Back</a>';
	
		//return;
	}else{
		//bad password
	}
}else{
	//fresh load


}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Untitled 1</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.css" />
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
</head>


<body>
		<script language="javascript">
		
		prizeshow = false;
	</script>
<div data-role="page" id="chooser" data-ajax="false">
	<div data-role="header">
		<h1>Venue Checkin</h1>
	</div><!-- /header -->

	<div data-role="content">
	<form action="venuecheckin.php#success" data-ajax="false" name="checkin" method="post">
		<div data-role="fieldcontain">
		<label for="pickvenue">What Venue Is This?:</label>
		
		<select name="pickvenue" id="pickvenue">
		<?php
			foreach($venues as $venue){
				$selected = '';
				if($_COOKIE['venuecheckin'] == $venue['id']){
					$selected = 'selected';
				}
				echo('<option value="'. $venue['id'] . '" '. $selected .' >' . $venue['name'] . '</option>');
			
			
			}
		?>
				</select>
		</div>
		<div data-role="fieldcontain">
			<label for="email">
				You're checking in:
			</label>
			<input type="email" name="email" id="email" value="<?php echo $email ?>" />
			
		</div>
		<div data-role="fieldcontain">
			<label for="password">
				Venue Admin password:
			</label>
			<input type="password" name="password" value="<?php echo $_COOKIE['venue_pass']; ?>" id="password" />
		</div>
		<input type="hidden" name="postback" value="checkin" />
		<input type="hidden" name="uid" value="<?php echo $uid ?>" />
		<button type="submit">Check In</button>
		</form>


		
	</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->

</div>
<div data-role="page" id="success">
	<div data-role="header">
		<h1>Check in Successful</h1>
	</div><!-- /header -->
<div data-role="content">
<a href="#chooser">Check in new person</a>
	</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->

</div>


<script language="javascript">

//$(document).ready(function(){
$('#success').live('pageshow',function(){
<?php
if(randomPrize($db,$email,$venueid)){
	$prizetype='random';
?>
window.setTimeout(function(){
if(!prizeshow){
	$.mobile.changePage("#prize","pop",false,false);
	prizeshow = true;
}
},1);
<?php
	
}

?>

//$.mobile.changePage( "#prize", 'pop',false,true );	

});

</script>
<div data-role="dialog" data-inlin="true" id="prize">
		<div data-role="header">
		<h1>WINNER!</h1>
	</div><!-- /header -->
			<div data-role="content" data-theme="b" data-content-theme="b" style="text-align: center">
			<?php
			if($prizetype=='random'){
				$v = $db->query('select name from venue where id = '. $venueid . ';');
				$vn = $v->fetch();
				echo '<h3>'.$email.' won a random check-in prize at '.$vn['name'].'!</h3>';
			}else{
				echo '<h3>'.$email.'is one of the first 25 to check in at all stations, show one of the party officiants in Chinook to get your prize!</h3>';
			}
			?>
			<h3>A 5$ Starbucks card</h3>
			<img src="http://www.starbucks.com/static/images/global/logo.png" />
			<p>
				Please show the person manning the station to receive your prize
				
			</p>
		</div>
		<div data-role="footer">
		<a href="#success">Continue</a>
	</div><!-- /footer -->

</div>
</body>

</html>
