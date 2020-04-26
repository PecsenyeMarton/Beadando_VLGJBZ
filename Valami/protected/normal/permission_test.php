<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<center>
	<h1>Felhasználói jogosultság</h1>
	Jogosultság szinted: <?=isset($_SESSION['permission']) ? $_SESSION['permission'] : "Nincs meg az elegendő jogosultságod" ?>
	</center>
<?php else : ?>
	<center>
	<h1>Admin/Rendszergazda hozzáférés</h1>
	<p>Jogosultság szinted:<?=$_SESSION['permission'] ?></p>
	</center>
	
<?php endif; ?>