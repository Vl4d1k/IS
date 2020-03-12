<div id="div" class="popup-fade">
  <div class="popup">
    <a class="popup-close" href="#">Закрыть</a>
    <p>Введите одно слово!!!</p>
  </div>
</div>
<form action="" name="forma">
  <p>1. Определить сопротивление ламп накаливания при указанных на них мощностях Р1= 100 Вт, Р2 = 150 Вт и
    напряжении U = 220 В.</p>
  <div class="question" name="rad" id="rad">
    <p> 1. R1 = 484 Ом; R2 = 124 Ом. <input type="radio" name="res" value="1"> </p>
    <p> 2. R1 = 684 Ом; R2 = 324 Ом.<input type="radio" name="res" value="2"> </p>
    <p> 3. R1 = 484 Ом; R2 = 324 Ом. <input type="radio" name="res" value="3"> </p>
  </div>
  <div>
    <p>2. Какое сопротивление должны иметь: а) амперметр; б) вольтметр?</p>
    <div class="question">
      <select id="select">
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
    <p><textarea id="message" cols="21" rows="1"></textarea></p>
  </div>
  <button type="" onclick="validate();">Отправить</button>
</form>
<script>
  $("#body").ready(function() {
    setCookie('testPage', 1, 10);
    localStorage.setItem('testPage', Number(localStorage.getItem('testPage')) + 1);
  });
</script>