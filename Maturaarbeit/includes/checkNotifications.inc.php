<?php
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM notifications WHERE receivingID='$id' && checked=0";
  $result = $conn->query($sql);
  $rownr = $result->num_rows;
  if($rownr>0){
    $notifications = true;
  }else{
    $notifications = false;
  }
?>