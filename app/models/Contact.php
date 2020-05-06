<?php
namespace app\models;

use app\core\Model;
use app\models\validators\ContactFormValidation;

class Contact extends Model{
  
  public function __construct($validator = null)
	{
    $validator = new ContactFormValidation;
    parent::__construct($validator);
  }

  public function valid()
	{
    parent::valid();
  }
}
