<form method="POST" action="index.php">
	<span class="label label-primary">Nick:</span>
	<br>
	<input type="edit" name="nick" value="Unnamed">
	<br>
	<span class="label label-primary">Password:</span>
	<br>
	<input type="edit" name="password" value="">
	<br>
	<input class="btn btn-primary" type="submit" value="Login" onclick="setLogOrReg('log');">
	<input class="btn btn-primary" type="submit" value="Register" onclick="setLogOrReg('reg');">
	<input id="logOrReg" type="hidden" name="logOrReg" value="log">
</form>