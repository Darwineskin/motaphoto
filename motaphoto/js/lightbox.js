

jQuery(document).ready(function($) {
    let currentIndex;
    let galleryItemCount;
    let galleryItems;

    // Event listener for clicking on the fullscreen icon (icon-fullscreen)
    $(document).on('click', '.icon-fullscreen', function (e) {
        e.preventDefault();
        const currentGalleryItem = $(this).closest('.gallery-item');
        galleryItems =  $('.gallery-item');
        galleryItemCount = galleryItems.length;
        galleryItems.each(function(index, element) {
            if(currentGalleryItem.attr('data-post-id') === $(element).attr('data-post-id')) {
                currentIndex = index;
            }
        });

        updateLightboxContent(currentGalleryItem);
        $('.lightbox').show();
    });

    $('.lightbox-prev').on('click',function (e){
        e.preventDefault();
        if(currentIndex === 0){
            currentIndex = galleryItemCount-1;
        } else {
            currentIndex = currentIndex-1;
        }
        const currentGalleryItem = galleryItems[currentIndex];
        updateLightboxContent($(currentGalleryItem));
    });

    $('.lightbox-next').on('click',function (e){
        e.preventDefault();
        if(currentIndex === galleryItemCount-1){
            currentIndex = 0;
        } else {
            currentIndex = currentIndex+1;
        }
        const currentGalleryItem = galleryItems[currentIndex];
        updateLightboxContent($(currentGalleryItem));
    });


    $('.lightbox-close').on('click', function (e) {
        e.preventDefault();
        $('.lightbox').hide();
    });

    function updateLightboxContent(currentGalleryItem) {
        const imageElement = currentGalleryItem.find('.gi-image');
        const refElement = currentGalleryItem.find('.overlay-ref');
        const catElement = currentGalleryItem.find('.overlay-cat');
        $('.lightbox-img').attr('src', imageElement.attr('src'));
        $('.lightbox-ref').text(refElement.text());
        $('.lightbox-cat').text(catElement.text());
    }

});

