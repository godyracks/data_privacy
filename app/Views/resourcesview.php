<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    .header {
    text-align: center;
    padding: 50px 20px;
    background-color: transparent;
    color: #fff;
}

.header h1 {
    margin: 0;
    font-size: 2.5rem;
}

.header p {
    margin-top: 10px;
    font-size: 1.2rem;
    color: #ccc;
}

.resources-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    gap: 20px;
}

.resource-item {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 300px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.resource-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.resource-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.resource-details {
    padding: 20px;
}

.resource-details h3 {
    margin-top: 0;
    font-size: 1.5rem;
}

.resource-description {
    margin: 15px 0;
    font-size: 1rem;
    color: #666;
}

.resource-link {
    display: inline-block;
    padding: 10px 20px;
    background-color:  #468EEE;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.resource-link:hover {
    background-color: #357AE8;
}


@media screen and (max-width: 769px) {
    .resources-section {
        flex-direction: column;
        align-items: center;
    }

    .resource-item {
        width: 90%;
    }
}
</style>
<section class="header">
        <h1>Resources</h1>
        <p>Your go-to hub for biometric data privacy resources in the UK and India.</p>
    </section>
    <section class="resources-section">
        <div class="resource-item">
            <img src="img/resource1.jpg" alt="Resource 1" class="resource-img">
            <div class="resource-details">
                <h3>Resource Title 1</h3>
                <p class="resource-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                <a href="#" class="resource-link">Visit Link</a>
            </div>
        </div>
        <div class="resource-item">
            <img src="img/resource2.jpg" alt="Resource 2" class="resource-img">
            <div class="resource-details">
                <h3>Resource Title 2</h3>
                <p class="resource-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                <a href="#" class="resource-link">Visit Link</a>
            </div>
        </div>
        <!-- More resource items can be added here -->
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const resourceItems = document.querySelectorAll('.resource-item');

    resourceItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.classList.add('hover');
        });

        item.addEventListener('mouseleave', () => {
            item.classList.remove('hover');
        });
    });
});

    </script>

<?= $this->endSection() ?>