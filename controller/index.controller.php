<?php
session_start();

if ($_GET["logout"] == 1)
	$_SESSION["user"] = NULL;

function put_nav()
{
	if (isset($_SESSION["user"]) && $_SESSION["user"] != "")
	{
		echo '<a href="./index.php?view=user"><div class="link">My account</div></a>';
		echo '<a href="./index.php?logout=1"><div class="link">Logout</div></a>';
	}
	else
	{
		echo '<a href="./index.php?view=login"><div class="link">Login</div></a>';
		echo '<a href="./index.php?view=registration"><div class="link">registration</div></a>';
	}
} 


function put_view()
{
	$view = array("gallery", "registration", "login", "logout", "forgotten_password", "new_password", "post", "user");


	if (isset($_GET["view"]) && in_array($_GET["view"], $view))
		include("./view/".$_GET["view"].".view.php");
	else
		include("./view/gallery.view.php");	
}

?>
