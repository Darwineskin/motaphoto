document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('contact-modal');
    var openButtons = document.querySelectorAll('[data-open-modal="contact"]');
    var closeButton = document.querySelector('.contact-modal .close');

    // Ouvrir la modale
    openButtons.forEach(function(button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            modal.style.display = 'block';
        });
    });

    // Fermer la modale
    closeButton.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    // Fermer la modale en cliquant à l'extérieur de celle-ci
    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});

