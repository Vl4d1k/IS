</div>
  Today:
  <span id='time'></span>
  <script src="/public/assets/js/showTime.js" type='text/javascript'></script>
  <script>
    setInterval(showDate, 1000);
  </script>
  <div id='title'>
    <p>Стельмах Владислав Олегович ИС-32</p>
    <img alt='мальчик' class="image" src='\public\assets\img\20190724_173211.jpg' width='250'>
  </div>
</body>
<script>
  $(document).ready(function () {
    $(".image").animate({
      width: "550",
    }, 2000);
  });
</script>
<script src="/public/assets/js/audio.js" type='text/javascript'></script>
<script>
    $("#body").ready(function () {
      setCookie('mainPage', 1, 10);
      localStorage.setItem('mainPage', Number(localStorage.getItem('mainPage')) + 1);
    });
</script>
