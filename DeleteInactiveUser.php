<!DOCTYPE html>
<html lang="en">
<meta charset = "UTF-8">
 <meta name = "viewport" content = "width-device-width, initial-scale=1.0">
<head>
<link rel="stylesheet" href="css/DeleteUser.css">
<title>SociPool</title>
</head>

<body>
<?php include("NavBarInactive.php");?>

<h2> Delete profile</h2>
<div class="form">
<form method="POST" action="DeleteUserSQL.php">

  <label for="username">Username:</label><br>
  <input type="text" id="username" name="Username" required><br><br>

  <label for="email">Email:</label><br>
  <input type="email" id="email" name="Email"required><br><br>
 
  <label for="Passcode">Passcode:</label><br>
  <input type="text" name="Passcode" id="Passcode"required><br><br>

  <input class="btn btn-primary" type="submit" value="Delete" name="submit"><br><br>
  
</form>
<body>
    </html>