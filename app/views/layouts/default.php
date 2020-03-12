<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
  <meta charset='UTF-8'>
  <meta content='width=device-width, initial-scale=1.0' name='viewport'>
  <meta content='ie=edge' http-equiv='X-UA-Compatible'>
  <link href='/public/assets/css/main.css' rel='stylesheet'>
  <link href='/public/assets/css/media.css' rel='stylesheet' type='text/css'>
  <script src='/public/assets/js/jquery-3.4.1.js' type='text/javascript'></script>
  <script src='/public/assets/js/history.js' type='text/javascript'></script>
</head>

<body>
  <div id='menu'>
    <nav class='dws-menu'>
      <ul>
        <li>
          <a href='/'><i class='fa fa-'></i>Главная
          </a>
        </li>
        <li>
          <a href='/interest/show'><i class='fa fa-'></i>Мои интересы
          </a>
          <ul>
            <li>
              <a href='/interest/show'>Фильмы</a>
            </li>
            <li>
              <a href='/interest/show'>Книги</a>
            </li>
            <li>
              <a href='/interest/show'>Хобби</a>
            </li>
          </ul>
        </li>
        <li>
          <a href='/photo/show'><i class='fa fa-'></i>Фотоальбом
          </a>
        </li>
        <li>
          <a href='/test/check'><i class='fa fa-'></i>Тест
          </a>
        </li>
        <li>
          <a href='/education/table'><i class='fa fa-'></i>Учеба
          </a>
        </li>
        <li>
          <a href='/about/informat'><i class='fa fa-'></i>Обо мне
          </a>
        </li>
        <li>
          <a href='/contact/test'><i class='fa fa-'></i>Контакты
          </a>
        </li>
        <li>
          <a href='/history/watch'><i class='fa fa-'></i>История
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <?php
  echo $content;
  ?>
</body>

</html>