<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<?php 
	$query = "SELECT id,nickname,theme FROM forum";
	require DATABASE_CONTROLLER;
	$forum = getList($query);
?>
	<?php if(count($forum) <= 0) : ?>
		<h1>Nincs téma az adatbázisban.</h1>
	<?php else : ?>
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">Felhasználónév</th>
					<th scope="col">Téma</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($forum as $f) : ?>
					<?php $i++; ?>
					<tr>
						<td><?=$f['nickname'] ?></td>
						<td><a href="?P=forum_theme&f=<?=$f['id'] ?>"><?=$f['theme'] ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php else : ?>
	<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
	<?php else : ?>
	<?php 
		if(array_key_exists('c', $_GET) && !empty($_GET['c'])) { 
			$query = "DELETE FROM forum WHERE id = :id";
			$params = [':id' => $_GET['c']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			} header('Location: ?P=flist');
		}
	?>
	<?php 
	$query = "SELECT id,nickname,theme FROM forum";
	require DATABASE_CONTROLLER;
	$forum = getList($query);
	?>
	<?php if(count($forum) <= 0) : ?>
		<h1>Nincs téma az adatbázisban.</h1>
	<?php else : ?>
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Felhasználónév</th>
					<th scope="col">Téma</th>
					<th scope="col">Szerkesztés</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($forum as $f) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$f['nickname'] ?></td>
						<td><a href="?P=forum_theme&f=<?=$f['id'] ?>"><?=$f['theme'] ?></td>
						<td><a href="?P=edit_theme&f=<?=$f['id'] ?>" class="btn btn-secondary">Szerkesztés</a></td>
						<td><a href="?P=flist&c=<?=$f['id'] ?>" onclick="return confirm('Tényleg törölni akarod?');" class="btn btn-danger">Törlés</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
