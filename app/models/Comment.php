<?php

namespace app\models;

use app\core\BaseActiveRecord;

class Comment extends BaseActiveRecord
{
  protected static $tablename = 'comments';

  public $comment;
  public $user_id;
  public $blog_id;

  public function __construct($validator = null)
  {
    parent::__construct($validator);
  }

  public function valid()
  {
    parent::valid();
  }

  public static function findCommentsWithUserLogin($blog_id): array
  {
    return static::query('SELECT `comments`.`id`,`comments`.`blog_id`,`comments`.`comment`,`comments`.`created_at`,`users`.`fio` FROM `comments` INNER JOIN `users` ON `comments`.`user_id` = `users`.`id` WHERE blog_id = '.$blog_id.';');
  }
}
