<?php
	//2.feladat (félig kész)
	$query = "DELETE FROM workers WHERE id=(1szám)"; //nem tudtam rájönni hogy az id helyére hogy kellett volna a sajátját amelyik sorba van.(Pedig próbáltam)
	require_once DATABASE_CONTROLLER;
	if (executeDML($query)) {
		header('Location: index.php?P=list_worker');
	}
?>


