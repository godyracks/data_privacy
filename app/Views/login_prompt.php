<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<!-- Example debugging output in your view -->
<pre>
<?php print_r(session()->get()); ?>
</pre>

<section class="cta-section">
    <h2>You need to log in to leave a review</h2>
    <a href="<?= site_url('/google-login') ?>" class="cta-button">Continue with Google</a>
</section>

<?= $this->endSection() ?>
