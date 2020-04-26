<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) { //ha get akkor maradunk az oldalon ,ha post akkor másik oldalra
			$query = "DELETE FROM workers WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	?>
<?php 
	$query = "SELECT id, first_name, last_name, email, gender, nationality FROM workers ORDER BY first_name ASC";
	require_once DATABASE_CONTROLLER;
	$workers = getList($query);
?>
	<?php if(count($workers) <= 0) : ?>
		<h1>No wokers found in the database</h1>
	<?php else : ?>
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Email</th>
					<th scope="col">Gender</th>
					<th scope="col">Nationality</th>
					<th scope="col">Szerkesztés</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($workers as $w) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$w['first_name'] ?></td>
						<td><?=$w['last_name'] ?></td>
						<td><?=$w['email'] ?></td>
						<td><?=$w['gender'] == 0 ? 'Nő' : ($w['gender'] == 1 ? 'Férfi' : 'Egyéb') ?></td>
						<td><?=$w['nationality'] ?></td>
						<td><a href="" class="btn btn-light">Szerkesztés</a></td>
						<td><a href="?P=list_worker&d=<?=$w['id'] ?>" onclick="return confirm('Tényleg törölni akarod?');" class="btn btn-light">Törlés</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>