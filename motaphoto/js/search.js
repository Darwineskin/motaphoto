jQuery(document).ready(function($) {
    const galleryGrid = $('#gallery-grid');
    const categoryFilter = $("#category-filter").select2({
        minimumResultsForSearch: Infinity, /* disable search bar */
    });

    const formatFilter = $("#format-filter").select2({
        minimumResultsForSearch: Infinity, /* disable search bar */
    });

    const dateFilter = $("#date-filter").select2({
        minimumResultsForSearch: Infinity, /* disable search bar */
    });

    let order = 'desc';

    /* Listening change on category filter select2 */
    categoryFilter.on('change', function () {
        loadPhotos(true);
    });

    /* Listening change on format filter select2 */
    formatFilter.on('change', function () {
        loadPhotos(true);
    });

    /* Listening change on date filter select2 */
    dateFilter.on('change',function(){
            order = $(this).val();
            loadPhotos(true);
    });


    let paged = 1;
    let totalPages = 0;


    function loadPhotos(reset = false) {
        const category = categoryFilter.val();
        const format = formatFilter.val();

        if (reset) {
            paged = 1;
            galleryGrid.html(''); // Clear gallery
            $('#load-more').show();
        }

        let apiUrl = `${window.location.origin}/wp-json/wp/v2/photo?per_page=8&page=${paged}&orderby=date&order=${order}`;

        if (category) {
            apiUrl += `&categorie_photo=${category}`;
        }

        if (format) {
            apiUrl += `&format_photo=${format}`;
        }

        $.ajax({
            url: apiUrl,
            type: 'GET',
            success: function(photos, textStatus, xhr) {
                if (photos.length > 0) {
                    // pagination
                    totalPages = parseInt(xhr.getResponseHeader('X-WP-TotalPages'), 10); // total page

                photos.forEach(photo => {
                    const galleryItem = $('<div></div>');
                    galleryItem.addClass('gallery-item');
                    galleryItem.attr('data-post-id', photo.id);
                    galleryItem.html(`
                            <a href="${photo.link}">
                                <img class="gi-image" src="${photo.featured_media_src_url}" alt="${photo.title.rendered}">
                            </a>
                            <div class="overlay">
                                <div class="icon-fullscreen"><img src="${wpData.templateDirectoryUri}/images/icon_fullscreen.png" alt="fullscreen"></div>
                                <div class="icon-eye"><a href="${photo.link}"><img src="${wpData.templateDirectoryUri}/images/icon_eye.png" alt="eye"></a></div>
                                <div class="overlay-info">
                                    <div class="overlay-ref">${photo.acf.reference}</div>
                                    <div class="overlay-cat">${photo.category_names}</div>
                                </div>
                            </div>`
                    );
                    galleryGrid.append(galleryItem);
                });

                paged += 1;
            }

                if (paged > totalPages) {
                    $('#load-more').hide(); // hide button load more
                }
            }

        });
    }

    //
    loadPhotos();

    //
    $('#load-more').on('click', function() {
        loadPhotos(false);
    });
});