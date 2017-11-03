<?php
  $search = $_GET['search'];
  $title = "Suche | ".$search;
  include 'header.php';
  include 'db.php';
?>
<div class="feed">
  <div class="activityPreview">
    <?php    
      $searchLength = strlen($search);
      $sql = "SELECT * FROM users WHERE SUBSTRING(username,1,$searchLength)='$search'";
      $result = $conn->query($sql);

      $rownr = $result->num_rows;
      if($rownr>0){
        $rows = resultToArray($result);
        $result->free();
        foreach($rows as $row) {
          echo "<div class='searchresult'>";
          $username = $row['username'];
          $picPath = $row['pic_path'];
          $userID = $row['id'];
          echo "<a class='searchresultLink' href='".$username."'><img class='circle searchPic' src='".$picPath."' height='40' width='40'>";
          echo "<h1>".$username."</a></h1>";
          if($_SESSION['id'] != $userID){
            include 'includes/followButtonSearch.inc.php';
          }
          echo "</div>";
        }
      }
    ?>
  </div>
</div>
<?php
  include 'footer.php';
?>