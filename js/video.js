document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('Video').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            displayPreview(file);
            
        }
    });
    
    function displayPreview(file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('previewVideo').src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});
