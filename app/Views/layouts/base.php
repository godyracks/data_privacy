<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Biometric Data Laws</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://unpkg.com/vis-timeline/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/vis-timeline/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('public/styles/styles.css') ?>">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <style>
        #container {
            width: 800px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 300px;
        }
        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
           
        }
        .user-img{
            top: 0;
        }
    </style> 
</head>
<body>
    <header class="navbar">
        <div class="navbar-container">
            <!-- Logo as PNG Image -->
            <div class="logo">
                <img src="<?= base_url('public/images/biometric-logo2.png') ?>" alt="MyLogo">
            </div>
            <!-- Menu Icon -->
            <span class="material-symbols-outlined menu-icon" id="menuToggle">menu</span>
            <!-- Navigation Links -->
            <nav class="nav-links">
                <a href="<?= base_url('/') ?>" class="nav-link <?= uri_string() == '' ? 'active' : '' ?>">Home</a>
                <a href="<?= base_url('features') ?>" class="nav-link <?= uri_string() == 'features' ? 'active' : '' ?>">Features</a>
                <a href="<?= base_url('map') ?>" class="nav-link <?= uri_string() == 'map' ? 'active' : '' ?>">Map</a>
                <a href="<?= base_url('timeline') ?>" class="nav-link <?= uri_string() == 'timeline' ? 'active' : '' ?>">Timeline</a>
                <a href="<?= base_url('search') ?>" class="nav-link <?= uri_string() == 'search' ? 'active' : '' ?>">Search</a>
                <a href="<?= base_url('resources') ?>" class="nav-link <?= uri_string() == 'resources' ? 'active' : '' ?>">Resources</a>
                <a href="<?= base_url('about') ?>" class="nav-link <?= uri_string() == 'about' ? 'active' : '' ?>">About</a>
                <a href="<?= base_url('contact') ?>" class="nav-link <?= uri_string() == 'contact' ? 'active' : '' ?>">Contact</a>
                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url('google-login') ?>" class=""><img src="<?= session()->get('profile_image') ?>" alt="User Image" class="profile-image"></a>
                    <a href="<?= base_url('logout') ?>" class="nav-link">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('auth') ?>" class="nav-link <?= uri_string() == 'auth' ? 'active' : '' ?>">Login</a>
                <?php endif; ?>
            </nav>
            <!-- Modal Navigation for small screens -->
            <div class="modal-nav" id="modalNav">
                <span class="material-symbols-outlined modal-close" id="menuClose">close</span>
                <a href="<?= base_url('/') ?>" class="nav-link <?= uri_string() == '' ? 'active' : '' ?>">Home</a>
                <a href="<?= base_url('features') ?>" class="nav-link <?= uri_string() == 'features' ? 'active' : '' ?>">Features</a>
                <a href="<?= base_url('map') ?>" class="nav-link <?= uri_string() == 'map' ? 'active' : '' ?>">Map</a>
                <a href="<?= base_url('timeline') ?>" class="nav-link <?= uri_string() == 'timeline' ? 'active' : '' ?>">Timeline</a>
                <a href="<?= base_url('search') ?>" class="nav-link <?= uri_string() == 'search' ? 'active' : '' ?>">Search</a>
                <a href="<?= base_url('resources') ?>" class="nav-link <?= uri_string() == 'resources' ? 'active' : '' ?>">Resources</a>
                <a href="<?= base_url('about') ?>" class="nav-link <?= uri_string() == 'about' ? 'active' : '' ?>">About</a>
                <a href="<?= base_url('contact') ?>" class="nav-link <?= uri_string() == 'contact' ? 'active' : '' ?>">Contact</a>
                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url('google-login') ?>" class="user-img"><img src="<?= session()->get('profile_image') ?>" alt="User Image" class="profile-image"></a>
                    <a href="<?= base_url('logout') ?>" class="nav-link">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('auth') ?>" class="nav-link <?= uri_string() == 'auth' ? 'active' : '' ?>">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main>
        <?= $this->renderSection('content') ?>
        <?= $this->include('partials/_scroll-top') ?>
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
                <li><a href="<?= base_url('features') ?>">Features</a></li>
                <li><a href="<?= base_url('about') ?>">About Us</a></li>
                <li><a href="<?= base_url('search') ?>">Search</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Categories</h3>
            <ul>
                <li><a href="<?= base_url('map') ?>">Maps</a></li>
                <li><a href="<?= base_url('timeline') ?>">Timelines</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
            <?php if (session()->get('isLoggedIn')): ?>
                    <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?= base_url('auth') ?>">Login</a></li>
                <?php endif; ?>
                <li><a href="<?= base_url('terms-and-conditions') ?>">Ts & Co.</a></li>
                <li><a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Let's Connect</h3>
            <ul>
                <li><span class="material-symbols-outlined footer-icon">
call
</span> +447436199290</li>
                <li><span class="material-symbols-outlined footer-icon">
mail
</span>sivasakthivajjiravelu@gmail.com</li>
                <li><span class="material-symbols-outlined footer-icon">
location_on
</span> Name of Street, IN</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Biometric Data Privacy. All rights reserved.</p>
    </div>
</footer>

 <script>
 document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menuToggle');
    const menuClose = document.getElementById('menuClose');
    const modalNav = document.getElementById('modalNav');

    menuToggle.addEventListener('click', () => {
        modalNav.classList.add('open');
    });

    menuClose.addEventListener('click', () => {
        modalNav.classList.remove('open');
    });

    window.addEventListener('click', (event) => {
        if (event.target !== menuToggle && event.target !== modalNav && !modalNav.contains(event.target)) {
            modalNav.classList.remove('open');
        }
    });
});

</script>



    <script src="<?= base_url('public/scripts/scripts.js') ?>"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="<?= base_url('public/scripts/map.js') ?>"></script>
    <script>
        ClassicEditor.create(document.querySelector('#description'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            ClassicEditor.create(document.querySelector('#doc-description'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            ClassicEditor.create(document.querySelector('#case-description'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            ClassicEditor.create(document.querySelector('#key-provisions'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            ClassicEditor.create(document.querySelector('#edit-summary'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            ClassicEditor.create(document.querySelector('#edit-law'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            ClassicEditor.create(document.querySelector('#edit-provision'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            ClassicEditor.create(document.querySelector('#edit-doc'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('There was an error initializing the editor:', error);
            });
           
    </script>
</body>
</html>