<?php
  $id = $_SESSION['id'];
  $sqlNotifications = "SELECT * FROM followers WHERE followedID='$id' AND messageChecked='0'";
  $resultNotifications = $conn->query($sqlNotifications);
  $rownrNotifications = $resultNotifications->num_rows;
  if($rownrNotifications>0){
    $notifications = true;
  }else{
    $notifications = false;
  }
?>