<?php

require_once(dirname(dirname(__FILE__))."/model/post.model.php");
if (isset($_GET["like"]) && $_GET["like"] == 1 && isset($_GET["id"]) && $_GET["id"] != "")
	set_like(get_id($_SESSION["user"]), $_GET["id"]);
else if(isset($_GET["unlike"]) && $_GET["unlike"] == 1 && isset($_GET["id"]) && $_GET["id"] != "")
	unset_like(get_id($_SESSION["user"]), $_GET["id"]);
else if (isset($_POST["comment"]) && $_POST["comment"] != "" && isset($_POST["id"]) && $_POST["id"] != "" && isset($_POST["login"]) && $_POST["login"] != "")
{
	set_comment($_POST["id"], $_POST["comment"]);
	header("Location: ../index.php?view=post&id=".$_POST["id"]."&login=".$_POST["login"]);
}
else if (isset($_GET['id']) && $_GET['id'] != "" && isset($_GET["login"]) && $_GET["login"] != "")
{

}
else
	header("Location: ./index.php?view=gallery&msg=error_post");


if (isset($_GET["id"]))
	$comments = get_comments($_GET["id"]);
function put_login()
{
	echo sanitize($_GET["login"]);
}

function put_likes_nb()
{
	$likes = get_likes_nb($_GET["id"]);
	echo sanitize($likes);
}

function put_comments_nb($comments)
{
	echo count($comments);
}

function put_pic()
{
	echo sanitize($_GET["id"]);
}

function put_like_link()
{
	$mode = "";
	$liked = "";
	if (is_liked($_SESSION["user"], $_GET["id"]))
	{
		$mode = "un";
		$liked = "liked";
	}
	
	if (isset($_SESSION["user"]))
	{
		echo '<a href="./index.php?view=post&'.$mode.'like=1&id='.sanitize($_GET['id']).'&login='.sanitize($_GET['login']).'"><div class="icon '.$liked.'"></div></a>';
	}
	else
		echo '<a href="./index.php?view=login"><div class="icon"></div></a>';

}

function show()
{
	if (isset($_SESSION["user"]))
		echo "style='visibility:visible;'";
	else
		echo "style='visibility:hidden;'";
}

