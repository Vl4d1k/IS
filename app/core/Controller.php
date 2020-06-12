<?php

namespace app\core;

use app\core\View;
use app\models\Visitors;

abstract class Controller
{

	public $acl;
	public $route;
	public $view;


	public function __construct($route)
	{
		$this->route = $route;
		
		$path = parse_url($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])['path'];
		if ($_SERVER['REQUEST_METHOD'] == 'GET' && $path != "localhost/web.loc/blog/update") {
			//передаём в бд данные о пользователе	
			//$visitor = new Visitors();
			//$visitor->save_statistic($this->route['controller'] . '/' . $this->route['action']);
		}
		

		if (!$this->checkAcl()) {
			//View::redirect('https://developer.android.com/studio');
		}


		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	public function authenticate()
	{
		if ($_SESSION['isAdmin'] == 1) {
			return true;
		} else return false;
	}

	public function loadModel($name)
	{
		$path = 'app\models\\' . ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	public function checkAcl()
	{
		$path = 'app/acl/' . $this->route['controller'] . '.php';
		$this->acl = require $path;
		if ($this->isAcl('all'))  return true;
		elseif (isset($_SESSION['authorize']['id']) && $this->isAcl('authorize')) return true;
		elseif (!isset($_SESSION['authorize']['id']) && $this->isAcl('guest')) return true;
		elseif (isset($_SESSION['admin']['id']) && $this->isAcl('admin')) return true;
		return false;
	}

	public function isAcl($key)
	{
		return in_array($this->route['action'], $this->acl[$key]);
	}
}
