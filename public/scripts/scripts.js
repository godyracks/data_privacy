document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('.navbar');
    const sticky = navbar.offsetTop;

    function checkSticky() {
        if (window.scrollY > sticky) {
            navbar.classList.add('sticky');
        } else {
            navbar.classList.remove('sticky');
        }
    }

    window.addEventListener('scroll', checkSticky);
});



document.addEventListener('DOMContentLoaded', () => {
    const testimonialCards = document.querySelector('.testimonial-cards');

    // Duplicate the cards to create a seamless loop
    const cardsClone = testimonialCards.innerHTML;
    testimonialCards.innerHTML += cardsClone;

    // Function to reset scroll animation
    const resetScroll = () => {
        testimonialCards.style.transition = 'none';
        testimonialCards.style.transform = 'translateX(0)';

        // Force reflow to reset the animation properly
        void testimonialCards.offsetWidth;

        // Reapply transition and animate back to start
        testimonialCards.style.transition = 'transform 30s linear infinite';
        testimonialCards.style.transform = `translateX(-50%)`;
    };

    // Reset when the animation completes to prevent gaps
    testimonialCards.addEventListener('animationiteration', resetScroll);
});










