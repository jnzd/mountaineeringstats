<?php
  /**
    * check if logged in user already follows the respective person
    * display follow or unfollow button accordingly     */
    $followingID = $_SESSION['id'];
    $followedID = $row['id'];
    $followingUser = $_SESSION['username'];
    $followedUser = $row['username'];
    $followingID00followedID = $followingID."00".$followedID;
    $followSearch = "SELECT * FROM followers WHERE followingID00followedID='$followingID00followedID'";
    $resultFollowers = $conn->query($followSearch);
    $rowFollowers = $resultFollowers->fetch_assoc();
    $rownrFollowers = $resultFollowers->num_rows;
?>
<div class="followButton followSearch" id="followButton<?php echo $followedID; ?>">
  <?php
    if($rownrFollowers>0){
      echo "<button type='button' onclick='unfollow(".$followedID.",\"".$followedUser."\",".$followingID00followedID.")'>Abonniert</button>";
    }else{
      echo "<button type='button' onclick='follow(".$followedID.",\"".$followedUser."\",".$followingID00followedID.")'>Folgen</button>";
    }
  ?>
  <script>
    function follow(followedID, followedUser, followingID00followedID){
      /**
       * call like.inc
       */
      $.ajax({
        type:'post',
        url:'includes/follow.inc.php',
        datatype: 'json',
        data: {
          followingID: '<?php echo $followingID; ?>',
          followedID: followedID,
          followingUser: '<?php echo $followingUser; ?>',
          followedUser: followedUser,
          followingID00followedID: followingID00followedID
        },
        complete: function(){
          /**
           * change followbutton
           */
          $('#followButton'+followedID).html('<button type="button" onclick="unfollow('+followedID+',\''+followedUser+'\','+followingID00followedID+')">Abonniert</button>');
        }
      });
      return false;
    }
    function unfollow(followedID, followedUser, followingID00followedID){
      /**
       * call unfollow.inc
       */
      $.ajax({
        type:'post',
        url:'includes/unfollow.inc.php',
        datatype: 'json',
        data: {
          followingID00followedID: followingID00followedID
        },
        complete: function(){
          /**
           * change followbutton
           */
          $('#followButton'+followedID).html('<button type="button" onclick="follow('+followedID+',\''+followedUser+'\','+followingID00followedID+')">Folgen</button>');
        }
      });
      return false;
    }
  </script>
</div>