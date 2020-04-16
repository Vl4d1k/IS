<?php
namespace app\models\validators;

use app\core\Model;

class ContactFormValidation extends FormValidation {

  public function __construct() {
    $errs = array(
      'tel' => 'Номер должен иметь вид : +7(10 цифр)',
      'dr' => 'Дата должна иметь вид : дд.мм.гггг' );
    $this->errMsg = $errs;
    $this->SetRule('tel', '/^\+7\d{9}/');
    $this->SetRule('dr',  '/^[0-1][0-9].[0-3][0-9].[0-9]{4}/');
  }
}
