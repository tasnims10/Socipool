<?php include('header.php');?>
 <link rel="stylesheet" href="css/Upload.css">
 


<body>
<div id="deleteForm_<?= $PostID ?>" class="delete-form" style="display: none;">
    <form action="DeletepostadminSQL.php" method="post">

        <input type="hidden" name="PostID" value="<?= $PostID ?>">


        <input type="hidden" name="Caption" value="<?= $Caption ?>">

        <input type="submit" name="submit" value="Delete">
    </form>
  
</div>
</body>
</html>