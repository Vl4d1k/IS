<?php
namespace app\models;

use app\core\BaseActiveRecord;
use app\models\validators\ResultVerification;

class Test extends BaseActiveRecord
{

  protected static $tablename = 'messages';

  public $fio;
  public $result;
  public $created_at;
  public $flag1;
  public $flag2;
  public $flag3;
  public $ans1;
  public $ans2;
  public $ans3;

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

    $this->fio = $fio;
    $this->result = $result['message'];
    
    $this->flag1 = $result['1'];
    $this->flag2 = $result['2'];
    $this->flag3 = $result['3'];

    $this->ans1 = $answers[1];
    $this->ans2 = $answers[2];
    $this->ans3 = $answers[3];

    $this->save();
  }
}
