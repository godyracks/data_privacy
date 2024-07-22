<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<?= $this->include('partials/_search-input') ?>
<?= $this->include('partials/_info-panel') ?>
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
                <!-- Card 1 -->
                <div class="card case-study">
                    <img src="https://via.placeholder.com/300x200" alt="Case Study Image">
                    <div class="card-content">
                        <h3>Case Study 1</h3>
                        <p> Discover essential guidelines for   
                        safeguarding biometric information  
                        under UK and Indian laws. Learn more
                        about legal requirements and best   practices...</p>
                        <div class="card-footer">
                            <a href="#">View More</a>
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="card case-study">
                    <img src="https://via.placeholder.com/300x200" alt="Case Study Image">
                    <div class="card-content">
                        <h3>Case Study 2</h3>
                        <p> Discover essential guidelines for   
                        safeguarding biometric information  
                        under UK and Indian laws. Learn more
                        about legal requirements and best   practices...</p>
                        <div class="card-footer">
                            <a href="#">View More</a>
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="card case-study">
                    <img src="https://via.placeholder.com/300x200" alt="Case Study Image">
                    <div class="card-content">
                        <h3>Case Study 3</h3>
                        <p> Discover essential guidelines for   
                        safeguarding biometric information  
                        under UK and Indian laws. Learn more
                        about legal requirements and best   practices...</p>
                        <div class="card-footer">
                            <a href="#">View More</a>
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="card case-study">
                    <img src="https://via.placeholder.com/300x200" alt="Case Study Image">
                    <div class="card-content">
                        <h3>Case Study 4</h3>
                        <p> Discover essential guidelines for   
                        safeguarding biometric information  
                        under UK and Indian laws. Learn more
                        about legal requirements and best   practices...</p>
                        <div class="card-footer">
                            <a href="#">View More</a>
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                    </div>
                </div>
                <div class="card case-study">
                    <img src="https://via.placeholder.com/300x200" alt="Case Study Image">
                    <div class="card-content">
                        <h3>Case Study 5</h3>
                        <p> Discover essential guidelines for   
                        safeguarding biometric information  
                        under UK and Indian laws. Learn more
                        about legal requirements and best   practices......</p>
                        <div class="card-footer">
                            <a href="#">View More</a>
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                    </div>
                </div>
                <div class="card case-study">
                    <img src="https://via.placeholder.com/300x200" alt="Case Study Image">
                    <div class="card-content">
                        <h3>Case Study 6</h3>
                        <p> Discover essential guidelines for   
                        safeguarding biometric information  
                        under UK and Indian laws. Learn more
                        about legal requirements and best   practices...</p>
                        <div class="card-footer">
                            <a href="#">View More</a>
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                    </div>
                </div>
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
                <!-- Document Card -->
                <div class="document-card document">
                    <div class="doc-content">
                        <h3>Biometric Data Privacy Laws: UK vs. India</h3>
                        <p>An overview of how biometric data privacy laws compare between the UK and India. This document </p>
                        <div class="doc-footer">
                            <div class="doc-info">
                                <p class="date">Date: July 2024</p>
                                <p>Tags: Privacy, Laws, UK, India</p>
                            </div>
                            <a href="#">View More</a>
                        </div>
                    </div>
                </div>
                <!-- Add more document cards as needed -->
            </div>
        </div>
    </div>
    <script>
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
        // Pagination logic can be added here
    });
});
</script>

<?= $this->endSection() ?>