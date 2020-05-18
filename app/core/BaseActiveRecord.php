<?php

namespace app\core;

use PDO;
use PDOException;

class BaseActiveRecord
{

  public static $pdo;

  protected static $tablename;

  public $id = null;

  protected static $fields = array();
  protected static $dbConfig = array();


  public function __construct()
  {
    //config file
    $config = require 'app/config/db.php';
    //set config
    static::setConfigDB($config['host'], $config['user'], $config['pass'], $config['db'], static::$tablename);
    //set connection
    static::setupConnection();
    static::setFields();
  }

  function setConfigDB($host, $user, $pass, $db, $table)
  {
    static::$dbConfig["host"] = $host;
    static::$dbConfig["user"] = $user;
    static::$dbConfig["pass"] = $pass;
    static::$dbConfig["db"] = $db;
    static::$dbConfig["table"] = $table;
  }

  public static function getPdo()
  {
    return static::$pdo;
  }

  public static function setFields()
  {
    $stmt = static::$pdo->query("SHOW FIELDS FROM " . static::$tablename);
    while ($row = $stmt->fetch()) {
      static::$fields[$row['Field']] = $row['Type'];
    }
  }

  public static function setupConnection()
  {
    if (!isset(static::$pdo)) {
      $eror = false;
      try {
        static::$pdo = new PDO('mysql:host=' . static::$dbConfig["host"] . ';dbname=' . static::$dbConfig["db"] . '', static::$dbConfig["user"], static::$dbConfig["pass"]);
      } catch (PDOException $ex) {
        die("Ошибка подключения к БД: $ex");
      }
    }
  }

  public static function find($id)
  {
    $sql = "SELECT * FROM " . static::$tablename . " WHERE id=$id";
    $stmt = static::$pdo->query($sql);
    //использовать fetch ???
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$row) {
      return null;
    }

    //убрать и исправить
    $ar_obj = new static();
    foreach ($row as $key => $value) {
      $ar_obj->$key = $value;
    }

    $object = new static();

    foreach ($value as $key => $val) {
      $object->$key = $val;
    }

    return $object;
  }

  public function delete()
  {
    $sql = "DELETE FROM " . static::$tablename . " WHERE ID=" . $this->id;
    $stmt = static::$pdo->query($sql);
    if ($stmt) {
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
      print_r(static::$pdo->errorInfo());
    }
  }

  public function getFields()
  {
    return static::$fields;
  }

  public function __set($name, $value)
  {
    //$this->fieldsValues[$name] = $value;
    $this->$name = $value;
  }

  public static function query(string $sql): ?array
  {
    $sth = static::$pdo->prepare($sql);
    $result = $sth->execute();

    if (false === $result) {
      return null;
    }

    return $sth->fetchAll(\PDO::FETCH_CLASS, static::class);
  }

  public static function findAll(): array
  {
    return static::query('SELECT * FROM `' . static::$tablename . '` ;');
  }

  //-----------------------------------------------------------------------

  public function __get($field)
  {
    if ($field == 'id' && empty($this->id)) return 'null';
    return $this->$field;
  }

  public function save()
  {

    if ((!empty($this->id))) {
      return static::update();
    } else {
      return static::insert();
    }
  }

  public function insert()
  {
    $insertQuery = 'INSERT INTO `%s` (%s) VALUES (%s)';

    $fieldsStr = '';
    $valuesStr = '';

    //static::$id = null;

    foreach (static::$fields as $field => $key) {
      $fieldsStr .= $field . ",";
      $valuesStr .= "'" . $this->__get($field) . "',";
    }

    $fieldsStr = rtrim($fieldsStr, ",");
    $valuesStr = rtrim($valuesStr, ",");

    $query = sprintf(
      $insertQuery,
      static::$tablename,
      $fieldsStr,
      $valuesStr
    );

    return static::query($query);
  }

  public function update()
  {
    $updateQuery = 'UPDATE `%s` SET %s WHERE id=%s';

    $modifiedFieldsStr = '';

    foreach (static::$fields as $field => $key) {
      $modifiedFieldsStr .= $field . "='" . $this->__get($field) . "',";
    }

    $modifiedFieldsStr = rtrim($modifiedFieldsStr, ",");

    $query = sprintf($updateQuery, static::$tablename, $modifiedFieldsStr, $this->id);

    return static::query($query);
  }
}
