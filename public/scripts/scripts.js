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

document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;
    const slideInterval = 6000; // 6 seconds per slide

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (i === index) {
                slide.classList.add('active');
            }
        });

        // Shift the entire container to show the current slide
        const slideWidth = slides[0].offsetWidth;
        document.querySelector('.hero-slides').style.transform = `translateX(-${index * slideWidth}px)`;
    }

    function nextSlide() {
        currentSlide++;

        if (currentSlide >= slides.length) {
            // Reset to the first slide without sliding back
            currentSlide = 0;
            document.querySelector('.hero-slides').style.transition = 'none'; // Disable transition
            document.querySelector('.hero-slides').style.transform = 'translateX(0)';
            
            // Force reflow to apply the transition again
            setTimeout(() => {
                document.querySelector('.hero-slides').style.transition = 'transform 1s ease-in-out';
                showSlide(currentSlide);
            }, 10);
        } else {
            showSlide(currentSlide);
        }
    }

    // Initial display
    showSlide(currentSlide);

    // Set interval to change slides
    setInterval(nextSlide, slideInterval);
});

particlesJS('particles-js', {
    "particles": {
      "number": {
        "value": 80,  // Increased number of particles
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        }
      },
      "opacity": {
        "value": 0.6,  // Slightly higher opacity for more visibility
        "random": true,
        "anim": {
          "enable": false
        }
      },
      "size": {
        "value": 4,  // Increased size for better recognition
        "random": true,
        "anim": {
          "enable": false
        }
      },
      "line_linked": {
        "enable": false
      },
      "move": {
        "enable": true,
        "speed": 0.8,  // Reduced speed for a calmer effect
        "direction": "none",
        "random": true,
        "straight": false,
        "out_mode": "out",
        "bounce": false
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": false
        },
        "onclick": {
          "enable": false
        }
      }
    },
    "retina_detect": true
  });














