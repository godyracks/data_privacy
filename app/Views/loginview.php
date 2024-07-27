<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    /* Container styles */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    background-color: transparent;
    padding: 50px;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
    /* border-radius: 10px; */
    margin-bottom: 150px;
    margin-top: 100px;
    /* width: 80%; */
    /* margin: 0 auto;; */
}

/* Button styles */
.google-signin-btn {
    display: flex;
    align-items: center;
    text-decoration: none;
    background-color: rgba(255, 172, 12, 0.7) ;
    color: white;
    padding: 20px 40px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s, box-shadow 0.3s;
}

.google-signin-btn:hover {
    background-color: #357ae8;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.google-signin-btn img {
    height: 20px;
    width: 20px;
    margin-right: 10px;
}
</style>

<div class="login-container">
    <a href="<?= base_url('/google-login') ?>" class="google-signin-btn">
        <img src="<?= base_url('/public/images/icons/google_ic.png') ?>" alt="Google Icon">
        Continue with Google
    </a>
</div>

<?= $this->endSection() ?>
