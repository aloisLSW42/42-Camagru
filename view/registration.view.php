<div class="wrap">
	<form action="./controller/registration.controller.php" method="POST">

		<h2>Registration</h2>
		<div class="input-group">
			<label>Login</label>
			<input type="text" placeholder="aleclet" name="login"/>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" placeholder="aleclet@student.42.fr" name="email"/>
		</div>
		<div class="input-group">
			<label>Email confirmation</label>
			<input type="email" placeholder="aleclet@student.42.fr" name="email_confirmation"/>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" placeholder="password" name="password"/>
		</div>
		<div class="input-group">
			<label>Password confirmation</label>
			<input type="password" placeholder="password" name="password_confirmation"/>
		</div>
		<input type="submit" value="Register"/>
		<a href="./index.php?view=forgotten_password">Forgotten password</a>
	</form>
</div>
