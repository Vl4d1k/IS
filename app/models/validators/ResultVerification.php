<?php

namespace app\models\validators;


class ResultVerification extends TestFormValidation
{
  private $result = [];
  private $rigthAns;

  private $answers = array();

  private $userAnswers = array();

  public function __construct()
  {
    parent::__construct();
    $this->setAnswer('1que', '3');
    $this->setAnswer('2que', '2');
    $this->setAnswer('3que', '1');
  }

  public function checkAns()
  {
    $count = 1;
    foreach ($this->answers as $key => $value) {
      $this->userAnswers += [$count.'' => $this->postData[$key]];
      if ($this->postData[$key] == $value) {
        $this->rigthAns++;
        $this->result += [$count.'' => '1'];
      }
      else $this->result += [$count.'' => '0'];
      $count++;
    }
  }
  public function getUserAnswers()
  {
    return $this->userAnswers;
  }

  public function getResult()
  {
    $msg = "Вы ответили верно на " . $this->rigthAns . " из " . count($this->answers) . " вопросов!";
    $this->result += ['message' => $msg];
    return $this->result;
  }

  public function setAnswer($field_name, $anws)
  {
    $this->answers += [$field_name => $anws];
    return true;
  }
}
