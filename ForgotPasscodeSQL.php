<?php
include("connect.php");

session_start();

if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Passcode = $_POST['Passcode'];
    $ConfirmPasscode = $_POST['ConfirmPasscode'];

    // Add a check to ensure that the new passcodes match
    if ($Passcode !== $ConfirmPasscode) {
        echo "Error: New passcodes do not match.";
        exit();
    }

    $sql = "UPDATE users SET Passcode = '$Passcode' WHERE Username = '$Username' AND Email = '$Email'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: OpeningPage.php");
        exit(); // Make sure to exit after redirect
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


$conn->close();
?>

