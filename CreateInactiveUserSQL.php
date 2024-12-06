<?php
include("connect.php");
session_start();

$Username = "";
$Email = "";
$Passcode = "";
$admin = "";

if (isset($_POST['submit'])) {

    // Fetch the generated username from the hidden input
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Passcode = $_POST['Passcode'];
    $admin = $_POST['admin'];

    // Insert data into the database
    $sql = "INSERT INTO users (UserID, Username, Email, Passcode, admin) 
            VALUES ('0', '$Username', '$Email', '$Passcode', '$admin')";
    $rs = mysqli_query($conn, $sql);
    $_SESSION['Username'] = $Username; 
    // Redirect to the homepage
    header("Location: HomepageInactiveUser.php");
    exit(); // Ensure that the script stops execution after the redirection
}
?>


