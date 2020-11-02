<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Blog;

class BlogController extends Controller
{
  public function redactAction()
  {
    if ($this->authenticate()) {
      if (!empty($_POST)) {
        $this->model->validator->setPostData($_POST); //положим пост данные в соотвтветствующее поле класс ContactValidator
        $this->model->validator->valid(); //выполним проверку всех данных
        $errors = $this->model->validator->getErrors(); //получим ошибки
        if (empty($errors)) {
          $this->model->uploadBlog($_POST, $_FILES);
          return $this->view->render('Редактор блога');
        } else {
          $vars = ['errors' => $errors];
          return $this->view->render('Редактор блога', $vars, 'auth');
        }
      }
      return $this->view->render('Редактор блога', $vars = [], 'auth');
    } else $this->view->redirect("/web.loc/auth/login");
  }

  public function uploadAction()
  {
    if ($this->authenticate()) {
      if (!empty($_POST)) {
        $result = $this->model->loadBlogFromFile($_FILES, "userFile");
        $vars = ['result' => $result];
        return $this->view->render('Гостевая книга', $vars, 'auth');
      } else
        return $this->view->render('Гостевая книга', $vars = [], 'auth');
    } else $this->view->redirect("/web.loc/auth/login");
  }

  public function showAction()
  {
    $vars = $this->model->linksPages();
    return $this->view->render('Мой блог', $vars);
  }

  public function updateAction()
  {
    $query = parse_url($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])['query'];
    $vars = array();
    $values = explode("&", urldecode($query));
    foreach($values as $value){
      $mas = explode("=", $value);
      $vars += [$mas[0]=>$mas[1]];
    }
    $blog = new Blog();
    if($currentBlog = $blog->find($vars['id'])) {
      $currentBlog->text = $vars['text'];
      $currentBlog->topic = $vars['topic'];
      if($currentBlog->save()){
        echo '$(".alert-success").fadeIn(); setTimeout(() => $(".alert-success").fadeOut(), 2000);';
      }
      else echo '$(".alert-warning").fadeIn(); setTimeout(() => $(".alert-warning").fadeOut(), 2000);';
    }
    else {
      echo '$(".alert-warning").fadeIn(); setTimeout(() => $(".alert-warning").fadeOut(), 2000);';
    }      
  }
}
