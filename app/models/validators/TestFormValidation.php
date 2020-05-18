<?php
namespace app\models\validators;


class TestFormValidation extends FormValidation {

  public function __construct() {
    //установка правил валидации
    $this->setRule('1que', 'NotEmpty', 'Ответьте на первый вопрос' );
    $this->setRule('2que', 'NotEmpty', 'Ответьте на второй вопрос');
    $this->setRule('3que', 'NotEmpty', 'Ответьте на третий вопрос'); 
    $this->setRule('fio', 'isFIO', 'В поле ФИО должно иметь вид: Фамилия Имя Отчество.');
  }

}
