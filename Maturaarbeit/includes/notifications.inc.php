<?php
  $id = $_SESSION['id'];
  $sqlNotifications = "SELECT * FROM followers WHERE followedID='$id' AND messageChecked='0'";
  $resultNotifications = $conn->query($sqlNotifications);
  $rownrNotifications = $resultNotifications->num_rows;
  if($rownrNotifications>0){
    $notification = resultToArray($resultNotifications);
    $resultNotifications->free();
    foreach($notification as $notification) {
      echo "<li><a href='".$notification['followingUser']."'>";
      echo $notification['followingUser']." hat dich abonniert";
      echo "</a></li>";
      $followersID = $notification['followingID00followedID'];
      $sql = "UPDATE followers SET messageChecked=1 WHERE followingID00followedID='$followersID'";
      $result = $conn->query($sql);
    }
  }
?>