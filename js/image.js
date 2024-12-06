document.getElementById('Image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        resizeImage(file, 75,75, function(resizedFile) { // Set the desired width and height
            displayPreview(resizedFile);
            
        });
    }
});

function resizeImage(file, maxWidth, maxHeight, callback) {
    const reader = new FileReader();
    reader.onload = function(event) {
        const img = new Image();
        img.onload = function() {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            let width = img.width;
            let height = img.height;

            // Calculate new dimensions 
            if (width > height) {
                if (width > maxWidth) {
                    height *= maxWidth / width;
                    width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                    width *= maxHeight / height;
                    height = maxHeight;
                }
            }

            canvas.width = width;
            canvas.height = height;

            ctx.drawImage(img, 0, 0, width, height);

            canvas.toBlob(function(blob) {
                const resizedFile = new File([blob], file.name, { type: 'image/jpeg', lastModified: Date.now() });
                callback(resizedFile);
            }, 'image/jpeg');
        };
        img.src = event.target.result;
    };
    reader.readAsDataURL(file);
}

function displayPreview(file) {
    const reader = new FileReader();
    reader.onload = function(event) {
        document.getElementById('previewImage').src = event.target.result;
    };
    reader.readAsDataURL(file);
}
