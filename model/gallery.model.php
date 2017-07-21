<?php
require_once(dirname(dirname(__FILE__))."/model/utils.php");

function get_all_pics()
{
	$db = db();
	$res = array();
	try
	{
		$stmt = $db->prepare("SELECT picture.id, login FROM picture, user WHERE picture.id_user = user.id AND picture.state = 1");
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$res[] = $row;	
		}
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
	return ($res);
}
