<?php

namespace app\controllers;

use app\core\Controller;

class TestController extends Controller
{
	public function checkAction()
	{
		//изменения
		$allResults = $this->model->findAll();

		$vars = ['allResults' => $allResults];
		if (!empty($_POST)) {
			$this->model->validator->setPostData($_POST); //положим пост данные в соотвтветствующее поле класс ResultValidator
			$this->model->validator->valid(); //выполним проверку всех данных
			$errors = $this->model->validator->getErrors(); //получим ошибки
			//eсли ошибок нет, то проверим проверим правильность ответов
			if (empty($errors)) {
				//проверим правильность отсветом
				$this->model->validator->checkAns();
				//получим результт
				$result = $this->model->validator->getResult();
				$answers = $this->model->validator->getUserAnswers();

				//вызовем метод который сохранит результат в бд
				$this->model->saveResult($_POST['fio'], $result,$answers);

				//снова делаем запрос в бд
				$allResults = $this->model->findAll();
				$vars['allResults'] = $allResults;
				//передадим результат во вьюшку
				$vars += ['result' => $result];
				$this->view->render('Тест', $vars);
			} else {
				$vars += ['errors' => $errors];
				$this->view->render('Тест', $vars);
			}
		} else {
			$this->view->render('Тест', $vars);
		}
	}
}
