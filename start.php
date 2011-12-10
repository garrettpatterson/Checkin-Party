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
</head>

<body>

<div data-role="page" id="start">

	<div data-role="header">
		<h1>Register to play!</h1>
	</div><!-- /header -->

	<div data-role="content">
	<form action="newuser.php" id="register" method="post" data-ajax="false">
<div data-role="fieldcontain">
<label for="email">Email:</label>
<input type="email" name="email" id="email" required="required" class="required email"/>
</div>
<div data-role="fieldcontain">
<label for="firstname">First Name:</label>
<input type="text" name="firstname" id="firstname"/>
</div>

<div data-role="fieldcontain">
<label for="lastname">Last Name:</label>
<input type="text" name="lastname" id="lastname"/>
</div>

<input type="hidden" name="postback" value="register" />
<input type="hidden" name="return" value="<?php echo $_REQUEST['return'] ?>" />
<input type="hidden" name="prereg" value="<?php echo isset($_GET['prereg'])?$_GET['prereg']:'false'; ?>" />
<input type="hidden" name="nophone" value="<?php echo isset($_GET['nophone'])?$_GET['nophone']:'false'; ?>" />
<?php if(isset($_GET['nophone']) && $_GET['nophone'] = "true"){ ?>
<p>If you don't have/don't want to use your phone - you can still register now, and we'll have a speical pass for you to bring around to each station.  Enabling you to play, and win PRIZES
<br />
If you <strong>Do want to use your phone</strong>, please <a href="start.php?prereg=true">Register using this page</a>
</p>
<?php }else{ ?>
	
	
<?php } ?>
<button type="submit" name="submit" />Start!</button>
</form>
	</div><!-- /content -->
	
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->
	
</div><!-- /page -->

<script type="text/javascript" language="javascript">
/*
$(document).ready(function(){
	$('form#register').submit(function(){
		if($(this).validate().form()){
			$.post('newuser.php',$(this).serialize(),function(data){
				$('#success').show();
			});
		
		
		}
	
		return false;
	});



});
*/

</script>

</body>

</html>
