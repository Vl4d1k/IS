<?php

namespace app\models;

use app\core\Model;
use app\models\validators\MessageFormValidation;

class Message extends Model
{
  public function __construct($validator = null)
  {
    $validator = new MessageFormValidation;
    parent::__construct($validator);
  }

  public function valid()
  {
    parent::valid();
  }

  public function sendRespons($nameFile, $post_array)
  {
    $respons = [
      $post_array['surname'],
      $post_array['name'],
      $post_array['otch'],
      $post_array['email'],
      date('d.m.Y H:i:s'),
      $post_array['text']
    ];
    $file = fopen("public/files/$nameFile", "a");
    
    foreach ($respons as $temp) {
      fwrite($file, $temp . "; ");
    }
    fwrite($file, "  \n");
    fclose($file);
  }

  public function loadGuestBook($FILES, $nameField){
    if (!empty($FILES)) {
			$file = "C:/xampp/htdocs/web.loc/public/files/" . $_FILES[$nameField]['name'];
			if ($_FILES[$nameField]['error'] == UPLOAD_ERR_OK) {
				move_uploaded_file($_FILES[$nameField]['tmp_name'], $file);
				return true;
			}
		} else {
			return false;
		}
  }

  public function readComments($nameFile, $path)
  {
    $file = fopen("$path/$nameFile", "r");
    $comments = [];


    for ($i = 0; !feof($file); $i++) {
      $str = fgets($file);

      if (empty($str)) continue;

      $spitedStr = explode(';', $str);
      $temp = [
        'surname' => trim($spitedStr[0]),
        'name' => trim($spitedStr[1]),
        'otch' => trim($spitedStr[2]),
        'email' => trim($spitedStr[3]),
        'date' =>  trim($spitedStr[4]),
        'text' => trim($spitedStr[5])
      ];
      $comments[$i] = $temp;
    }

    fclose($file);

    usort($comments, function ($a, $b) {
      return strcmp($a["date"], $b["date"]);
    });

    return $comments;
  }
}
