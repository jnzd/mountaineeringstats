<?php
	include '../db.php';
	/**
	 * receive comment data from form
	 * write comment to database
	 */
	$id = $_POST['id'];
  $actid = $_POST['actid'];
  $commentText = $conn->real_escape_string($_POST['commentText']);
	$sql = "INSERT INTO comments (userID, actID, commentText)	VALUES ('$id', '$actid', '$commentText')";
	$result = $conn->query($sql);
	$sql = "SELECT * FROM activities where id='$actid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$recievingid = $row['user_id'];
	$link = "activity.php?name=".$row['actPath'];
	$sql = "INSERT INTO notifications (receivingID, sendingID, type, link) VALUES ('$recievingid','$id','comment','$link')";
	$result = $conn->query($sql);
?>