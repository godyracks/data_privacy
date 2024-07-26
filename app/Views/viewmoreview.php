<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="view-more-container">
    <div class="left-part">
        <div class="image-container">
            <img src="<?= base_url($content['Image'] ?? '') ?>" alt="<?= esc($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '') ?> Image">
        </div>
        <div class="date-container">
            <p class="date"><?= esc($content['Date']) ?> <span>By Monisha</span></p> 
        </div>
        <div class="title-container">
            <h1><?= esc($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '') ?></h1>
        </div>
        <p>Social Links</p>
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
    margin: 20px;
    padding: 0 20px; /* Padding for better spacing */
}

.left-part {
    flex: 7; /* 70% width */
    max-width: 70%;
    padding: 20px; /* Padding around content */
}

.right-part {
    flex: 3; /* 30% width */
    max-width: 30%;
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 20px; /* Padding around content */
}

.image-container img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.date-container {
    margin-top: 10px;
    font-weight: bold;
}
.date-container span {
    margin-left: 10px; /* Adjust spacing for smaller screens */
    font-style: italic;
    font-size: 14px;
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
        margin: 10px; /* Adjust margin for smaller screens */
    }

    .left-part,
    .right-part {
        flex: none;
        width: 100%;
        max-width: 100%;
        padding: 10px; /* Adjust padding for smaller screens */
    }
}
</style>

<?= $this->endSection() ?>
