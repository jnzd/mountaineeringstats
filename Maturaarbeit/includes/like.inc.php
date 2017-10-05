<?php
	/**
	 * receive data from likebutton
	 * write like to database
	 */
	include '../db.php';
	$userID = $_POST['userid'];
	$actID = $_POST['actid'];
  $userID00actID = $userID."00".$actID;
	$sql = "SELECT * FROM activities where id='$actID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$recievingid = $row['user_id'];
	$link = "activity.php?name=".$row['filename'];
	$sql = "INSERT INTO notifications (receivingID, sendingID, type, link) VALUES ('$recievingid','$userID','like','$link')";
	$result = $conn->query($sql);
	$notificationsid = $conn->insert_id;
	$sql = "INSERT INTO likes (userID, actID, userID00actID, notificationsid) VALUES ('$userID', '$actID', '$userID00actID','$notificationsid')";
	$result = $conn->query($sql);
	// get number of likes from database
	$sql = "SELECT * FROM likes WHERE actID='$actID'";
	$result = $conn->query($sql);
	$likes = $result->num_rows;
	// echo statements get read by ajax
	if($likes==1){
		echo "<b>".$likes."</b> Like";
	}else{
		echo "<b>".$likes."</b> Likes";
	}
?>