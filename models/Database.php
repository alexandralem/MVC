<?php

require_once("./includes/config.php");

class Database {  // our base model class we will extend

	protected $connection;
	protected $table;
	public $rows;
	protected $fields = array();
	

	public function __construct() {
		$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8mb4";
		try {
		  $this->connection = new PDO($dsn, DB_USER, DB_PASS);
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}
	}
	
	public function getAll() {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table. " INNER JOIN tbl_roles ON tbl_users.role_id=tbl_roles.role_id");
		$stmt->execute();
		$this->rows = $stmt->rowCount();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		return $arr;
		$stmt = null;
	}
	
	public function getOne($id) {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table." INNER JOIN tbl_roles ON tbl_users.role_id=tbl_roles.role_id WHERE id = ?");
		$stmt->execute([$id]);
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		return $arr;
		$stmt = null;
	}

	public function search($fld, $str) {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table." WHERE ".$fld." LIKE ?");
		$stmt->execute(["%$str%"]);
		$this->rows = $stmt->rowCount();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No Results Found.');
		return $arr;
		$stmt = null;
	}

	protected function create($statement,$values) {
		$stmt = $this->connection->prepare("INSERT INTO ".$this->table.$statement);
		$stmt->execute($values);
		$stmt = null;
	}

	protected function update($statement,$values) {
		$stmt = $this->connection->prepare("UPDATE ".$this->table.$statement);
		$stmt->execute($values);
		$stmt = null;
	}

	protected function delete($id) {
		$stmt = $this->connection->prepare("DELETE FROM ".$this->table." WHERE id=?");
		$stmt->execute([$id]);
		$stmt = null;
	}


}