<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
  <meta charset='UTF-8'>
  <meta content='width=device-width, initial-scale=1.0' name='viewport'>
  <meta content='ie=edge' http-equiv='X-UA-Compatible'>
 
  <link href='/web.loc/public/assets/css/media.css' rel='stylesheet' type='text/css'>
  <link href='/web.loc/public/assets/css/bootstrap.css' rel='stylesheet'>
  <link href="/web.loc/public/assets/css/started.css" rel="stylesheet">
  <script src='/web.loc/public/assets/js/jquery.js' type='text/javascript'></script>
  <script src='/web.loc/public/assets/js/history.js' type='text/javascript'></script>
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="/web.loc/">Главная</a></li>
          <li><a href="/web.loc/blog/show">Блог</a></li>
          <li><a href="/web.loc/blog/upload">Загрузка блога</a></li>
          <li><a href="/web.loc/photo/show">Фото</a></li>
          <li><a href="/web.loc/education/table">Учеба</a></li>
          <li><a href="/web.loc/about/informat">Обо мне</a></li>
          <li><a href="/web.loc/contact/test">Контакты</a></li>
          <li><a href="/web.loc/test/check">Тест</a></li>
          <li><a href="/web.loc/history/watch">История</a></li>
          <li><a href="/web.loc/message/create">Отзывы</a></li>
          <li><a href="/web.loc/message/upload">Загрузка отзыва</a></li>
          <li><a href="/web.loc/blog/redact">Редактор</a></li>
          <li class="dropdown">
            <a href="/web.loc/interest/show" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Интересы<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="/web.loc/interest/show#films">Фильмы</a></li>
              <li class="divider"></li>
              <li><a href="/web.loc/interest/show#books">Книги</a></li>
              <li class="divider"></li>
              <li><a href="/web.loc/interest/show#hobbi">Хобби</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--
  <div id='menu'>
    <nav class='dws-menu'>
      <ul>
        <li>
          <a href='/web.loc/'><i class='fa fa-'></i>Главная
          </a>
        </li>
        <li>
          <a href='/web.loc/interest/show'><i class='fa fa-'></i>Мои интересы
          </a>
          <ul>
            <li>
              <a href='/web.loc/interest/show#films"'>Фильмы</a>
            </li>
            <li>
              <a href='/web.loc/interest/show#books'>Книги</a>
            </li>
            <li>
              <a href='/web.loc/interest/show#hobbi'>Хобби</a>
            </li>
          </ul>
        </li>
        <li>
          <a href='/web.loc/photo/show'><i class='fa fa-'></i>Фотоальбом
          </a>
        </li>
        <li>
          <a href='/web.loc/test/check'><i class='fa fa-'></i>Тест
          </a>
        </li>
        <li>
          <a href='/web.loc/education/table'><i class='fa fa-'></i>Учеба
          </a>
        </li>
        <li>
          <a href='/web.loc/about/informat'><i class='fa fa-'></i>Обо мне
          </a>
        </li>
        <li>
          <a href='/web.loc/contact/test'><i class='fa fa-'></i>Контакты
          </a>
        </li>
        <li>
          <a href='/web.loc/history/watch'><i class='fa fa-'></i>История
          </a>
        </li>
        <li>
          <a href='/web.loc/message/create'><i class='fa fa-'></i>Гостевая книга
          </a>
        </li>
        <li>
          <a href='/web.loc/message/upload'><i class='fa fa-'></i>Загрузка сообщений
          </a>
        </li>
      </ul>
    </nav>
  </div>
-->
  <div class="container">
    <?php
    require $view;
    ?>
  </div>
</body>

</html>