<?php
	/**
	 * receive data from likebutton
	 * write like to database
	 */
	include '../db.php';
	$userID = $_POST['userid'];
  $actID = $_POST['actid'];
  $userID00actID = $userID."00".$actID;  
	$sql = "INSERT INTO likes (userID, actID, userID00actID) VALUES ('$userID', '$actID', '$userID00actID')";
	$result = $conn->query($sql);
?>