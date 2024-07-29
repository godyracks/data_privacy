<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
 
    .terms-container {
        width: 80%;
        max-width: 900px;
        margin: 50px auto;
        background: #fff;
        padding: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        border: 1px solid #ccc;
    }
    .terms-container h1, .terms-container h2, .terms-container h3 {
        font-family: 'Times New Roman', Times, serif;
        color: #222;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }
    .terms-container h1 {
        text-align: center;
        color: #444;
    }
    .terms-container p {
        margin: 10px 0;
    }
    .terms-container .comment {
        font-style: italic;
        color: #777;
        margin: 20px 0;
        padding: 10px;
        background: #e9e9e9;
        border-left: 4px solid #ccc;
    }
</style>

<div class="terms-container">
    <h1>Terms and Conditions</h1>
    <div class="comment">
        <!-- Comment: Ah, the fine print! Because who doesn't love reading legal jargon, am I right? -->
    </div>
    <p>Welcome to our Terms and Conditions page. Here, we outline the rules and regulations for using our website. Grab your reading glasses, and let's get into the nitty-gritty!</p>

    <h2>Acceptance of Terms</h2>
    <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree with any part of these terms, you must not use our website. Because, you know, rules are rules.</p>

    <div class="comment">
        <!-- Comment: Seriously, who reads this stuff? Just kidding, you should totally read it. -->
    </div>

    <h2>Intellectual Property</h2>
    <p>The content, layout, design, data, databases, and graphics on this website are protected by intellectual property laws. You may not reproduce, distribute, or publish any content from this site without our explicit permission. Because plagiarism is a no-no.</p>

    <div class="comment">
        <!-- Comment: Remember that time you copied your friend's homework? Yeah, don't do that here. -->
    </div>

    <h2>Use License</h2>
    <p>Permission is granted to temporarily download one copy of the materials on our website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
    <ul>
        <li>Modify or copy the materials;</li>
        <li>Use the materials for any commercial purpose;</li>
        <li>Attempt to decompile or reverse engineer any software contained on our website;</li>
        <li>Remove any copyright or other proprietary notations from the materials; or</li>
        <li>Transfer the materials to another person or "mirror" the materials on any other server.</li>
    </ul>
    <p>This license shall automatically terminate if you violate any of these restrictions and may be terminated by us at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format. Because we said so.</p>

    <div class="comment">
        <!-- Comment: Basically, play nice and don't be a jerk. -->
    </div>

    <h2>Disclaimer</h2>
    <p>The materials on our website are provided "as is". We make no warranties, expressed or implied, and hereby disclaim and negate all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Because life is full of uncertainties.</p>

    <div class="comment">
        <!-- Comment: No guarantees, folks. Use at your own risk. -->
    </div>

    <h2>Limitations</h2>
    <p>In no event shall we or our suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on our website, even if we or an authorized representative has been notified orally or in writing of the possibility of such damage. Some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you. But you get the idea.</p>

    <div class="comment">
        <!-- Comment: Translation: Don't blame us if something goes wrong. -->
    </div>

    <h2>Revisions and Errata</h2>
    <p>The materials appearing on our website could include technical, typographical, or photographic errors. We do not warrant that any of the materials on our website are accurate, complete, or current. We may make changes to the materials contained on our website at any time without notice. However, we do not make any commitment to update the materials. Because who has time for that?</p>

    <div class="comment">
        <!-- Comment: If you find a typo, congrats! You win a prize. Just kidding. -->
    </div>

    <h2>Links</h2>
    <p>We have not reviewed all of the sites linked to our website and are not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by us. Use of any such linked website is at the user's own risk. Because the internet is a wild place.</p>

    <div class="comment">
        <!-- Comment: We link, you click, you deal with the consequences. -->
    </div>

    <h2>Governing Law</h2>
    <p>Any claim relating to our website shall be governed by the laws of our home jurisdiction without regard to its conflict of law provisions. Because we're the boss here.</p>

    <div class="comment">
        <!-- Comment: When in doubt, just follow the rules, okay? -->
    </div>

    <h2>Changes to Terms</h2>
    <p>We may revise these terms of service for our website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service. Because change is the only constant.</p>

    <div class="comment">
        <!-- Comment: Terms change, and so should you. -->
    </div>

    <h2>Contact Us</h2>
    <p>If you have any questions about these Terms, please contact us at your earliest convenience. Because we actually do want to hear from you.</p>

    <div class="comment">
        <!-- Comment: Unless you're a spammer. Then, not so much. -->
    </div>
</div>

<?= $this->endSection() ?>
