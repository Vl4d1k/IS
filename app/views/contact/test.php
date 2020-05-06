<div id="errors" style="color: red;">
  <?php
  if (!empty($_POST)) {
    if (!empty($errors)) {
      foreach ($errors as $error) {
        echo $error;
        echo '<p>';
      }
      $values = $_POST;
    } 
    else {
      echo 'Форма отправлена';
    }
  }
  ?>
</div>
<script src="/public/assets/js/calendar.js"></script>
<form action="/web.loc/contact/test" method="POST" id="form_id">
  <div class="user" id="userptr">*Введите три слова!</div>
  <div class="popup-fio">Введите три слова разделенные пробелами!</div>
  ФИО:<input value="<?php if (!empty($values)) echo $values['fio'] ?>" name="fio" type="text" id="username" data-toggle="popover" data-placement="right" data-content="Введите фамилию состоящию из трех слов!" onfocus="hideTable();">
  <div class="user" id="emailptr">*Введите электронную почту!</div>
  <div class="popup-mail">Введите электронную почту!</div>
  Электронная почта:<input value="<?php if (!empty($values)) echo $values['email'] ?>" id="email" onfocus="hideTable();" name="email">
  <div class="user" id="telptr">*Введите номер в указанном виде!</div>
  <div class="popup-tel">Введите номер в формате +7xxxxxxxxxx !</div>
  Телефон в формате +7xxxxxxxxxx:<input value="<?php if (!empty($values)) echo $values['tel'] ?>" onfocus="hideTable();" type="tel" id="tel" name="tel">
  <div class="user" id="text">*Поле не должно быть пустым !</div>
  Ваше сообщение:
  <p><textarea id="message" cols="30" rows="5" name='text'><?php if (!empty($values)) echo $values['text'] ?></textarea>
    <div class="popup-text">Введите ваше сообщение!</div>
    <div class="user" id="pol">*Выберите пол!</div>
    Ваш пол: <div class="question" name="rad" id="rad">
      Man <input onfocus="hideTable();" type="radio" name="sex" value="1">
      Women <input onfocus="hideTable();" type="radio" name="sex" value="2">
      <div class="popup-sex"> Выберите пол! </div>
    </div>
    <div class="user" id="ageMes">*Введите дату рождения!</div>
    <div class="popup-date">Введите дату в формате dd.mm.yyyy!</div>
    <div class="Age" id="sel" style="width:300px;">
      Выберите дату рождения:
      <input value="<?php if (!empty($values)) echo $values['dr'] ?>" name="dr" class="ageText" id='target' value='' onfocus="writeTable();">
      <br>
      <div class="ageSel">
        Месяц:<select onchange="writeTable();" id="selectMon">
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
        Год:<select onchange="writeTable();" id="selectYear">
          <script>
            writeYear()
          </script>
        </select>
      </div>
    </div>
    <div id="insertHere"></div>
    <input name='but' type="submit" id="sendBtn" class="popup-open">
</form>
<script>
  $("#body").ready(function() {
    setCookie('contactPage', 1, 10);
    localStorage.setItem('contactPage', Number(localStorage.getItem('contactPage')) + 1);
  });
</script>