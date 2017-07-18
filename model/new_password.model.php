<?php
require_once(dirname(dirname(__FILE__))."/model/utils.php");

function new_password($password, $token)
{
	$password = hash("whirlpool", $password);
	try
	{
		$db = db();
		
		$stmt = $db->prepare("UPDATE user SET token = 1, password = ? WHERE token = ?");
		$stmt->execute(array($password, $token));
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
}
