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
	$sql = "SELECT * FROM activities where id='$actID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$recievingid = $row['user_id'];
	$link = "activity.php?name=".$row['actPath'];
	$sql = "INSERT INTO notifications (receivingID, sendingID, type, link) VALUES ('$recievingid','$id','like','$link')";
	$result = $conn->query($sql);
?>