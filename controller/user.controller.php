<?php
require_once(dirname(dirname(__FILE__))."/model/user.model.php");

if (isset($_FILES["file"]) && isset($_POST["layer"]) && $_POST["layer"] != "" && isset($_POST["pc"]))
{

	$id = get_picture_id();
	$name = $_FILES["file"]["name"];
	$path_file = pathinfo($name);
	$ext = $path_file['extension'];
	$exts = array("jpeg", "jpg", "gif", "png");
	if (!(in_array($ext, $exts)))
	{
		echo "error 1";
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

			$src = imagecreatefrompng("../view/img/layer/1.png");
			imagealphablending($src, true);
			imagesavealpha($src, true);
			
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
			echo "error 2";
			//error
		}
	}
}
else
	echo "error";	
