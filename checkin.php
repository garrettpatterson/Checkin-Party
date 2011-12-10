<?php
	error_reporting(E_ALL);
	$email = $_COOKIE['email'];
	$venueid = $_REQUEST['venue'];
	$prizetype = 'none';
	echo 'VENUE ID=' . $venueid;
?>
<?php
require_once('prizes.php');
?>
<?php


	$db = new PDO('sqlite:db/party.db');

	$insert = $db->exec('insert into checkin(venueid, userid) select ' . $venueid . ', u.id from user u where u.email = "'. $email . '";');
	echo 'insert into checkin(venueid, userid) select ' . $venueid . ', u.id from user u where u.email = "'. $email . '";';
	echo 'select id, name from venue where id not in(select distinct venueid from checkin c join user u on u.id = c.userid where userid = "'.$email.'";)';
	$venuesleft = $db->query('select id, name from venue where id not in(select distinct venueid from checkin c join user u on u.id = c.userid where email = "'.$email.'");');




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
<link rel="stylesheet" href="style.css" />
<style type="text/css">

	
</style>
</head>

<body>
	<script language="javascript">
		
		prizeshow = false;
	</script>
	
<div data-role="page" id="success">
	<div data-role="header">
		<h1>Checked in!</h1>
	</div><!-- /header -->

	<div data-role="content">
		<?php
			if($venuesleft!=null){
				$venuesleft = $venuesleft->fetchAll();
			}else{
				$venuesleft = 100;
			}
			//echo 'venuesleft:' .count( $venuesleft);
			if(count($venuesleft)> 0){
		?>
		Places left to visit (visit in ANY ORDER):

		<ul data-role="listview" data-inset="true">
		<?php
			foreach($venuesleft as $venue){
				echo('<li><a data-ajax="false" href=venues.php#' . $venue['name'] . '>'  . $venue['name'] . '</a></li>');
			
			
			}
		?>
		
		</ul>
		<?php
			}else{
				
		?>
			<h2>Congratulations!</h2>
			<p>You've visited all the stations and entered yourself to win one of 3 grand prizes: $50 Amazon gift Card</p>
			
		<?php
				if(finishPrize($db,$email,$venueid)){
					$prizetype='final';
					?>
					<script language="javascript">
						$('#success').live('pageshow',function(){
							window.setTimeout(function(){
							if(!prizeshow){
								$.mobile.changePage("#prize","pop",false,false);
								prizeshow=true;
							}
							},10)
						});
					</script>
					<?php
					
					
					
					
					
				}

			}
		
		?>
	</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->
</div>
<?php
if(count($venuesleft) >0 && randomPrize($db,$email,$venueid)){
	$prizetype='random';
?>
<script language="javascript">

//$(document).ready(function(){
$('#success').live('pageshow',function(){

window.setTimeout(function(){
if(!prizeshow){
	$.mobile.changePage("#prize","pop",false,false);
	prizeshow = true;
}
},1);


//$.mobile.changePage( "#prize", 'pop',false,true );	

});

</script>
<?php
	
}

?>
<div data-role="dialog" data-inlin="true" id="prize">
		<div data-role="header">
		<h1>WINNER!</h1>
	</div><!-- /header -->
			<div data-role="content" data-theme="b" data-content-theme="b" style="text-align: center">
			<?php
			if($prizetype=='random'){
				$v = $db->query('select name from venue where id = '. $venueid . ';');
				$vn = $v->fetch();
				echo '<h3>You\'ve won a random check-in prize at '.$vn['name'].'!</h3>';
			}else if($prizetype=='final'){
				echo '<h3>You\'re one of the first 25 to check in at all stations, show one of the party officiants in Chinook to get your prize!</h3>';
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
