<?php

namespace app\controllers;

use app\core\Controller;
use app\Models\BlogAR;

class BlogController extends Controller
{

	public function redactAction()
	{
    if (!empty($_POST)) {
			$this->model->validator->setPostData($_POST); //положим пост данные в соотвтветствующее поле класс ContactValidator
			$this->model->validator->valid(); //выполним проверку всех данных
      $errors = $this->model->validator->getErrors(); //получим ошибки
      if (empty($errors)) {
        $this->model->uploadBlog($_POST, $_FILES);
        return $this->view->render('Редактор блога');
      }
      else {
        $vars = ['errors' => $errors];
        return $this->view->render('Редактор блога', $vars);
      }
    }
    return $this->view->render('Редактор блога');
  }

  public function uploadAction(){
    if (!empty($_POST)) {
			$result = $this->model->loadBlogFromFile($_FILES, "userFile");
			$vars = ['result' => $result];
			return $this->view->render('Гостевая книга', $vars);
		} 
		else	
			return $this->view->render('Гостевая книга');
  }

  public function showAction(){
    $blog = new BlogAR;
    $blogs = $blog->findAll();

    usort($blogs, function ($a, $b) {
      return strcmp($a->created_at, $b->created_at);
    });
    
    $vars = ['blogs' => $blogs];
    return $this->view->render('Мой блог', $vars);
  }
}