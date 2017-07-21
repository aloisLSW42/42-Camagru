<?php
require_once(dirname(dirname(__FILE__))."/controller/gallery.controller.php");
foreach($all_pics as $pic){?>
	<a href="./index.php?view=post&id=<?php echo $pic["id"]?>&login=<?php echo $pic["login"]; ?>">
	<div class="post">
		<div class="pic" style="background-image:url('./view/img/gallery/<?php echo $pic["id"]; ?>.png')"></div>
		<div class="label"><?php echo $pic["login"]; ?></div>
	</div>
	</a>
	
<?php } ?>
