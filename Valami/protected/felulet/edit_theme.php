 <?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
  <h1>Page access is forbidden!</h1>
<?php else :
  if(!array_key_exists('f', $_GET) || empty($_GET['f'])) : 
    header('Location: index.php');
else: 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_theme'])) {
    $postData = [
      'id' => $_POST['forumid'],
      'nickname' => $_POST['nickname'],
      'theme' => $_POST['theme'],
      'comment' => $_POST['comment']
    ];
    if($postData['id'] != $_GET['f']) {
      echo "Hiba a dolgozó azonosítása során!";
    } else {
        if(empty($postData['nickname']) || empty($postData['theme']) || empty($postData['comment']))   {
        echo "Hiányzó adat(ok)!";
    } else {
        $query = "UPDATE forum SET nickname = :nickname, theme = :theme, comment = :comment  WHERE id = :id";
        $params = [
        ':nickname' => $postData['nickname'],
        ':theme' => $postData['theme'],
        ':comment' => $postData['comment'],
        ':id' => $postData['id']

      ];
      require_once DATABASE_CONTROLLER;
      if(!executeDML($query, $params)) {
        echo "Hiba az adatbevitel során!";
      } header('Location: ?P=flist');
    }
  }
}
$query = "SELECT id, nickname, theme, comment  FROM forum WHERE id = :id";
  $params = [':id' => $_GET['f']];
  require_once DATABASE_CONTROLLER;
  $forum = getRecord($query, $params);
  if(empty($forum)) :
    header('Location: index.php');
    else : ?>
      <form method="post">
        <input type="hidden" name="forumid" value="<?=$forum['id'] ?>">
        <div class="form-group">
            <label for="editForumnickname">Felhasználónév </label><br/>
            <input type="text" class="form-control" id="editForumnickname" name="nickname" value="<?=$forum['nickname'] ?>">
       </div>
       <div class="form-group">
            <label for="editForumtheme">Téma </label><br/>
            <input type="text" class="form-control" id="editForumtheme" name="theme" value="<?=$forum['theme'] ?>">
       </div>
       <div class="form-group">
             <label for="forum">Bejegyzés </label><br/>
             <textarea class="form-control" id="editForumcomment"  rows="4" name="comment"> <?=$forum['comment'] ?> </textarea>
       </div>

    <button type="submit" class="btn btn-primary" name="edit_theme" onclick="return confirm('Tényleg hozzá akarod adni?');"> Téma Módosítása</button>
      </form> 
    <?php endif;
  endif;
endif;
?>