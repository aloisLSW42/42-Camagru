<?php

function	put_view()
{
	$view = array("gallery", "registration", "login", "logout", "forgotten_password", "new_password", "post", "user");

	if (isset($_GET["view"]) && in_array($_GET["view"], $view))
		include("./view/".$_GET["view"].".view.php");
	else
		include("./view/gallery.view.php");	
}

?>
