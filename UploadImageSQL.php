<?php
include("connect.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Check if a file was selected
    if (isset($_FILES['Image'])) {
        $Image = $_FILES['Image'];

        // Specify the dimensions the image is resized to
        $desiredWidth = 500;
        $desiredHeight = 300;

        // Verify the destination directory exists
        $destinationDir = 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'pics.php';
        if (!is_dir($destinationDir)) {
            mkdir($destinationDir, 0755, true); // Create directory recursively
        }

        // Check for errors during file upload
        if ($Image['error'] === UPLOAD_ERR_OK) {
            
            $imageFileName = uniqid() . '_' . $Image['name'];

            // Specify the path to store the images
            $imagePath = $destinationDir . DIRECTORY_SEPARATOR . $imageFileName;

            // Resize the uploaded image
            list($width, $height) = getimagesize($Image['tmp_name']);
            $ratio = $width / $height;

            if ($width > $desiredWidth || $height > $desiredHeight) {
                if ($ratio > 1) {
                    $newWidth = $desiredWidth;
                    $newHeight = $desiredWidth / $ratio;
                } else {
                    $newHeight = $desiredHeight;
                    $newWidth = $desiredHeight * $ratio;
                }
            } else {
                $newWidth = $width;
                $newHeight = $height;
            }

            // Create a new image with the desired dimensions
            $resizedImage = imagecreatetruecolor($desiredWidth, $desiredHeight);
            $sourceImage = imagecreatefromjpeg($Image['tmp_name']);

            // Resize and save the image
            imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagejpeg($resizedImage, $imagePath);

            
            imagedestroy($resizedImage);
            imagedestroy($sourceImage);

            $loggedInUsername = isset($_POST['Username']) ? $_POST['Username'] : '';

            // Get the caption from the form
            $caption = isset($_POST['Caption']) ? $_POST['Caption'] : '';

            // Use prepared statement to insert data into the 'posts' table
            $sql = "INSERT INTO posts (Username, Caption, Date, Image, Video, Text) VALUES (?, ?, NOW(), ?, '', '')";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                // Bind the parameters
                mysqli_stmt_bind_param($stmt, "sss", $loggedInUsername, $caption, $imagePath);

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
        } else {
            echo "Error during file upload: " . $Image['error'];
        }
    }
}


$conn->close();
?>
