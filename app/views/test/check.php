<div id="errors" style="color: red;">
<?php

use app\models\validators\ResultVerification;

require 'C:/xampp/htdocs/web.loc/app/models/validators/ResultVerification.php';

  if (!empty($_POST)) {

    $form = new ResultVerification();

    $form -> post('res');
    $form -> post('2que');
    $form -> post('3que');

    $data = $form->get();
    //проверим коректность ввода
    if($form->isNotEmpty($form -> get('2que'), 'второго вопроса') && $form->isNotEmpty($form -> get('3que'),'третьего вопроса'))
      {
        $form->checkAns('res', "2");
        $form->checkAns('2que', "4");
        $form->checkAns('3que', "rrr");
        echo '<p>' . $form->getResult() . '</p>';
      }
      else {
        $errs = $form->ShowErrors();
        for ($i = 0; $i < count($errs); $i += 1)
          echo '<p>' . $errs[$i] . '</p>';
      }
  }
?>
</div>
<div id="div" class="popup-fade">
  <div class="popup">
    <a class="popup-close" href="#">Закрыть</a>
    <p>Введите одно слово!!!</p>
  </div>
</div>
<form action="/test/check/" method="POST" name="forma">
  <p>1. Определить сопротивление ламп накаливания при указанных на них мощностях Р1= 100 Вт, Р2 = 150 Вт и
    напряжении U = 220 В.</p>
  <div class="question" name="rad" id="rad">
    <p> 1. R1 = 484 Ом; R2 = 124 Ом. <input type="radio" name="res" value="1" checked> </p>
    <p> 2. R1 = 684 Ом; R2 = 324 Ом.<input type="radio" name="res" value="2"> </p>
    <p> 3. R1 = 484 Ом; R2 = 324 Ом. <input type="radio" name="res" value="3"> </p>
  </div>
  <div>
    <p>2. Какое сопротивление должны иметь: а) амперметр; б) вольтметр?</p>
    <div class="question">
      <select name="2que" id="select">
        <option  value=""></option>
        <option  value="1">1. а) малое; б) большое;</option>
        <option  value="2">2. а) большое; б) малое;</option>
        <option  value="3">3. оба большое;</option>
        <option  value="4">4. оба малое;</option>
        <option  value="5">5. нулевое.</option>
      </select>
    </div>
  </div>
  <p>3. Какие диоды применяют для выпрямления переменного тока?:</p>
  <div class="question">
    <p><textarea name="3que" id="message" cols="21" rows="1"></textarea></p>
  </div>
  <input name='but' type="submit" id="sendBtn" class="popup-open">
</form>
<script>
  $("#body").ready(function() {
    setCookie('testPage', 1, 10);
    localStorage.setItem('testPage', Number(localStorage.getItem('testPage')) + 1);
  });
</script>