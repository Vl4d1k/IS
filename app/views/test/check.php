<p>
  <div id="errors" style="color: red;">
    <?php
    if (!empty($_POST)) {
      if (!empty($errors)) {
        foreach ($errors as $error) {
          echo $error;
          echo '<br>';
          $values = $_POST;
        }
      } else {
          echo $result['message'];
      }
      
    }
    ?>
</p>
</div>
<form action="check" method="POST" name="forma">
  <br>
  <p>
    ФИО: <input value="<?php if (!empty($values)) echo $values['fio'] ?>" name="fio">
    <p>1. Определить сопротивление ламп накаливания при указанных на них мощностях Р1= 100 Вт, Р2 = 150 Вт и
      напряжении U = 220 В.</p>
    <div class="question" name="rad" id="rad">
      <p> 1. R1 = 484 Ом; R2 = 124 Ом. <input type="radio" name="1que" value="1"> </p>
      <p> 2. R1 = 684 Ом; R2 = 324 Ом.<input type="radio" name="1que" value="2"> </p>
      <p> 3. R1 = 484 Ом; R2 = 324 Ом. <input type="radio" name="1que" value="3"> </p>
    </div>
    <div>
      <p>2. Какое сопротивление должны иметь: а) амперметр; б) вольтметр?</p>
      <div class="question">
        <select name="2que" id="select">
          <option value=""></option>
          <option value="1">1. а) малое; б) большое;</option>
          <option value="2">2. а) большое; б) малое;</option>
          <option value="3">3. оба большое;</option>
          <option value="4">4. оба малое;</option>
          <option value="5">5. нулевое.</option>
        </select>
      </div>
    </div>
    <p>3. Какие диоды применяют для выпрямления переменного тока?:</p>
    <div class="question">
      <p><textarea name="3que" id="message" cols="21" rows="1"><?php if (!empty($values)) echo $values['3que'] ?></textarea></p>
    </div>
    <input name='but' type="submit" id="sendBtn" class="popup-open">
</form>

<table class="table">
  <tbody>
    <?php
    if($_SESSION['auth'] == 1){
      if (empty($allResults)) echo "<h2>Пока еще нет результатов</h2>";
      else
      {
        echo "<h2>Результаты</h2>";

        foreach ($allResults as $oneResult => $value) {
          echo "<div >";
          echo '<hr align="left" width="0" size="4" color="#ff9900" />';
          echo "<h4>" . $value->fio . "</h4>";
          echo "<p>" . $value->result . "</p>";
          echo "<p> Вопрос 1:";
          echo "<p> Ответ:". $value->ans1;
          if($value->flag1 === '1') echo " Верно"; else echo " Неверно";
          echo "<p> Вопрос 2:";
          echo "<p> Ответ:". $value->ans2;
          if($value->flag2 === '1') echo " Верно"; else echo " Неверно";
          echo "<p> Вопрос 3:";
          echo "<p> Ответ:". $value->ans3;
          if($value->flag3 === '1') echo " Верно"; else echo " Неверно";
          echo "<p>" . $value->created_at . "</p>";
          echo '<hr align="left" width="300" size="5" color="#ff9900" />';
          echo "</div>";
        }
      }
    }
    else echo "<h2>Для того,чтобы просмотреть результаты войдите на сайт.</h2>";
    ?>
  </tbody>
</table>

<script>
  $("#body").ready(function() {
    setCookie('testPage', 1, 10);
    localStorage.setItem('testPage', Number(localStorage.getItem('testPage')) + 1);
  });
</script>