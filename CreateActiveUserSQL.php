
<?php
include ("connect.php");
 
session_start();
    if(isset($_POST['submit']))
    {
        $Username = $_POST['Username'];
        $Email = $_POST['Email'];
        $Passcode = $_POST['Passcode'];
        $admin = $_POST['admin'];
    }

    $sql = "INSERT INTO users (UserID, Username, Email, Passcode, admin) VALUES ('0', '$Username', '$Email', '$Passcode', '$admin')";
    $rs = mysqli_query($conn, $sql);
   
    $_SESSION['Username'] = $Username;
    $_SESSION['Passcode'] = $Passcode;
    header("Location: HomepageActiveUser.php");
  
?>
