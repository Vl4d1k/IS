<link href='/web.loc/public/assets/css/tablestyl.css' rel='stylesheet'>
<br>
<table position="center">
  <tr>
    <td>История за cесию</td>
  </tr>
</table>
<table id="firTb" class="table_blur">
  <tr>
    <td class="sem">Страница</td>
    <td>Главная</td>
    <td>Мои интересы</td>
    <td>Фотоальбом</td>
    <td>Тест</td>
    <td>Учеба</td>
    <td>Обо мне</td>
    <td>Контакты</td>
    <td>История</td>
  </tr>
  <tr>
    <td class="sem">Количество посещений</td>
    <td>
      <script lang="javascript">
        document.write(localStorage.getItem('mainPage')) //innerHtml
      </script>
    </td>
    <td>
      <script>
        document.write(localStorage.getItem('interestPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(localStorage.getItem('photosPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(localStorage.getItem('testPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(localStorage.getItem('educPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(localStorage.getItem('aboutPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(localStorage.getItem('contactPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(localStorage.getItem('sesPage'));
      </script>
    </td>
  </tr>
</table>
<table class="center">
  <tr>
    <td>История за все время</td>
  </tr>
</table>
<table id="secTb" class="table_blur">
  <tr>
    <td class="sem">Страница</td>
    <td>Главная</td>
    <td>Мои интересы</td>
    <td>Фотоальбом</td>
    <td>Тест</td>
    <td>Учеба</td>
    <td>Обо мне</td>
    <td>Контакты</td>
    <td>История</td>
  </tr>
  <tr>
    <td class="sem">Количество посещений</td>
    <td>
      <script>
        document.write(getCookies('mainPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(getCookies('interestPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(getCookies('photosPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(getCookies('testPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(getCookies('educPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(getCookies('aboutPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(getCookies('contactPage'));
      </script>
    </td>
    <td>
      <script>
        document.write(getCookies('sesPage'));
      </script>
    </td>
  </tr>
</table>
<script>
    $("#body").ready(function () {
      setCookie('sesPage', 1, 10);
      localStorage.setItem('sesPage', Number(localStorage.getItem('sesPage')) + 1);
    });
  </script>