<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
	$query = "SELECT id,first_name, last_name, email, permission,nickname FROM users ";
	require_once DATABASE_CONTROLLER;
	$users = getList($query);
	?>
	<?php if(count($users) <= 0) : ?>
		<h1>No users found in the database.</h1>
	<?php else : ?>
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Vezetéknév</th>
					<th scope="col">Keresztnév</th>
					<th scope="col">Email</th>
					<th scope="col">Jogosultság</th>
					<th scope="col">Felhasznnálónév</th>
					<th scope="col">SQL ID</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($users as $u) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="?P=user&u=<?=$u['id'] ?>"><?=$u['last_name'] ?></a></td>
						<td><?=$u['first_name'] ?></td>
						<td><?=$u['email'] ?></td>
						<td><?=$u['permission'] == 0 ? 'Felhasználó' : ($u['permission'] == 1 ? 'Admin/Rendszergazda' : 'Senki') ?></td>
						<td><?=$u['nickname'] ?></td>
						<td><?=$u['id'] ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>