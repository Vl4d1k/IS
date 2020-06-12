<br>
<div class='alert alert-success' hidden='true' role="alert">Запись отредактирована.</div>
<div class='alert alert-warning' hidden='true' role="alert">Что то пошло не так.</div>
<?php

use app\models\Comment;

$comment = new Comment();

$folder = "/web.loc/public/assets/img/";

foreach ($rows as $temp) {
  echo "<div class='row'> <div class='col-md-10'> <div class='card mb-12 box-shadow'> <div class='card-body'> <h2 id='topic" . $temp['id'] . "'>" . $temp['topic'] . "</h2>";
  echo "<img src='" . $folder . $temp['image'] . "' style='width: 350px'>";
  echo "<div id='text" . $temp['id'] . "' class='card-text'>" . $temp['text'] . "</div>";
  echo "<div class='d-flex justify-content-between align-items-center'>";
  if ($_SESSION['isAdmin'] == 1) echo "<button type='button' data-target='#myModal2' data-toggle='modal' onclick='setBlogIdForRedact(" . $temp['id'] .")' class='btn btn-sm btn-outline-secondary'>Редактировать</button>";
  if ($_SESSION['auth'] == 1) echo "<button type='button' class='btn btn-sm btn-outline-secondary' onclick='setBlogId(" . $temp['id'] .")' data-toggle='modal' data-target='#myModal'>Добавить комментарий</button>";
  echo "<small class='text-muted'></small><small class='text-muted'>" . $temp['created_at'] . "</small></div></div></div></div></div>";
  //комментарии пользователей
  echo "<div class='" . $temp['id'] ."'>";
  $comments = $comment->findComments($temp['id']);
  foreach($comments as $comm){
    echo "<p><b><small class='text-muted'></small><small class='text-muted'>$comm->fio:  </small></b>";
    echo "<small class='text-muted'></small><small class='text-muted'> $comm->comment</small>";
    echo "<small class='text-muted'></small><small class='text-muted'> $comm->created_at</small>";
  }
  echo "</div>";
}
if ($_SESSION['auth'] == 1) echo "<div hidden='true' id='fio'>" . $_SESSION['fio'] . "</div>";
echo "<br><br>";
echo $prev;
echo $next;
echo "<br>";
foreach ($pages as $i) {
  echo $i;
}
?>

<script src="\web.loc\public\assets\js\addComment.js"></script>
<script src="\web.loc\public\assets\js\attachScript.js"></script>

<!-- The Modal -->
<div class="modal" id="myModal" style="margin-top: 200px;">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Добавление комментария</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

        <!-- Modal body -->
        <div class="form-group" style="padding: 20px;">
          <label for="comment">Ваш комментарий:</label>
          <textarea type="text" name="comment" cols="5" rows="5" class="form-control" id="comment"></textarea>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" value="Отправить" id="saveCommentBut" class="btn btn-info">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
        </div>
        
    </div>
  </div>
</div>

<!-- The Modal For Blog -->
<div class="modal" id="myModal2" style="margin-top: 200px;">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Редактирование записи блога</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

        <!-- Modal body -->
        <div class="form-group" style="padding: 20px;">
          <label for="topic">Тема:</label>
          <input type="text" name="topic" class="form-control" id="topic">
        </div>
        <div class="form-group" style="padding: 20px;">
          <label for="message">Текст:</label>
          <textarea type="text" name="message" cols="5" rows="8" class="form-control" id="text"></textarea>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" value="Отправить" id="saveBlogBut" class="btn btn-info">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
        </div>
        
    </div>
  </div>
</div>