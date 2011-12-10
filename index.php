
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Checkin  Party</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.css" />
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<div data-role="page" id="start">

	<div data-role="header">
		<h1>Checkin  Party</h1>
	</div><!-- /header -->

	<div data-role="content">
		<h2>Wednesday, December 7th - 3:00pm</h2>
		<div data-role="" data-theme="b" data-content-theme="b">
			<h3>Party Prizes</h3>
			<ul>
				<li>First 40 to arrive will get a special prize</li>
				<li>First 25 to check in at all stations will get a $5 Starbucks Card</li>
				<li>5 Random $5 Starbucks Card winners at each station</li>
				<li>GRAND PRIZE - Checking in at all stations will make you eligible for 3 $50 Amazon gift cards</li>
				
			</ul>
		</div>
		<h3>How To Play</h3>
		<ol>
			<li>Bring your smartphone loaded with a Barcode/QR scanning app</li>
			<li>Sign-up, either <a href="#prereg" data-inlin="true" data-icon="info" data-iconpos="notext" data-theme="a" data-rel="dialog" >pre-register (from your smartphone)</a>, or sign up on the day of.</li>
			<li>Check in at <a data-ajax="false" href="venues.php">Stations</a> - IN ANY ORDER YOU WISH</li>
			<li>Win Prizes, play games, drink and eat!</li>
			
		</ol>

</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->

</div>
<div data-role="page" id="prereg">
		<div data-role="header">
		<h1>Checkin Party</h1>
	</div><!-- /header -->

	<div data-role="content" style="background: white; color: black;text-shadow: none;text-align: center">
		<h3>For best results, please use your smartphone to pre-register</h3>
<img src="http://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http%3A%2F%2Fwww.vivakiparty.com%2Fstart.php%23start" /><br />
<h3>On your phone already?  Click the button below:</h3>
<a data-role="button" href="start.php?prereg=true" data-ajax="false">Preregister</a>
<h3>I don't have a smart phone/QR scanner:</h3>
<a data-role="button" href="start.php?prereg=true&nophone=true" data-ajax="false">Preregister - No Phone</a>
</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->
</div>


</body>
</html>