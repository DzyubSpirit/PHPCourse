<?php
	define("USERS_FILENAME", "users.txt");

	class User {
		public $nick;
		public $password;
		public $greetings;
		public $wishList;
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
		if (!isset($_POST['signOut'])) {
			return;
		}

		if ($_POST['signOut'] == 'Yes') {
			$_SESSION['logged'] = false;
			$_SESSION['user'] = null;
		}
	}
?>