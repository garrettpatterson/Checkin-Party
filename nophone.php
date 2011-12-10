<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Untitled 1</title>
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>

</head>

<body>
<?php

if(isset($_COOKIE['email'])){

	$email = $_COOKIE['email'];
	echo '<h1> Party Pass</h1>'
	?>
	<script language="javascript">
	document.write('<img src="http://chart.googleapis.com/chart?chs=400x400&cht=qr&chl=' + encodeURIComponent( 'http://www.vivakiparty.com/venuecheckin.php?email=<?php echo $email ?> ') + '" />');
	</script>
	<?php
}

?>
<p>
	Print this and bring it along with you if you're <strong>Not using your smartphone</strong>.  Show this at each station to have it scanned, and be eligible for PRIZES!!!
	
</p>
</body>
</html>