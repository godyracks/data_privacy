<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    .features-section {
    padding: 60px 20px;
    background-color: transparent;
    text-align: center;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.section-title {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #333;
    animation: fadeInDown 1s;
}

.section-subtitle {
    font-size: 1.2rem;
    margin-bottom: 40px;
    color: #666;
    animation: fadeInDown 1.5s;
}

.features-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.feature-item {
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    max-width: 250px;
    text-align: left;
    animation: fadeInUp 2s;
}

.feature-item:hover {
    transform: translateY(-10px);
}

.feature-img {
    width: 100%;
    height: auto;
    display: block;
}

.feature-title {
    font-size: 1.5rem;
    margin: 20px;
    color: #333;
}

.feature-description {
    font-size: 1rem;
    margin: 0 20px 20px;
    color: #666;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<section class="features-section">
        <div class="container">
            <h2 class="section-title">Features</h2>
            <p class="section-subtitle">Discover the capabilities of our web portal for biometric data privacy laws</p>
            <div class="features-grid">
                <div class="feature-item">
                    <img src="<?= base_url('public/images/search.jpg') ?>" alt="Search Laws" class="feature-img">
                    <h3 class="feature-title">Search Laws</h3>
                    <p class="feature-description">Easily search and find laws related to biometric data privacy in the UK and India.</p>
                </div>
                <div class="feature-item">
                    <img src="<?= base_url('public/images/docs.jpg') ?>" alt="Access Documents" class="feature-img">
                    <h3 class="feature-title">Access Documents</h3>
                    <p class="feature-description">Access a vast repository of documents pertinent to biometric data privacy laws.</p>
                </div>
                <div class="feature-item">
                    <img src="<?= base_url('public/images/hub.jpg') ?>" alt="Resource Hub" class="feature-img">
                    <h3 class="feature-title">Resource Hub</h3>
                    <p class="feature-description">Find valuable resources and information related to biometric data privacy.</p>
                </div>
                <div class="feature-item">
                    <img src="<?= base_url('public/images/expansion.jpg') ?>" alt="Future Expansion" class="feature-img">
                    <h3 class="feature-title">Future Expansion</h3>
                    <p class="feature-description">Plans to include laws from other countries in the near future.</p>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const featureItems = document.querySelectorAll('.feature-item');

    featureItems.forEach(item => {
        item.addEventListener('mouseover', () => {
            item.style.transform = 'translateY(-10px)';
        });

        item.addEventListener('mouseout', () => {
            item.style.transform = 'translateY(0)';
        });
    });
});

    </script>
<?= $this->endSection() ?>