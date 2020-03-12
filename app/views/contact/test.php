<script src="/public/assets/js/calendar.js"></script>
</div>
  <form action="mailto:vlad1k121@yandex.ru" id="form_id">
    <div class="user" id="userptr">*Введите три слова!</div>
    <div class="popup-fio">Введите три слова разделенные пробелами!</div>
    ФИО:<input type="text" id="username" data-toggle="popover" data-placement="right"
      data-content="Введите фамилию состоящию из трех слов!" onfocus="hideTable();"
      onblur="validateFio();validateAll();">
    <div class="user" id="emailptr">*Введите электронную почту!</div>
    <div class="popup-mail">Введите электронную почту!</div>
    Электронная почта:<input id="email" onfocus="hideTable();" name="email " onblur="validateMail();validateAll();">
    <div class="user" id="telptr">*Введите номер в указанном виде!</div>
    <div class="popup-tel">Введите номер в формате +7xxxxxxxxxx !</div>
    Телефон в формате +7xxxxxxxxxx:<input onfocus="hideTable();" type="tel" id="tel" name="tel"
      onblur="validateTel();validateAll();">
    <div class="user" id="text">*Поле не должно быть пустым !</div>
    Ваше сообщение:
    <p><textarea id="message" cols="30" rows="7" onblur="validateMes();validateAll();"></textarea>
      <div class="popup-text">Введите ваше сообщение!</div>
      <div class="user" id="pol">*Выберите пол!</div>
      Ваш пол:
      <div class="question" onclick="validateRadio();validateAll();" name="rad" id="rad">
        Man <input onfocus="hideTable();" onclick="validateRadio();validateAll();" type="radio" name=sex value="m">
        <p></p>Women <input onfocus="hideTable();" onclick="validateRadio();validateAll();" type="radio" name=sex
          value="w">
        <div class="popup-sex"> Выберите пол! </div>
      </div>
      <div class="user" id="ageMes">*Введите дату рождения!</div>
      <div class="popup-date">Введите дату в формате dd.mm.yyyy!</div>
      <div class="Age" id="sel" style="width:300px;">
        Выберите дату рождения:
        <input class="ageText" id='target' value='' onfocus="writeTable();" onblur="validateAge();validateAll();">
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
            <script>writeYear()</script>
          </select>
        </div>
      </div>
      <div id="insertHere"></div>
      <input type="submit" id="sendBtn" class="popup-open" onclick="validateAll();">
  </form>
  <script>
    var btn = document.getElementById('sendBtn').disabled = true
  </script>
  <script>
    var errMail = false;
    var errTel = false;
    var errFio = false;
    var errAge = false;
    var errMes = false;
    var errRad = false;
    var error = false;

    function countWords(s) {
      return s.split(' ').length;
    }

    function validateMail() {
      var address = document.getElementById("email");
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      var emailMes = document.getElementById("emailptr");
      if (reg.test(address.value) == false) {
        emailMes.className = "error";
        address.className = "errorBorder";
        error = false;
        var btn = document.getElementById('but').disabled = true;
        return false;
      }
      else {
        errMail = true;
        address.className = "trueBorder";
        emailMes.className = "true";
        return true;
      }
      validateAll();
    }

    function validateTel() {
      var tel = /^\+7\d{9}/;
      var telep = document.getElementById("tel");
      var telMes = document.getElementById("telptr");
      if (tel.test(telep.value) == false) {
        telMes.className = "error";
        telep.className = "errorBorder";
        error = false;
        var btn = document.getElementById('but').disabled = true;
        return false;
      }
      else {
        errTel = true;
        telep.className = "trueBorder";
        telMes.className = "true";
        return true;
      }
      validateAll();
    }

    function validateFio() {
      var userName = document.getElementById("username");
      var userMes = document.getElementById("userptr");
      if (countWords(userName.value) != 3) {
        userName.className = "errorBorder";
        userMes.className = "error";
        error = false;
        return false;
      }
      else {
        userName.className = "trueBorder";
        userMes.className = "true";
        errFio = true;
        return true;
      }
      validateAll();
    }

    function validateMes() {
      var message = document.getElementById("message");
      var textMes = document.getElementById("text");
      if (message.value.length < 1) {
        textMes.className = "error";
        message.className = "errorBorder";
        error = false;
        var btn = document.getElementById('but').disabled = true;
        return false;
      }
      else {
        message.className = "trueBorder";
        text.className = "true";
        errMes = true;
        return true;
      }
      validateAll();
    }

    function validateAge() {
      var regDate = /(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d/;
      var errMes = document.getElementById("ageMes");
      var border = document.getElementById("target");
      if (regDate.test(border.value) == false) {
        border.className = "errorBorder";
        errMes.className = "error";
        error = false;
        var btn = document.getElementById('sendBtn').disabled = true;
        return false;
      }
      else {
        border.className = "trueBorder";
        errMes.className = "true";
        errAge = true;
        return true;
      }
      validateAll();
    }

    function validateRadio() {
      var rad = document.forms["form_id"]["sex"].value;
      var polMes = document.getElementById("pol");
      if (rad == "") {
        polMes.className = "error";
        document.getElementById("rad").className = "errorBorder";
        error = false;
        return false;
      }
      else {
        document.getElementById("rad").className = "trueBorder";
        polMes.className = "true";
        errRad = true;
        return true;
      }
      validateAll();
    }

    function validate() {
      errRad = validateRadio();
      errAge = validateAge();
      errMes = validateMes();
      errMail = validateMail();
      errTel = validateTel();
      errFio = validateFio();
      if ((errAge == true) && (errFio == true) && (errMail == true) && (errMes == true) && (errTel == true) && (errRad == true)) {
        alert("Все поля должны быть заполнены!");
        document.form_del.elements['submit'].disabled = true;
      }
      else {
        document.form_del.elements['submit'].disabled = false;
      }
    }

    function validateAll() {
      if ((errAge == true) && (errFio == true) && (errMail == true) && (errMes == true) && (errTel == true) && (errRad == true))
        document.getElementById('sendBtn').disabled = false;
    }


  </script>

<script>
    $("#body").ready(function () {
      setCookie('contactPage', 1, 10);
      localStorage.setItem('contactPage', Number(localStorage.getItem('contactPage')) + 1);
    });
  </script>