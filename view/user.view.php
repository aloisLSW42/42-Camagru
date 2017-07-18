
<div class="a-post">
	<div class="pic" id="like">
	<!--	<img href=""/> -->
		<device type="media" onchange="update(this.data)"></device>
		<a class="takeashot" onclick="takeashot()">Take a shot</a>
		<video id="video" width="100%" height="100%" autoplay>Video stream is not available.</video>
		<canvas id="canvas" width="100%" height="100%"></canvas>
		<div id="pic"></div>

	</div>
	<div class="action">
		<div class="exit"><a href="./index.php?view=gallery">X</a></div>
		<div class="title">My pics</div>
		<div class="pics">
			<div class="a-pic">
				<img src="./img/6.png"/>
				<a href="#6"><p>Delete</p></a>
			</div>
		</div>
		<div class="title">Layers</div>
		<form action="./controller/user.controller.php" enctype="multipart/form-data" method="POST">
		<div class="pics">
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<input type="radio" value="0" name="layer"/>
				<p>Cat</p>
			</div>
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<p>Cat</p>
			</div>
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<p>Cat</p>
			</div>
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<p>Cat</p>
			</div>
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<p>Cat</p>
			</div>
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<p>Cat</p>
			</div>
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<p>Cat</p>
			</div>
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<p>Cat</p>
			</div>
			<div class="a-pic">
				<img src="https://i.ytimg.com/vi/lCgzByOlGwc/hqdefault.jpg"/>
				<p>Cat</p>
			</div>
		</div>
		<hr/>
		<div class="add">
				<input type="file" name="file" accept="image/*" value="Use an image"/>
				<input type="submit" value="Choose a file" name="pc"/>
			</form>	
		</div>
	</div>
</div>

<script src="./view/user.view.js" type="text/javascript"></script>

