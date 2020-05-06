<?php

namespace app\models\validators;


class ResultVerification extends TestFormValidation
{
  private $result = 0;
  private $answers = array();

  public function __construct()
  {
    parent::__construct();
    $this->setAnswer('1que', '3');
    $this->setAnswer('2que', '2');
    $this->setAnswer('3que', '1' );
  }

  public function checkAns()
  {
    foreach ($this->answers as $key => $value) {
      if ($this->postData[$key] == $value) {
        $this->result++;
      }
    }
  }

  public function getResult()
  {
    $msg = "Вы ответили верно на " . $this->result . " из " . count($this->answers) . " вопросов!";
    return $msg;
  }

  public function setAnswer($field_name, $anws)
  {
    $this->answers += [$field_name => $anws];
    return true;
  }
}
