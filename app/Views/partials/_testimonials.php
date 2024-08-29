<section class="testimonials">
    <h2 class="testimonial-title">See What Our Users Say</h2>
    <span class="material-symbols-outlined test-chevron chevron-left">chevron_left</span>
    <div class="testimonial-cards-wrapper">
        <div class="testimonial-cards">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="testimonial-card">
                    <div class="testimonial-left">
                        <div class="testimonial-image">
                            <img src="<?= esc($testimonial['profile_image']) ?>" alt="User Image">
                        </div>
                    </div>
                    <div class="testimonial-right">
                        <h3><?= esc($testimonial['username']) ?></h3>
                        <div class="stars">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="material-symbols-outlined"><?= $i <= $testimonial['stars'] ? 'star' : ($i == $testimonial['stars'] + 0.5 ? 'star_half' : 'star_border') ?></span>
                            <?php endfor; ?>
                        </div>
                        <p><?= esc($testimonial['review']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <span class="material-symbols-outlined test-chevron chevron-right">chevron_right</span>
</section>
