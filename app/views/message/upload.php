  <p>
  <br>
  <?php
  if (!empty($_POST)) {
    if ($result) {
      echo "<div id='errors' style='color: LimeGreen;'>Файл отправлен! <p> Вы можете загрузить что-то еще.</div>";
    } else {
      echo "<div id='errors' style='color: red;'>Что то пошло не так. <p> Попробуйте снова.</div>";
    }
  }

  ?>
  <form enctype="multipart/form-data" action="/web.loc/message/upload" method="POST" id="form_id">
    <br>
    Ваше сообщение:
    <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
      <input name="userFile" type="file">
      <br />
      <input type="submit" class="btn btn-success" value="Загрузить">
  </form>