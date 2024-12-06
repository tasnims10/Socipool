<?php
include("connect.php"); 
session_start();

if (isset($_GET['PostID'])) {
    $PostID = $_GET['PostID'];
    
  
    $deleteSql = "DELETE FROM posts WHERE PostID = ?";
    $deleteStmt = mysqli_prepare($conn, $deleteSql);
    
    if ($deleteStmt) {
        // Bind the PostID parameter
        mysqli_stmt_bind_param($deleteStmt, "i", $PostID);
        
        // Execute the statement
        if (mysqli_stmt_execute($deleteStmt)) {
            // Redirect back to the page after successful deletion
            header("Location:adminhomepage.php");
            exit();
        } else {
            echo "Error executing delete statement: " . mysqli_stmt_error($deleteStmt);
        }
        
        // Close the statement
        mysqli_stmt_close($deleteStmt);
    } else {
        echo "Error preparing delete statement: " . mysqli_error($conn);
    }
} else {
    echo "PostID parameter is missing.";
}
?>

