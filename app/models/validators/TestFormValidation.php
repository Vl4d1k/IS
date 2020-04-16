<?php
namespace app\models\validators;

use app\core\Model;

class TestFormValidation extends FormValidation {

  public function __construct() {
    $errs = array(
      '2' => 'Выберите ответ на 2ой вопрос!',
      '3' => 'Выберите ответ на 2ой вопрос!' );
    $this->errMsg = $errs;
  }

}
