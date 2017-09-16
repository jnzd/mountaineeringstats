<?php
    $username = $_GET['user'];
    $title = "Profil|".$username;
    include 'header.php';
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($id==$row['id']){
        header("location: profile.php");
    }else{
			$publicUser = $username;
			include 'includes/publicProfile.inc.php';
			include 'footer.php';
    }
?>