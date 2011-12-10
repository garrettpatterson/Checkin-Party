
<?php

/***************************************************************/
/********   This file manages the prize limits            ******/
/********   and determines wether or not the user has won ******/
/***************************************************************/
function randomPrize($db,$email,$venueid){
	//set maximum amount of random prizes per station
	$maxrandom = 5;
	$prize = false;
	$prizes = $db->query('select count(*) from prizelog where venueid=' . $venueid . ' and prizetypeid=2;');
	$given = $prizes==null?0:$prizes->fetchAll();
	$left = $maxrandom - $given[0][0];
	
	//change rand(0,10)<n to adjust the probability of people getting a random prize
	//userPrizes($db,$email,2) <n to adjust how many random prizes one person can earn
	if(userPrizes($db,$email,2) <3 && rand(0,10)< 5 && $left > 0){
		$prize = true;
		
		$db->exec('insert into prizelog(userid,venueid,prizetypeid) select u.id, '.$venueid.', 2 from user u where u.email = "'.$email.'" limit 1;');
		//echo ('//insert into prizelog(userid,venueid,prizetypeid) select u.id, '.$venueid.', 2 from user u where u.email = "'.$email.'" limit 1;');
	}
	
	
	return $prize;
}


function finishPrize($db,$email,$venueid){
	//set total number of max finisher prizes
	$maxfinish = 2;
	$prize = false;
	$finish = false;
	$checkins = $db->query('select distinct c.venueid from checkin c join user u on u.id = c.userid where u.email = "test@gmail.com";');
	//evaluate wether they've reached all stations/venues
	
	$stations = $db->query('select distinct id from venue;');
	$finish = count($stations->fetchAll())==count($checkins->fetchAll());
	$given = $db->query('select * from prizelog where prizetypeid=3;');
	//print '//given.fetchAll:' . $maxfinish- count($given->fetchAll());
	$left = $maxfinish - count($given->fetchAll());
	print '//up:'. userPrizes($db,$email,3) ;
	print '//left:' . $left;
	//check if user is eligible and whether or not we've given them all away
	if(userPrizes($db,$email,3) < 1 && $left > 0){
		$prize = true;
		$db->exec('insert into prizelog(userid,venueid,prizetypeid) select u.id, '.$venueid.', 3 from user u where u.email = "'.$email.'" limit 1;');
	}
	
	return $prize;
}

function userPrizes($db,$email,$prizetypeid){
	//helper function to get number of prizes per user - type from db
	$prizes = 0;
	$earned = $db->query('select 1 from prizelog p join user u on u.id = p.userid where p.prizetypeid = '.$prizetypeid.' and u.email = "'.$email.'";');
	$prizes = $earned==null?0:count($earned->fetchAll());
	return $prizes;
}



?>
