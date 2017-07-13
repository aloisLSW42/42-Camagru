<?php require_once(dirname(dirname(__FILE__))."/model/utils.php");

function gen_token()
{
	return (bin2hex(random_bytes(32)));
}

function set_user($login, $email, $password)
{
	$db = db();
	$token = gen_token();
	try
	{
		$stmt = $db->prepare("INSERT INTO user(id, login, email, password, token) values(NULL, ?, ?, ?, ?)");
		$stmt->execute(array($login, $email, $password, $token));
		alert("user register you will receive an email confirmation");
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
}
