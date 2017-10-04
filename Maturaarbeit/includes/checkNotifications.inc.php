<?php
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM activities WHERE user_id='$id'";
  $result = $conn->query($sql);
  $rownr = $result->num_rows;
  if($rownr>0){
    $sql = "SELECT * FROM likes JOIN comments ON likes.actID=comments.actID, likes.date=comments.date WHERE";
    $rows = resultToArray($result);
    foreach($rows as $row){
      $actid = $row['id'];
      $sql .= " (likes.actID='$actid' && messagedChecked=0)";
      $sql .= " (comments.actID='$actid' && messagedChecked=0)";
    }
    //$sql .= " ORDER BY likes.date||comments.like DESC";
    $result = $conn->query($sql);
    $rownr = $result->num_rows;
    if($rownr>0){
      $rows = resultToArray($result);
      foreach($rows as $row){
        if(isset($row['userID00actID'])){
          echo "like ".$row['userID00actID']."<br>";
        }else if(isset($row['commentText'])){
          echo "like ".$row['commentText']."<br>";
        }
      }
    }
  }
  $sqlNotifications = "SELECT * FROM followers WHERE followedID='$id' AND messageChecked='0'";
  $resultNotifications = $conn->query($sqlNotifications);
  $rownrNotifications = $resultNotifications->num_rows;
  if($rownrNotifications>0){
    $notifications = true;
  }else{
    $notifications = false;
  }
?>