<?php

include("connect.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Check if a file was selected
    if (isset($_FILES['Video'])) {
        $Video= $_FILES['Video'];

        // Verify the destination directory exists
        $destinationDir = 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'vids.php';
        if (!is_dir($destinationDir)) {
            mkdir($destinationDir, 0755, true); // Create directory recursively
        }

        // Check for errors during file upload
        if ($Video['error'] === UPLOAD_ERR_OK) {
            // Generate a unique filename
            $VideoFileName = uniqid() . '_' . $Video['name'];

            // Specify the path to store the images
            $VideoPath = $destinationDir . DIRECTORY_SEPARATOR . $VideoFileName;

            // Move the uploaded file to the specified path
            if (move_uploaded_file($Video['tmp_name'], $VideoPath)) {
                // Get the content of the uploaded file
                $VideoData = file_get_contents($VideoPath);

               
                $escapedVideoData = mysqli_real_escape_string($conn, $VideoData);

                // Get the caption and passcode from the form
                $caption = isset($_POST['Caption']) ? $_POST['Caption'] : '';
                $passcode = isset($_POST['Passcode']) ? $_POST['Passcode'] : '';

                
                $loggedInUsername = isset($_POST['Username']) ? $_POST['Username'] : '';

                
                if (!empty($escapedVideoData)) {
                    // Use prepared statement to insert data into the 'posts' table
                    $sql = "INSERT INTO posts (Username, Caption, Date, Image, Video, Text) VALUES (?, ?, NOW(), '', ?, '')";
                    $stmt = mysqli_prepare($conn, $sql);

                    if ($stmt) {
                        // Bind the parameters
                        mysqli_stmt_bind_param($stmt, "sss", $loggedInUsername, $caption, $VideoPath);

                        // Execute the statement
                        $result = mysqli_stmt_execute($stmt);

                        if ($result) {
                            // Redirect to the appropriate page after successful insertion
                            header("Location: HomepageActiveUser.php");
                            exit(); // Make sure to exit after the redirect
                        } else {
                            echo "Error executing statement: " . mysqli_stmt_error($stmt);
                        }

                        // Close the statement
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Error preparing statement: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            echo "Error during file upload: " . $Video['error'];
        }
    }
}

// Close the database connection
$conn->close();
?>
