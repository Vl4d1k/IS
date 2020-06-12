<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Visitors;
use app\models\User;
use SimpleXMLElement;

class AuthController extends Controller
{

	public function showAction()
	{
		$visitor = new Visitors();
		if ($this->authenticate()) {
			$this->view->render('Панель администратора', $visitor->linksPages(), 'auth');
		} else $this->view->redirect("/web.loc/auth/login");
	}

	public function loginAction()
	{
		$result = false;
		if (!empty($_POST)) {
			$users = new User();
			$users = User::findAll();
			foreach ($users as $user) {
				if (($_POST['email'] == $user->login) && (md5($_POST['password']) == $user->password)) {
					$_SESSION['auth'] = 1;
					$_SESSION['fio'] = $user->fio;
					$_SESSION['login'] = $user->login;
					$_SESSION['user_id'] = $user->id;
					if ($user->is_admin == 1) {
						$_SESSION['isAdmin'] = 1;
						$this->view->redirect("/web.loc/auth/show");
					} else {
						$_SESSION['isAdmin'] = 0;
						$this->view->redirect("/web.loc");
					}
				}
			}
		}
		$this->view->render('Авторизация', $vars = ['result' => $result], 'auth');
	}

	public function logoutAction()
	{
		$_SESSION['auth'] = 0;
		if (isset($_SESSION['isAdmin'])) $_SESSION['isAdmin'] = 0;
		$this->view->redirect("/web.loc");
	}

	public function registAction()
	{
		$result = ['result' => null];
		if (!empty($_POST)) {
			$user = new User();
			$result = $user->saveUser($_POST['fio'], $_POST['email'], $_POST['login'], md5($_POST['password']));
			$this->view->render('Регистрция', $result, 'auth');
		} else $this->view->render('Регистрция', $result, 'auth');
	}

	public function uniqueAction()
	{
		$unique = true;
		
		header("Access-Control-Allow-Origin: *");

		$login = new SimpleXMLElement(file_get_contents('php://input'));

		$user = new User();	

		$unique = $user->findByLogin($login);

		if ($unique) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
