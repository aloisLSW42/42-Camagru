<?php
require_once(dirname(dirname(__FILE__))."/model/utils.php");

function get_picture_id()
{
	$db = db();
	$res = 0;
	try
	{
		$stmt = $db->prepare("SELECT COUNT(*) as id FROM picture");
		$stmt->execute();
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			$res = $row['id'] + 1;
		return ($res);
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}

	return ($res);
}

function set_picture()
{
	$db = db();
	
	try
	{
		$stmt = $db->prepare("INSERT INTO picture values(NULL, 0, NOW())");
		$stmt->execute();
	}
	catch (PDOEXception $e)
	{
		alert($e->getMessage());
	}
}
