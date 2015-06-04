<?php
	function getConfig() {
		$dirName = dirname(__FILE__);
		return parse_ini_file($dirName.'/../../config/db.ini');
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
		if ($date_create == -1) {
			$date = 'NOW()';
		} else {
			$date = ':date_create';
		}

		$query = $db->prepare('INSERT INTO user '.
					  '(`name`, `email`, `password`, `date_create`, `is_active`) '.
					  'VALUES '.
					  "(:name, :email, PASSWORD(:password), $date, :is_active)");

		if (!$query) {
			return array(false, $db->errorInfo());
		}
		$query->bindParam(":name", $name);
		$query->bindParam(":email", $email);
		$query->bindParam(":password", $password);
		if ($date_create != -1) {
			$query->bindParam(":date_create", $date_create);
		}
		$query->bindParam(":is_active", $is_active, PDO::PARAM_INT);

		if (!$query->execute()) {
			return array(false, $query->errorInfo());
		}

		$qForLast = $db->prepare('SELECT * FROM user WHERE id=:lastId');
		$lastId = $db->lastInsertId();
		$qForLast->bindParam(':lastId', $lastId, PDO::PARAM_INT);

		if (!$qForLast->execute()) {
			return array(false, $qForLast->errorInfo());
		}

		return array(true, $qForLast->fetch(PDO::FETCH_OBJ));
	}

	function getUser($db, $name, $password) {
		$query = $db->prepare('SELECT * FROM user WHERE name=:name AND password=PASSWORD(:password)');
		if (!$query) {
			return array(false, $db->errorInfo());
		}


		$query->bindParam(':name', $name);
		$query->bindParam(':password', $password);
		$query->execute();

		if (!$query) {
			return array(false, $query->errorInfo());
		}

		$user = $query->fetch(PDO::FETCH_OBJ);
		if ($user) {
			return array(true, $user);
		} else {
			return array(false, 'No user');
		}
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
	

	function getUserName($user) {
		return $user['name'];
	}

	function getUserWishList($user) {

	}
?>

<!-- COMMON LINE INTERFACE cli -->