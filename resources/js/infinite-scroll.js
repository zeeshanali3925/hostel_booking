// resources/js/infinite-scroll.js

document.getElementById('loadMore').addEventListener('click', function() {
    let lastImageId = document.querySelector('.card:last-child').dataset.id;

    fetch(`/load-more-images/${lastImageId}`)
        .then(response => response.json())
        .then(data => {
            let container = document.querySelector('.grid');
            data.images.forEach(image => {
                let imageHTML = `
                    <div class="card bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                        <a href="/image/${image.id}">
                            <img src="/uploads/${image.image_path}" alt="Related Image" class="w-full h-64 object-cover rounded-lg" />
                        </a>
                    </div>
                `;
                container.innerHTML += imageHTML;
            });
        });
});
















function deleteImage(id) {
    if (!confirm('Are you sure you want to delete this image?')) return;

    fetch("/delete-image", {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ id: id })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            alert(data.message);
            location.reload(); // Ya DOM se image remove kar lo
        } else {
            alert('Failed to delete');
        }
    });
}
