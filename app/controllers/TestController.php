<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class TestController extends Controller
{
	public function checkAction()
	{
		if (!empty($_POST)) {
			$this->model->validator->setPostData($_POST); //положим пост данные в соотвтветствующее поле класс ResultValidator
			$this->model->validator->valid(); //выполним проверку всех данных
			$errors = $this->model->validator->getErrors(); //получим ошибки
			//eсли ошибок нет, то проверим проверим правильность ответов
			if (empty($errors)) {
				$this->model->validator->checkAns();
				$result = $this->model->validator->getResult();
				$vars = [
					'errors' => $errors,
					'result' => $result
				];
			}
			else 
			$vars = [
				'errors' => $errors,
			];
			$this->view->render('Тест', $vars);
		} else
			$this->view->render('Тест');
	}
}
