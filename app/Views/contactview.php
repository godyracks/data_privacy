<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    .bg-image {
        background-image: url('<?= base_url('public/images/contact.jpg') ?>');
        background-size: cover;
        background-position: center;
        height: 100%;
        position: relative;
    }
    .contact-container {
        background: rgba(245, 245, 245, 0.9);
        margin: 0 auto;
        width: 80%;
        max-width: 1200px;
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .cont-left-side {
        width: 30%;
        margin-bottom: 20px;
    }
    .cont-left-side img {
        width: 100%;
        border-radius: 8px;
        height: auto;
    }
    .social-links {
        position: relative;
        bottom: 0;
        left: 20px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        margin-top: 20px;
        gap: 10px;
    }
    .social-links a {
        text-decoration: none;
        font-size: 24px;
        color: #000;
    }
    .cont-right-side {
        width: 65%;
        padding: 20px;
        margin: 0 auto;
    }
    .cont-right-side h2 {
        margin-bottom: 10px;
        width: 100%;
        margin:  0 auto;
    }
    .cont-right-side p {
        margin-bottom: 40px;
        font-size: 14px;
        color: #555;
    }
    .input-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .input-container {

        position: relative;
        flex: 1;
        margin-bottom: 10px;
        margin-right: 3px;
    }
    .input-container .icons {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #ccc;
    }
    .input-container input {
        width: 80%;
        height: 40px;
        padding: 10px 10px 10px 35px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .full-width-input-container {
        position: relative;
        width: 90%;
        height: 30px;
        margin-bottom: 40px;
    }
    .full-width-input-container .icon2 {
        position: absolute;
        top: 100%;
        left: 10px;
        transform: translateY(-50%);
        color: #ccc;
    }
    .full-width-input-container input {
        width: 100%;
        height: 40px;
        padding: 10px 10px 10px 35px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .textarea {
        width: 94%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        height: 100px;
    }
    .send-button {
        width: 100%;
        padding: 15px;
        background-color: blue;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }
    .icons{
        vertical-align: middle;
        margin-right: 8px;
    }
    @media (max-width: 768px) {
        .cont-left-side, .cont-right-side {
            width: 100%;
        }
        .input-container input {
        width: 70%;
        height: 40px;
      
    }
    .input-container {

position: relative;
flex: 1;
margin-bottom: 10px;
margin-right: 0;
width: 100%;
}
.full-width-input-container input {
        width: 95%;
        height: 40px;
    }
</style>

<div class="bg-image">
    <div class="contact-container">
        <div class="cont-left-side">
            <img src="<?= base_url('public/images/global.jpg') ?>" alt="Contact Image">
            <div class="social-links">
            <!-- <p>Social Links</p> -->
     
            <a target="_blank" href="https://www.linkedin.com/in/sivasakthi-vajjiravelu-571792195?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            <a  target="_blank"  href="https://wa.me/447436199290?text=Hello%2C%20I%20have%20a%20question%21" class="social-icon" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>
       </div>     
        </div>
        <div class="cont-right-side">
            <h2>GET IN TOUCH</h2>
            <p>24/7 we will answer your questions and issues</p>
            <div class="input-row">
                <div class="input-container">
                    <span class="material-symbols-outlined icons">person</span>
                    <input type="text" placeholder="First Name">
                </div>
                <div class="input-container">
                    <span class="material-symbols-outlined icons">person</span>
                    <input type="text" placeholder="Last Name">
                </div>
            </div>
            <div class="full-width-input-container">
                <span class="material-symbols-outlined icon2">mail</span>
                <input class="full-width-input" type="email" placeholder="Enter your Email">
            </div>
            <div class="full-width-input-container">
                <span class="material-symbols-outlined icon2">call</span>
                <input class="full-width-input" type="tel" placeholder="Enter your Phone Number">
            </div>
            <textarea class="textarea" placeholder="Describe your issue"></textarea>
            <button class="send-button">Send</button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
