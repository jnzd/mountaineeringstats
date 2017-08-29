<?php
  $sql = "SELECT * FROM comments WHERE actID='$actid'";
  $result = $conn->query($sql);
  $rownr = $result->num_rows;
  if($rownr>0){
    $rows = resultToArray($result);
    $result->free();
    foreach($rows as $row) {
      $commentText = $row['text'];
      $userID = $row['userID'];
      $sql = "SELECT * FROM users WHERE id='$userID'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      
      echo '<div id="commentLine"><p class="comment"><b>'.$username.' </b>'.$commentText.'</p></div>';
    }
  }
?>

