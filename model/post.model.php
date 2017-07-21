<?php
session_start();
require_once(dirname(dirname(__FILE__))."/model/utils.php");

function get_comments($id)
{
	$db = db();
	$res = array();	
	try
	{
		$stmt = $db->prepare("SELECT login, content FROM comments, user WHERE user.id = comments.id_user AND id_pic = ? ORDER BY comments.id DESC");
		$stmt->execute(array($id));
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$row['login'] = sanitize($row['login']);
			$row['content'] = sanitize($row['content']);
			$res[] = $row;
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	return ($res);
}

function get_id($login)
{
	$db = db();

	$id = 0;
	try
	{
		$stmt = $db->prepare("SELECT id FROM user WHERE login = ?");
		$stmt->execute(array($login));
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$id = $row["id"];
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	return ($id);
}

function set_comment($id_pic, $content)
{
	$db = db();
	$res = array();
	$id_user = get_id($_SESSION["user"]);
	if ($id_user == 0)
		return (false);	
	try
	{
		$stmt = $db->prepare("INSERT INTO comments values(NULL, ?, ?, ?)");
		$stmt->execute(array($id_user, $id_pic, $content));
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

function set_like($id_user, $id_pic)
{
	$db = db();

	try
	{
		$stmt = $db->prepare("INSERT INTO likes values(?, ?)");
		$stmt->execute(array($id_user, $id_pic));
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

function unset_like($id_user, $id_pic)
{
	$db = db();

	try
	{
		$stmt = $db->prepare("DELETE FROM likes WHERE id_user = ? AND id_pic = ?");
		$stmt->execute(array($id_user, $id_pic));
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

function is_liked($login, $id_pic)
{
	$db = db();
	$res = false;
	try
	{
		$stmt = $db->prepare("SELECT * FROM likes WHERE id_user = ? AND id_pic = ?");
		$stmt->execute(array(get_id($login), $id_pic));
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			$res = true;	
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	return ($res);
}

function get_likes_nb($id_pic)
{
	$db = db();
	$nb = 0;

	try
	{
		$stmt = $db->prepare("SELECT COUNT(*) as nb FROM likes WHERE id_pic = ?");
		$stmt->execute(array($id_pic));
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$nb = $row["nb"];
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	return ($nb);
}




