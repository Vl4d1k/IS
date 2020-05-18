<br>
  Today:
  <span id='time'></span>
  <script src="/web.loc/public/assets/js/showTime.js" type='text/javascript'></script>
  <script>
    setInterval(showDate, 1000);
  </script>
  
  <div id='title'>
    <p>Стельмах Владислав Олегович ИС-32</p>
    <img alt='мальчик' class="image" src='/web.loc/img/20190724_173211.jpg' width='250'>
  </div>
</body>
<script>
  $(document).ready(function () {
    $(".image").animate({
      width: "550",
    }, 2000);
  });
</script>
<script>
    $("#body").ready(function () {
      setCookie('mainPage', 1, 10);
      localStorage.setItem('mainPage', Number(localStorage.getItem('mainPage')) + 1);
    });
</script>
