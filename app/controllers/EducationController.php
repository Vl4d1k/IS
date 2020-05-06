<?php
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class EducationController extends Controller {
	public function tableAction(){
		$this->view->render('Обучение');
	}
} 
