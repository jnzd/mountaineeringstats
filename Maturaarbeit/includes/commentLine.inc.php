<div id="commentLine<?php echo $commentID; ?>">
	<div class="commentLine">
		<p class="comment"><b><?php echo $usernameComment; ?></b> <?php echo $commentText; ?></p>
		<?php
			if($commentUserID == $_SESSION['id']){
				include 'includes/deleteCommentButton.inc.php';
			}
		?>
	</div>
</div>