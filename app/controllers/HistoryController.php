<?php
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class HistoryController extends Controller {
	public function watchAction(){
		$this->view->render('История');
	}
} 
