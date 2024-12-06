<?php include ('header.php');
session_start();?>
    <link rel="stylesheet" href="css/LogoutPages.css">

<body>
<div class="container">
        <?php include("NavBarInactive.php");?>
    <h2>Switch to an active user account</h2>
    <div class="form">
        <form method="POST" action="SwitchAccountSQL.php">
            <p>
                <label for="Username"> New Username: </label><br>
                <input type="text" name="Username" id="Username" required><br><br>
            </p>
            <p>
                <label for="Email">Email: </label><br>
                <input type="email" name="Email" id="Email" required><br><br>
            </p>
            <p>
                <label for="Passcode">Passcode:</label><br>
                <input type="text" name="Passcode" id="Pwd" required><br><br>
            </p>
            </p>

            <p>
                <input type="submit" name="submit" id="submit" value="Update account">
            </p>
        </form>
    </div>
</body>
</html>
