<?php
namespace app\models\validators;


class ContactFormValidation extends FormValidation {

  public function __construct() {
    //введем правила проверки
    $this->setRule('tel', 'isPhoneNumber' , 'Поле телефон введено не верно');
    $this->setRule('dr', 'isDate', 'Дата должна иметь вид: дд.мм.гггг');
    $this->setRule('fio', 'isFIO', 'В поле ФИО должно иметь вид: Фамилия Имя Отчество.');

    $this->setRule('text', 'NotEmpty', 'Поле текст не должно быть пустым.');
    $this->setRule('text', 'isThereEmail', 'В поле текст должена быть введена электронная почта');

    $this->setRule('sex', 'NotEmpty', 'Выберите пол.');
    $this->setRule('email', 'isEmail', 'Электронная почта должна иметь вид: символы@символы.домен');
  }
  


}
