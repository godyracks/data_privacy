<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
   .star {
    cursor: pointer;
    font-size: 24px;
    color: #ccc; /* Default color */
    transition: color 0.3s ease;
}

.star.selected {
    color: #ffd700; /* Yellow color for selected stars */
}
    .view-more-container {
        display: flex;
        /* gap: 20px; */
        margin-top: 20px;
    }

    .left-part {
        flex: 7; /* 70% width */
        max-width: 70%;
        padding: 20px;
    }
    .left-part .title-container h1{
        font-size: 20px;
    }

    .right-part {
        flex: 3; /* 30% width */
        max-width: 30%;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 20px;
    }

    .right-part h2{
        margin-bottom: 1px;
        font-size: 16px;
        color: #333;
    }

    .image-container {
    width: auto;
    max-width: 90%;
    height: 400px;
    overflow: hidden; /* Ensure content does not overflow the container */
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintains aspect ratio while filling the container */
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
        font-size: 15px;
        line-height: 1.3rem;
    }

  
.reviews-container{
    width: 97%;
    margin: 0 auto;
    margin-top: 40px; 
    padding: 20px; 
    border: 1px solid #ddd; 
    border-radius: 8px; 
    background-color: #f9f9f9;
}
    .reviews-container h2 {
        margin-top: 2px;
        margin-bottom: 20px; /* Spacing below the title */
        font-size: 20px; /* Title size */
        color: #333; /* Dark color for contrast */
    }
    .reviews-container textarea{
            width: 95%; 
            margin: 0 auto;
            height: 180px; 
            padding: 10px; 
            border-radius: 4px; 
            border: 1px solid #ccc; 
            transition: border-color 0.3s ease; font-size: 16px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

    .review {
        margin-bottom: 20px; /* Space between reviews */
        padding: 15px; /* Padding inside each review */
        border: 1px solid #ccc; /* Border around each review */
        border-radius: 4px; /* Rounded corners */
        background-color: #fff; /* White background for the review */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    .review p {
        margin: 5px 0; /* Spacing for paragraphs */
    }

    .review-author {
        font-weight: bold; /* Bold for the author */
        color: #007bff; /* Blue color for the author's name */
    }

    .review-date {
        font-size: 12px; /* Smaller font for the date */
        font-style: italic; /* Italics for the date */
        color: #888; /* Gray color for the date */
    }

    

    .review-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 20px; /* Space above the form */
        padding: 20px; /* Increased padding inside the form */
        border: 1px solid #ddd; /* Light border around the form */
        border-radius: 8px; /* Rounded corners */
        background-color: #f0f0f0; /* Light background for the form */
    }

    .review-form label {
        font-weight: bold; /* Bold labels for better visibility */
        margin-bottom: 15px; /* Space below labels */
    }

    .submit-review  a{
            color: #007bff;
            font-weight: bold;
        }
        .submit-review p, a{
            font-size: 12px;
        }

    /* Change border color on focus for textarea */
    .review-form textarea:focus {
        border-color: #468EEE; /* Change border color on focus */
        outline: none; /* Remove default outline */
    }

    /* Rating input styles */
    .rating-label {
        font-weight: bold; /* Bold for rating label */
        margin-top: 15px; /* Space above rating label */
    }

    .review-form input[type="number"] {
        width: 100%; /* Full width for rating input */
        padding: 10px; /* Increased padding */
        border-radius: 4px; /* Rounded corners */
        border: 1px solid #ccc; /* Light border */
        transition: border-color 0.3s ease; /* Smooth transition */
    }

    /* Change border color on focus for rating input */
    .review-form input[type="number"]:focus {
        border-color: #468EEE; /* Change border color on focus */
        outline: none; /* Remove default outline */
    }

 
    /* Button hover effect */
    .review-form button:hover {
        background-color: #357AE8; /* Darker button on hover */
    }
