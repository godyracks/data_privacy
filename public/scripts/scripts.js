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

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal');
    const modalToggle = document.getElementById('modalToggle');
    const modalClose = document.getElementById('modalClose');

    // Toggle modal visibility
    modalToggle.addEventListener('click', function() {
        modal.classList.toggle('show');
    });

    // Close modal
    modalClose.addEventListener('click', function() {
        modal.classList.remove('show');
    });

    // Close modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.remove('show');
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const chevronLeft = document.querySelector('.chevron-left');
    const chevronRight = document.querySelector('.chevron-right');
    const testimonialCards = document.querySelector('.testimonial-cards');
    const cardWidth = document.querySelector('.testimonial-card').offsetWidth; // Dynamically get the width of a card

    let currentIndex = 0;
    const totalCards = testimonialCards.children.length;

    const updateTransform = () => {
        testimonialCards.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
    };

    chevronLeft.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalCards - 1; // Go to the last card
        }
        updateTransform();
    });

    chevronRight.addEventListener('click', () => {
        const visibleCardsCount = Math.floor(testimonialCards.parentElement.offsetWidth / cardWidth);
        const maxIndex = totalCards - visibleCardsCount;

        if (currentIndex < maxIndex) {
            currentIndex++;
        } else {
            currentIndex = 0; // Go back to the first card
        }
        updateTransform();
    });
});





