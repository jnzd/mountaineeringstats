<div class='activityPreview'>
	<?php
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
		<div class='title'>
		<h1>
			<a class='actTitle' href='<?php echo $activityLink; ?>'><?php echo $title; ?></a>		
		</h1>
		</div>
	<?php
		include 'includes/icons.inc.php';
	?>
		<p><?php echo $description ?></p>
		</div>
	<?php
		$values = gpx($row['actPath']);
		include 'includes/staticMap.inc.php';
		include 'includes/displayComments.inc.php';
		include 'includes/likeButton.inc.php';
		include 'includes/commentForm.inc.php';
		echo "";
	?>
</div>