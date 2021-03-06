<?php
	$dirName = dirname(__FILE__);

	define("USERS_FILENAME", $dirName."/users.txt");

	class User {
		public $nick;
		public $password;
		public $greetings;
		public $wishList;
	}

	function logUser($nick, $password) {
		$file = fopen(USERS_FILENAME, "r");
		while (!feof($file)) {
			$str = fgets($file);
			$curUser = unserialize($str);
			if ($curUser) {
				if (($nick == $curUser->nick) && ($password == $curUser->password)) {
					fclose($file);
					return array(true, $curUser);
				}
			}
		}
		return array(false, NULL);

	}

	function regUser($nick, $password) {
		$file = fopen(USERS_FILENAME, "a");
		
		$user = new User();
		$user->nick = $nick;
		$user->password = $password;
		$user->greetings = array("Hello, world!");
		$user->wishList = array("Fill the WishList!");
		fwrite($file, serialize($user));
		// fwrite($file, "\r\n");
		fclose($file);

		
		
		return array(true, $user);

	}

	function logOrRegUser() {
		if (!isset($_POST['logOrReg'])) {
			return;
		}

		switch ($_POST['logOrReg']) {
			case 'reg': {
				if (!isset($_POST['nick'])) {
					return;
				}
				if (!isset($_POST['password'])) {
					return;
				}

				$file = fopen(USERS_FILENAME, "a");
				
				$user = new User();
				$user->nick = $_POST['nick'];
				$user->password = $_POST['password'];
				$user->greetings = array("Hello, world!");
				$user->wishList = array("Fill the WishList!");
				fwrite($file, serialize($user));
				// fwrite($file, "\r\n");
				fclose($file);

				$_SESSION['logged'] = true;
				$_SESSION['user'] = $user;
			} break;
			case 'log': {
				if ($_SESSION['logged']) {
					return;
				}
				$file = fopen(USERS_FILENAME, "r");
				while (!feof($file)) {
					$str = fgets($file);
					$curUser = unserialize($str);
					if ($curUser) {
						if (($_POST['nick'] == $curUser->nick) && ($_POST['password'] == $curUser->password)) {
							$_SESSION['logged'] = true;
							$_SESSION['user'] = $curUser;
							break;
						}
					}
				}
			} break;
			default: {

			}
		}
	}

	function signOutUser() {
		$_SESSION['logged'] = false;
		$_SESSION['user'] = null;
	}
?>