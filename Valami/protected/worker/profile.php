<?php 
if(!array_key_exists('w', $_GET) || empty($_GET['w'])) : 
	header('Location: index.php');
else: 
	$query = "SELECT id, first_name, last_name, email, gender, nationality FROM workers WHERE id = :id";
	$params = [':id' => $_GET['w']];
	require_once DATABASE_CONTROLLER;
	$worker = getRecord($query, $params);
	if(empty($worker)) :
		header('Location: index.php');
	else : ?>
		<center><h4>Keresztnév: <?=$worker['first_name'].' <br/> Vezetéknév: '.$worker['last_name'] ?></h4>
		<p>Email: <?=$worker['email'] ?></p>
		<p>Nem: <?=$worker['gender'] ?> <br>
		Nemzetiség: <?=$worker['nationality'] ?></p>
		</center>
	<?php endif;
endif;
?>