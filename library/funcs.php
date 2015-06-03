<?php
	function makeFalseUnsetSessions() {
		if (!isset($_SESSION['logged'])) {
			$_SESSION['logged'] = false;
		}
	}

	function writeAllPostVars() {
		echo "<div>Post variables:</div>";
		foreach ($_POST as $key => $var) {
			echo "<div>".$key." => ".$var."</div>";
		}
	}

	function writeAllSessionVars() {
		echo "<div>Session variables:</div>";
		foreach ($_SESSION as $key => $var) {
			echo "<div>".$key." => ".$var."</div>";
		}
	}	
?>