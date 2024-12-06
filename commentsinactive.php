<?php include ('header.php');?>


<body>
<link rel="stylesheet" href="css/Upload.css">
<div id="CommentForm_<?php echo $PostID; ?>" class="comment-form" style="display: none;">
    <form action="commentsinactiveSQL.php" method="post" data-post-id="<?php echo $PostID; ?>">
        <input type="hidden" name="PostID" value="<?php echo $PostID; ?>">

        <input type="hidden" name="Username" value="<?php echo $Username; ?>">

        <label for="Details">Comment:</label><br>

        <textarea name="Details" required></textarea><br><br>
        
        <input type="submit" name="submit" value="Submit">

    </form>
</div>
<script src="js/comments.js"></script>
</body>
