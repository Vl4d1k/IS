<div class='modal' id='myModal'>
  <span class='close'>×</span>
  <img class='modal-content' id='img01' height='300'>
  <div class='arrows'>
    <i class='arrow' id='left'></i>
    <i class='unselectable' id='arrText'>Фото из 15"</i>
    <i class='arrow' id='right'></i>
  </div>
</div>
<div class='gallery'>

  <?php
  $id = 1;
  for ($i = 1; $i <= 3; $i++) {
    echo '<div class="phblock">';
    for ($j = 1; $j <= 5; $j++) {
      echo '<img class="onePhot" alt="" height="120" id="' . $id . '" src="' . $src[$id - 1] . '" title="' . $titles[$id - 1] . '" width="120">';
      $id++;
    }
    echo '</div>';
  }
  ?>
  <script>
    id_str = 0;
    $(function() {
      $(".onePhot").bind('click', function() {
        showPhoto(Number($(this).attr('id')));
      });
    });

    function showPhoto(id) {
      if (id > 0 && id < 16) {
        id_str = id;
      }
      let name = "#" + id_str;
      var image = $(name).attr("src");
      $("#myModal").show();
      $("#img01").attr("src", image);
      $("#arrText").text("Фото " + id_str + " из 15");
      $(".close").click(function() {
        $("#myModal").hide();
      });
    }

    function swapPhoto(id) {
      if (id > 0 && id < 16) {
        id_str = id;
      }
      $("#myModal").show();
      let name = "#" + id_str;
      var image = $(name).attr("src");
      if (image) {
        $("#img01").attr("src", image);
        $("#arrText").text("Фото " + id_str + " из 15");
        $(".close").click(function() {
          $("#myModal").hide();
        });
      }
    }

    $(function() {
      $("#right").bind('click', function() {
        swapPhoto(Number(id_str) + 1);
      });
      $(function() {
        $("#left").bind('click', function() {
          swapPhoto(Number(id_str) - 1);
        });
      });
    });

    $('body').keypress(function(event) {
      if (event.keyCode == 108) swapPhoto(Number(id_str) + 1);
      if (event.keyCode == 107) swapPhoto(Number(id_str) - 1);
    });
  </script>
</div>
<script>
  $("#body").ready(function() {
    setCookie('photosPage', 1, 10);
    localStorage.setItem('photosPage', Number(localStorage.getItem('photosPage')) + 1);
  });
</script>