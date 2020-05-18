<br>
<br>
<br>
<div>
  <?php
  for ($i = 0; $i < count($anchors); $i += 2) {
    echo '<p><a href="#' . $anchors[$i] . '">' . $anchors[$i + 1] . '</a></p>';
  }
  ?>
</div>

<h3 id="hobbi">Мое хобби: </h3>
<ul>
  <?php
  for ($i = 0; $i < count($hobbi); $i++) {
    echo '<li>' . $hobbi[$i] . '</li>';
  }
  ?>
</ul>

<p>
  <h3 id="books">Мои любимые книги:</h3>
  <ol>
    <?php
    for ($i = 0; $i < count($books); $i++) {
      echo '<li>' . $books[$i] . '</li>';
    }
    ?>
  </ol>
</p>

<div class="films">
  <h3 id="films">Мои любимые фильмы:</h3>
  <ul>
    <?php
    for ($i = 0; $i < count($films); $i++) {
      echo '<li>' . $films[$i] . '</li>';
    }
    ?>
  </ul>
</div>

<style type="text/css">
  .films {
    position: absolute;
    top: 100%;
  }
</style>
<script>
  $("#body").ready(function() {
    setCookie('interestPage', 1, 10);
    localStorage.setItem('interestPage', Number(localStorage.getItem('interestPage')) + 1);
  });
</script>