<?php
	/**
	 * receive data from likebutton
   * delete ike from database
   * delete corresponding notification
	 */
  include '../db.php';
	$userID = $_POST['userid'];
  $actID = $_POST['actid'];
  $userID00actID = $userID."00".$actID;
  $sql = "SELECT * FROM likes WHERE userID00actID='$userID00actID'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $notificationsid = $row['notificationsid'];
  $sql = "DELETE FROM notifications WHERE id='$notificationsid'";
  $result = $conn->query($sql);
  $sql = "DELETE FROM likes WHERE userID00actID='$userID00actID'";
  $result = $conn->query($sql);
?>