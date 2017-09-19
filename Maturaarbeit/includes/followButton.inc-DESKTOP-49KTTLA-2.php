<div class="followButton" id="followButton">
  <?php
    $followingID = $_SESSION['id'];
    $followedID = $row['id'];
    $followingUser = $_SESSION['username'];
    $followedUser = $row['username'];
    $followingID00followedID = $followingID."00".$followedID;
    $followSearch = "SELECT * FROM followers WHERE followingID00followedID='$followingID00followedID'";
    $resultFollowers = $conn->query($followSearch);
    $rowFollowers = $resultFollowers->fetch_assoc();
    $rownrFollowers = $resultFollowers->num_rows;
    if($rownrFollowers>0){
      echo "<button type='button' onclick='unfollow()'>Abonniert</button>";
    }else{
      echo "<button type='button' onclick='follow()'>Folgen</button>";
    }
  ?>
  <script>
    function follow(){
      var followernr = parseInt(document.getElementById('followernr').textContent)+1;
      $.ajax({
        type:'post',
        url:'includes/follow.inc.php',
        datatype: 'json',
        data: {
          followingID: '<?php echo $followingID; ?>',
          followedID: '<?php echo $followedID; ?>',
          followingUser: '<?php echo $followingUser; ?>',
          followedUser: '<?php echo $followedUser; ?>',
          followingID00followedID: '<?php echo $followingID00followedID; ?>'
        },
        complete: function(){
          /change followbutton
          //update followercount
          $('#followButton').html('<button type="button" onclick="unfollow()">Abonniert</button>');
          $('#followernr').html(followernr);
        },
      });
      return false;
    }
    function unfollow(){
      var followernr = parseInt(document.getElementById('followernr').textContent)-1;
      $.ajax({
        type:'post',
        url:'includes/unfollow.inc.php',
        datatype: 'json',
        data: {
          followingID00followedID: '<?php echo $followingID00followedID; ?>'
        },
        complete: function(){
          //change followbutton
          $('#followButton').html('<button type="button" onclick="follow()">Folgen</button>');
          //update followercount
          $('#followernr').html(followernr);
        }
      });
      return false;
    }
  </script>
</div>