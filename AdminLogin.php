<?php include('header.php');?>


<body>
<link rel="stylesheet" href="css/LoginPages.css">
    <div class="container">
        <h1>Admin login</h1>

        <div class="form">
            <form method="POST" action="AdminLoginSQL.php">
                <label for="admin">Username:</label><br>
                <input type="text" id="admin" name="admin" required><br><br>

                <label for="pwd">Password:</label><br>
                <input type="password" id="pwd" name="pwd" required><br><br>

                <input class="btn btn-primary" type="submit" value="Login" name="submit"><br><br>
            </form>
            <div>
            <a href="http://localhost/Project2TasnimShahinShahin/app/php/ForgotPasscode.php">Forgot Password</a>
            </div>
        </div>
    </div>
</body>



