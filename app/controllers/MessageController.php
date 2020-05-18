<?php

namespace app\controllers;

use app\core\Controller;


class MessageController extends Controller
{

	public function createAction()
	{
		$comments = $this->model->readComments("messages.inc", "public/files");
		$vars = ['comments' => $comments];
		if (!empty($_POST)) {
			$this->model->validator->setPostData($_POST); //положим пост данные в соотвтветствующее поле класс ContactValidator
			$this->model->validator->valid(); //выполним проверку всех данных
			$errors = $this->model->validator->getErrors(); //получим ошибки
			//если есть ошибки, то выведем,если нет, то сохраняем заявку
			if (!empty($errors)) {
				$vars += ['errors' => $errors];
				$this->view->render('Гостевая книга', $vars);
			} else {
				$this->model->sendRespons("messages.inc", $_POST);
				$comments = $this->model->readComments("messages.inc", "public/files");
				$vars['comments'] = $comments;
				$this->view->render('Гостевая книга', $vars);
			}
		} else {
			$this->view->render('Гостевая книга', $vars);
		}
	}

	public function uploadAction()
	{
		if (!empty($_POST)) {
			$result = $this->model->loadGuestBook($_FILES, "userFile");
			$vars = ['result' => $result];
			return $this->view->render('Гостевая книга', $vars);
		} 
		else	
			return $this->view->render('Гостевая книга');
	}
}
