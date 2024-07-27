<h1>Error</h1>
    <p><?= isset($error) ? esc($error) : 'An unknown error occurred.' ?></p>
    <a href="<?= site_url('/') ?>">Go back to homepage</a>