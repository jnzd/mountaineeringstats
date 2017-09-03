<?php
  $search = $_GET['search'];
  $title = "Suche | ".$search;
  include 'header.php';
  include 'db.php';

  $sql = "SELECT * FROM users WHERE username='$search'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo "<h1><a href='".$row['username']."'>".$row['username']."</a></h1>";
?>

<?php
  include 'footer.php';
?>