<?php include('header.php');?>
    <link rel="stylesheet" href="css/CreateUsers.css">

<body>

    <h1>Forgot Passcode</h1>
    <div class="form">
        <form method="POST" action="ForgotPasscodeSQL.php">
            <p>
                <label for="Username">Username: </label><br>
                <input type="text" name="Username" id="Username" required><br><br>
            </p>
            <p>
                <label for="Email">Email: </label><br>
                <input type="email" name="Email" id="Email" required><br><br>
            </p>
            <p>
                <label for="Passcode">New passcode:</label><br>
                <input type="text" name="Passcode" id="Passcode" required><br><br>
            </p>
            <p>
                <label for="ConfirmPasscode">Confirm passcode:</label><br>
                <input type="text" name="ConfirmPasscode" id="ConfirmPasscode" required><br><br>
            </p>

            <p>
                <input type="submit" name="submit" id="submit" value="Update passcode">
            </p>
        </form>
    </div>
</body>
</html>
