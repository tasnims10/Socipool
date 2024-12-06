<?php include ('header.php');?>
    <link rel="stylesheet" href="css/UploadImage.css">
  

<body>
    <?php include("NavBarActive.php");?>

<div class="form">
            <form method="POST" action="UploadVideoSQL.php" enctype="multipart/form-data">
                <label for="Video">Select a Video:</label><br><br>
                <input type="file" name="Video" id="Video" accept="Video/*" required><br><br>

                <?php
                   session_start();
                    $loggedInUsername = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
                    echo '<input type="hidden" name="Username" value="' . $loggedInUsername . '">';

                    
                ?>

                <label for="Caption">Caption:</label><br>
                <input type="text" id="Caption" name="Caption"><br><br>

                <input type="submit" name="submit" value="Upload Video">
            </form>

            </div>
            <script src="js/video.js"></script>
</body>


</html>
