<?php
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\validators\ContactFormValidation;

class ContactController extends Controller {
	public function testAction(){
		if(!empty($_POST)){
			$this->model->validator->setPostData($_POST); //положим пост данные в соотвтветствующее поле класс ContactValidator
			$this->model->validator->valid(); //выполним проверку всех данных
			$errors = $this->model->validator->getErrors(); //получим ошибки
			$vars = [
				'errors' => $errors
			];
			$this->view->render('Контакты', $vars);
		}
		else
			$this->view->render('Контакты');
	}
} 
