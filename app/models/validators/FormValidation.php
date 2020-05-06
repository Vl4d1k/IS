<?php

namespace app\models\validators;

class FormValidation
{

  public $postData = array(); //массив отправленных данных

  public $errors = array(); //массив ошибок

  public $rules = array(); //массив правил валилирования

  public $currentRule = 0;

  public function __construct()
  {
  }

  public function valid()
  {
    var_dump($this->rules);
    die();
    foreach ($this->rules as $rule) {
      switch ($rule['rule']) {

        case 'isFIO':
          $this->isFIO($rule['field_name']);
          break;
        case 'isDate':
          $this->isDate($rule['field_name']);
          break;
        case 'NotEmpty':
          $this->isNotEmpty($rule['field_name']);
          break;
        case 'isEmail':
          $this->isEmail($rule['field_name']);
          break;
        case 'isThereEmail':
          $this->isThereEmail($rule['field_name']);
          break;
        case 'isPhoneNumber':
            $this->isPhoneNumber($rule['field_name']);
            break;
      }
      $this->currentRule++;
    }
  }

  public function isFIO($field){
    $passed = false;
    if ($this->postData[$field]) {
      $words = explode(" ", $this->postData[$field]);
      foreach ($words as $word) {
        if (preg_match( '/([А-ЯЁ][а-яё]+[\-\s]?){3,}/' , $word)) {
          $passed = true;
          break;
        }
      }

      if ($passed) {
        return true;
      } else {
        array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
        return false;
      }
    } else {
      array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
      return false;
    }
  }

  public function isPhoneNumber($field){
    $passed = false;
    if ($this->postData[$field]) {
      $words = explode(" ", $this->postData[$field]);
      foreach ($words as $word) {
        if (preg_match( '/^\+7\d{9}/' , $word)) {
          $passed = true;
          break;
        }
      }

      if ($passed) {
        return true;
      } else {
        array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
        return false;
      }
    } else {
      array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
      return false;
    }
  }

    //метод проверки является ли значение data не пустым
    public function isNotEmpty($field)
    {
      if (!empty($this->postData[$field])) {
        return true;
      } else {
        array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
        return false;
      }
    }
  
    public function isThereEmail($field)
    {
      $passed = false;
      if ($this->postData[$field]) {
        $words = explode(" ", $this->postData[$field]);
        foreach ($words as $word) {
          if (filter_var($word, FILTER_VALIDATE_EMAIL)) {
            $passed = true;
            break;
          }
        }
  
        if ($passed) {
          return true;
        } else {
          array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
          return false;
        }
      } else {
        array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
        return false;
      }
    }
  
    public function isEmail($field)
    {
      if ($this->postData[$field]) {
        if (!filter_var($this->postData[$field], FILTER_VALIDATE_EMAIL)) {
          array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
          return false;
        } else {
          return true;
        }
      } else {
        array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
        return false;
      }
    }

  public function isDate($field){
    $passed = false;
    if ($this->postData[$field]) {
      $words = explode(" ", $this->postData[$field]);
      foreach ($words as $word) {
        if (preg_match( '/^[0-1][0-9].[0-3][0-9].[0-9]{4}/' , $word)) {
          $passed = true;
          break;
        }
      }

      if ($passed) {
        return true;
      } else {
        array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
        return false;
      }
    } else {
      array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
      return false;
    }
  }

  public function get($field_name = false)
  {
    if ($field_name)
      return $this->postData[$field_name];
    else
      return $this->postData;
  }

  public function setPostData($data)
  {
    $this->postData = $data;
    return $this;
  }

  //метод выполняющий проверку элементов в массиве post_array(добавил $field(поле валидируемой переменной))
  public function checkWithRegExp($post_array, $field)
  {
    if (preg_match($this->patterns[$field], $post_array[$field])) {
      return true;
    } else {
      array_push($this->errors, $this->rules[$this->currentRule]['errorMsg']);
      return false;
    }
  }

  //метод, добавляющий в массив Rules проверку для поля field_name типа validator
  public function setPattern($field_name, $validator)
  {
    $this->patterns += [$field_name => $validator];
    return true;
  }

  //метод, выводящий все сообщения об ошибках из поля Errors
  public function getErrors()
  {
    return $this->errors;
  }

  public function setRule($field_name, $rule, $errorMsg)
  {
    $rule = array('field_name' => $field_name,'rule' => $rule,'errorMsg' => $errorMsg);
    array_push($this->rules, $rule);
    return $this;
  }
}
