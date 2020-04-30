  <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_theme'])) {
    $postData = [
      'nickname' => $_POST['nickname'],
      'theme' => $_POST['theme'],
      'comment' => $_POST['comment']
    ];

    if(empty($postData['nickname']) || empty($postData['theme']) || empty($postData['comment']))   {
      echo "Hiányzó adat(ok)!";
    } else {
      $query = "INSERT INTO forum (nickname, theme, comment ) VALUES (:nickname, :theme, :comment)";
      $params = [
        ':nickname' => $postData['nickname'],
        ':theme' => $postData['theme'],
        ':comment' => $postData['comment']
      ];
      require_once DATABASE_CONTROLLER;
      if(!executeDML($query, $params)) {
        echo "Hiba az adatbevitel során!";
      } header('Location: index.php?P=flist');
    }
  }
  ?>

<form method="post">
<div class="form-group">
    <label for="addForumnickname">Felhasználónév </label><br/>
    <input type="text" class="form-control" id="addForumnickname" name="nickname" >
  </div>
  <div class="form-group">
    <label for="addForumtheme">Téma </label><br/>
    <input type="text" class="form-control" id="addForumtheme" name="theme"  >
  </div>
  <div class="form-group">
    <label for="forum">Bejegyzés </label><br/>
   	<textarea class="form-control" id="addForumcomment"  rows="4" name="comment" ></textarea>
  </div>

    <button type="submit" class="btn btn-primary" name="add_theme" onclick="return confirm('Tényleg létre akarod adni?');">Létrehozás</button>

</form>	