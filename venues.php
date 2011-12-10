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
		<?php
		$db = new PDO('sqlite:db/party.db');
		$venues = $db->query('select id, name, description, funfact, image from venue;')->fetchAll();


?>
<div data-role="page" id="home">
	<div data-role="header">
		<h1>All Venues</h1>
	</div><!-- /header -->

	<div data-role="content">
		
			<ul data-role="listview">
			<li data-role="list-divider" role="heading">Visit stations in ANY order</li>
			<?php 
			foreach($venues as $venue){
			echo '<li><a href="#' . $venue['name'] . '">' . $venue['name'] . '</a></li>' ;
			
			}
			reset($venues);
			?>
			</ul>
	</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->

</div>
<?php


			foreach($venues as $venue){
				//echo('<li><a href=venues.php#' . $venue['name'] . '>'  . $venue['name'] . '</a></li>');
			
			?>
			
<div data-role="page" id="<?php echo $venue['name'] ?>">
	<div data-role="header">
	<a href="#home">All Venues</a>
		<h1><?php echo $venue['name'] ?></h1>
	</div><!-- /header -->

	<div data-role="content">
Check out: <?php echo $venue['name'] ?><br />
<p><?php echo $venue['description'] ?></p>
<em><?php echo $venue['funfact'] ?></em>
<?php if($venue['image']!=""){ ?>
<img src="<?php echo $venue['image'] ?>" />
<?php } ?>
	</div>
	<div data-role="footer">
		<h4>CheckinParty</h4>
	</div><!-- /footer -->

</div>
			<?php
			}
		?>


</body>

</html>
