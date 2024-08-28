<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<style>
    .cta-section {
        text-align: center;
        padding: 40px;
        background-color: #f9f9f9;
    }

    h2 {
        font-size: 28px;
        color: #333;
    }

    .cta-button {
        background-color: #ff5722;
        color: white;
        padding: 15px 30px;
        font-size: 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .cta-button:hover {
        background-color: #e64a19;
    }

    .review-form {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .star-rating {
        font-size: 24px;
        color: #ffc107;
        margin-bottom: 20px;
    }

    .star {
        cursor: pointer;
    }

    textarea {
        width: 80%;
        height: 100px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    .submit-review {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-review:hover {
        background-color: #45a049;
    }

    .hero-section {
        background-image: url('https://biometricdataprivacylaws.com/public/images/blue-imag.jpg'); /* Replace with your image */
        background-size: cover;
        background-position: center;
        padding: 100px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        position: relative;
    }

    .hero-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Overlay effect for better text visibility */
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 20px;
    }

    .hero-content h1 {
        font-size: 48px;
        margin-bottom: 20px;
        color: #ffffff;
    }

    .hero-content p {
        font-size: 20px;
        margin-bottom: 30px;
        color: #f1f1f1;
    }

    .cta-button {
        background-color: #ff5722;
        color: white;
        padding: 15px 30px;
        font-size: 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .cta-button:hover {
        background-color: #e64a19;
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 36px;
        }
        
        .hero-content p {
            font-size: 16px;
        }
        
        .hero-section {
            padding: 60px 20px;
        }
    }
</style>

<section class="hero-section">
    <div class="hero-overlay"></div> <!-- Overlay -->
    <div class="hero-content">
        <h1>What Our Users Say</h1>
        <p>Real feedback from our happy customers. Join them and share your experience!</p>
    </div>
</section>

<section class="cta-section">
    <h2>We’d Love to Hear From You!</h2>
    <button id="reviewBtn" class="cta-button">Leave a Review</button>

    <?php if (session()->get('isLoggedIn')): ?>
        <div class="review-form" id="reviewForm">
            <form id="testimonialForm" method="post" action="<?= site_url('testimonials/submitTestimonial') ?>">
                <input type="hidden" name="google_id" value="<?= session()->get('userData')['google_id'] ?>">
                <input type="hidden" name="username" value="<?= session()->get('userData')['username'] ?>">
                
                <div class="star-rating">
                    <input type="radio" name="stars" value="1" id="star1"><label for="star1">&#9733;</label>
                    <input type="radio" name="stars" value="2" id="star2"><label for="star2">&#9733;</label>
                    <input type="radio" name="stars" value="3" id="star3"><label for="star3">&#9733;</label>
                    <input type="radio" name="stars" value="4" id="star4"><label for="star4">&#9733;</label>
                    <input type="radio" name="stars" value="5" id="star5"><label for="star5">&#9733;</label>
                </div>
                <textarea name="review" placeholder="Write your review here..." required></textarea>
                <button type="submit" class="submit-review">Submit Review</button>
            </form>
        </div>
    <?php else: ?>
        <!-- Display the Google login message if the user is not logged in -->
        <p>Please <a href="<?= site_url('/google-login') ?>">continue with Google</a> to submit a review.</p>
    <?php endif; ?>
</section>

<script>
    document.getElementById("reviewBtn").addEventListener("click", function() {
        const reviewForm = document.getElementById("reviewForm");

        // Toggle the display of the form
        if (reviewForm.style.display === "none" || reviewForm.style.display === "") {
            reviewForm.style.display = "block";
            this.textContent = "Hide Review Form"; // Change button text
        } else {
            reviewForm.style.display = "none";
            this.textContent = "Leave a Review"; // Reset button text
        }
    });
</script>

<?= $this->endSection() ?>
