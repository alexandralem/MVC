<?php

require_once('Database.php');

class EmployeeModel extends Database {

public function __construct() {
	parent::__construct();
	$this->table = 'tbl_users';
	$this->fields = "user_lname,user_fname,user_username,user_password, user_photo";
}

public function newEmployee($formvalues) {
	$statement = "(" . $this->fields . ") VALUES (?,?,?,?,?)";
	$this->create($statement,$formvalues);
}

public function updateEmployee($formvalues) {
	$statement = " SET user_lname=?,user_fname=?,user_username=?,user_password=?,role_id=?, user_photo=? WHERE id=?";
	$this->update($statement,$formvalues);
}

public function deleteEmployee($id) {
	//code to be sure the deletion should happen
	$this->delete($id);
}


}