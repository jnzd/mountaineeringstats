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
<script src="node_modules\jquery\dist\jquery.js"></script>
<script>
  function follow() {
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
      complete: function (response) {
        $('#followButton').html('<button type="button" onclick="unfollow()">Abonniert</button>');
      },
    });
    return false;
  }
  function unfollow() {
    $.ajax({
      type:'post',
      url:'includes/unfollow.inc.php',
      datatype: 'json',
      data: {
        followingID00followedID: '<?php echo $followingID00followedID; ?>'
      },
      complete: function (response) {
        $('#followButton').html('<button type="button" onclick="follow()">Folgen</button>');
      }
    });
    return false;
  }
</script>