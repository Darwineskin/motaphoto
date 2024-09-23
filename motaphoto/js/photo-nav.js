jQuery(document).ready(function ($) {
    const $navLinks = $('.navigation-links a');
    const $thumbnailContainer = $('.thumbnail-container');

    $navLinks.each(function () {
        const $link = $(this);

        $link.on('mouseover', function () {
            const thumbnailUrl = $link.attr('data-thumbnail');
            if (thumbnailUrl) {
                $thumbnailContainer.empty(); // Clear the container

                const $img = $('<img>').attr('src', thumbnailUrl);
                $thumbnailContainer.append($img);
            }
        });

        $link.on('mouseout', function () {
            $thumbnailContainer.empty(); // Clear but save space
        });
    });
});



