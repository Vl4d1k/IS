<?php
namespace app\models\validators;

use app\core\Model;

class ResultVerification extends TestFormValidation {
  private $result = 0;
  private $questions = 0;

  public function __construct() {
    parent::__construct();
  }

  public function checkAns($field, $ans){
    if($this->postData[$field] == $ans)
    {
      $this->result++;
    }
    $this->questions++;
  }

  public function getResult(){
    $msg = "Вы ответили верно на ". $this->result. " из ".$this->questions. " вопросов!";
    return $msg;
  }
}
