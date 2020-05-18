<?php

namespace app\models;

use app\core\Model;
use app\models\BlogAR;
use app\models\validators\BlogValidation;


class Blog extends Model
{
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
    $blog = new BlogAR();
    $blog->topic = $post_array['topic'];
    $blog->text = $post_array['text'];
    $blog->text = $post_array['author'];
    //save image url
    if ($files_array['userFile']['error'] == UPLOAD_ERR_OK) {
      $upload_image = $files_array['userFile']['name'];
      //сделать загрузку пути из config
      $folder = "C:/xampp/htdocs/web.loc/public/assets/img/";
      move_uploaded_file($files_array['userFile']['tmp_name'], $folder . $upload_image);
    }
    $blog->image = $upload_image;
    $blog->save();
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
        $blog = new BlogAR();
        foreach ($blogs as $value) {
          $blog->topic = $value['topic'];
          $blog->text = $value['text'];
          $blog->image = 'laravel-6.png';
          $blog->created_at = $value['created_at'];
          $blog->save();
        }
        return true;
      }
    } else {
      return false;
    }
  }
}
