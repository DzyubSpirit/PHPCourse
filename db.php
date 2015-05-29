<?php

	function getConfig($str) {
		return parse_ini_file($str);
	}

	function getConnect($config) {
		return new PDO("mysql:host={$config['host']};dbname={$config['db_name']}", 
		$config['user'], $config['password']);
	}

	
	function getUserList($db, $status) {
		// $status = 1;
		$query = $db->prepare("SELECT * FROM user WHERE is_active = :status");
		$query->bindParam(":status",$status, PDO::PARAM_INT);

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
	
	$config = getConfig('config/db.ini');
	$db = getConnect($config);

	$userList = getUserList($db, 1);

	echo '<pre>';
	var_dump($userList);
	echo '</pre>';
?>