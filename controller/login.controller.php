<?php
session_start();
require_once(dirname(dirname(__FILE__))."/model/login.model.php");

if (isset($_POST["login"]) && $_POST["login"] != "" && isset($_POST["password"]) && $_POST["password"])
{
	if (login($_POST["login"], $_POST["password"]))
	{
		$_SESSION["user"] = $_POST["login"];
		header("Location: ../index.php?view=user&msg=welcome");
	}
	else
		header("Location: ../index.php?view=login&msg=error_login");
}
