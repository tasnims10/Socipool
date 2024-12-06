<?php
include("connect.php");

session_start();

if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Passcode = $_POST['Passcode'];
}

    // Add a check to ensure that the new passcodes match


    $sql = "UPDATE users SET Username = '$Username' WHERE Email = '$Email' AND Passcode = '$Passcode'";
    $_SESSION['Username'] = $Username;
    $_SESSION['Passcode'] = $Passcode;
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: HomepageActiveUser.php");
        exit(); // Make sure to exit after redirect
    } else {
        echo "Error updating record: " . $conn->error;
    }


$conn->close();
?>
