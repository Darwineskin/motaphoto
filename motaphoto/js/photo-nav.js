document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.navigation-links a');
    const thumbnailContainer = document.querySelector('.thumbnail-container');

    navLinks.forEach(link => {
        link.addEventListener('mouseover', function() {
            const thumbnailUrl = link.getAttribute('data-thumbnail');
            if (thumbnailUrl) {
                thumbnailContainer.innerHTML = ''; // clear

                const img = document.createElement('img');
                img.src = thumbnailUrl;
                thumbnailContainer.appendChild(img);
            }
        });

        link.addEventListener('mouseout', function() {
            thumbnailContainer.innerHTML = ''; // clear but save space
        });
    });
});



