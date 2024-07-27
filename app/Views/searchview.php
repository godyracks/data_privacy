<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<?= $this->include('partials/_search-input') ?>
<!-- <div class="user-info">
    <?php if (session()->get('isLoggedIn')): ?>
        <p>Logged in as User ID: <?= esc(session()->get('google_id')) ?></p>
    <?php endif; ?>
</div> -->

<!-- Display Post IDs and Titles for Debugging -->
<!-- <div class="post-ids">
    <h3>Post IDs</h3>
    <ul>
        <?php foreach ($caseStudies as $caseStudy): ?>
            <li>Case Study ID: <?= esc($caseStudy['CaseStudyID']) ?> - Title: <?= esc($caseStudy['Title']) ?></li>
        <?php endforeach; ?>
        <?php foreach ($documents as $document): ?>
            <li>Document ID: <?= esc($document['DocumentID']) ?> - Title: <?= esc($document['DocumentName']) ?></li>
        <?php endforeach; ?>
    </ul>
</div> -->

<div class="card-items">
    <div class="filter-bar">
        <span class="material-symbols-outlined filter-icon">filter_alt</span>
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="documents">Documents</button>
        <button class="filter-btn" data-filter="case-studies">Case Studies</button>
    </div>

    <div class="category case-studies-category active">
        <h2>Case Studies</h2>
        <div class="case-studies">
            <?php foreach ($caseStudies as $caseStudy): ?>
                <div class="card case-study">
                    <img src="<?= base_url($caseStudy['Image']) ?>" alt="<?= esc($caseStudy['Title']) ?> Image">
                    <div class="card-content">
                        <h3><?= esc(truncate_words($caseStudy['Title'], 9)) ?></h3>
                        <p><?= htmlspecialchars_decode(truncate_words($caseStudy['Summary'], 20)) ?></p>
                        <div class="card-footer">
                            <a href="<?= site_url('view-more/case-study/' . $caseStudy['CaseStudyID'] . '/' . url_title($caseStudy['Title'], '-', true)) ?>">View More</a>
                            <span class="material-symbols-outlined favorite-icon" data-post-id="<?= $caseStudy['CaseStudyID'] ?>" data-post-type="case-study">favorite</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pagination">
            <span class="material-symbols-outlined arrow">west</span>
            <div class="page-number active">1</div>
            <div class="page-number">2</div>
            <div class="page-number">3</div>
            <span class="material-symbols-outlined arrow">east</span>
        </div>
    </div>

    <div class="category documents-category">
        <h2>Documents</h2>
        <div class="documents">
            <?php foreach ($documents as $document): ?>
                <div class="document-card document">
                    <div class="doc-content">
                        <h3><?= esc(truncate_words($document['DocumentName'], 12)) ?></h3>
                        <p><?= htmlspecialchars_decode(truncate_words($document['Description'], 20)) ?></p>
                        <div class="doc-footer">
                            <div class="doc-info">
                                <p class="date">Date: <?= esc($document['Date']) ?></p>
                                <p>Tags: <?= esc($document['Type']) ?></p>
                            </div>
                            <a href="<?= site_url('view-more/document/' . $document['DocumentID'] . '/' . url_title($document['DocumentName'], '-', true)) ?>">View More</a>
                            <span class="material-symbols-outlined favorite-icon" data-post-id="<?= $document['DocumentID'] ?>" data-post-type="document">favorite</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Automatically click the active filter button on page load
    const activeFilterButton = document.querySelector('.filter-btn.active');
    if (activeFilterButton) {
        activeFilterButton.click();
    }
});

// Handle filter button clicks
document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', () => {
        // Update active filter button
        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const filter = button.getAttribute('data-filter');

        // Show/hide categories based on selected filter
        document.querySelectorAll('.category').forEach(category => {
            if (filter === 'all' || category.classList.contains(`${filter}-category`)) {
                category.classList.add('active');
            } else {
                category.classList.remove('active');
            }
        });
    });
});

// Handle page number clicks
document.querySelectorAll('.page-number').forEach(page => {
    page.addEventListener('click', () => {
        // Update active page number
        document.querySelectorAll('.page-number').forEach(pg => pg.classList.remove('active'));
        page.classList.add('active');
    });
});

// Handle favorite icon clicks
document.querySelectorAll('.favorite-icon').forEach(icon => {
    icon.addEventListener('click', () => {
        const postId = icon.getAttribute('data-post-id');
        const postType = icon.getAttribute('data-post-type');
        fetch('<?= site_url('profile/addFavorite') ?>', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    },
    body: JSON.stringify({
        post_id: postId,
        post_type: postType
    })
})
.then(response => {
    if (response.redirected) {
        // Handle the redirect (optional)
        window.location.href = response.url;
    } else {
        return response.json();
    }
})
.then(data => {
    if (data && data.status === 'success') {
        alert('Added to favorites!');
    } else {
        alert('Failed to add to favorites.');
    }
})
.catch(error => {
    console.error('Error adding to favorites:', error);
    alert('An error occurred while adding to favorites.');
});

    });
});
</script>


<?= $this->endSection() ?>
