<br>
  Today:
  <span id='time'></span>
  <script src="/web.loc/public/assets/js/showTime.js" type='text/javascript'></script>
  <script>
    setInterval(showDate, 1000);
  </script>
  
  <div id='title'>
	<iframe frameborder="0" style="border:none;width:100%;height:750px;" width="100%" height="750" src="https://music.yandex.ru/iframe/#playlist/yamusic-daily/48916217">Слушайте <a href='https://music.yandex.ru/users/yamusic-daily/playlists/48916217'>Плейлист дня</a> — <a href='https://music.yandex.ru/users/yamusic-daily'>yamusic-daily</a> на Яндекс.Музыке</iframe>
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
