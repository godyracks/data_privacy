<div class="scroll-to-top" id="scrollToTopBtn">
        <span class="material-symbols-outlined">keyboard_double_arrow_up</span>
    </div>
    <script>
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

window.addEventListener('scroll', () => {
    // Show button when scrolled down 200px
    if (window.scrollY > 200) {
        scrollToTopBtn.classList.add('visible');
    } else {
        scrollToTopBtn.classList.remove('visible');
    }
});

scrollToTopBtn.addEventListener('click', () => {
    let scrollInterval = setInterval(() => {
        if (window.scrollY > 0) {
            window.scrollBy(0, -50); // Scroll up by 50px
        } else {
            clearInterval(scrollInterval);
        }
    }, 16); // Approximately 60fps
});

document.addEventListener('touchstart', () => {
    // Stop scrolling when user interacts with the screen
    clearInterval(scrollInterval);
});

    </script>