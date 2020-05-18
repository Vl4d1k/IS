<?php
namespace app\models;

use app\core\BaseActiveRecord;

class TestAR extends BaseActiveRecord{

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

  public function __construct() {
    parent::__construct();
  }

  public function insert()
  {
    $this->created_at = date("d.m.Y");
    parent::insert();
  }

}
