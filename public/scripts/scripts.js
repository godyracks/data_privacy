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
    let isAnimating = false; // To prevent rapid scrolling

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
        testimonialCards.style.transition = 'transform 0.8s ease-in-out'; // Smoother and slower transition
        testimonialCards.style.transform = `translateX(-${index * (cards[0].offsetWidth + 20)}px)`; // Adjust for card width + gap
        updateActiveCard(index);

        setTimeout(() => {
            isAnimating = false; // Reset after animation ends
        }, 800); // Match the transition duration
    };

    // Auto-scroll function
    const autoScroll = () => {
        currentIndex++;
        if (currentIndex >= cards.length) {
            currentIndex = 0;
        }
        scrollToIndex(currentIndex);
    };

    // Click event for right chevron
    chevronRight.addEventListener('click', () => {
        if (isAnimating) return; // Prevent rapid clicks
        currentIndex++;
        if (currentIndex >= cards.length) {
            currentIndex = 0;
        }
        scrollToIndex(currentIndex);
        pauseAutoScroll();
    });

    // Click event for left chevron
    chevronLeft.addEventListener('click', () => {
        if (isAnimating) return; // Prevent rapid clicks
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = cards.length - 1;
        }
        scrollToIndex(currentIndex);
        pauseAutoScroll();
    });

    // Set interval to auto-scroll every 5 seconds
    const startAutoScroll = () => {
        autoScrollInterval = setInterval(autoScroll, 5000); // Adjusted for slower auto-scrolling
    };

    // Pause auto-scrolling on chevron click and reset after 5 seconds
    const pauseAutoScroll = () => {
        clearInterval(autoScrollInterval);
        setTimeout(startAutoScroll, 7000); // Restarts auto-scroll after 7 seconds
    };

    chevronLeft.addEventListener('click', pauseAutoScroll);
    chevronRight.addEventListener('click', pauseAutoScroll);

    // Initialize auto-scrolling
    startAutoScroll();

    // Initialize the first active card and dot
    scrollToIndex(currentIndex);
});













