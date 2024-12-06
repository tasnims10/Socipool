<?php
include("connect.php");
session_start();

if (isset($_POST['submit'])) {
    // Retrieve form data
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Passcode = mysqli_real_escape_string($conn, $_POST['Passcode']);

    // Delete the user from the database
    $sql = "DELETE FROM users WHERE Username = '$Username' AND Email = '$Email' AND Passcode = '$Passcode'";
    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        
        $_SESSION['Username'] = $Username;

       
        header("Location: OpeningPage.php");
        exit(); 
    } else {
        // Display error message if deletion fails
        echo "Error: " . mysqli_error($conn);
    }
}
?>
