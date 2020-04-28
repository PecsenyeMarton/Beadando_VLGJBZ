<div class="navbar">
<a href="index.php">Főoldal</a>
<?php if(!IsUserLoggedIn()) : ?>
	<a href="index.php?P=login">Belépés</a>
	<a href="index.php?P=register">Regisztráció</a>
<?php else : ?>
	<a href="index.php?P=test">Engedély teszt</a>
	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
		<a href="index.php?P=users">Felhasználók</a>
		<a href="index.php?P=list_worker">Munkások</a>
		<a href="index.php?P=add_worker">Munkás hozzáadás</a>
		<a href="index.php?P=forum_list">Témák</a>
	<?php else : ?>
		<a href="">Téma hozzáadása</a>
	<?php endif; ?>
	<a href="index.php?P=own_profile">Saját Profil</a>
	<a href="index.php?P=logout" onclick="return confirm('Kijelentkezel?');">Kijelentkezés</a>
<?php endif; ?>
<form class="form-inline" >
    <input class="form-control mr-sm-2" type="search" placeholder="Keresés" aria-label="Search">
    <button class="btn btn-outline-success my-0 my-sm-0" type="submit">Keresés</button>
</form>
</div>
<hr>