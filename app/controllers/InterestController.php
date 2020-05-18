<?php
namespace app\controllers;

use app\core\Controller;

class InterestController extends Controller {
	public function showAction(){
		$anchorsFromModel = $this->model->getAnchors();
		$hobbiFromModel = $this->model->getHobbi();
		$filmsFromModel = $this->model->getFilms();
		$booksFromModel = $this->model->getBooks();
		$vars = [
			'anchors' => $anchorsFromModel,
			'films' => $filmsFromModel,
			'books' => $booksFromModel,
			'hobbi' => $hobbiFromModel,
		];

		$this->view->render('Интересы', $vars);
	}
} 
