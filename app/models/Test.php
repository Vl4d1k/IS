<?php
namespace app\models;

use app\core\Model;
use app\Models\TestAR;
use app\models\validators\ResultVerification;

class Test extends Model{
  public function __construct($validator = null)
	{
    $validator = new ResultVerification;
    parent::__construct($validator);
  }

  public function valid()
	{
    parent::valid();
  }

  public function saveResult($fio, $result, $answers){
    $message = new TestAR;
    $message->fio = $fio;
    $message->result = $result['message'];
    
    $message->flag1 = $result['1'];
    $message->flag2 = $result['2'];
    $message->flag3 = $result['3'];

    $message->ans1 = $answers[1];
    $message->ans2 = $answers[2];
    $message->ans3 = $answers[3];

    $message->save();
  }
}
