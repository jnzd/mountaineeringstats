<?php
	include '../db.php';
	/**
	 * receive comment from form
	 * write comment to database
	 */
	$id = $_POST['id'];
  $actid = $_POST['actid'];
  $commentText = $conn->real_escape_string($_POST['commentText']);
	$sql = "INSERT INTO comments (userID, actID, commentText)	VALUES ('$id', '$actid', '$commentText')";
	$result = $conn->query($sql);
?>