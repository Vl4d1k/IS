<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
  <meta charset='UTF-8'>
  <meta content='width=device-width, initial-scale=1.0' name='viewport'>
  <meta content='ie=edge' http-equiv='X-UA-Compatible'>

  <link href='/web.loc/public/assets/css/media.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src='/web.loc/public/assets/js/jquery.js' type='text/javascript'></script>
  <script src='/web.loc/public/assets/js/history.js' type='text/javascript'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel" style="margin : 0;">
    <div class="container">
      <a class="navbar-brand" href="/web.loc">Вернуться на сайт</a>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        <?php if($_SESSION['isAdmin'] == 1) echo "<li><a href='/web.loc/blog/upload'>Загрузка блога</a></li>
          <li><a href='/web.loc/blog/redact'>Редактор блога</a></li>
          <li><a href='/web.loc/auth/show'>Информации о посетителях</a></li>"
        ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
          <?php if(($_SESSION['isAdmin'] == 1) || ($_SESSION['auth'] == 1) ) echo "<a class='nav-link' href='/web.loc/auth/logout'><span class='glyphicon glyphicon-user'></span> Выйти</a>" ;
             else echo "<a class='nav-link' href='/web.loc/auth/login'><span class='glyphicon glyphicon-user'></span> Войти</a><li class='nav-item'><a class='nav-link' href='/web.loc/auth/regist'>Зарегистрираваться</a></li>";
          ?>
          </li>
        </ul>
      </div>
    </div>

  </nav>
  <div class="container">
    <?php
    require $view;
    ?>
  </div>
</body>

</html>