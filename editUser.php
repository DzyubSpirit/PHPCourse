<?php
	require('library/db.php');
	$config = getConfig();
	$db = getConnect($config);

	$userList = getUserList($db);

	echo '<pre>';
	var_dump($userList);
	echo '</pre>';
	/*if (!empty($_POST)) {
		editUser($db, 
			$_POST['name'],
			$_POST['email'],
			$_POST['password'],
			$_POST['date_create'],
			$_POST['is_active']);
	}*/
?>

<form method="POST">
	Name:
	<input type="text" name="name">
	<br>
	Email:
	<input type="text" name="email">
	<br>
	Password:
	<input type="text" name="password">
	<br>
	Date_create:
	<input type="text" name="date_create">
	<br>
	Status:
	<input type="text" name="is_active">
	<br>

	<input type="submit" value="Create User">
</form>