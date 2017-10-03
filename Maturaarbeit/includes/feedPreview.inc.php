<div class='activityPreview'>
	<?php
		$userID=$row['user_id'];
		$sqlUser = "SELECT * FROM users WHERE id='$userID'";
		$resultUser = $conn->query($sqlUser);
		$rowUser = $resultUser->fetch_assoc();
		$username = $rowUser['username'];
		$picPath = $rowUser['pic_path'];
		$title = $row['title'];
		$actid = $row['id'];
		$sport = $row['sport'];
		$path = $row['actPath'];
		$type = $row['type'];
		$actTime = $row['actTime'];
		$filename = $row['filename'];
		$description = $row['description'];
		$values = gpx($row['actPath']);
		$dateTime = $values['dateTime'];
	?>
	<div class='actHeader'>
		<div class='postingHeader'>
			<a class="profileLink" href='<?php echo $username; ?>'>
				<img class="circle postingPicture" src='<?php echo $picPath; ?>' height='40' width='40'>
			</a>
			<div class="postUserAndDate">
				<a class="profileLink" href='<?php echo $username; ?>'>
					<p class="postingUsername"><?php echo $username; ?>
				</a>
				<div class='date'>
					<p><?php echo $dateTime[0]->format('d.m.Y H:i:s'); ?></p>
				</div>
			</div>
		</div>
		<div class='actName'>
			<div class='title'>
				<?php
					if($userID == $_SESSION['id']){
						echo "<h1><a class='actTitle' href='../activity.php?name=".$filename."'>".$title."</a></h1>";
					}else{
						echo "<h1><a class='actTitle' href='../activityPublic.php?name=".$filename."&username=".$username."'>".$title."</a></h1>";
					}
				?>
			</div>
			<?php
				include 'includes/icons.inc.php';
			?>
			<p><?php echo $description; ?></p>
		</div>
	</div>
	<?php
		include 'includes/staticMap.inc.php';
		//link comment section to according activity with actid
		include 'includes/likeCounter.inc.php';
		include 'includes/displayComments.inc.php';
		include 'includes/likeButton.inc.php';
		include 'includes/commentForm.inc.php';
	?>
</div>