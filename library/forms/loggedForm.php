<form method="POST" action="index.php">
	<input type="hidden" name="signOut" value="Yes">
	<input type="submit" value="Sign out">
	<br>
	<br>
	<div>Welcome, <?php echo $_SESSION['user']->nick ?>!</div>
	<br>
	<?php 
		$i = 0;
		foreach ($_SESSION['user']->wishList as $wish) {
			$i++;
			echo "<div>".$i.". ".$wish."</div>";
		}
	?>
</form>
