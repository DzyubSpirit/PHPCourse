<form method="POST" action="index.php">
	<input type="hidden" name="signOut" value="Yes">
	<input class="btn btn-primary" type="submit" value="Sign out">
	<br>
	<br>
	<div>Welcome, <?php echo $_SESSION['user']->name ?>!</div>
	<br>
	<!--<?php $i = 0;
		  foreach ($_SESSION['user']->wishList as $wish) : 
		  	$i++;
	?> 
			<h4><span class="label label-primary"><?=$i.". ".$wish?></span></h4>
		
	<?php endforeach;
	?>-->
</form>
