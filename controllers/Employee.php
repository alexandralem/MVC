<?php
require_once('./models/EmployeeModel.php');

// A controller class. Handles the linkage between the specific
// URL passed by the user and DB fetch/put methods in the model class.

class Employee {

private $model;

public function __construct() {
	$this->model = new EmployeeModel();
}


public function loadViews() {
	//get content through the model
	//load views that match the content
	if($_GET['route'] == 'json'){
		ini_set('display_errors', 1);
    	error_reporting(E_ALL);

    	header("Access-Control_Allow_Origin: *");
    	header("Content-Type: application/json; character=UTF-8");
		$users = $this->model->getAll(MYSQLI_ASSOC);
		$rows = $this->model->rows;
		echo json_encode($users);
	}

	else {
		require_once('views/head.php');
		require_once('views/nav.php');
		require_once('views/emp_search.php');


	if(isset($_GET['id']) && !isset($_GET['task'])) {
		//run query method A on the model
		//load view(s) to match the model data
		$users = $this->model->getOne($_GET['id']);
		require_once('views/emp_detail.php');
		require_once('views/form_update.php');

	}else if(isset($_GET['str'])) {
		//run query method B on the model
		//load view(s) to match THAT model data
		$users = $this->model->search('user_lname',$_GET['str']);
		$rows = $this->model->rows;
		require_once('views/emp_list.php');
		require_once('views/form_create.php');


	}else if(isset($_GET['task'])) {
		if($_GET['task'] == 'create') {
			//POST values from a form
			$password = $_POST['password'];
			$endpassword = md5($password);
			$formvalues = [$_POST['last_name'], $_POST['first_name'], $_POST['username'], $endpassword, $_POST['photo']];
			$users = $this->model->newEmployee($formvalues);
			header("location:index.php");
		}else if($_GET['task'] == 'delete') {
			$users = $this->model->deleteEmployee($_GET['id']);
			header("location:index.php");
		}else if($_GET['task'] == 'update' && $_GET['level'] == 'admin') {
			//POST values from a form, could also be hidden field for id value
			$password = $_POST['password'];
			$endpassword = md5($password);
			$formvalues = [$_POST['last_name'], $_POST['first_name'], $_POST['username'], $endpassword, $_POST['role'], $_POST['photo'], $_GET['id']];
			$users = $this->model->updateEmployee($formvalues);
			header("location:index.php");
		}

		

	}else{ 
		$users = $this->model->getAll();
		$rows = $this->model->rows;
		require_once('views/emp_list.php');
		require_once('views/form_create.php');
	}

	require_once('views/footer.php');

	}
	
}

}