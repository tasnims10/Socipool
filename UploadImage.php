<?php include ('header.php');?>
    <link rel="stylesheet" href="css/UploadImage.css">
  

<body>
    <?php include("NavBarActive.php");?>
    <div class="content">
        <h2>Upload Image/Video</h2>
        <div class="form">
            <form method="POST" action="UploadImageSQL.php" enctype="multipart/form-data">
                <label for="image">Select an image:</label><br><br>
                
                <input type="file" name="Image" id="Image" accept="image/*" required><br><br>
                <canvas id="resizedCanvas" style="display: none;"></canvas>
                <img id="previewImage" style="max-width: 300px; max-height: 300px;">

                <?php
                    session_start();
                    $loggedInUsername = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
                    echo '<input type="hidden" name="Username" value="' . $loggedInUsername . '">';
                ?>

                <label for="Caption">Caption:</label><br>
                <input type="text" id="Caption" name="Caption"><br><br>

                <input type="submit" name="submit" value="Upload Image">
            </form>
        </div>
</body>
<script src="js/image.js"></script>
</html>


    