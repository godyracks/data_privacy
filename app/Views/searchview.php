<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<?= $this->include('partials/_search-input') ?>


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
                        <h3><?= truncate_words(esc($caseStudy['Title']), 9 );?></h3>
                        <p><?= truncate_words(esc($caseStudy['Summary']), 20); ?></p>
                        <div class="card-footer">
                        <a href="<?= site_url('view-more/case-study/' . $caseStudy['CaseStudyID'] . '/' . url_title($caseStudy['Title'], '-', true)) ?>">View More</a>
                            <span class="material-symbols-outlined">favorite</span>
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
                        <h3><?= truncate_words(esc($document['DocumentName']), 12) ?></h3>
                        <p><?= truncate_words(esc($document['Description']), 20) ?></p>
                        <div class="doc-footer">
                            <div class="doc-info">
                                <p class="date">Date: <?= esc($document['Date']) ?></p>
                                <p>Tags: <?= esc($document['Type']) ?></p>
                            </div>
                            <a href="<?= site_url('view-more/document/' . $document['DocumentID'] . '/' . url_title($document['DocumentName'], '-', true)) ?>">View More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.filter-btn.active').click();
});

document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const filter = button.getAttribute('data-filter');

        if (filter === 'all') {
            document.querySelectorAll('.category').forEach(category => {
                category.classList.add('active');
            });
        } else {
            document.querySelectorAll('.category').forEach(category => {
                if (category.classList.contains(filter + '-category')) {
                    category.classList.add('active');
                } else {
                    category.classList.remove('active');
                }
            });
        }
    });
});

document.querySelectorAll('.page-number').forEach(page => {
    page.addEventListener('click', () => {
        document.querySelectorAll('.page-number').forEach(pg => pg.classList.remove('active'));
        page.classList.add('active');
    });
});
</script>

<?= $this->endSection() ?>
