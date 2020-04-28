<?php 
if(!array_key_exists('w', $_GET) || empty($_GET['w'])) : 
	header('Location: index.php');
else: 
	$query = "SELECT id, first_name, last_name, email, gender, tipus, nationality FROM workers WHERE id = :id";
	$params = [':id' => $_GET['w']];
	require_once DATABASE_CONTROLLER;
	$worker = getRecord($query, $params);
	if(empty($worker)) :
		header('Location: index.php');
	else : ?>
		<center><h4>Vezetéknév: <?=$worker['last_name'].' &nbsp;  Keresztnév: '.$worker['first_name'] ?></h4>
		<p>Email: <?=$worker['email'] ?> <br/>
		Nem: <?=$worker['gender'] == 0 ? 'Nő' : ($worker['gender'] == 1 ? 'Férfi' : 'Egyéb') ?> <br/>
		Nemzetiség: <?=$worker['nationality'] ?> <br/>
		Beosztás: <?=$worker['tipus'] ?>
		</p>
		</center>
	<?php endif;
endif;
?>