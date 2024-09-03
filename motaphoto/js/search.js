document.addEventListener('DOMContentLoaded', function () {
    const categoryFilter = document.getElementById('category-filter');
    const formatFilter = document.getElementById('format-filter');
    const galleryGrid = document.getElementById('gallery-grid');
    const loadMoreButton = document.getElementById('load-more');

    let paged = 1;

    function loadPhotos(reset = false) {
        const category = categoryFilter.value;
        const format = formatFilter.value;

        if (reset) {
            paged = 1;
            galleryGrid.innerHTML = ''; // Clear gallery
        }

        let apiUrl = `${window.location.origin}/wp-json/wp/v2/photo?per_page=8&page=${paged}`;

        if (category) {
            apiUrl += `&categorie_photo=${category}`;
        }

        if (format) {
            apiUrl += `&format_photo=${format}`;
        }

        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur dans la requête API');
                }
                return response.json();
            })
            .then(photos => {
                if (photos.length > 0) {
                    photos.forEach(photo => {
                        console.log(photo);
                        const galleryItem = document.createElement('div');
                        galleryItem.classList.add('gallery-item');
                        galleryItem.innerHTML = `
                            <a href="${photo.link}">
                                <img src="${photo.featured_media_src_url}" alt="${photo.title.rendered}">
                                <h4>${photo.title.rendered}</h4>
                            </a>`;
                        galleryGrid.appendChild(galleryItem);
                    });

                    paged += 1;
                    // loadMoreButton.style.display = 'block';
                } else {
                    // loadMoreButton.style.display = 'none';
                }
            })
            .catch(error => console.error('Erreur:', error));
    }

    loadPhotos();

    // Reload the photos when changing the filter
    categoryFilter.addEventListener('change', () => loadPhotos(true));
    formatFilter.addEventListener('change', () => loadPhotos(true));

    // Load more photos when the "Load More" button is clicked.
    // loadMoreButton.addEventListener('click', () => loadPhotos());
});

