<?php

namespace app\models;

use app\core\BaseActiveRecord;
use PDO;

class User extends BaseActiveRecord
{
  protected static $tablename = 'users';

  public $fio;
  public $is_admin;
  public $email;
  public $login;
  public $password;

  public function __construct($validator = null)
  {
    parent::__construct($validator);
  }

  public function valid()
  {
    parent::valid();
  }

  public function findByLogin($login){
    $result = $this->query('SELECT login FROM ' . static::$tablename . ' WHERE login=\'' .$login. '\';');
    return empty($result);
  }



  public function saveUser($fio, $email, $login, $password)
  {
    $this->is_admin = 0;
    $this->fio = $fio;
    $this->email = $email;
    $this->login = $login;
    $this->password = $password;
    
    $unique = $this->findByLogin($login);

    if ($unique) {
      $this->save();
      $result = true;
      $message = 'Пользователь зарегистрирован.';
      return ['result' => $result, 'message' => $message];
    } else {
      $result = false;
      $message = 'Пользователь c таким логином уже зарегистрирован.';
      return ['result' => $result, 'message' => $message];
    }
  }
}
