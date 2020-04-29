<?php 
if(!array_key_exists('f', $_GET) || empty($_GET['f'])) : 
	header('Location: index.php');
else: 
	$query = "SELECT id,nickname,theme,comment FROM forum WHERE id = :id";
	$params = [':id' => $_GET['f']];
	require_once DATABASE_CONTROLLER;
	$forum = getRecord($query, $params);
	if(empty($forum)) :
		header('Location: index.php');
	else : ?>
<form>
<div class="form-group">
    <label for="forumnickname">Felhasználónév </label><br/>
    <input type="text" class="form-control" id="forumnickname" name="nickname" value="<?=$forum['nickname']?>" readonly>
  </div>
  <div class="form-group">
    <label for="forumtheme">Téma </label><br/>
    <input type="text" class="form-control" id="forumtheme" name="theme"  value="<?=$forum['theme'] ?>" readonly>
  </div>
  <div class="form-group">
    <label for="forum">Hozzászolás/Megjegyzés </label><br/>
   	<textarea class="form-control" id="forumcomment"  rows="4" readonly><?=$forum['comment'] ?></textarea>
  </div>
</form>	
	<?php endif;
endif;?>
