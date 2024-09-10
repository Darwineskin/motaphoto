document.addEventListener('DOMContentLoaded', function () {
    const burgerMenu = document.querySelector('.burger-menu');
    const openMenuButton = document.querySelector('.open-menu');
    const closeMenuButton = document.querySelector('.close-menu');
    const mainMenu = document.querySelector('.main-menu');
    const mainMenuLinks = document.querySelectorAll('.main-menu a');
    const body = document.querySelector('body');
    let isOpen = false;

    // Gérer le clic sur le bouton burger
    burgerMenu.addEventListener('click', function () {
        if (isOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    function closeMenu() {
        closeMenuButton.style.display = 'none';
        openMenuButton.style.display = 'inline';
        mainMenu.classList.remove('show');
        mainMenu.classList.add('hiding');

        mainMenu.addEventListener('transitionend', () => {
            mainMenu.classList.remove('hiding');
            mainMenu.classList.add('hidden');
        }, { once: true });

        isOpen = !isOpen;
        burgerMenu.classList.toggle('open');
        body.classList.toggle('no-scroll');
    }

    function openMenu() {
        openMenuButton.style.display = 'none';
        closeMenuButton.style.display = 'inline';
        mainMenu.classList.remove('hidden');
        mainMenu.classList.add('showing'); // Affiche le menu (display: block)

        // Petite temporisation pour déclencher l'animation
        setTimeout(() => {
            mainMenu.classList.remove('showing');
            mainMenu.classList.add('show'); // Le menu est maintenant visible
        }, 10);

        isOpen = !isOpen;
        burgerMenu.classList.toggle('open');
        body.classList.toggle('no-scroll');
    }

    mainMenuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            closeMenu();
        });
    });
});



