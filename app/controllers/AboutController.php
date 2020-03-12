<?php
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class AboutController extends Controller {
	public function informatAction(){
		$this->view->render('Обо мне');
	}
} 
