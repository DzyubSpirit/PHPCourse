<?php
	$dirName = dirname(__FILE__);
	
	require($dirName.'/db.php');
	$config = getConfig();
	$db = getConnect($config);

	if (!empty($_POST)) {
		if ($_POST['date_create'] == '') {
			$_POST['date_create'] = -1;
		}
		if ($_POST['is_active'] == '') {
			$_POST['is_active'] = 1;
		}
		list ($res, $data) = createUser($db, $_POST['name'], $_POST['email'],
			$_POST['password'], $_POST['date_create'], $_POST['is_active']);

		if ($res) {
			echo '<pre>';
			var_dump($data);
			echo '</pre>';
		} else {
			echo 'Error: '.$data[2];
		}
	}
?>
<form method="POST">
    Nick
	<input name="name" type="text">
	<br>
	E-mail
	<input name="email" type="text">
	<br>
	Password
	<input name="password" type="text">
	<br>
	Date create
	<input name="date_create" type="text">
	<br>
	Is active
	<input name="is_active" type="text">
	<br>
	<input type="submit" value="Create new User">
</form>