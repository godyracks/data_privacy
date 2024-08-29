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
        border-radius: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .cta-button:hover {
        background-color: #e64a19;
    }

    .review-form {
    display: flex; /* Use flexbox layout */
    flex-direction: column; /* Arrange items in a column */
    align-items: center; /* Center items horizontally */
    justify-content: center; /* Center items vertically */
    max-width: 600px;
    height: 100vh; /* Make it fill the viewport height to center vertically */
    margin: 0 auto; /* Center the form horizontally */
    padding-top: 70px; /* Remove the padding-top */
    margin-top: 0; /* Remove the margin-top */
}


    .star-rating {
        font-size: 36px;
        color: black;
        margin-bottom: 20px;
        display: flex;
        gap: 10px;
        cursor: pointer;
        margin-left: 50px;
        padding-bottom: 30px;
    }

    .star {
        transition: color 0.3s ease;
    }

    .star.selected {
        color: orange;
    }

    textarea {
        width: 80%;
        height: 100px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
        padding-top: 30px;
    }

    .submit-review {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 30px;
        transition: background-color 0.3s ease;
    }

    .submit-review:hover {
        background-color: #45a049;
    }
    .char-count {
        text-align: right;
        font-size: 14px;
        color: #666;
        margin-top: -45px;
        margin-right: 60px;
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
    <div class="hero-overlay"></div> 
    <div class="hero-content">
        <h1>What Our Users Say</h1>
        <p>Real feedback from our happy users. Join them and share your experience!</p>
    </div>
</section>

<section class="cta-section">
    <h2>We’d Love to Hear From You!</h2>
    <button id="reviewBtn" class="cta-button">Say Something...</button>

    <?php if (session()->get('isLoggedIn')): ?>
        <div class="review-form" id="reviewForm" style="display:none;">
            <form id="testimonialForm" method="post" action="<?= site_url('testimonials/submitTestimonial') ?>">
                <input type="hidden" name="google_id" value="<?= session()->get('userData')['google_id'] ?>">
                <input type="hidden" name="username" value="<?= session()->get('userData')['username'] ?>">
                <input type="hidden" id="ratingValue" name="stars" value="0">

                <div class="star-rating" id="starRating">
                    <span class="material-symbols-outlined star" data-value="1">star_half</span>
                    <span class="material-symbols-outlined star" data-value="2">star_half</span>
                    <span class="material-symbols-outlined star" data-value="3">star_half</span>
                    <span class="material-symbols-outlined star" data-value="4">star_half</span>
                    <span class="material-symbols-outlined star" data-value="5">star_half</span>
                </div>

                <textarea name="review" placeholder="Write your feedback here..." required maxlength="143"></textarea>
                <div class="char-count">
                    <span id="charCount">143</span> remaining
                </div>
                <button type="submit" class="submit-review">Submit Feedback</button>
            </form>
        </div>
    <?php else: ?>
        <!-- Display the Google login message if the user is not logged in -->
        <p>Please <a href="<?= site_url('/google-login') ?>">continue with Google</a> to submit a feedback.</p>
    <?php endif; ?>
</section>

<script>
document.getElementById("reviewBtn").addEventListener("click", function() {
    const reviewForm = document.getElementById("reviewForm");

    // Toggle the display of the form
    if (reviewForm.style.display === "none" || reviewForm.style.display === "") {
        reviewForm.style.display = "block";
        this.textContent = "Close"; // Change button text

        // Style the button
        this.style.backgroundColor = "transparent"; // Transparent background
        this.style.border = "2px solid black"; // Black border
        this.style.color = "black"; // Change text color to black
        this.style.padding = "15px 30px"; // Adjust padding
        this.style.borderRadius = "8px"; // Optional: rounded corners
        this.style.transition = "background-color 0.3s ease, color 0.3s ease"; // Smooth transitions

    } else {
        reviewForm.style.display = "none";
        this.textContent = "Say Something..."; // Reset button text

        // Reset button styles
        this.style.backgroundColor = "#ff5722"; // Original background color
        this.style.border = "none"; // Remove the border
        this.style.color = "white"; // Reset text color
    }
});

const stars = document.querySelectorAll('.star');
const ratingValue = document.getElementById('ratingValue');
const testimonialForm = document.getElementById('testimonialForm');

// Handle star click
stars.forEach(star => {
    star.addEventListener('click', function() {
        let selectedValue = this.getAttribute('data-value');
        ratingValue.value = selectedValue;

        stars.forEach(s => {
            if (s.getAttribute('data-value') <= selectedValue) {
                s.textContent = 'star'; // Change to full star
                s.classList.add('selected');
            } else {
                s.textContent = 'star_half'; // Reset to half star
                s.classList.remove('selected');
            }
        });
    });
});

// Handle form submission
testimonialForm.addEventListener('submit', function(e) {
    if (ratingValue.value === "0") {
        e.preventDefault(); // Prevent form submission
        alert("Please rate using stars.");
        return;
    }

    // Custom alert for successful submission
    alert("Thank you for your feedback!\n Feedback successfully submitted.");
});

const textarea = document.querySelector('textarea[name="review"]');
const charCount = document.getElementById('charCount');

textarea.addEventListener('input', function() {
    const remaining = 143 - this.value.length;
    charCount.textContent = remaining;
});
</script>

<?= $this->endSection() ?>
