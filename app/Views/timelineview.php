<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<?= $this->include('partials/_search-input') ?>
<?= $this->include('partials/_info-panel') ?>
<section class="timeline-section" style="background: url('<?= base_url('public/images/neon-map.jpg') ?>') no-repeat center center fixed; background-size: cover;">
    <div id="timeline"></div>
</section>

<!-- Modal -->
<div id="lawModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="modalText">Click to learn more about this law.</p>
        <a id="modalLink" href="#" target="_blank" class="modal-link">Learn More</a>
    </div>
</div>

<script>
    // Initialize the items
    let items = new vis.DataSet(<?= $timelineItems ?>);

    // Create groups
    let groups = new vis.DataSet([
        {id: 1, content: 'UK', className: 'timeline-item'},
        {id: 2, content: 'India', className: 'timeline-item'}
    ]);

    // Configuration for the Timeline
    let options = {
        groupOrder: 'id'
    };

    // Create a Timeline
    let timeline = new vis.Timeline(document.getElementById('timeline'), items, groups, options);

    // Get the modal
    let modal = document.getElementById("lawModal");

    // Get the <span> element that closes the modal
    let span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Handle timeline item click
    timeline.on('click', function (properties) {
        if (properties.item) {
            let item = items.get(properties.item);
            let lawId = item.id;
            let lawName = item.content.split(': ')[1]
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Remove any character that is not a letter, number, space or hyphen
                .replace(/\s+/g, '-'); // Replace spaces with hyphens

            let lawUrl = `https://www.biometricdataprivacylaws.com/view-more/law/${lawId}/${lawName}`;

            document.getElementById('modalLink').href = lawUrl;
            modal.style.display = "block";
        }
    });
</script>

<style>
/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 10003;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    text-align: center;
    border-radius: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.modal-link {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}

.modal-link:hover {
    background-color: #0056b3;
}
</style>

<?= $this->endSection() ?>
