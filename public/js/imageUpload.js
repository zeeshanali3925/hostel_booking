document.addEventListener("DOMContentLoaded", function() {
    const imageInput = document.getElementById('imageUpload');
    
    if (imageInput) {
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                console.log("Selected file:", file.name);
                // Yahan file upload ka code likh sakte ho
            }
        });
    } else {
        console.log("imageUpload element not found.");
    }
});
