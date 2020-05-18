<h2>Нам важно ваше мнение. Оставьте отзыв!</h2>
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
  <form action="/web.loc/message/create" method="POST" id="form_id">
    <br>
    Фамилия:<input value="<?php if (!empty($values)) echo $values['surname'] ?>" name="surname" type="text"><br><br>
    Имя:<input value="<?php if (!empty($values)) echo $values['name'] ?>" name="name" type="text"><br><br>
    Отчество:<input value="<?php if (!empty($values)) echo $values['otch'] ?>" name="otch" type="text"><br><br>
    Электронная почта:<input value="<?php if (!empty($values)) echo $values['email'] ?>" id="email" name="email"><br><br>
    Ваше сообщение:
    <p><textarea id="message" cols="30" rows="5" name='text'><?php if (!empty($values)) echo $values['text'] ?></textarea><br>
      <input name='but' type="submit" id="sendBtn" class="btn btn-success">
  </form>

  <table class="table">
    <tbody>
      <?php
      if ($comments == null) : ?>
        <h2>Нет отзывов</h2>
      <?php else :
        echo "<h1>Отзывы</h1>";

        foreach ($comments as $comment) {
          echo "<div >";
          echo '<hr align="left" width="300" size="4" color="#ff9900" />';
          $date = DateTime::createFromFormat('d.m.Y H:i:s', $comment['date']);
          echo "<h4>" . $comment['surname'] . " " . $comment['name'] . " " . $comment['otch'] . "</h4>";
          echo "<p>" . $comment['email'] . "</p>";
          echo "<p>" . $comment['text'] . "</p>";
          echo "<p>" . $date->format('d.m.Y H:i:s') . "</p>";
          echo '<hr align="left" width="300" size="5" color="#ff9900" />';
          echo "</div>";
        }
      endif;
      ?>
    </tbody>
  </table>