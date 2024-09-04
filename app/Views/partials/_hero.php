<style>

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
    box-shadow: 4px 8px 20px rgba(255, 165, 0, 0.8); /* Increases the shadow on hover */
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



</style>


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
        <div class="slide active" style="background-image: url('<?= base_url('public/images/hero1.jpg') ?>'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed;"></div>
        <div class="slide" style="background-image: url('<?= base_url('public/images/hero2.jpg') ?>'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed;"></div>
        <div class="slide" style="background-image: url('<?= base_url('public/images/hero3.jpg') ?>'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed;"></div>
    </div>
</section>




