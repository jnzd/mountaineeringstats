<?php
  include '../db.php';
  $email = $_POST['email'];
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);
  $rownr = $result->num_rows; 
  if($rownr>0){
    $rownr = $result->num_rows;
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $id = $row['id'];
    $result = mysqli_query($conn, $sql);
    //email message
    $message = "Hallo ".$username."\nUm Ihr Passwort zurückzusetzen klicken Sie bitte den folgenden Link. https://mountaineeringstats.com/passwordResetForm.php?id=".$id."\n\nFalls Sie diese Nachricht fälschlicherweise erhalten und Ihr Passwort nicht zurücksetzen wollen, ignorieren Sie diese Nachricht.";
    //send email
    $header = "From: noreply@mountaineeringstats.com\r\n";
    $header .= "Mime-Version: 1.0\r\n";
    $header .= "Content-type: text/plain; charset=utf-8";
    mail($email,"Passwort Zurücksetzen", $message, $header);
    header("location: ../start.php");
  }else{
    echo "<p>Diese E-Mail Adresse ist nicht registriert.</p>";
  }
?>