.submit-review label{
    margin-bottom: 8px;
}
    .similar-posts {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .similar-post {
        display: flex;
        flex-direction: column;
        /* gap: 2px; */
        padding: 10px;
        border-radius: 4px; /* Make it visually appealing */
        background: #f9f9f9; /* Light background for contrast */
      
       
    }
    .similar-post h3{
        font-size: 12px;
        margin-bottom: 1px;
    }
    .similar-post p{
        font-size: 11px;
    }
    .similar-post a{
        color: #007bff;
        font-size: 10px;
    }

    .divider {
        border: 1px solid #ccc;
    }

    /* Media queries for responsiveness */
    @media screen and (max-width: 769px) {
        .view-more-container {
            flex-direction: column;
            /* gap: 20px; */
            gap: 0;
            margin: 0;
            margin-top: 10px;
            margin-left: 0;
            margin-right: 0;
        }

        .left-part,
        .right-part {
            flex: none;
            width: 100%;
            max-width: 80%;
            margin: 0 auto;
            padding: 2px;
        }
        .right-part h2{
            font-size: 14px;
            color: #333;
            margin-top: 40px;
        }
        .right-part .similar-posts .similar-post h3{
            font-size: 13px;
            margin-bottom: 1px;
        }
        .right-part .similar-posts .similar-post p{
            font-size: 12px;
        }
        .image-container {
    width: auto;
    max-width: 120%;
    margin: 0;
    height: 300px;
    overflow: hidden; /* Ensure content does not overflow the container */
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintains aspect ratio while filling the container */
    border-radius: 10px;
}

        .date-container,
        .title-container,
        .social-icons,
        .content-container,
        .reviews-container {
            margin-top: 10px; /* Adjust spacing for mobile */
        }
        .content-container{
            margin-bottom: 80px;
            margin-right: 0;
            margin-left: -10px;
        }
        .reviews-container {
            margin-left: -20px;
            
        }
        .title-container{
            font-size: 11px;
        }
        .reviews-container h2{
            font-size: 14px;
            margin-top: 2px;
            margin-left: -10px;
        }
    
        .submit-review  a{
            color: #007bff;
            font-weight: bold;
        }
        .submit-review p, a{
            font-size: 12px;
        }
        .review-form {
            margin-top: 20px;
        }
        .similar-posts{
            margin-top: 50px;
        }
        .similar-post {
            padding: 10px; /* Add some padding for touch devices */
            border-radius: 4px; /* Make it visually appealing */
            background: #f9f9f9; /* Light background for contrast */
        }
    }
</style>


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
        
   
        <div class="reviews-container" style="">
            <h2>Reviews</h2>
            <div class="submit-review">
                <h2>Submit Your Review</h2>
                <form id="review-form" action="<?= site_url('submit-review') ?>" method="post">
                    <input type="hidden" name="post_id" value="<?= esc($contentID) ?>">
                    <input type="hidden" name="post_type" value="<?= esc($type) ?>">
                    <label for="review_text">Review:</label>
                    <br>
                    <textarea name="content" class="review-text" required style=""></textarea>
                    <br>
                    <label for="rating">Rating:</label>
                    <div class="rating" id="rating">
                        <span class="material-symbols-outlined star" data-value="1">star_half</span>
                        <span class="material-symbols-outlined star" data-value="2">star_half</span>
                        <span class="material-symbols-outlined star" data-value="3">star_half</span>
                        <span class="material-symbols-outlined star" data-value="4">star_half</span>
                        <span class="material-symbols-outlined star" data-value="5">star_half</span>
                    </div>
                    <input type="hidden" id="rating-input" name="rating" required>

                    <button type="submit" style="padding: 12px 20px; border: none; border-radius: 4px; margin-top: 8px; background-color: #468EEE; color: white; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease;">Submit Review</button>
                </form>
                <?php if (!session()->get('isLoggedIn')): ?>
                    <p>Please <a href="<?= site_url('/google-login') ?>">continue with Google</a> to submit a review.</p>
                <?php endif; ?>
            </div>

            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="review" style="margin-top: 10px; font-size: 16px; color: #444;">
                        <p><strong><?= esc($review['username']) ?></strong> (Rating: <?= esc($review['rating']) ?>)</p>
                        <div class="rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $review['rating']): ?>
                                    <span class="material-symbols-outlined">star</span>
                                <?php else: ?>
                                    <span class="material-symbols-outlined">star_half</span>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.rating .star');
    const ratingInput = document.getElementById('rating-input');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const ratingValue = this.getAttribute('data-value');
            ratingInput.value = ratingValue;

            stars.forEach(s => {
                if (s.getAttribute('data-value') <= ratingValue) {
                    s.textContent = 'star';
                    s.classList.add('selected');
                } else {
                    s.textContent = 'star_half';
                    s.classList.remove('selected');
                }
            });
        });
    });
});


</script>




<?= $this->endSection() ?>
