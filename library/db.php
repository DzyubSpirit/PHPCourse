<?php

	function getConfig() {
		return parse_ini_file('/var/www/dev.school-server/www/config/db.ini');
	}

	function getConnect($config) {
		return new PDO("mysql:host={$config['host']};dbname={$config['db_name']}", 
		$config['user'], $config['password']);
	}

	
	function getUserList($db, $status = -1) {
		// $status = 1;
		if ($status == -1) {
			$query = $db->prepare("SELECT * FROM user");
		} else {
			$query = $db->prepare("SELECT * FROM user WHERE is_active = :status");
			$query->bindParam(":status",$status);
		}

		$query->execute();

		$userList = array();
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			// echo '<pre>';
			// var_dump($row);
			// echo '</pre><br>';
			array_push($userList, $row);
		}	

		return $userList;
	}

	function createUser($db, $name, $email, $password, $date_create, $is_active) {
		$query = $db->prepare('INSERT INTO user'.
					  '(`name`, `email`, `password`, `date_create`, `is_active`)'.
					  'VALUES'.
					  '(:name, :email, :password, :date_create, :is_active)');
		$query->bindParam(":name", $name);
		$query->bindParam(":email", $email);
		$query->bindParam(":password", $password);
		$query->bindParam(":date_create", $date_create);
		$query->bindParam(":is_active", $is_active);

		$query->execute();


	}

	//TODO
	function editUser($db, $name, $email, $password, $date_create, $is_active) {
		$query = $db->prepare('INSERT INTO user'.
					  '(`name`, `email`, `password`, `date_create`, `is_active`)'.
					  'VALUES'.
					  '(:name, :email, :password, :date_create, :is_active)');
		$query->bindParam(":name", $name);
		$query->bindParam(":email", $email);
		$query->bindParam(":password", $password);
		$query->bindParam(":date_create", $date_create);
		$query->bindParam(":is_active", $is_active);

		$query->execute();

		
	}
	
?>