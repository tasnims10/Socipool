<?php include ('header.php');?>
    <link rel="stylesheet" href="css/LogoutPages.css">

<body>
    <?php include("NavBarAdmin.php");?>
    <h2>Logout page</h2>

    <div class="form">
        <form method="POST" action="LogoutSQL.php">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="pwd" required><br><br>

            <input class="btn btn-primary" type="submit" value="Logout" name="submit"><br><br>
        </form>
        <div>
        <a href="http://localhost/Project2TasnimShahinShahin/app/php/ForgotPasscode.php">Forgot Password</a>
</div>
    </div>
</body>
</html>
