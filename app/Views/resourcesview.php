<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    .resources-container {
        width: 90%;
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        border: 1px solid #ddd;
        line-height: 1.6;
    }
    .resources-container h1 {
        text-align: center;
        color: #444;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }
    .resource-section {
        margin: 30px 0;
    }
    .resource-section h2 {
        font-family: 'Georgia', serif;
        color: #222;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }
    .resource-item {
        display: flex;
        margin-bottom: 20px;
    }
    .resource-item video, .resource-item img {
        width: 200px;
        height: auto;
        border-radius: 8px;
        margin-right: 20px;
    }
    .resource-details {
        flex: 1;
    }
    .resource-details h3 {
        margin-top: 0;
    }
    .resource-details p {
        margin-bottom: 10px;
    }
    .download-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
    }
    .download-button:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .resources-container {
            width: 80%;
            margin: 0 auto;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0.1);
            background-color: transparent;
            margin-top: 10px;
        }
        .resource-item {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .resource-item video, .resource-item img {
            width: 100%;
            margin-right: 0;
            margin-bottom: 10px;
        }
        .resource-details {
            text-align: center;
        }
    }
</style>

<div class="resources-container">
    <h1>Resources</h1>

    <div class="resource-section" id="videos">
        <h2>Videos</h2>
        <?php foreach ($resources as $resource): ?>
            <?php if ($resource['Type'] == 'Video'): ?>
                <div class="resource-item">
                    <?php if (strpos($resource['URL'], 'youtube.com') !== false || strpos($resource['URL'], 'youtu.be') !== false): ?>
                        <iframe width="200" height="150" src="<?= $resource['URL'] ?>" frameborder="0" allowfullscreen></iframe>
                    <?php else: ?>
                        <video controls>
                            <source src="<?= $resource['URL'] ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif; ?>
                    <div class="resource-details">
                        <h3><?= $resource['Title'] ?></h3>
                        <p><?= $resource['Description'] ?? 'No description available.' ?></p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="resource-section" id="whitepapers">
        <h2>External Links</h2>
        <?php foreach ($resources as $resource): ?>
            <?php if ($resource['Type'] == 'Whitepaper'): ?>
                <div class="resource-item">
                    <img src="<?= base_url('' . $resource['Image']) ?>" alt="<?= $resource['Title'] ?>">
                    <div class="resource-details">
                        <h3><?= $resource['Title'] ?></h3>
                        <p><?= $resource['Description'] ?? 'No description available.' ?></p>
                        <a target="_blank" class="download-button" href="<?= $resource['URL'] ?>" download>Visit Link</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
