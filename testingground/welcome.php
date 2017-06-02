<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Login</title>
</head>

<?php session_start(); ?>

<body>
<div>
	<?= $_SESSION['message']?>
	Welcome <?= $_SESSION['username']?>
</div>
</body>