
<section class="faq-section">
    <h2>FAQs - Frequently Asked Questions</h2>
    <div class="faq-container">
        <div class="faq-item">
            <div class="faq-question">
                <h3>What are the biometric data privacy laws in India?</h3>
                
                <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </div>
           
            <div class="faq-answer">
                <p>India's biometric data privacy laws are governed by the Information Technology Act and the Aadhaar Act, which regulate the collection, storage, and use of biometric data.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                <h3>How does the UK regulate biometric data?</h3>
                <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </div>
           
            <div class="faq-answer">
                <p>The UK regulates biometric data under the Data Protection Act 2018 and the General Data Protection Regulation (GDPR), ensuring stringent controls over data processing and storage.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                <h3>How is biometric data protected in India?</h3>
                <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </div>
           
            <div class="faq-answer">
                <p>Biometric data in India is protected under the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                <h3>What measures are in place for biometric data security in the UK?</h3>
                <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </div>
          
            <div class="faq-answer">
                <p>In the UK, biometric data security measures include robust encryption, access controls, and compliance with GDPR standards for data protection and privacy.</p>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const chevron = item.querySelector('.faq-chevron');

        question.addEventListener('click', () => {
            const isOpen = answer.style.display === 'block';
            answer.style.display = isOpen ? 'none' : 'block';
            chevron.classList.toggle('rotate', !isOpen);
        });
    });
});
</script>