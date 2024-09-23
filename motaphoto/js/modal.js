jQuery(document).ready(function ($) {
    const $modal = $('#contact-modal');
    const $openButtons = $('[data-open-modal="contact"]');
    const $referenceInput = $('input[name="photo-reference"]');

    // open modal
    $openButtons.each(function () {
        $(this).on('click', function (event) {
            event.preventDefault();

            $referenceInput.val($(this).attr('data-reference'));

            $modal.show(); // Display modal before running transition
            setTimeout(function () {
                $modal.addClass('show');
            }, 10);
        });
    });

    // close modal on click on window
    $(window).on('click', function (event) {
        if (event.target === $modal[0]) {
            $modal.removeClass('show');
        }
    });

    // hide modal when transition ends
    $modal.on('transitionend', function () {
        if (!$modal.hasClass('show')) {
            $modal.hide();
        }
    });
});





