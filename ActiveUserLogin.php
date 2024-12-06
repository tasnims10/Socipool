<?php include ('header.php');?>

<body>
<link rel="stylesheet" href="css/LoginPages.css">

<h1> Active user login </h1>

<div class="form">      
<form method="POST" action="LoginPagesActiveSQL.php">

  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br><br>

  <label for="pwd">Password:</label><br>
  <input type="password" id="pwd" name="pwd" required><br><br>

  <input class="btn btn-primary" type="submit" value="Log in" name="submit"><br><br>

</form>
<div>
<a href="http://localhost/Project2TasnimShahinShahin/app/php/ForgotPasscode.php">Forgot Password</a>
</div>
</body>

</html>

