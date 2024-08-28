document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('contact-modal');
    var openButtons = document.querySelectorAll('[data-open-modal="contact"]');
    var closeButton = document.querySelector('.contact-modal .close');

    // open modal
    openButtons.forEach(function(button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
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

