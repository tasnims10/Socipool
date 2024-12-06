<?php include ('header.php');?>

<body>

<link rel="stylesheet" href="css/CreateUsers.css">
    <h1>Register active user</h1>
    <div class="form">
        <form method="POST" action="CreateActiveUserSQL.php">
            <p>
                <label for="Username">Username </label><br>
                <input type="text" name="Username" id="Username" required><br><br>
            </p>
            <p>
                <label for="Email">Email </label><br>
                <input type="text" name="Email" id="Email" required><br><br>
            </p>
            <p>
                <label for="Passcode">Passcode</label><br>
                <input type="text" name="Passcode" id="Passcode" required><br><br>
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Submit">
            </p>
        </form>
    </div>
</body>
</html>
