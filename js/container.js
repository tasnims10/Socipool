window.addEventListener('DOMContentLoaded', function() {
    var postContainers = document.querySelectorAll('.post-container');

    if (postContainers.length > 0) {
        // Adjust border size for each post container
        postContainers.forEach(function(container) {
            var postContent = container.querySelector('.post-content');
            
            if (postContent) {
                // Measure content dimensions
                var contentWidth = postContent.scrollWidth;
                var contentHeight = postContent.scrollHeight;
                
                // Update border size based on content dimensions
                container.style.borderWidth = Math.min(contentWidth, contentHeight) / 100 + 'px'; // Adjust divisor as needed
            } else {
                console.error('Post content not found:', container);
            }
        });
    } else {
        console.warn('No post containers found.');
    }
});

