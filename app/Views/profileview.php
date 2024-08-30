<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    /* Add this CSS to the existing styles.css */

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .tab-link.active {
        font-weight: bold;
        text-decoration: none; /* Remove underline from active tab */
    }

    .profile-container {
        max-width: 800px;
        margin: 0 auto;
        background: transparent;
        padding: 20px;
        transition: transform 0.3s ease;
    }

    .profile-container:hover {
        transform: translateY(-2px);
    }

    .profile-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .profile-nav {
        margin: 20px 0;
    }

    .profile-nav a {
        margin-right: 15px;
        text-decoration: none; /* Remove underline from links */
        color: #007BFF;
        transition: color 0.3s;
    }

    .profile-nav a:hover {
        color: #0056b3;
    }

    .profile-main {
        margin-top: 20px;
    }

    .favorites-section {
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }

    .favorite-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        border-radius: 5px;
        background-color: #f9f9f9;
        margin-bottom: 10px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .favorite-item:hover {
        background-color: #e9ecef;
        transform: scale(1.02);
    }

    .icon-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #007BFF;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .favorite-info {
        flex: 1;
        margin-left: 10px;
    }

    .favorite-title {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
    }

    .favorite-time {
        margin: 0;
        color: #777;
    }

    .delete-btn {
        background: none;
        border: none;
        color: #FF5733;
        cursor: pointer;
        font-size: 14px;
        transition: color 0.3s;
    }

    .delete-btn:hover {
        color: #d63031;
    }

    .logout-confirmation {
        display: none;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 20px;
        border-radius: 10px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        text-align: center;
    }

    .logout-confirmation button {
        margin-top: 10px;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
</style>

<div class="profile-container">

    <header class="profile-header">
        <h1>User Profile</h1>
        <img src="<?= session()->get('profile_image') ?>" alt="Profile Image" class="profile-image">
    </header>
    <nav class="profile-nav">
        <a href="#favorites" class="tab-link active">Favorites</a>
        <a href="#feedback" class="tab-link">Drop Feedback</a>
        <a href="#logout" class="tab-link" id="logoutLink">Logout</a>
    </nav>
    <main class="profile-main">
        <section id="favorites" class="tab-content active">
            <h2>Your Favorites</h2>
            <?php if (empty($favorites)): ?>
                <p>You have no favorites yet.</p>
            <?php else: ?>
                <?php foreach ($favorites as $favorite): ?>
                    <div class="favorite-item">
                        <a href="<?= site_url('view-more/'.$favorite['post_type'] . '/' . $favorite['post_id'] . '/' . url_title($favorite['details']['Title'], '-', true)) ?>" class="favorite-link">
                            <img src="<?= base_url($favorite['details']['Image']) ?>" class="favorite-image" style="width: 50px; height: auto; border-radius: 5px;">
                            <div class="favorite-info">
                                <h3 class="favorite-title"><?= esc($favorite['details']['Title']) ?></h3>
                                <p class="favorite-time"><?= esc($favorite['details']['Date']) ?></p>
                            </div>
                        </a>
                        <a href="<?= base_url('/profile/deleteFavorite/' . esc($favorite['post_id']) . '/' . esc($favorite['post_type'])) ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this article? This action is permanent.');">
                            <span class="material-symbols-outlined">delete_forever</span>
                            Delete
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

        <section id="feedback" class="tab-content">
            <h2>Drop Feedback</h2>
            <p><a href="<?= site_url('testimonials') ?>">Click here</a> to leave feedback about our service.</p>
        </section>
    </main>
</div>

<div class="overlay" id="overlay"></div>
<div class="logout-confirmation" id="logoutConfirmation">
    <p>Log out? Please confirm!</p>
    <button id="confirmLogout">Yes, log me out</button>
    <button id="cancelLogout">No, I want to stay</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');
        const logoutLink = document.getElementById('logoutLink');
        const logoutConfirmation = document.getElementById('logoutConfirmation');
        const overlay = document.getElementById('overlay');
        const confirmLogout = document.getElementById('confirmLogout');
        const cancelLogout = document.getElementById('cancelLogout');

        // Handle delete button clicks
        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default link behavior
                const deleteConfirmation = confirm("Are you sure you want to delete this article? This action is permanent.");

                if (deleteConfirmation) {
                    // Proceed with the deletion
                    window.location.href = button.getAttribute('href'); // Redirect to the delete route
                }
            });
        });

        // Handle tab switching
        tabLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);

                // Remove active class from all links and contents
                tabLinks.forEach(link => link.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to the clicked link and corresponding content
                link.classList.add('active');
                document.getElementById(targetId).classList.add('active');
            });
        });

        // Handle logout confirmation
        logoutLink.addEventListener('click', (e) => {
            e.preventDefault();
            overlay.style.display = 'block';
            logoutConfirmation.style.display = 'block';
        });

        confirmLogout.addEventListener('click', () => {
            // Perform the logout action, e.g., redirect to the logout route
            window.location.href = '/logout';
        });

        cancelLogout.addEventListener('click', () => {
            overlay.style.display = 'none';
            logoutConfirmation.style.display = 'none';
        });
    });
</script>

<?= $this->endSection() ?>
