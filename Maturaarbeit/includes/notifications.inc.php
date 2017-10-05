<div class="notification-content" id="notification-content">
  <?php
    $sql = "SELECT * FROM notifications WHERE receivingID='$id'";
    $result = $conn->query($sql);
    $rownr = $result->num_rows;
    if($rownr>0){
      $rows = resultToArray($result);
      foreach($rows as $row){
        $type = $row['type'];
        if($type == "follower"){
          $followingid = $row['sendingID'];
          $sql = "SELECT * FROM users WHERE id='$followingid'";
          $result = $conn->query($sql);
          $row2 = $result->fetch_assoc();
          $follower = $row2['username'];
          $link = $row['link'];
          echo "<a class='dropdwnLinkNotification' href='".$link."'>".$follower." folgt dir jetzt</a>";
        }else if($type == "comment"){
          $commentingid = $row['sendingID'];
          $sql = "SELECT * FROM users WHERE id='$commentingid'";
          $result = $conn->query($sql);
          $row2 = $result->fetch_assoc();
          $commenter = $row2['username'];
          $link = $row['link'];
          echo "<a class='dropdwnLinkNotification' href='".$link."'>".$commenter." hat unter deinem Beitrag kommentiert</a>";
        }else{
          $likingid = $row['sendingID'];
          $sql = "SELECT * FROM users WHERE id='$likingid'";
          $result = $conn->query($sql);
          $row2 = $result->fetch_assoc();
          $liker = $row2['username'];
          $link = $row['link'];
          echo "<a class='dropdwnLinkNotification' href='".$link."'>".$liker." gefällt dein Beitrag</a>";
        }
      }
    }
  ?>
</div>