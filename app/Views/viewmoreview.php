<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<div class="view-more-container">
    <div class="left-part">
        <div class="image-container">
            <img src="<?= base_url($content['Image'] ?? '') ?>" alt="<?= esc($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '') ?> Image">
        </div>
        <div class="date-container">
            <p class="date"><?= esc($content['Date']) ?></p>
        </div>
        <div class="title-container">
            <h1><?= esc($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '') ?></h1>
        </div>
        <div class="social-icons">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
        </div>
        <div class="content-container">
            <!-- Directly output HTML content -->
            <?= $content['Description'] ?? $content['Summary'] ?? $content['KeyProvisions'] ?? '' ?>
        </div>
    </div>
    <div class="right-part">
    <h2>Similar Posts</h2>
    <div class="similar-posts">
        <?php if (!empty($similarPosts)): ?>
            <?php foreach ($similarPosts as $post): ?>
                <div class="similar-post">
                    <h3><?= esc($post['Title'] ?? $post['DocumentName'] ?? $post['LawName'] ?? $post['CaseStudyTitle'] ?? '') ?></h3>
                    <p><?= htmlspecialchars_decode(truncate_words($post['Summary'] ?? $post['Description'] ?? $post['KeyProvisions'] ?? $post['CaseStudySummary'] ?? '', 15)); ?></p>
                    <a href="<?= site_url('view-more/' . $type . '/' . $post[$type === 'case-study' ? 'CaseStudyID' : ($type === 'document' ? 'DocumentID' : ($type === 'law' ? 'LawID' : 'ResourceID'))] . '/' . url_title($post['Title'] ?? $post['DocumentName'] ?? $post['LawName'] ?? $post['CaseStudyTitle'], '-', true)) ?>">Read More</a>
                </div>
                <hr class="divider">
            <?php endforeach; ?>
        <?php else: ?>
            <p>No similar posts found.</p>
        <?php endif; ?>
    </div>
</div>


</div>

<style>
.view-more-container {
    display: flex;
    gap: 20px;
}

.left-part {
    flex: 2;
}

.right-part {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.image-container img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.date-container {
    margin-top: 10px;
}

.title-container {
    margin-top: 10px;
}

.social-icons {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.social-icon {
    text-decoration: none;
    font-size: 24px;
}

.content-container {
    margin-top: 20px;
}

.similar-posts {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.similar-post {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.divider {
    border: 1px solid #ccc;
}

/* Media queries for responsiveness */
@media screen and (max-width: 769px) {
    .view-more-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .left-part,
    .right-part {
        flex: none;
        width: 100%;
    }
}
</style>

<?= $this->endSection() ?>
