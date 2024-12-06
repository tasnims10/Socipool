<?php
include("connect.php");
session_start();



if (isset($_POST['submit'])) {
    $PostID = $_POST['PostID'];
    $Username = $_SESSION['Username'];
    $Details = $_POST['Details'];

    $sql = "INSERT INTO comments (PostID, Username, Details) VALUES ('$PostID', '$Username', '$Details')";

    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        header("Location: HomepageInactiveUser.php");
        exit(); 
    } else {
        echo "Error: " . mysqli_error($conn); // Output error message for debugging
    }
}
?>