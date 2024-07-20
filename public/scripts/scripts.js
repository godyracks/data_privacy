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

document.addEventListener('DOMContentLoaded', function() {
    const chevronLeft = document.querySelector('.chevron-left');
    const chevronRight = document.querySelector('.chevron-right');
    const testimonialCards = document.querySelector('.testimonial-cards');

    chevronLeft.addEventListener('click', function() {
        testimonialCards.scrollBy({
            left: -527, // Width of one card plus margin
            behavior: 'smooth'
        });
    });

    chevronRight.addEventListener('click', function() {
        testimonialCards.scrollBy({
            left: 527, // Width of one card plus margin
            behavior: 'smooth'
        });
    });
});
