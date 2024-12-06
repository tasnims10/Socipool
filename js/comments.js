
window.onload = function () {
    function toggleCommentForm(PostID) {
        var commentForm = document.getElementById('CommentForm_' + PostID);

        if (commentForm) {
            var computedStyle = window.getComputedStyle(commentForm);

            if (computedStyle.display === 'none' || computedStyle.display === '') {
                commentForm.style.display = 'block';
            } else {
                commentForm.style.display = 'none';
            }
        } else {
            console.error('Element not found:', 'CommentForm_' + PostID);
        }
    }

    
    var commentLinks = document.querySelectorAll('.comment-link');
    commentLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var postID = this.getAttribute('data-post-id');
            toggleCommentForm(postID);
        });
    });

    
};
