<?php
  $sql = "SELECT * FROM followers WHERE followingID='$userID'";
  $result = $conn->query($sql);
  $followingnr = $result->num_rows;

  $sql = "SELECT * FROM followers WHERE followedID='$userID'";
  $result = $conn->query($sql);
  $followersnr = $result->num_rows; 
?>
<div class="profileStats">
  <div class="followingnr">
    <p>
      <b id="followingnr">
        <?php echo $followingnr; ?>
      </b>
      <br>
      Abonniert
    </p>
  </div>
  <div class="followernr">
    <p>
      <b id="followernr"><?php echo $followersnr; ?></b>
      <br>
      <?php
        if($followersnr==1){
          echo "Abonnent";
        }else{
          echo "Abonnenten";
        }
      ?>
    </p>
  </div>
</div>