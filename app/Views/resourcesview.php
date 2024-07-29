<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
 
    .resources-container {
        width: 80%;
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        border: 1px solid #ddd;
    }
    .resources-container h1 {
        text-align: center;
        color: #444;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }
    .resource-section {
        margin: 30px 0;
    }
    .resource-section h2 {
        font-family: 'Georgia', serif;
        color: #222;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }
    .resource-item {
        display: flex;
        margin-bottom: 20px;
    }
    .resource-item video, .resource-item img {
        width: 200px;
        height: auto;
        border-radius: 8px;
        margin-right: 20px;
    }
    .resource-details {
        flex: 1;
    }
    .resource-details h3 {
        margin-top: 0;
    }
    .resource-details p {
        margin-bottom: 10px;
    }
    .download-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
    }
    .download-button:hover {
        background-color: #0056b3;
    }
</style>

<div class="resources-container">
    <h1>Resources</h1>

    <div class="resource-section" id="videos">
        <h2>Videos</h2>
        <div class="resource-item">
            <video controls>
                <source src="video1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="resource-details">
                <h3>Video Title 1</h3>
                <p>Description of Video 1. This video covers...</p>
            </div>
        </div>
        <div class="resource-item">
            <video controls>
                <source src="video2.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="resource-details">
                <h3>Video Title 2</h3>
                <p>Description of Video 2. This video explains...</p>
            </div>
        </div>
        <!-- Add more video resources as needed -->
    </div>

    <div class="resource-section" id="whitepapers">
        <h2>Whitepapers</h2>
        <div class="resource-item">
            <img src="whitepaper1.jpg" alt="Whitepaper 1">
            <div class="resource-details">
                <h3>Whitepaper Title 1</h3>
                <p>Summary of Whitepaper 1. This whitepaper discusses...</p>
                <a class="download-button" href="whitepaper1.pdf" download>Download</a>
            </div>
        </div>
        <div class="resource-item">
            <img src="whitepaper2.jpg" alt="Whitepaper 2">
            <div class="resource-details">
                <h3>Whitepaper Title 2</h3>
                <p>Summary of Whitepaper 2. This whitepaper covers...</p>
                <a class="download-button" href="whitepaper2.pdf" download>Download</a>
            </div>
        </div>
        <!-- Add more whitepaper resources as needed -->
    </div>
</div>

<?= $this->endSection() ?>
