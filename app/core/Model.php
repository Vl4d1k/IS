<?php
namespace app\core;
use app\lib\Db;

abstract class Model {

	public $validator;

	//метод validate
	public function valid()
	{
		$this->validator->valid();
	}

	public function __construct($validator = null)
	{
		$this->validator = $validator;
	}
}