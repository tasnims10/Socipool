<?php
include ("connect.php");

session_start();


// Retrieve form data
if(isset($_POST['submit'])) {
    $Caption = isset($_POST['Caption']) ? $_POST['Caption'] : '';
    $Text = isset($_POST['Text']) ? $_POST['Text'] : '';

    // Retrieve session data
    $loggedInUsername = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';


    // Insert data into the database
    $sql = "INSERT INTO posts (Username, Caption, Text) VALUES ('$loggedInUsername', '$Caption', '$Text')";
    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        // Data inserted successfully
        header("Location: HomepageActiveUser.php");
        exit();
    } else {
        // Error inserting data
        echo "Error: " . mysqli_error($conn);
    }
}
?>
