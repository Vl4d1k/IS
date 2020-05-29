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
}
