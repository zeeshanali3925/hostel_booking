document.addEventListener("DOMContentLoaded", function() {
    console.log("JavaScript Loaded!");

    let uploadInput = document.getElementById('imageUpload');

    if (!uploadInput) {
        console.error("Element #imageUpload not found!");
        return;
    }

    uploadInput.addEventListener('change', function() {
        console.log("File selected!");

        let file = this.files[0];

        if (!file) {
            alert("Please select an image!");
            return;
        }

        let formData = new FormData();
        formData.append('image', file);

        console.log("Uploading Image:", file);

        fetch('/upload-image', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server Response:", data);
            if (data.success && data.image_url) {
                location.reload(); // Image upload hone ke baad page reload hoga
            } else {
                alert("Image upload failed!");
            }
        })
        .catch(error => console.error('Error:", error'));
    });
});
