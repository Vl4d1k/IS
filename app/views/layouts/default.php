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
  <link href="/web.loc/public/assets/css/started.css" rel="stylesheet">
  <script src='/web.loc/public/assets/js/jquery.js' type='text/javascript'></script>
  <script src='/web.loc/public/assets/js/history.js' type='text/javascript'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="/web.loc/">Главная</a></li>
          <li><a href="/web.loc/blog/show">Блог</a></li>
          <li><a href="/web.loc/photo/show">Фото</a></li> 
          <li><a href="/web.loc/education/table">Учеба</a></li>
          <li><a href="/web.loc/about/informat">Обо мне</a></li>
          <li><a href="/web.loc/contact/test">Контакты</a></li>
          <li><a href="/web.loc/test/check">Тест</a></li>
          <li><a href="/web.loc/history/watch">История</a></li>
          <li><a href="/web.loc/message/create">Отзывы</a></li>
          <li><a href="/web.loc/message/upload">Загрузить</a></li>
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
          <?php if( !empty($_SESSION['isAdmin']) and $_SESSION['isAdmin'] == 1) 
					echo "<li><a href='/web.loc/auth/show' class='dropdown-toggle'>Админка</span></a></li>";
		  ?> 

          <?php if( !empty($_SESSION['isAdmin']) and $_SESSION['auth'] == 1) 
					echo "<li><a href=''>".$_SESSION['fio']."</a></li><li><a href='/web.loc/auth/logout'> Выйти</a></li>" ;
				else 
					echo "<li><a href='/web.loc/auth/login'><span class='glyphicon glyphicon-user'></span> Войти</a></li>";
          ?>
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