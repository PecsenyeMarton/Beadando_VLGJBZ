<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
	$query = "SELECT id,nickname,theme,comment FROM forum";
	require_once DATABASE_CONTROLLER;
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
					<th scope="col">Comment</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($forum as $f) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$f['nickname'] ?></td>
						<td><?=$f['theme'] ?></td>
						<td><?=$f['comment'] ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>