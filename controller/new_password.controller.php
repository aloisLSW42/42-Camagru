<?php
require_once(dirname(dirname(__FILE__))."/model/new_password.model.php");

if (isset($_POST["token"]) && $_POST["token"] != "" && isset($_POST["password"]) && $_POST["password"] != "" && isset($_POST["password_confirmation"]) && $_POST["password_confirmation"] != "")
{	
	if ($_POST["password"] === $_POST["password_confirmation"])
	{
		new_password($_POST["password"], $_POST["token"]);
		header("Location: ../index.php?view=gallery&msg=change_password");
	}
	else
		header("Location: ../index.php?view=new_password&msg=error_password");
}
