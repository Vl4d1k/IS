<?php

namespace app\core;

use PDO;

class BaseActoiveRecord {
	const DEFAULT_CHARSET = 'UTF8';
	const DEFAULT_LIMIT = 500;

	private static $db = null;

	private $fields   = [];

	protected $dbConfig = array();

	public function __construct()	{
		//config file
		$config = require 'app/config/db.php';
		//set config
		$this->setConfigDB($config['host'], $config['user'], $config['pass'], $config['db'], lcfirst(get_class($this)).'s');
		//connect to db
		$this->init_connected_db();
	}

	function setConfigDB($host, $user, $pass, $db, $table) {
			$this->dbConfig["host"] = $host;
			$this->dbConfig["user"] = $user;
			$this->dbConfig["pass"] = $pass;
			$this->dbConfig["db"] = $db;
			$this->dbConfig["table"] = $table;
	}

	protected function init_connected_db() {
		$this->db = new PDO('mysql:host='.$this->dbConfig["host"].';dbname='.$this->dbConfig["db"].'',$this->dbConfig["user"],$this->dbConfig["pass"]);
	}

	function insert($keys, $values) {
		$table = $this->dbConfig["table"];
		$query = "INSERT INTO $table (";
		foreach ($keys as $key) {
				$query.="$key, ";
		}

		$query = substr($query, 0, -2);
		$query.=") VALUES (";
		foreach ($values as $value) {
				$query.="$value, ";
		}
		$query = substr($query, 0, -2);
		$query.=");";

		if($result = $this->db->query($query)) return true;
		else return false;
	}
	
	function selectAll() {
		$table = $this->dbConfig["table"];
		$query = "SELECT * FROM $table;";
		$this->init_connected_db();
		return $this->db->query($query);
	}

	function select() {
		$table = $this->dbConfig["table"];
		$query = "SELECT ";
		foreach ($this->fields as $value) {
			$query.="$value, ";
		}

		$query = substr($query, 0, -2);
		$query.=" FROM $table";

		return $this->db->query($query);
	}

	function delete($key, $value) {
		$table = $this->dbConfig["table"];
		$query = "DELETE FROM $table WHERE $key=$value;";
		$this->init_connected_db();
		return $this->db->query($query);
	}

	function update($key, $value, $where_key, $where_value) {
		$table = $this->dbConfig["table"];
		$query = "UPDATE $table SET $key =$value WHERE $where_key=$where_value;";
		$this->init_connected_db();
		return $this->db->query($query);
	}
}
