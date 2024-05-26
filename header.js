let lastScrollTop = 0;
const header = document.querySelector('header');
let lastScrollDirection = 'down';

window.addEventListener('scroll', function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop && lastScrollDirection !== 'down') {
        // Scrolling down
        header.style.top = '-100px'; // Hide header
        lastScrollDirection = 'down';
    } else if (currentScroll < lastScrollTop && lastScrollDirection !== 'up') {
        // Scrolling up
        header.style.top = '0'; // Show header
        lastScrollDirection = 'up';
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
}, false);
