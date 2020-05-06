<?php
namespace app\controllers;

use app\core\Controller;

class PhotoController extends Controller {
	public function showAction(){
		$titleFromModel = $this->model->getTitles();
		$srcFromModel = $this->model->getSrcs();
		$vars = [
			'titles' => $titleFromModel,
			'src' => $srcFromModel,
		];
			$this->view->render('Страница Фото', $vars);
	}
} 
