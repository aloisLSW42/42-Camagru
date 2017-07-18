<?php
require_once(dirname(dirname(__FILE__))."/model/utils.php");

function gen_token()
{
	return (bin2hex(random_bytes(32)));
}

function available_login_email($login, $email)
{
	$db = db();
	try
	{
		$stmt = $db->prepare("SELECT * FROM user WHERE login = ? OR email = ?");
		$stmt->execute(array($login, $email));
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			return (false);
		else
			return (true);
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
}

function set_user($login, $email, $password)
{
	$db = db();
	$token = gen_token();
	try
	{
		$password = hash("whirlpool", $password);
		$stmt = $db->prepare("INSERT INTO user(id, login, email, password, token) values(NULL, ?, ?, ?, ?)");
		$stmt->execute(array($login, $email, $password, $token));
		alert("user register you will receive an email confirmation");
		mail($email, "Welcome to Camagru ".$login." !", "Welcome to camagru, you are almost register ".$login." ! to finish it you just need to click on the link below : <a href=\"http://localhost/42-Camagru/controller/registration.controller.php?token=".$token."\">Confirm my registration</a>");
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
}

function confirmation_user($token)
{
	$db = db();
	try
	{
		$stmt = $db->prepare("UPDATE user SET token = 1 WHERE token = ?");
		$stmt->execute(array($token));
		header("Location: /42-Camagru/index.php?view=login");
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
}

