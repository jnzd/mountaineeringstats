<?php
  /**
   * delete follow relationship from database
   * dlete corresponding notification from database
   */
  include '../db.php';
	$followingID00followedID = $_POST['followingID00followedID'];
  $sql = "SELECT * FROM followers WHERE followingID00followedID='$followingID00followedID'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $notificationsid = $row['notificationsid'];
  $sql = "DELETE FROM notifications WHERE id='$notificationsid'";
  $result = $conn->query($sql);
  $sql = "DELETE FROM followers WHERE followingID00followedID='$followingID00followedID'";
  $result = $conn->query($sql);
?>
