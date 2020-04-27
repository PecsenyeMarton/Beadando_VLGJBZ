<nav class="navbar navbar-dark bg-dark">
<a href="index.php" class="badge badge-light">Főoldal</a>
<?php if(!IsUserLoggedIn()) : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=login" class="badge badge-light">Belépés</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=register" class="badge badge-light">Regisztráció</a>
<?php else : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=test" class="badge badge-success">Engedély teszt</a>

	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
		<span> &nbsp; || &nbsp; </span>
		<a href="index.php?P=users" class="badge badge-danger">Felhasználók</a>
		<span> &nbsp; | &nbsp; </span>
		<a href="index.php?P=list_worker" class="badge badge-danger">Munkások</a>
		<span> &nbsp; | &nbsp; </span>
		<a href="index.php?P=add_worker" class="badge badge-danger">Munkás hozzáadás</a>
		<span> &nbsp; || &nbsp; </span>
	<?php else : ?>
		<span> &nbsp; | &nbsp; </span>
		<a href="index.php?P=own_profile" class="badge badge-primary">Saját Profil</a>
		<span> &nbsp; | &nbsp; </span>
	<?php endif; ?>
	<a href="index.php?P=logout" class="badge badge-light">Kijelentkezés</a>
<?php endif; ?>
</nav>
<hr>