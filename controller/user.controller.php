<?php
require_once(dirname(dirname(__FILE__))."/model/user.model.php");

//check login

if (!isset($_SESSION["user"]))
	header("Location: ../index.php?view=login");


//upload file
if (isset($_FILES["file"]) && isset($_POST["layer"]) && $_POST["layer"] != "")
{
	$id = get_picture_id();
	$name = $_FILES["file"]["name"];
	$path_file = pathinfo($name);
	$ext = $path_file["extension"];
	$exts = array("jpeg", "jpg", "gif", "png");
	if (!(in_array($ext, $exts)))
	{
		header("Location: ../index.php?view=user&msg=error_img_ext");
	    //File extension must be jpeg, jpg or gif
	}
	else
	{
		// Copie dans le repertoire du script avec un nom
		// incluant l'heure a la seconde pres 
		$destination_dir = dirname(dirname(__FILE__))."/view/img/gallery/";
		$destination_name = $id.".".$ext;
	
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $destination_dir.$destination_name))
		{
			//bof transformation

			$src = imagecreatefrompng("../view/img/layer/".$_POST["layer"].".png");
			imagealphablending($src, true);
			imagesavealpha($src, true);
		
			//todo extension management will don't work with not png	
			$dest = imagecreatefrompng("../view/img/gallery/".$id.".".$ext);
			imagecopy($dest, $src, 10, 10, 0, 0, imagesx($src), imagesy($src));
			imagepng($dest, "../view/img/gallery/".$id.".png");
			//eof transformation
		
			set_picture();
			header("Location: ../index.php?view=user&msg=pic_saved");
			//file moved succefully
		}
		else
		{
			header("Location: ../index.php?view=user&msg=error_img_move");
			//error
		}
	}
}
else if (isset($_POST["image"]) && $_POST["image"] != "" && isset($_POST["layer"]) && $_POST["layer"] != "")
{
	$id = get_picture_id();
	//bof transformation

	$data = explode(",", $_POST["image"]);
	$img = base64_decode($data[1]);

	$fd = fopen("../view/img/gallery/".$id.".png", "wb");

	fwrite($fd, $img);

	fclose($fd);

	$src = imagecreatefrompng("../view/img/layer/".$_POST["layer"].".png");
	//$src = imagecreatefromstring($img);
	imagealphablending($src, true);
	imagesavealpha($src, true);

	$dest = imagecreatefrompng("../view/img/gallery/".$id.".png");
	imagecopy($dest, $src, 10, 10, 0, 0, imagesx($src), imagesy($src));
	imagepng($dest, "../view/img/gallery/".$id.".png");		

	set_picture();
	echo "{'msg' : 'ok'}";
}
else if (isset($_GET["delete"]) && $_GET["delete"] != "")
{
	delete_picture($_GET["delete"]);

}
//display mypics

$my_pics = get_my_pics();





