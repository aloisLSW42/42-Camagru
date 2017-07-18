<?php
require_once(dirname(dirname(__FILE__))."/model/utils.php");


function login($login, $password)
{
	$res = false;	
	$db = db();
	$password = hash("whirlpool", $password);	
	try
	{
		$stmt = $db->prepare("SELECT * FROM user WHERE login = ? AND password = ? AND token = 1");
		$stmt->execute(array($login, $password));
		if ($stmt->fetch(PDO::FETCH_ASSOC))
			$res = true;
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
	return ($res);
}
