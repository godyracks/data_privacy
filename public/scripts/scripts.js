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
    const cards = Array.from(testimonialCards.children);
    const dotsWrapper = document.querySelector('.dots-wrapper');

    // Create dots based on the number of cards
    cards.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (index === 0) dot.classList.add('active');
        dotsWrapper.appendChild(dot);
    });

    const dots = Array.from(dotsWrapper.children);
    let currentIndex = 0;

    // Update active card and dot based on index
    const updateActiveCard = (index) => {
        cards.forEach(card => card.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        cards[index % cards.length].classList.add('active');
        dots[index % dots.length].classList.add('active');
    };

    // Auto-scroll function
    const autoScroll = () => {
        currentIndex++;
        updateActiveCard(currentIndex);
        testimonialCards.style.transform = `translateX(-${currentIndex * (cards[0].offsetWidth + 20)}px)`; // Adjust gap here

        // Loop back to the start when reaching the end
        if (currentIndex >= cards.length) {
            setTimeout(() => {
                testimonialCards.style.transition = 'none';
                testimonialCards.style.transform = 'translateX(0)';
                currentIndex = 0;
                updateActiveCard(currentIndex);
                requestAnimationFrame(() => {
                    testimonialCards.style.transition = 'transform 0.5s ease-in-out';
                });
            }, 500);
        }
    };

    // Set interval to auto-scroll every 3 seconds
    setInterval(autoScroll, 3000);

    // Initialize the first active card and dot
    updateActiveCard(currentIndex);
});












