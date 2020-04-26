<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
<?php 
	$query = "SELECT first_name, last_name, email, gender, nationality FROM workers";
	require_once DATABASE_CONTROLLER;
	$workers = getList($query);
	$rendezes = asort($workers); //1.feladat rendezi first_name abc sorrendben
?>
	<?php if(count($workers) <= 0) : ?>
		<h1>No wokers found in the database</h1>
	<?php else : ?>
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Keresztnév</th>
					<th scope="col">Vezetéknév</th>
					<th scope="col">Email</th>
					<th scope="col">Nem</th>
					<th scope="col">Nemzetiség</th>
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
						<td><a href="index.php?P=del_worker" onclick="return confirm('Tényleg törölni akarod?');" class="btn btn-light">Törlés</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>