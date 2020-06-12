<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Comment;

class CommentController extends Controller
{
  public function addAction(){
    header("Access-Control-Allow-Origin: *");
    $var = json_decode(file_get_contents('php://input'), true);
    $comment = new Comment();
    $comment->comment = $var['comment'];
    $comment->user_id = $_SESSION['user_id'];
    $comment->blog_id = $var['blog_id'];
    $comment->created_at = date('h:m:s d.m.Y');
    $comment->save();
  }
}


