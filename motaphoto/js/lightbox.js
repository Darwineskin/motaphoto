

jQuery(document).ready(function($) {
    let currentIndex;
    let galleryItemCount;
    let galleryItems;

    // Écouteur d'événement pour cliquer sur l'icône fullscreen (icon-fullscreen)
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

    //
    //     // Trouver l'image associée avec la classe .gi-image (peut-être l'image parente)
    //     const imageElement = $(this).closest('.gi-image');
    //
    //     // Récupérer les attributs data de l'image
    //     const imageSrc = imageElement.data('image');
    //     const imageRef = imageElement.data('ref');
    //     const imageCat = imageElement.data('cat');
    //
    //     if (imageSrc) {
    //         // Récupérer les références des éléments dans la lightbox
    //         const lightboxImage = lightbox.querySelector('.lightbox_img');
    //         const lightboxRef = lightbox.querySelector('.lightbox_ref');
    //         const lightboxCat = lightbox.querySelector('.lightbox_cat');
    //
    //         // Définir la source de l'image, la référence et la catégorie dans la lightbox
    //         lightboxImage.setAttribute('src', imageSrc);
    //         lightboxRef.textContent = imageRef;
    //         lightboxCat.textContent = imageCat;
    //
    //         // Afficher la lightbox
    //         lightbox.style.display = 'block';
    //
    //         // Définir l'index actuel pour la navigation
    //         const index = $('.icon-fullscreen').index(this);
    //         lightbox.setAttribute('data-current-index', index);
    //     } else {
    //         console.error('La source de l\'image est nulle ou non définie');
    //     }
    // });
    //
    // // Écouteur d'événement pour fermer la lightbox via le bouton de fermeture
    // closeLightbox.onclick = function () {
    //     lightbox.style.display = 'none';
    // };
    //
    // // Écouteur d'événement pour fermer la lightbox en cliquant à l'extérieur
    // window.onclick = function (event) {
    //     if (event.target === lightbox) {
    //         lightbox.style.display = 'none';
    //     }
    // };
    //
    // // Écouteur d'événement pour fermer la lightbox avec la touche 'Échap'
    // document.addEventListener('keydown', function (e) {
    //     if (e.key === 'Escape') {
    //         lightbox.style.display = 'none';
    //     }
    // });
    //
    // // Écouteur d'événement pour cliquer sur la flèche gauche (image précédente)
    // lightbox.querySelector('.lightbox_prev').addEventListener('click', function (e) {
    //     e.stopPropagation();
    //     const currentIndex = parseInt(lightbox.getAttribute('data-current-index'));
    //     const newIndex = (currentIndex - 1 + $('.icon-fullscreen').length) % $('.icon-fullscreen').length;
    //
    //     if (newIndex >= 0) {
    //         const previousButton = $('.icon-fullscreen').eq(newIndex)[0];
    //         previousButton.click();
    //         lightbox.setAttribute('data-current-index', newIndex);
    //     }
    // });
    //
    // // Écouteur d'événement pour cliquer sur la flèche droite (image suivante)
    // lightbox.querySelector('.lightbox_next').addEventListener('click', function (e) {
    //     e.stopPropagation();
    //     const currentIndex = parseInt(lightbox.getAttribute('data-current-index'));
    //     const newIndex = (currentIndex + 1) % $('.icon-fullscreen').length;
    //
    //     if (newIndex < $('.icon-fullscreen').length) {
    //         const nextButton = $('.icon-fullscreen').eq(newIndex)[0];
    //         nextButton.click();
    //         lightbox.setAttribute('data-current-index', newIndex);
    //     }

});

