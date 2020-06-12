<?php

namespace app\core;

class View{
 
	public $path;
	public $route;
	public $layout = 'default';


	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['controller'].'/'. $route['action'];
	}

	public function render($title,$vars = [], $masterTemplate = false) {
		extract($vars);//проверить
		if(file_exists('app/views/'.$this->path.'.php')){
			$view = 'app/views/'.$this->path.'.php';
			if($masterTemplate){
				require 'app/views/layouts/'.$masterTemplate.'.php';
			}
			else require 'app/views/layouts/'.$this->layout.'.php';
		}
		else echo 'View not FOUND:'.$this->path;
	}
	
	public function redirect($url){
		header('location: '.$url);
		exit;
	}

	public function message($status, $message){
			exit(json_encode(['status'=> $message, 'message' => $status]));
	}
}

?>
