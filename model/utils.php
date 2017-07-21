<?php
require_once(dirname(dirname(__FILE__))."/config.php");

function db()
{
	$db = new PDO("mysql:host=".$_ENV["host"].";dbname=".$_ENV["db"].";charset=utf8mb4", $_ENV["user"], $_ENV["password"]);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return ($db);
}

function alert($text)
{
	echo '<div class="alert">'.$text.'</div>';
}

function gen_token()
{
	return (bin2hex(random_bytes(32)));
}

function sanitize($user_input)
{
	//todo upgrade
	return (htmlspecialchars($user_input));
}
