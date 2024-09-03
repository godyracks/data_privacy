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
                        <p class="testimonial-email"><?= esc($testimonial['email']) ?></p>
                        <div class="stars">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $testimonial['stars']): ?>
                                    <span class="material-symbols-outlined">star</span>
                                <?php else: ?>
                                    <span class="material-symbols-outlined">star_half</span>
                                <?php endif; ?>
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
