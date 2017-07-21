<?php
session_start();
require_once(dirname(dirname(__FILE__))."/model/utils.php");

function delete_picture($id)
{
	$db = db();

	//todo check if id exist
	try
	{
		$stmt = $db->prepare("UPDATE picture SET state = 0 WHERE id = ?");
		$stmt->execute(array($id));
		$stmt = $db->prepare("DELETE FROM comments WHERE id_pic = ?");
		$stmt->execute(array($id));
		unlink(dirname(dirname(__FILE__))."/view/img/gallery/".$id.".png");
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
}

function get_picture_id()
{
	$db = db();
	$res = 1;
	try
	{
		$stmt = $db->prepare("SELECT id FROM picture ORDER BY id DESC LIMIT 1");
		$stmt->execute();
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$res = $row["id"];
			$res++;
			echo $res;
		}
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}

	return ($res);
}

function get_user_id()
{
	$db = db();
	try
	{
		$stmt = $db->prepare("SELECT id FROM user where login = ?");
		$stmt->execute(array($_SESSION['user']));
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			$res = $row['id'];
		return ($res);
	}
	catch (PDOException $e)
	{
		alert($e->getMessage());
	}
	
}

function set_picture()
{
	$db = db();
	$id_user = get_user_id();	
	try
	{
		$stmt = $db->prepare("INSERT INTO picture values(NULL, ?, 1, NOW())");
		$stmt->execute(array($id_user));
	}
	catch (PDOEXception $e)
	{
		alert($e->getMessage());
	}
}

function get_my_pics()
{
	$db = db();
	$id_user = get_user_id();
	
	$res = array();

	try
	{
		$stmt = $db->prepare("SELECT * FROM picture WHERE id_user = ? AND state = 1");
		$stmt->execute(array($id_user));

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$res[] = $row;
		}	
	}	
	catch (PDOEXception $e)
	{
		alert($e->getMessage());
	}
	return ($res);
}


