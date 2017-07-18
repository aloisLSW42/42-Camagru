<?php
require_once(dirname(dirname(__FILE__))."/model/forgotten_password.model.php");

if (isset($_POST["email"]) && $_POST["email"] != "")
{
	reset_password($_POST["email"]);
	header("Location: ../index.php?view=user&msg=email_password");
}
