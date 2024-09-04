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
    const chevronLeft = document.querySelector('.chevron-left');
    const chevronRight = document.querySelector('.chevron-right');
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
    let autoScrollInterval;
    let isAnimating = false;

    // Update active card and dot based on index
    const updateActiveCard = (index) => {
        cards.forEach(card => card.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        cards[index % cards.length].classList.add('active');
        dots[index % dots.length].classList.add('active');
    };

    // Scroll to specific index
    const scrollToIndex = (index) => {
        if (isAnimating) return; // Prevent during animation
        isAnimating = true; // Block multiple clicks
        testimonialCards.style.transition = 'transform 0.8s ease-in-out'; // Smooth transition
        testimonialCards.style.transform = `translateX(-${index * (cards[0].offsetWidth + 20)}px)`; // Adjust for card width + gap
        updateActiveCard(index);

        setTimeout(() => {
            isAnimating = false; // Reset after animation ends
        }, 800); // Match the transition duration
    };

    // Auto-scroll function
    const autoScroll = () => {
        currentIndex = (currentIndex + 1) % cards.length; // Loop back to start
        scrollToIndex(currentIndex);
    };

    // Function to start the auto-scroll with interval
    const startAutoScroll = () => {
        clearInterval(autoScrollInterval); // Clear any existing interval
        autoScrollInterval = setInterval(autoScroll, 5000); // Auto-scroll every 5 seconds
    };

    // Click event for right chevron
    chevronRight.addEventListener('click', () => {
        if (isAnimating) return; // Prevent rapid clicks
        currentIndex = (currentIndex + 1) % cards.length; // Loop back to start
        scrollToIndex(currentIndex);
        resetAutoScroll(); // Reset the auto-scroll interval on interaction
    });

    // Click event for left chevron
    chevronLeft.addEventListener('click', () => {
        if (isAnimating) return; // Prevent rapid clicks
        currentIndex = (currentIndex - 1 + cards.length) % cards.length; // Wrap around
        scrollToIndex(currentIndex);
        resetAutoScroll(); // Reset the auto-scroll interval on interaction
    });

    // Function to reset auto-scroll interval
    const resetAutoScroll = () => {
        clearInterval(autoScrollInterval); // Stop the current interval
        startAutoScroll(); // Restart auto-scroll after a pause
    };

    // Initialize auto-scrolling
    startAutoScroll();

    // Initialize the first active card and dot
    scrollToIndex(currentIndex);
});














