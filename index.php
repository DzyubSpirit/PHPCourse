<?php

	session_start();
	

	$redis = new Redis();

	// echo phpinfo(INFO_MODULES).'<br>';
	
	require('library/funcs.php');
	require('library/redis.php');
	$redis = connectRedis();
	
	makeFalseUnsetSessions();
	// writeAllPostVars();
	// writeAllSessionVars();

	require('library/db/db.php');
	$configDb = getConfig();
	$db = getConnect($configDb);

	require('library/db/User.php');
	
	if (isset($_POST['logOrReg'])) {
		if (!isset($_POST['nick'])) {
			break;
		}
		if (!isset($_POST['password'])) {
			break;
		}
		
		switch ($_POST['logOrReg']) {
			case 'reg': {
				list ($res, $resUser) = createUser($db, $_POST['nick'], $_POST['nick'].'@gmail.com', $_POST['password'], -1, 1);
				if ($res) {
					$_SESSION['logged'] = true;
					$_SESSION['user'] = $resUser;
				}
			} break;
			case 'log': {

				list ($res, $resUser) = getUser($db, $_POST['nick'], $_POST['password']);

				if (!$res) {
					redisIncLogs($redis, $_POST['nick']);
				}

				list ($isLocked, $lockedData) = isNickLocked($redis, $_POST['nick']);
				
				if ($isLocked) {
					echo 'You are hazker!!!<br>';
					echo "You have banned for $lockedData seconds";
					break;
				}

				if ($res) {
					$_SESSION['logged'] = true;
					$_SESSION['user'] = $resUser;
					redisClearLogs($redis, $_POST['nick']);
					break;
				}

				list ($res, $triesCount) = getRemainingPunishTime($redis, $_POST['nick']);
				if ($triesCount) {
					echo "You have used $triesCount of ".LOG_COUNT_TRIES.' attempts!';
				}
				
			} break;
			default: {

			}
		}		
	}

	// logOrRegUser();

	if (isset($_POST['signOut']) && $_POST['signOut'] == 'Yes') {
		signOutUser();
	}

	// if ($_POST['nick'])

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="index.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<title>My first-site</title>
</head>
<body>
	<?php 
		if (!$_SESSION['logged']) {
			require('library/forms/notLoggedForm.php');
		} else {
			require('library/forms/loggedForm.php');
		}
	?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>