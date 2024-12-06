<?php include('header.php');
session_start();?>
<body>
<link rel="stylesheet" href="css/CreateUsers.css">
    <h1>Register inactive user</h1>
    <div class="form">
        <form method="POST" action="CreateInactiveUserSQL.php">
            <p>
                <label for="Username">Username </label><br>
                <input type="hidden" name="Username" id="Username" value="">

                <button id="generate-button" onclick="generateRandomName()">Generate Username</button>
                <div id="random-name"> </div>
              
                <script src="js/randomnames.js"></script>
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

