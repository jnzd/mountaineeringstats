<?php
include '../header.php';
include '../db.php';


$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

echo $username."<br>";
echo $email."<br>";
echo $password."<br>";

$sql = "INSERT INTO users (username, email, password)
VALUES ('$username', '$email', '$password')";

$result = mysqli_query($conn, $sql);

header("Location: ../verification.php");

?>