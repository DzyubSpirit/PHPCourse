<?php
	require('library/db.php');
	$config = getConfig();
	$db = getConnect($config);

	$userList = getUserList($db);


	echo '<pre>';
	var_dump(getConfig());
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
	<table>
		<? foreach ($userList as $user) : ?>
			
		<?endfor>
	</table>
</form>