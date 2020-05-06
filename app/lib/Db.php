<?php

namespace app\lib;
use PDO;

class Db {

	protected $db;

	public function __construct()	{
		//config file
		$config = require 'app/config/db.php';
		//connect to bd
		$host = $config['host'];
		$name = $config['dbname'];
		$user = $config['user'];
		$password = $config['password'];
		$this->db = new PDO('mysql:host='.$host.';dbname='.$name.'',$user,$password);
	}

	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql,  $params = []) {
		$result = $this->query($sql);
		return $result->fetchColumn();
	}
}

?>

