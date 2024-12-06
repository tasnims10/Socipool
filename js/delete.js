function deletePost(postID) {
    // Use Fetch API for AJAX request
    fetch('DeletePostSQL.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'PostID=' + postID,
    })
    .then(response => response.text())
    .then(data => {
        // Log the response from the server
        console.log(data);

        // Handle the response from the server
        if (data === 'success') {
            
            location.reload();
        } else if (data === 'not_authorized') {
            // Display an error message for not being authorized to delete
            alert('You are not authorized to delete this post.');
        } else {
            
            console.error('Unexpected response:', data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
