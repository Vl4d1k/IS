<p>
<br>
<?php
if (!empty($_POST)) {
  if (!empty($errors)) {
    echo "<div id='errors' style='color: red;'>";
    foreach ($errors as $error) {
      echo $error;
      echo '<br>';
    }
    echo '</div>';
    $values = $_POST;
  } else {
    echo "<div id='errors' style='color: LimeGreen;'>";
    echo 'Форма отправлена';
    echo '</div>';
  }
}
?>
<p>
</p>
</div>
<div class='container'>
  <form action="" enctype="multipart/form-data" method="POST" name="forma">
    <br>
    <p>
    <!--
    <div class="form-group">
        <label for="name">Автор:</label>
        <input type="name" name="author" value="<?php if (!empty($values)) echo $values['author'] ?>" class="form-control" id="name" placeholder="Name">
      </div>-->
      <div class="form-group">
        <label for="name">Тема:</label>
        <input type="name" name="topic" value="<?php if (!empty($values)) echo $values['topic'] ?>" class="form-control" id="name" placeholder="Name">
      </div>
      <input type="hidden" name="30000" value="30000" />
      <input name="userFile" type="file" accept="image/*">
      <br>
      <div class="form-group">
        <label for="message">Текст:</label>
        <textarea rows="15" class="form-control" name="text" rows="3"><?php if (!empty($values)) echo $values['text'] ?></textarea>
      </div>
      <input type="submit" class="btn btn-success" value="Загрузить">
  </form>
</div>