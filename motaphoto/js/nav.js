jQuery(document).ready(function ($) {
    const $burgerMenu = $('.burger-menu');
    const $openMenuButton = $('.open-menu');
    const $closeMenuButton = $('.close-menu');
    const $mainMenu = $('.main-menu');
    const $mainMenuLinks = $('.main-menu a');
    const $body = $('body');
    let isOpen = false;

    // Handle the click on the burger button.
    $burgerMenu.on('click', function () {
        if (isOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    function closeMenu() {
        $closeMenuButton.css('display', 'none'); // Hide
        $openMenuButton.css('display', 'inline'); // Show
        $mainMenu.removeClass('show showing').addClass('hiding');

        // Delay to remove 'hiding' and add 'hidden' after the transition
        setTimeout(function () {
            $mainMenu.removeClass('hiding').addClass('hidden');
        }, 200); // Adjust the delay for the transition timing

        isOpen = false;
        $burgerMenu.removeClass('open'); // Remove 'open' class from burger icon
        $body.removeClass('no-scroll'); // Remove 'no-scroll' to allow page scrolling
    }

    function openMenu() {
        $openMenuButton.css('display', 'none'); // Hide
        $closeMenuButton.css('display', 'inline'); // Show
        $mainMenu.removeClass('hidden hiding').addClass('showing');

        // Small delay to trigger the animation for showing the menu
        setTimeout(function () {
            $mainMenu.removeClass('showing').addClass('show');
        }, 10); //  transition works smoothly

        isOpen = true;
        $burgerMenu.addClass('open'); // Add 'open' class to burger icon
        $body.addClass('no-scroll'); // Add 'no-scroll' to prevent page scrolling
    }

    // Close menu when a link in the menu is clicked
    $mainMenuLinks.each(function () {
        $(this).on('click', function () {
            closeMenu();
        });
    });

    // Close the menu if the user clicks outside of it (window click)
    $(window).on('click', function (event) {
        if (event.target === $mainMenu[0] && isOpen) {
            closeMenu();
        }
    });
});




