<?php include ('header.php');
include("NavBarAdmin.php");
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


}
?>


<body>
    <div class="post-row">
        <?php foreach ($posts as $PostID => $post): ?>
            <div class="post-container">
                <div class="post-header">
                    <p class="post-info"><?= $post['PostUsername'] . ', ' . $post['FormattedDate'] ?></p>
                    <a class="delete-link" href="DeletepostadminSQL.php?PostID=<?= $PostID ?>">Delete Post</a>

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
                </div>

                <?php include ('comments.php');?>
            </div>
        <?php endforeach; ?>
    </div>

   
    <script src="js/comments.js"></script>
    <script src="js/image.js"></script>
  
</body>

