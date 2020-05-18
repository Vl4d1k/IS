<?php
namespace app\models\validators;


class BlogValidation extends FormValidation {

  public function __construct() {
    //установка правил валидации
    $this->setRule('topic', 'NotEmpty', 'Поле тема не должно быть пусты.');
    $this->setRule('userFile', 'Loaded', 'Файл должен быть загружен.');
    $this->setRule('text', 'NotEmpty', 'Текст не должен быть пустым.');
  }

}
