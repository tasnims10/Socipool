<?php
include("connect.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['PostID'])) {
        $PostID = $_POST['PostID'];

        // Retrieve the username of the logged-in user from the session
        $loggedInUsername = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';

       
        $selectSql = "SELECT Username FROM posts WHERE PostID = ?";
        $selectStmt = mysqli_prepare($conn, $selectSql);

        if ($selectStmt) {
            // Bind the parameters
            mysqli_stmt_bind_param($selectStmt, "i", $PostID);

            // Execute the statement
            mysqli_stmt_execute($selectStmt);

            // Bind the result
            mysqli_stmt_bind_result($selectStmt, $postUsername);

            // Fetch the result
            mysqli_stmt_fetch($selectStmt);

            // Close the statement
            mysqli_stmt_close($selectStmt);

            // Check if the retrieved username matches the session's username
            if ($postUsername === $loggedInUsername) {
                // The logged-in user is the owner of the post, proceed with deletion
                
                
                $deleteSql = "DELETE FROM posts WHERE PostID = ?";
                $deleteStmt = mysqli_prepare($conn, $deleteSql);

                if ($deleteStmt) {
                    // Bind the parameters
                    mysqli_stmt_bind_param($deleteStmt, "i", $PostID);

                    // Execute the statement
                    if (mysqli_stmt_execute($deleteStmt)) {
                        // Deletion successful
                        echo "success";
                    } else {
                        echo "Error executing delete statement: " . mysqli_stmt_error($deleteStmt);
                    }

                    // Close the delete statement
                    mysqli_stmt_close($deleteStmt);
                } else {
                    echo "Error preparing delete statement: " . mysqli_error($conn);
                }
            } else {
                echo "You are not authorized to delete this post."; // Only the post owner can delete it
            }
        } else {
            echo "Error preparing select statement: " . mysqli_error($conn);
        }
    } else {
        echo "Missing parameters"; // PostID is missing
    }
}
?>
