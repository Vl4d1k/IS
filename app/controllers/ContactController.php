<?php
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class ContactController extends Controller {
	public function testAction(){
		if(!empty($_POST)){
			$errors = array(
				'Заполните поле текст.',
			);
			$vars = [
				'errors' => $errors
			];
			$this->view->render('Контакты', $vars);
		}
		else
			$this->view->render('Контакты');
	}

	public function sendAction(){
		if(!empty($_POST)){
			$errors = array(
				'Заполните поле текст.',
			);
			$vars = [
				'errors' => $errors
			];
			$this->view->render('Контакты', $vars);
		}
	}

} 
