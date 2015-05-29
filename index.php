<?php
	session_start();
	
	$SESSION['logged'] = true;
	
	require('funcs.php');
	
	makeFalseUnsetSessions();
	// writeAllPostVars();
	// writeAllSessionVars();

	require('User.php');
	
	logOrRegUser();

	signOutUser();

	// if ($_POST['nick'])

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="index.js"></script>
	<title>My first-site</title>
</head>
<body>
	<?php 
		if (!$_SESSION['logged']) {
			require('notLoggedForm.php');
		} else {
			require('loggedForm.php');
		}
	?>

</body>
</html>