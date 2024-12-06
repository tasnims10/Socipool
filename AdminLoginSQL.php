
<?php
include("connect.php");
session_start();
$Username = "";
$Passcode = "";


if(isset($_POST['submit']))
{
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);
    $Passcode = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Query the database to check if the provided username and password are valid
    $sql = "SELECT * FROM users WHERE admin = '$admin' AND passcode = '$Passcode'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Check if any matching record is found
        if(mysqli_num_rows($result) > 0) {
            //If the credentials are valid, the user is authenticated
            mysqli_close($conn);
            header("Location: adminhomepage.php");

        }
        else{
            echo"Invalid login credentials";
        }
            exit(); 
        } 
    }
    $_SESSION['Username'] = $Username;
    
    

mysqli_close($conn);
?>