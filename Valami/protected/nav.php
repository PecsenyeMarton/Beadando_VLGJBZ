<div class="navbar">
<a href="index.php">Főoldal</a>


<?php if(!IsUserLoggedIn()) : ?>
	<a href="index.php?P=login">Belépés</a>
	<a href="index.php?P=register">Regisztráció</a>


<?php else : ?>
	<a href="index.php?P=test">Jogosultságod</a>


<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
		<a href="index.php?P=users">Felhasználók</a>
		<a href="index.php?P=list_worker">Munkások</a>
		<a href="index.php?P=flist">Témák</a>
		<a href="index.php?P=add_worker">Munkás hozzáadás</a>
		<a href="index.php?P=add_theme">Téma hozzáadása</a>
		<a href="index.php?P=search">Keresés</a>


	<?php else : ?>
		<a href="index.php?P=flist">Témák</a>
		<a href="index.php?P=add_theme">Téma hozzáadása</a>
		<a href="index.php?P=search">Keresés</a>


	<?php endif; ?>
	<a href="index.php?P=logout" onclick="return confirm('Kijelentkezel?');">Kijelentkezés</a>
<?php endif; ?>


</div>
<hr>