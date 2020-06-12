<?php

namespace app\models;

use app\core\BaseActiveRecord;
use app\models\validators\BlogValidation;


class Blog extends BaseActiveRecord
{

  protected static $tablename = 'blogs';

  public $topic;

  public $image;

  public $text;

  public $created_at;

  public function __construct($validator = null)
  {
    $validator = new BlogValidation;
    parent::__construct($validator);
  }

  public function valid()
  {
    parent::valid();
  }

  public function uploadBlog($post_array, $files_array)
  {
    $this->topic = $post_array['topic'];
    $this->text = $post_array['text'];
    //save image url
    if ($files_array['userFile']['error'] == UPLOAD_ERR_OK) {
      $upload_image = $files_array['userFile']['name'];
      //сделать загрузку пути из config
      $config = require 'app/config/files.php';
      $folder = $config['images'];
      move_uploaded_file($files_array['userFile']['tmp_name'], $folder . $upload_image);
    }
    $this->image = $upload_image;
    $this->save();
  }

  public function loadBlogFromFile($FILES, $nameField)
  {
    if (!empty($FILES)) {
      if ($_FILES[$nameField]['error'] == UPLOAD_ERR_OK) {
        $blogs = [];
        $file = fopen($_FILES[$nameField]['tmp_name'], "r");
        for ($i = 0; !feof($file); $i++) {
          $str = fgets($file);

          if (empty($str)) continue;

          $spitedStr = explode(',', $str);
          $temp = [
            'topic' => trim($spitedStr[0]),
            'text' => trim($spitedStr[1]),
            'created_at' => trim($spitedStr[2]),
          ];
          $blogs[$i] = $temp;
        }
        fclose($file);
        //загрузим наши данные в бд
        foreach ($blogs as $value) {
          $this->topic = $value['topic'];
          $this->text = $value['text'];
          $this->image = 'laravel-6.png';
          $this->created_at = $value['created_at'];
          $this->save();
        }
        return true;
      }
    } else {
      return false;
    }
  }

  public function linksPages()
  {
    // количество записей, выводимых на странице
    $per_page = 2;

    // получаем номер страницы
    $page = (int) (isset($_GET['page']) ? ($_GET['page'] - 1) : 0);

    // вычисляем первый операнд для LIMIT
    $start = abs($page * $per_page);

    // выполняем запрос и выводим записи
    $query = "SELECT * FROM " . static::$tablename . " ORDER BY `" . static::$tablename . "`.`created_at` DESC LIMIT $start, $per_page";

    $rows = static::$pdo->query($query);

    $pages = [];
    // выводим ссылки на страницы:
    $query = "SELECT count(*) FROM " . static::$tablename;
    $total_rows = static::$pdo->query($query)->fetchColumn();

    // Определяем общее количество страниц
    $num_pages = (int) ceil($total_rows / $per_page);

    for ($i = 1; $i <= $num_pages; $i++) {
      // текущую страницу выводим без ссылки
      if ($i - 1 == $page) {
        $pages[$i] = "$i ";

        if( $i + 1 > $num_pages) $next = "<a  class='disabled' href='show?page=" . $i . "'> Следующая </a> ";
        else $next = "<a  class='disabled' href='show?page=" . ($i + 1) . "'> Следующая </a> ";

        if($i - 1 == 0) $prev = "<a class='disabled' href='show?page=" . $i . "'> Предыдущая </a> ";
        else $prev = "<a  href='show?page=" . ($i - 1) . "'> Предыдущая </a> ";

      } else {
        $pages[$i] = "<a href='show?page=" . $i . "'>" . $i . "</a> ";
      }

    }

    return [
      'rows' => $rows,
      'pages' => $pages,
      'prev' => $prev,
      'next' => $next
    ];
  }
}
