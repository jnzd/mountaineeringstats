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
	?>
	<div class='actHeader'>
		<div class='profilePicture'>
			<a href='<?php echo $username; ?>'><img class='circle' src='<?php echo $picPath; ?>' height='40' width='40'></a>
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
		$values = gpx($row['actPath']);
		include 'includes/staticMap.inc.php';
		//link comment section to according activity with actid
		include 'includes/displayComments.inc.php';
		include 'includes/likeButton.inc.php';
		include 'includes/commentForm.inc.php';
	?>
</div>