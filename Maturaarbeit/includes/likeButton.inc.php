<?php
  $userID = $_SESSION['id'];
  $likeCheck = "SELECT * FROM likes WHERE userID='$userID' AND actID='$actid'";
  $resultLikes = $conn->query($likeCheck);
  $rowLikes = $resultLikes->fetch_assoc();
  $rownr = $resultLikes->num_rows;
  if($rownr>0){
    echo "<div class='likeButton' id='likeButton'><button type='button' onclick='unlike()'>Gefällt mir nicht mehr</button></div>";
  }else{
    echo "<div class='likeButton' id='likeButton'><button type='button' onclick='like()'>Gefällt mir</button></div>";
  }
?>
<script src="node_modules\jquery\dist\jquery.js"></script>
<script>
  function like() {
    $.ajax({
      type:'post',
      url:'includes/like.inc.php',
      datatype: 'json',
      data: {
        userID: '<?php echo $userID; ?>',
        actID: '<?php echo $actid; ?>'
      },
      complete: function (response) {
        $('#likeButton').html("<button type='button' onclick='unlike()'>Gefällt mir nicht mehr</button>");
      },
    });
    return false;
  }
  function unlike() {
    $.ajax({
      type:'post',
      url:'includes/unlike.inc.php',
      datatype: 'json',
      data: {
        userID: '<?php echo $userID; ?>',
        actID: '<?php echo $actid; ?>'
      },
      complete: function (response) {
        $('#likeButton').html("<button type='button' onclick='like()'>Gefällt mir</button>");
      }
    });
    return false;
  }
</script>