<?php 
	require('library/db.php');

	$config = getConfig();
	$db = getConnect($config);

	$userList = getUserList($db, 1);

?>

<table>
	<?php foreach ($userList as $user) : ?>
		<tr>
			<td><?=$user->name?></td>
		</tr>
	<?php endforeach; ?>
</table>