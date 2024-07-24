<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
  

    .hero {
        color: #fff;
        text-align: center;
        padding: 6rem 2rem;
        background: url('<?= base_url('public/images/tech-bg.jpg') ?>') no-repeat center center fixed;
        background-size: cover;
       
        height: 40vh;
    }

    .hero-content {
        max-width: 600px;
        margin: 0 auto;
        
        padding: 2rem;
        border-radius: 8px;
    }

    .hero-content h1 {
        font-size: 3rem;
        margin: 0;
    }

    .hero-content p {
        font-size: 1.25rem;
        margin-top: 1rem;
    }

    .about-content {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: #f2f2f2;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .container {
        padding: 0 2rem;
    }

    h2 {
        font-size: 2rem;
        margin-top: 1.5rem;
        color: #007bff;
    }

    ul {
        list-style-type: disc;
        margin-left: 1.5rem;
        padding-left: 1rem;
    }

    li {
        margin-bottom: 0.5rem;
    }

    a {
        color: #FF5722;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<section class="hero">
    <div class="hero-content">
        <h1>About Biometric Data Privacy Laws</h1>
        <p>Explore the comprehensive overview of biometric data privacy laws in India and the UK.</p>
    </div>
</section>

<section class="about-content">
    <div class="container">
        <h2>Our Mission</h2>
        <p>Our mission is to provide detailed information about biometric data privacy laws, helping individuals and organizations understand and comply with legal requirements in different jurisdictions.</p>

        <h2>What Are Biometric Data Privacy Laws?</h2>
        <p>Biometric data privacy laws govern the collection, use, and storage of biometric data, such as fingerprints, facial recognition, and iris scans. These laws are crucial for protecting personal privacy and ensuring that biometric data is handled securely and ethically.</p>

        <h2>Key Regulations</h2>
        <ul>
            <li><strong>India:</strong> The Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011.</li>
            <li><strong>UK:</strong> The Data Protection Act 2018 and the UK General Data Protection Regulation (UK GDPR).</li>
        </ul>

        <h2>Why It Matters</h2>
        <p>Understanding and adhering to biometric data privacy laws is essential for maintaining trust and avoiding legal consequences. These laws ensure that biometric data is collected and used responsibly, protecting individuals from unauthorized access and misuse.</p>

        <h2>Learn More</h2>
        <p>For more information on biometric data privacy laws and compliance, explore our <a href="<?= base_url('/resources ')?>">resources</a> or <a href="<?= base_url('/contact ')?>">contact us</a> for personalized assistance.</p>
    </div>
</section>
<?= $this->endSection() ?>
