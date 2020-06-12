<?php
namespace app\controllers;

use app\core\Controller;
use app\models\User;

class MainController extends Controller {
	public function indexAction(){	
		$this->view->render('Главная станичечка');
	}
} 
