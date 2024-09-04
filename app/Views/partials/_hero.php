<style>
.hero {
    background-attachment: fixed; /* Adds a parallax effect to the background */
    background-size: cover;
}
.cta-button {
    position: relative;
    display: inline-block;
    padding: 15px 30px;
    font-size: 1rem;
    color: #ffffff;
    background-color: var(--button-color);
    text-decoration: none;
    border-radius: 5px;
    overflow: hidden;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Adds depth */
}
.cta-button:hover {
    background-color: darken(var(--button-color), 20%);
    transform: translateY(-3px); /* Creates a "lift" effect */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5); /* Increases the shadow on hover */
}

@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.2rem;
    }
    .cta-button {
        padding: 12px 24px;
       
    }

    .hero-content .cta-button{
        width: auto;
        margin: 0 auto;
        margin-left: 140px;
    }
}
.hero-content {
    backdrop-filter: blur(1px); /* Adds a glassy, frosted effect */
    background: rgba(255, 255, 255, 0.1); /* Light transparency to enhance readability */
    padding: 20px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2); /* Optional border to define edges */
}
#particles-js {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 1; /* Behind the overlay and content */
    pointer-events: none; /* Ensures particles don't interfere with user interactions */
}


</style>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

<section class="hero">
<div id="particles-js"></div>
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
<script>
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
</script>



