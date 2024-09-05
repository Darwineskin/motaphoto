jQuery(document).ready(function($) {
    const galleryGrid = $('#gallery-grid');
    const categoryFilter = $("#category-filter").select2({
        minimumResultsForSearch: Infinity, /* Désactive la barre de recherche si non nécessaire */
    });

    const formatFilter = $("#format-filter").select2({
        minimumResultsForSearch: Infinity, /* Désactive la barre de recherche si non nécessaire */
    });

    /* Listening change on category filter select2 */
    categoryFilter.on('change', function () {
        loadPhotos(true);
    });

    /* Listening change on format filter select2 */
    formatFilter.on('change', function () {
        loadPhotos(true);
    })

    let paged = 1;

    function loadPhotos(reset = false) {
        const category = categoryFilter.val();
        const format = formatFilter.val();

        if (reset) {
            paged = 1;
            galleryGrid.html(''); // Clear gallery
        }

        let apiUrl = `${window.location.origin}/wp-json/wp/v2/photo?per_page=8&page=${paged}`;

        if (category) {
            apiUrl += `&categorie_photo=${category}`;
        }

        if (format) {
            apiUrl += `&format_photo=${format}`;
        }

        $.ajax({
            url: apiUrl
        })
        .done(function( photos ) {
            if (photos.length > 0) {
                photos.forEach(photo => {
                    console.log(photo);
                    const galleryItem = $('<div></div>');
                    galleryItem.addClass('gallery-item');
                    galleryItem.html(`
                            <a href="${photo.link}">
                                <img src="${photo.featured_media_src_url}" alt="${photo.title.rendered}">
                            </a>`);
                    galleryGrid.append(galleryItem);
                });

                paged += 1;
            } else {
            }
        });
    }

    loadPhotos();
});