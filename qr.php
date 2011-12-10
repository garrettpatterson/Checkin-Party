
		<?php
		$db = new PDO('sqlite:db/party.db');
		$venues = $db->query('select id, name, description, funfact, image from venue;')->fetchAll();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
	<p>Preregister:
<script language="javascript">
document.write('<a href="http://www.vivakiparty.com/start.php?prereg=true#start"><img src="http://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=' + encodeURIComponent( 'http://www.vivakiparty.com/start.php#start') + '"></a>');
</script>
<p>start:
<script language="javascript">
document.write('<a href="http://www.vivakiparty.com/start.php#start"><img src="http://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=' + encodeURIComponent( 'http://www.vivakiparty.com/start.php#start') + '"></a>');
</script>
<?php 
foreach($venues as $venue){

?>
<p>venue <?php echo $venue['name'] ?>:
<script language="javascript">
document.write('<a href="http://www.vivakiparty.com/venue.php?venue=<?php echo $venue['name'] ?>"><img src="http://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=' + encodeURIComponent( 'http://www.vivakiparty.com/venue.php?venue=<?php echo $venue['name'] ?> ') + '"></a>');
</script>
</p>
<?php
}
?>
</body>

</html>
