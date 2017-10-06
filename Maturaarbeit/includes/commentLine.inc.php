<div id="commentLine<?php echo $commentID; ?>">
	<div class="commentLine">
		<p class="comment">
			<a class="usernameLink" href="<?php echo $usernameComment; ?>">
				<b class="commentUsername">
					<?php echo $usernameComment; ?>
				</b>
			</a>
			&nbsp;
			<div class="commentText">
				<?php echo $commentText; ?>
			</div>
		</p>
		<?php
			if($commentUserID == $_SESSION['id']){
				include 'includes/deleteCommentButton.inc.php';
			}
		?>
	</div>
</div>