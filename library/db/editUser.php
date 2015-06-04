<?php
	$dirName = dirname(__FILE__);
	require($dirName.'/db.php');
	$config = getConfig();
	$db = getConnect($config);

	$userList = getUserList($db);


	// echo '<pre>';
	// var_dump(getConfig());
	// echo '</pre>';
	/*if (!empty($_POST)) {
		editUser($db, 
			$_POST['name'],
			$_POST['email'],
			$_POST['password'],
			$_POST['date_create'],
			$_POST['is_active']);
	}*/
?>
<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<script src="editUser.js"></script>
	</HEAD>
	<BODY>
		<form method="POST">
			<table>
				<tr>
				<?php if ($userList[0]) : ?>
					<?php foreach ($userList[0] as $key => $value) : ?>
						<input class="hidden" type="hidden" name="<?=$key?>" value="">
						<td> <?=$key?> </td>
					<?php endforeach; ?>
				<?php endif; ?>
				</tr>


				<?php $i = 0;
				    foreach ($userList as $user) : ?>
					<tr>
						<?php foreach ($user as $key => $value) :?>
							<td><input type="edit" id="<?=$key.'_'.$i?>" value=<?=$value?>></td>
						<?php endforeach; ?>
						<td><input id="<?='SaveButton_'.$i?>" type="submit" value="Save" onclick="saveChanges(<?=$i?>);"></td>
					</tr>					
				<?php $i++;
				      endforeach; ?>
			</table>
		</form>
	</BODY>
</HTML>