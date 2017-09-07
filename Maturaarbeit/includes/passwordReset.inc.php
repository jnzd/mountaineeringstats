<?php
  $email = $_POST['email']
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
    $message = "Hallo".$username."<br>Um Ihr Passwort zurückzusetzen klicken Sie bitte den folgenden Link. <a href='passwordResetForm.php?id=".$id."'>Passwort zurücksetzen</a><br><br> Falls Sie diese Nachricht fälschlicherweise erhalten und Ihr Passwort nicht zurücksetzen wollen, ignorieren Sie diese Nachricht.";
    //send email
    $headers = 'From: noreply@mountaineeringstats.com';
    mail($email,"E-Mail Bestätigung", $message, $headers);
  }else{
    echo "<p>Diese E-Mail Adresse ist nicht registriert.</p>"
  }
?>