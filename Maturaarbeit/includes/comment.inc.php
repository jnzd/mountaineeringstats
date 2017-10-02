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
	//printf ("New Record has id %d.\n", $conn->insert_id);
	echo json_encode($conn->insert_id);
?>