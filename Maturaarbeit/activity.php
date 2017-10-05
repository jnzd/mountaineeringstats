<?php
  //$title="";
  include 'header.php';
  $id = $_SESSION['id'];
  $randomid = $_GET['id'];
  $owner = false;
  $sql = "SELECT * FROM activities WHERE randomID='$randomid'";
  $result = $conn->query($sql);
  $rownr = $result->num_rows;
  if($rownr==1){
    $row = $result->fetch_assoc();
    $postingid = $row['user_id'];
    if($postingid == $id){
      $owner = true;
    }
  }else{
    header("location: index.php");
  }
?>
<div class="feed"><!-- necessary to center header-->
  <div id="profileheader">
    <?php
      if($owner){
        include 'includes/profileheader.inc.php';
      }else{
        $sql = "SELECT * FROM users WHERE id='$postingid'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        include 'includes/profileheaderPublic.inc.php';
      }
    ?>
  </div>
</div>
<div id="activity">
  <?php
    include 'includes/activity.inc.php';
  ?>
</div>
<?php
  include 'footer.php';
?>
