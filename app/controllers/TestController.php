<?php
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class TestController extends Controller {
	public function checkAction(){
		$this->view->render('Обо мне');
	}
} 
