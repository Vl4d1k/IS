<?php
namespace app\models\validators;


class  MessageFormValidation extends FormValidation {

  public function __construct() {
    //введем правила проверки
    $this->setRule('surname', 'NotEmpty', 'Поле фамилия не должно быть пустым.');
    $this->setRule('name', 'NotEmpty', 'Поле имя не должно быть пустым.');
    $this->setRule('otch', 'NotEmpty', 'Поле отчество не должно быть пустым.');
    $this->setRule('text', 'NotEmpty', 'Поле текст не должно быть пустым.');
    $this->setRule('email', 'isEmail', 'Электронная почта должна иметь вид: символы@символы.домен');
  }
  


}
