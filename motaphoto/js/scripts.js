document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('contact-modal');
    const openButtons = document.querySelectorAll('[data-open-modal="contact"]');
    const closeButton = document.querySelector('.contact-modal .close');
    const referenceInput = document.querySelector('input[name="photo-reference"]');

    // open modal
    openButtons.forEach(function(button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            referenceInput.value = this.getAttribute('data-reference');


            modal.style.display = 'block';
            setTimeout(function() {
                modal.classList.add('show');
            }, 10);
        });
    });

    // close modal
    closeButton.addEventListener('click', function () {
        modal.classList.remove('show');
    });

    // close modal on click on windows
    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.classList.remove('show');
        }
    });

    // hide modal when close
    modal.addEventListener('transitionend', function () {
        if (!modal.classList.contains('show')) {
            modal.style.display = 'none';
        }
    });
});




