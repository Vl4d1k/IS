<?php
namespace app\models;

use app\core\BaseActiveRecord;

class BlogAR extends BaseActiveRecord{

  //ассоциативный массив со значениями

  protected static $tablename = 'blogs';

  public $topic;

  public $image;

  public $text;

  public $created_at;

  public function __construct() {
    parent::__construct();
  }

  public function insert()
  {
    if(empty($this->created_at)) $this->created_at = date("d.m.Y");
    parent::insert();
  }

}
