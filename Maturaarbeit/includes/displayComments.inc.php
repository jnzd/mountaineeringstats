<div id="comments<?php echo $actid; ?>">
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
        $commentID = $row['commentID'];
        $sql = "SELECT * FROM users WHERE id='$userID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $usernameComment = $row['username'];
        $commentUserID = $row['id'];      
        echo '<div id="commentLine"><p class="comment"><b>'.$usernameComment.' </b>'.$commentText;
        if($commentUserID == $_SESSION['id']){
          $url = $_SERVER['REQUEST_URI'];
          echo " <a href='includes/deleteComment.inc.php?id=".$commentID."&url=".$url."'>löschen</a></p>";
        }else{
          echo '</p>';
        }
        echo "</div>";
      }
    }
  ?>
</div>

