<?php 
if(!array_key_exists('u', $_GET) || empty($_GET['u'])) : 
	header('Location: index.php');
else: 
	$query = "SELECT id, first_name, last_name, email, permission, nickname FROM users WHERE id = :id";
	$params = [':id' => $_GET['u']];
	require_once DATABASE_CONTROLLER;
	$users = getRecord($query, $params);
	if(empty($users)) :
		header('Location: index.php');
	else : ?>
		<center><h4>Keresztnév: <?=$users['first_name'].' <br/> Vezetéknév: '.$users['last_name'] ?></h4>
		<p>Email: <?=$users['email'] ?></p>
		<p>Jogosultság: <?=$users['permission'] ?> <br>
		Felhasználó név: <?=$users['nickname'] ?></p>
		</center>
	<?php endif;
endif;
?>