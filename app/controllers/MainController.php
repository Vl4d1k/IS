<?php
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class MainController extends Controller {
	public function indexAction(){
		/*
		$db = new Db;
		$data = $db -> row('SELECT password FROM `users` WHERE login = 2');
		debug($data);
		$result = $this->model->getDescr();
		$vars = [
			'description' => $result,
		];
		*/
		$this->view->render('Главная станичечка');
	}

} 
