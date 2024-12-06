<?php include ('header.php');?>
    <link rel="stylesheet" href="css/UploadText.css">
    

<body>
    <?php include("NavBarActive.php");?>

    <h2>Upload text</h2>

    <form method="POST" action="UploadTextSQL.php">
        <div class="post-container">
            <div class="post-content">
                <label for="Caption">Caption:</label><br>
                <input type="text" id="Caption" name="Caption"><br><br>

                <?php
                session_start();

                ?>

                <textarea name="Text" class="input-box" placeholder="Start typing here..." required></textarea><br>

                <?php
                $loggedInUsername = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
                echo '<input type="hidden" name="Username" value="' . $loggedInUsername . '">';
                ?>

                <div class="upload-button">
                    <input type="submit" name="submit" id="submit" value="Upload">
                </div>
            </div>
        </div>
    </form>
</body>

</html>


