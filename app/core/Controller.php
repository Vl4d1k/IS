<?php
namespace app\core;
use app\core\View;

abstract class Controller {

	public $acl;
	public $route;
	public $view;


	public function __construct($route)
	{
		$this->route = $route;
		if(!$this->checkAcl()){
			//View::redirect('https://developer.android.com/studio');
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($name){
		$path = 'app\models\\'.ucfirst($name);
		if(class_exists($path)) {
			return new $path;
		}
	}

	public function checkAcl(){
		$path = 'app/acl/'.$this->route['controller'].'.php';
		$this->acl = require $path;
		if($this->isAcl('all'))  return true;
		elseif(isset($_SESSION['authorize']['id']) && $this->isAcl('authorize') ) return true;
		elseif(!isset($_SESSION['authorize']['id']) && $this->isAcl('guest') ) return true;
		elseif(isset($_SESSION['admin']['id']) && $this->isAcl('admin') ) return true;
		return false;
	}

	public function isAcl($key){
		return in_array($this->route['action'], $this->acl[$key]);  
	}
}
