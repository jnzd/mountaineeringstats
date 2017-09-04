<?php
  $sql = "SELECT * FROM followers WHERE followingID='$userID'";
  $result = $conn->query($sql);
  $followingnr = $result->num_rows;

  $sql = "SELECT * FROM followers WHERE followedID='$userID'";
  $result = $conn->query($sql);
  $followersnr = $result->num_rows; 
?>
<div id="followingnr"><p><b><?php echo $followingnr; ?></b><br>abonniert</p></div>
<div id="followernr"><p><b><?php echo $followersnr; ?></b><br>Abonnenten</p></div>