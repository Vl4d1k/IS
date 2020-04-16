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

	public function render($title,$vars = []) {
		extract($vars);//проверить
		if(file_exists('app/views/'.$this->path.'.php')){
			ob_start();
			require 'app/views/'.$this->path.'.php';
			$content = ob_get_clean();
			require 'app/views/layouts/'.$this->layout.'.php';
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
