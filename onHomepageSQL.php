<?php
include("connect.php");
session_start();

$sql = "SELECT p.PostID, p.Username AS PostUsername, DATE_FORMAT(p.Date, '%m/%d/%Y %l:%i %p') AS FormattedDate, p.Text, p.Image, p.Video, p.Caption, c.CommentID, c.Username AS CommentUsername, c.Details
        FROM posts p
        LEFT JOIN comments c ON p.PostID = c.PostID
        ORDER BY p.PostID DESC, c.CommentID ASC";

$result = mysqli_query($conn, $sql);

$posts = array(); 

while ($row = mysqli_fetch_assoc($result)) {
    $PostID = $row['PostID'];

    if (!isset($posts[$PostID])) {
        // Create a new post entry in the array
        $posts[$PostID] = array(
            'PostUsername' => $row['PostUsername'],
            'FormattedDate' => $row['FormattedDate'],
            'Text' => $row['Text'],
            'Image' => $row['Image'],
            'Video' => $row['Video'],
            'Caption' => $row['Caption'],
            'Comments' => array(),
        );
    }

    // Add comments to the corresponding post
    if (!empty($row['CommentID'])) {
        $posts[$PostID]['Comments'][] = array(
            'CommentUsername' => $row['CommentUsername'],
            'Details' => $row['Details'],
        );
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Upload.css">
    <title>Your Blog Title</title>
</head>

<body>
    <div class="post-row">
        <?php foreach ($posts as $PostID => $post): ?>
            <div class="post-container">
                <div class="post-header">
                    <p class="post-info"><?= $post['PostUsername'] . ', ' . $post['FormattedDate'] ?></p>
                    
                    <!-- Link to trigger the delete action -->
                    <?php if ($post['PostUsername'] === $_SESSION['Username']): ?>
                        <a class="delete-link" href="#" onclick="deletePost(<?= $PostID ?>); return false;">Delete Post</a>
                    <?php endif; ?>

                    <a class="comment-link" href="#" data-post-id="<?= $PostID ?>">Comment</a>
                </div>

                <div class="post-content">

                    <?php if (!empty($post['Caption'])): ?>
                        <p class="post-caption"><?= $post['Caption'] ?></p>
                    <?php endif; ?>

                    <?php if (!empty($post['Text'])): ?>
                        <div class="text-box"><p><?= $post['Text'] ?></p></div>
                    <?php endif; ?>

                    <?php if (!empty($post['Image'])): ?>
                        <img src="<?= $post['Image'] ?>" alt="Uploaded Image">
                    <?php endif; ?>

                    <?php if (!empty($post['Video'])): ?>
                        <video width="320" height="240" controls>
                            <source src="<?= $post['Video'] ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif; ?>

                    <?php foreach ($post['Comments'] as $comment): ?>
                     <p><?= $comment['CommentUsername'] ?>: <?= $comment['Details'] ?></p>
                    <?php endforeach; ?>
                </div>

                <?php include ('comments.php')?>
            </div>
        <?php endforeach; ?>
     
    </div>

    
    <script src="js/comments.js"></script>
    <script src="js/delete.js"></script>
    <script src="js/image.js"></script>
    <script src="js/video.js"></script>
    <script src="js/container.js"></script>
</body>
</html>
