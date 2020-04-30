<?php  
 	if (isset($_POST['search'])) {
 		$search = $_POST['search'];
 		$query = "SELECT * FROM `forum` WHERE CONCAT(`nickname`, `theme`) LIKE '%".$search."%'";
 		require_once DATABASE_CONTROLLER;
 		$forum = getList($query);
 	}
 ?>
<form class="form-inline" method="post">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Keresés">
    <button class="btn btn-dark" type="submit">Keresés</button>
</form>


	<?php if(count($forum) <= 0) : ?>
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