<?php
namespace app\models;

use app\core\Model;
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
}
