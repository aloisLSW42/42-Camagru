<?php require_once(dirname(dirname(__FILE__))."/controller/user.controller.php"); ?>
<div class="a-post">
	<div class="pic" id="like">
	<!--	<img href=""/> -->
		<device type="media" onchange="update(this.data)"></device>
		<a class="takeashot" id="button_take" onclick="takeashot()" style="visibility:hidden;">Take a shot</a>
		<video id="video" width="1280" height="720" autoplay>Video stream is not available.</video>
		<canvas id="canvas" width="1280" height="720"></canvas>
		<div id="pic"></div>

	</div>
	<div class="action">
		<div class="exit"><a href="./index.php?view=gallery">X</a></div>
		<div class="title">My pics</div>
		<div class="pics">
			<?php foreach($my_pics as $pic){?>
			<div class="a-pic">
				<img src="./view/img/gallery/<?php echo $pic['id']?>.png"/>
				<a href="./index.php?view=user&delete=<?php echo $pic['id']?>"><p>Delete</p></a>
			</div>
			<?php }?>
		</div>
		<div class="title">Layers</div>
		<form action="./controller/user.controller.php" enctype="multipart/form-data" method="POST">
		<div class="pics">
			<div class="a-pic">
				<img src="./view/img/layer/0.png"/>
				<input type="radio" value="0" name="layer" onclick="display_button()"/>
				<p>Illuminaty</p>
			</div>
			<div class="a-pic">
				<img src="./view/img/layer/1.png"/>
				<input type="radio" value="1" name="layer" onclick="display_button()"/>
				<p>Banana</p>
			</div>
			<div class="a-pic">
				<img src="./view/img/layer/2.png"/>
				<input type="radio" value="2" name="layer" onclick="display_button()"/>
				<p>Duck</p>
			</div>
			<div class="a-pic">
				<img src="./view/img/layer/3.png"/>
				<input type="radio" value="3" name="layer" onclick="display_button()"/>
				<p>Other</p>
			</div>
		</div>
		<hr/>
		<div class="add">
				<input type="file" name="file" accept="image/*" value="Use an image" />
				<input type="submit" value="Choose a file" name="pc" id="button_choose" style="visibility:hidden;"/>
			</form>	
		</div>
	</div>
</div>

<script src="./view/user.view.js" type="text/javascript"></script>

