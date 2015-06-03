<form method="POST" action="index.php">
	<div>Nick:</div>
	<input type="edit" name="nick" value="Unnamed">
	<br>
	<br>
	<div>Password:</div>
	<input type="edit" name="password" value="">
	<br>
	<br>
	
	<input type="submit" value="Login" onclick="setLogOrReg('log');">
	<input type="submit" value="Register" onclick="setLogOrReg('reg');">
	<input id="logOrReg" type="hidden" name="logOrReg" value="log">
</form>