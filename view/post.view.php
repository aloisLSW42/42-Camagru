<?php require_once("./controller/post.controller.php"); ?>

<div class="a-post">
	<div class="pic" id="like" style="background-image:url('./view/img/gallery/<?php put_pic(); ?>.png');">
	</div>
	<div class="action">
		<div class="exit"><a href="./index.php?view=gallery">X</a></div>
		<div class="title">@<?php put_login(); ?></div>
		<div class="coms">
			<?php foreach($comments as $com) { ?>
			<div class="com">
				<p>@<?php echo $com['login']." ".$com['content']; ?></p>
			</div>
			<?php }?>
		</div>
		<div class="add">
			<div class="like">
				<?php put_like_link(); ?>
				<div class="value"><?php put_likes_nb($_GET["id"]); ?></div>
			</div>
			<div class="comment">
				<div class="icon"></div>
				<div class="value"><?php put_comments_nb($comments); ?></div>
			</div>
			<form action="./controller/post.controller.php" method="POST">
				<input type="text" name="comment" <?php show(); ?>/>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
				<input type="hidden" name="login" value="<?php echo $_GET['login']; ?>" />
			</form>
		</div>
	</div>
</div>
