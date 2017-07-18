<?php
require_once(dirname(dirname(__FILE__))."/model/registration.model.php");
if (isset($_POST["login"]) && $_POST["login"] != "" && isset($_POST["email"]) && $_POST["email"] != "" && isset($_POST["email_confirmation"]) && $_POST["email_confirmation"] != "" && isset($_POST["password"]) && $_POST["password"] != "" && isset($_POST["password_confirmation"]) && $_POST["password_confirmation"] != "")
{
	if ($_POST["email"] !== $_POST["email_confirmation"])
	{
		header("Location: ../index.php?view=registration&msg=error_email");
	}
	else if ($_POST["password"] !== $_POST["password_confirmation"])
	{
		header("Location: ../index.php?view=registration&msg=error_password");
	}
	else
	{
		if (available_login_email($_POST["login"], $_POST["email"]))
		{
			set_user($_POST["login"], $_POST["email"], $_POST["password"]);
			header("Location: ../index.php?view=registration&msg=user_set");
		}
		else
			header("Location: ../index.php?view=registration&msg=error_available");
	}
}
else if (isset($_GET['token']) && $_GET['token'] != "")
{
	confirmation_user($_GET['token']);
}
