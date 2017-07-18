<div class="wrap">
	<form action="./controller/new_password.controller.php" method="POST">

		<h2>New password</h2>
		<div class="input-group">
			<label>New password</label>
			<input type="password" placeholder="new password" name="password"/>
		</div>
		<div class="input-group">
			<label>New password confirmation</label>
			<input type="password" placeholder="new password confirmation" name="password_confirmation"/>
			<input type="hidden" value="<?php echo $_GET['token']?>" name="token"/>
		</div>
		<input type="submit" value="Change password"/>
	</form>
</div>
