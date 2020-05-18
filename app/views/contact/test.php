<div id="errors" style="color: red;">
  <?php
  if (!empty($_POST)) {
    if (!empty($errors)) {
      foreach ($errors as $error) {
        echo $error;
        echo '<br>';
      }
      $values = $_POST;
    } else {
      echo 'Форма отправлена';
    }
  }
  ?>
</div>
<script src="/web.loc/public/assets/js/calendar.js"></script>
<br><br>
<form action="/web.loc/contact/test" method="POST" id="form_id">
  <div class="form-group">
    <label for="name">ФИО:</label>
    <input value="<?php if (!empty($values)) echo $values['fio'] ?>" name="fio" type="text" id="username" data-placement="right">
  </div>
  <div class="form-group">
    <label for="name">Электронная почта:</label>
    <input value="<?php if (!empty($values)) echo $values['email'] ?>" id="email" onfocus="hideTable();" name="email">
  </div>
  <div class="form-group">
    <label for="name">Телефон:</label>
    <input value="<?php if (!empty($values)) echo $values['tel'] ?>" onfocus="hideTable();" type="tel" id="tel" name="tel">
  </div>
  <div class="form-group">
    <label for="name">Ваше сообщение:</label>
    <p><textarea id="message" cols="30" rows="5" name='text'><?php if (!empty($values)) echo $values['text'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="name">Ваш пол:</label>
    Man <input onfocus="hideTable();" type="radio" name="sex" value="1">
    Women <input onfocus="hideTable();" type="radio" name="sex" value="2">
  </div>
  <div class="Age" id="sel" style="width:300px;">
    Выберите дату рождения:
    <input value="<?php if (!empty($values)) echo $values['dr'] ?>" name="dr" class="ageText" id='target' value='' onfocus="writeTable();">
    <br>
    <div class="ageSel">
      Месяц: <select onchange="writeTable();" id="selectMon">
        <option value="01">January</option>"
        <option value="02">February</option>"
        <option value="03">March</option>"
        <option value="04">April</option>"
        <option value="05">May</option>"
        <option value="06">June</option>"
        <option value="07">July</option>"
        <option value="08">August</option>"
        <option value="09">September</option>"
        <option value="10">October</option>"
        <option value="11">November</option>"
        <option value="12">December</option>"
      </select>
          Год: <select onchange="writeTable();" id="selectYear">
        <script>
          writeYear()
        </script>
      </select>
    </div>
  </div>
  <div id="insertHere"></div>
  <br>
  <input name='but' type="submit" id="sendBtn" class="btn btn-success">
</form>
<script>
  $("#body").ready(function() {
    setCookie('contactPage', 1, 10);
    localStorage.setItem('contactPage', Number(localStorage.getItem('contactPage')) + 1);
  });
</script>