<h1>Обо мне:</h1>
<div >
  <p>Меня зовут Влад Стельмах. Я учащийся Севастопольского Государственного Университета.</p>
  <p>Увлекаюсь футболом и программированием.</p>
  <p>Если хотите узнать что-то обо мне просто напишите:
  <a href='https://vk.com/id214826664'>Vkontakte</a>
  <script>
    $("#body").ready(function () {
      setCookie('aboutPage', 1, 10);
      localStorage.setItem('aboutPage', Number(localStorage.getItem('aboutPage')) + 1);
    });
  </script>
</div>