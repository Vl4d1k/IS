<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
  <meta charset='UTF-8'>
  <meta content='width=device-width, initial-scale=1.0' name='viewport'>
  <meta content='ie=edge' http-equiv='X-UA-Compatible'>
  <link href='/web.loc/public/assets/css/main.css' rel='stylesheet'>
  <link href='/web.loc/public/assets/css/media.css' rel='stylesheet' type='text/css'>
  <script src='/web.loc/public/assets/js/jquery.js' type='text/javascript'></script>
  <script src='/web.loc/public/assets/js/history.js' type='text/javascript'></script>
</head>

<body>
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
              <a href='/web.loc/interest/show'>Фильмы</a>
            </li>
            <li>
              <a href='/web.loc/interest/show'>Книги</a>
            </li>
            <li>
              <a href='/web.loc/interest/show'>Хобби</a>
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
      </ul>
    </nav>
  </div>
  <?php
    //echo $content;
    require $view;
  ?>
</body>

</html>