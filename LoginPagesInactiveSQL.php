<?php
include("connect.php");
session_start();
$Username = "";
$Passcode = "";

if(isset($_POST['submit']))
{
    $Username = mysqli_real_escape_string($conn, $_POST['username']);
    $Passcode = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Query the database to check if the provided username and password are valid
    $sql = "SELECT * FROM users WHERE username = '$Username' AND passcode = '$Passcode'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Check if any matching record is found
        if(mysqli_num_rows($result) > 0) {
            // Valid credentials, user is authenticated
            $_SESSION['Username'] = $Username; // Store username in session
            mysqli_close($conn);
            header("Location: HomepageInactiveUser.php");
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo "Invalid login credentials";
        }
    }
}

mysqli_close($conn);
?>




