<?php
$folder = "/web.loc/public/assets/img/";
foreach ($blogs as $blog) {
  echo "<div class='row'> <div class='col-md-10'> <div class='card mb-8 box-shadow'> <div class='card-body'> <h2>".$blog->text."</h2>";
  echo "<img src='" . $folder.$blog->image . "' style='width: 650px'>";
  echo "<p class='card-text'>" . $blog->text . "</p>";
  echo "<div class='d-flex justify-content-between align-items-center'>
    <!--<div class='btn-group'><button type='button' class='btn btn-sm btn-outline-secondary'>View</button>
    <button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button></div>";
  echo "<small class='text-muted'></small>--><small class='text-muted'>".$blog->created_at."</small></div></div></div></div></div>";
}
?>




