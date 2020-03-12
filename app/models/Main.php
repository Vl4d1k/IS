<?php
namespace app\models;

use app\core\Model;

class Main extends Model{
	public function getDescr(){
		$desctription = '<p>Стельмах Владислав Олегович ИС-32</p>';
		return $desctription;
	}
}
