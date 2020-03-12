<?php
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class ContactController extends Controller {
	public function testAction(){
		$this->view->render('Контакты');
	}
} 
