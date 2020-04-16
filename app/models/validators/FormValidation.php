<?php
namespace app\models\validators;

use app\core\Model;

class FormValidation{

  public $postData = array();//массив отправленных данных

  public $errors = array();//массив ошибок

  public $patterns = array();//массив правил валидирования

  public $errMsg = array();//массив сообщений об ошибке

  public function __construct() {}

  public function get($field_name = false){
    if ($field_name)
      return $this->postData[$field_name];
    else
      return $this->postData;
  }

  public function post($field)
  {
    $this->postData[$field] = $_POST[$field];
    return $this;
  }

  //метод выполняющий проверку элементов в массиве post_array(добавил $field(поле валидируемой переменной))
  public function Validate($post_array, $field) {
    if (preg_match($this->patterns[$field], $post_array[$field] )) {
      return true;
     }
     else
     {
      array_push($this->errors, $this->errMsg[$field]);
      return false;
     }
       
  }

  //метод, добавляющий в массив Rules проверку для поля field_name типа validator
  public function SetRule($field_name, $validator) {
    $this->patterns += [$field_name => $validator];
    return true;
  }
  //метод, выводящий все сообщения об ошибках из поля Errors
  public function ShowErrors(){
      return $this->errors;
  }

  //метод проверки, что в строке $count слов
  public function Words($str,$count){ 
    if(str_word_count($str) != $count) { 
      array_push($this->errors, "ФИО должно состоять из 3 слов!"); 
      return false; 
    }
    else 
      return true;
  }

  //метод проверки является ли значение data не пустым($field название на русском)
  public function isNotEmpty($data, $field = ' ') {
    if(!empty($data)){
      return true;
    }
    else {
      $msg = "Поле ". $field. " не дожно быть пустым";
      array_push($this->errors, $msg);
      return false;
    }
  }
  
  //метод проверки является ли значение data строковым представлением целого числа
  public function isInteger($data) {
    if(is_int($data))
      return true;
    else 
      return "Поле должно содержать только цифры!";
  }
  //метод проверки является ли  data строковым представлением целого числа и не меньшим, чем value
  public function isLess($data, $value) {
    if( is_int($data) && is_int($value) )
    {
      if($data > $value)
        return true;
      else "Данные меньше указанного значения";
    }   
    else 
      return "Поле должно соддержать только цифры!";
  }

  //метод проверки является ли data строковым представлением целого числа и не большим, чем value
  public function isGreater($data, $value) {
    if( is_int($data) && is_int($value) )
    {
      if($data < $value)
        return true;
      else "Данные больше указанного значения";
    }   
    else 
      return "Поле должно соддержать только цифры!";
  }

  //метод проверки является ли data email
  public function isEmail($data) {
    if($data){
      if (!filter_var($data, FILTER_VALIDATE_EMAIL)) 
      {
        array_push($this->errors, "Почта введена неправильно");
        return false;
      }
      else
        return true;
    }
    else
    {
      array_push($this->errors, "Почта введена неправильно");
      return false;
    }

  }
}
