<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="view-more-container">
    <div class="left-part">
        <div class="image-container">
            <img src="<?= base_url($content['Image'] ?? '') ?>" alt="<?= esc($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '') ?> Image">
        </div>
        <div class="date-container">
            <p class="date"><?= esc($content['Date']) ?> <span>By Sivasakthi Vajjiravelu</span></p> 
        </div>
        <div class="title-container">
            <h1><?= esc($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '') ?></h1>
        </div>
        <p>Social Links</p>
        <div class="social-icons">
            <a target="_blank" href="https://www.linkedin.com/in/sivasakthi-vajjiravelu-571792195?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            <a  target="_blank"  href="https://wa.me/447436199290?text=Hello%2C%20I%20have%20a%20question%21" class="social-icon" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

        </div>
        <div class="content-container">
            <!-- Directly output HTML content -->
            <?= $content['Description'] ?? $content['Summary'] ?? $content['KeyProvisions'] ?? '' ?>
        </div>
        
        <div class="reviews-container">
    <h2>Reviews</h2>
    <div class="submit-review">
        <h2>Submit Your Review</h2>
        <form action="<?= site_url('submit-review') ?>" method="post">
            <input type="hidden" name="post_id" value="<?= esc($contentID) ?>">
            <input type="hidden" name="post_type" value="<?= esc($type) ?>">
            <label for="review_text">Review:</label>
            <textarea name="content" required></textarea>

            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>

            <button type="submit">Submit Review</button>
        </form>
        <?php if (!session()->get('isLoggedIn')): ?>
            <p>Please <a href="<?= site_url('/google-login') ?>">continue with Google</a> to submit a review.</p>
        <?php endif; ?>
    </div>

    <?php if (isset($reviews) && count($reviews) > 0): ?>
        <?php foreach ($reviews as $review): ?>
            <div class="review">
                <p><strong><?= esc($review['user_id']) ?></strong> (Rating: <?= esc($review['rating']) ?>)</p>
                <p><?= esc($review['content']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews yet.</p>
    <?php endif; ?>
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
    margin-top: 20px;
}

.left-part {
    flex: 7; /* 70% width */
    max-width: 70%;
    padding: 20px;
}

.right-part {
    flex: 3; /* 30% width */
    max-width: 30%;
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 20px;
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
    margin-left: 40px;
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

.reviews-container {
    margin-top: 40px;
}

.reviews-list {
    margin-bottom: 20px;
}

.review {
    margin-bottom: 20px;
}

.review-author {
    font-weight: bold;
}

.review-date {
    font-size: 14px;
    font-style: italic;
    margin-left: 10px;
}

.review-content {
    margin-top: 10px;
}

.review-form {
    margin-top: 20px;
}

.review-form .form-group {
    margin-bottom: 10px;
}

.review-form label {
    display: block;
    margin-bottom: 5px;
}

.review-form input,
.review-form textarea {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ddd;
}

.review-form button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #468EEE;
    color: #fff;
    cursor: pointer;
}

.review-form button:hover {
    background-color: #357AE8;
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
        flex-direction: column;
        gap: 20px;
    }

    .left-part,
    .right-part {
        flex: none;
        width: 100%;
        max-width: 100%;
    }
}
</style>

<?= $this->endSection() ?>
