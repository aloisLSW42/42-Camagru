<?php
require_once(dirname(dirname(__FILE__))."/model/utils.php");

function reset_password($email)
{
	$db = db();

	$token = gen_token();	
	try
	{
		$stmt = $db->prepare("UPDATE user SET token = ?");
		$stmt->execute(array($token));
		mail($email, "Reset password on Camagru !", "Reset your password camagru, you ask to change your password ! to finish it you just need to click on the link below : <a href=\"http://localhost/42-Camagru/controller/forgotten_password.controller.php?token=".$token."\">Change my password</a>");
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
}
