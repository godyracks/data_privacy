<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Biometric Data Laws</title>
    <link rel="stylesheet" href="<?= base_url('public/styles/styles.css') ?>">
</head>
<body>
    <header class="navbar">
        <div class="navbar-container">
            <!-- Logo as PNG Image -->
            <div class="logo">
                <img src="<?= base_url('public/images/biometric-logo2.png') ?>" alt="MyLogo">
            </div>
            <nav class="nav-links">
                <a href="<?= base_url('/') ?>" class="nav-link <?= uri_string() == '' ? 'active' : '' ?>">Home</a>
                <a href="<?= base_url('features') ?>" class="nav-link <?= uri_string() == 'features' ? 'active' : '' ?>">Features</a>
                <a href="<?= base_url('map') ?>" class="nav-link <?= uri_string() == 'map' ? 'active' : '' ?>">Map</a>
                <a href="<?= base_url('timeline') ?>" class="nav-link <?= uri_string() == 'timeline' ? 'active' : '' ?>">Timeline</a>
                <a href="<?= base_url('search') ?>" class="nav-link <?= uri_string() == 'search' ? 'active' : '' ?>">Search</a>
                <a href="<?= base_url('resources') ?>" class="nav-link <?= uri_string() == 'resources' ? 'active' : '' ?>">Resources</a>
                <a href="<?= base_url('about') ?>" class="nav-link <?= uri_string() == 'about' ? 'active' : '' ?>">About</a>
                <a href="<?= base_url('contact') ?>" class="nav-link <?= uri_string() == 'contact' ? 'active' : '' ?>">Contact</a>
                <a href="<?= base_url('login') ?>" class="nav-link <?= uri_string() == 'login' ? 'active' : '' ?>">Login</a>
                <!-- Toggle Modal Button -->
                <span class="nav-link-toggle" id="modalToggle">
                <span class="material-symbols-outlined">
menu
</span>
</span>

            </nav>
        </div>
        <!-- Modal Structure -->
        <div class="modal" id="modal">
            <div class="modal-header">
                <span>Menu</span>
                <span class="modal-close" id="modalClose">
                    <span class="material-icons">close</span>
                </span>
            </div>
            <div class="modal-links">
                <a href="<?= base_url('/') ?>">Home</a>
                <a href="<?= base_url('features') ?>">Features</a>
                <a href="<?= base_url('map') ?>">Map</a>
                <a href="<?= base_url('timeline') ?>">Timeline</a>
                <a href="<?= base_url('search') ?>">Search</a>
                <a href="<?= base_url('resources') ?>">Resources</a>
                <a href="<?= base_url('about') ?>">About</a>
                <a href="<?= base_url('contact') ?>">Contact</a>
                <a href="<?= base_url('login') ?>">Login</a>
            </div>
        </div>
    </header>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3>WEB PORTAL</h3>
            <p>The combination of interactive maps, timelines, and searchable databases ensures that you can learn and explore in a way that suits your preferences and needs.</p>
        </div>
        <div class="footer-column">
            <h3>Home</h3>
            <ul>
                <li><a href="#">Features</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Search</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Categories</h3>
            <ul>
                <li><a href="#">Maps</a></li>
                <li><a href="#">Timelines</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Ts & Co.</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Let's Connect</h3>
            <ul>
                <li><span class="material-symbols-outlined">
call
</span> +1-8124853066</li>
                <li><span class="material-symbols-outlined">
mail
</span> Monishavajji@gmail.com</li>
                <li><span class="material-symbols-outlined">
location_on
</span> Name of Street, IN</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Biometric Data Privacy. All rights reserved.</p>
    </div>
</footer>


    <script src="<?= base_url('public/scripts/scripts.js') ?>"></script>
</body>
</html>
