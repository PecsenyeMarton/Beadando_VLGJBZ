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
		<center><h4>Vezetéknév: <?=$users['last_name'].' &nbsp;  Keresztnév: '.$users['first_name'] ?></h4>
		<p>Email: <?=$users['email'] ?> <br/>
		Jogosultság: <?=$users['permission'] ?> </p>
		<h5>Felhasználónév: <?=$users['nickname'] ?> </h5>
		</center>
	<?php endif;
endif;
?>