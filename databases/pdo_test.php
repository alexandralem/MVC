<?php
		$dsn = "mysql:host=localhost;dbname=db_users;charset=utf8mb4";
		try {
		  $connection = new PDO($dsn, 'root', 'root');
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}

		$stmt = $connection->prepare("SELECT * FROM tbl_users INNER JOIN tbl_roles ON tbl_users.role_id=tbl_roles.role_id");
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		print_r($arr);
		$stmt = null;

?>