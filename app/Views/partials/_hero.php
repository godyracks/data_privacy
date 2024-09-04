<style>
/* Slider Container */
.hero {
    position: relative;
    height: 70vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
}

.hero-slides {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    transition: transform 1s ease-in-out; /* Smooth transition */
}

.slide {
    min-width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    transform: scale(1.1); /* Start zoomed out */
    transition: transform 5s ease-in-out; /* Zoom effect timing */
}

.slide.active {
    transform: scale(1); /* Zoom to original size */
}

/* Hero Overlay */
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--blue-overlay);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: start;
    z-index: 2; /* Above slides */
}

.hero-content {
    position: relative;
    z-index: 3; 
    max-width: 800px;
}

.hero h1 {
    font-size: 2.8rem;
    font-weight: 800;
    margin-bottom: 20px;
    line-height: 1.2;
    color: #FFFFFF; 
}

.hero p {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 30px;
    color: #FFFFFF;
}

.cta-button {
    display: inline-block;
    padding: 15px 30px;
    font-size: 1rem;
    color: #ffffff;
    background-color: var(--button-color);
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cta-button:hover {
    background-color: darken(orange, 50%);
}


</style>
<section class="hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Explore Biometric Data Privacy Laws: <br>UK vs. India</h1>
            <p>An interactive platform to understand and compare biometric data privacy laws.</p>
            <a href="<?= base_url('search') ?>" class="cta-button">Get Started</a>
        </div>
    </div>
    <!-- Slide images -->
    <div class="hero-slides">
        <div class="slide active" style="background-image: url('<?= base_url('public/images/hero1.jpg') ?>');"></div>
        <div class="slide" style="background-image: url('<?= base_url('public/images/hero2.jpg') ?>');"></div>
        <div class="slide" style="background-image: url('<?= base_url('public/images/hero3.jpg') ?>');"></div>
    </div>
</section>
<script>
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
</script>


