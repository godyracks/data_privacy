<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>


.tab {
    overflow: hidden;
    background-color: rgba(206, 199, 199, 0.4);
    width: 40%;
    margin: 0 auto;
    margin-top: 20px;
}

.tab button {
    background-color: rgba(206, 199, 199, 0.8);
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    color: #000;
    width: 50%;
}

.tab button:hover {
    background-color: #555;
}

.tab button.active {
    background-color: #FF5722;
    color: #fff;
}

.tabcontent {
    display: none;
    padding: 20px;
    border-top: none;
    background-color: white;
    margin-top: -1px;
    
    
    margin-top: 20px;
}

form {
    background-color: rgba(70, 142, 238, 0.1);
    padding: 20px;
    margin: 20px 0;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
}

form input[type="text"],
form input[type="date"],
form select,
form textarea,
form input[type="file"] {
    width: 70%;
    padding: 10px 20px;
    /* margin: 10px 0; */
    border: 1px solid #ccc;
    border-radius: 5px;
    display:block;
    margin: 20px auto;
}
form input[type="text"],
form input[type="date"]{
    height: 50px;
}

form button {
  background-color: #6A7BA0;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form button:hover {
    background-color: #0056b3;
}

h1, h2 {
    color: #FF5722;
    max-width: 40%;
    margin: 0 auto;
    margin-top: 40px;
    margin-bottom: 5px;
}

.ul-list {
    list-style-type: none;
    padding: 0;
    max-width: 600px;
    margin: 0 auto;
}

.ul-list .list {
    background: #fff;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.ul-list .list a {
    color: #007bff;
    text-decoration: none;
    margin-left: 10px;
}

.ul-list .list a:hover {
    text-decoration: underline;
}

</style>

<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'DataEntry')">Data Entry</button>
    <button class="tablinks" onclick="openTab(event, 'Listings')">Listings</button>
</div>

<div id="DataEntry" class="tabcontent">
    <h1>Data Entry</h1>

    <!-- Countries Form -->
    <h2>Countries</h2>
    <form action="<?= base_url('monisha-dashboard/add-country') ?>" method="post">
        <input type="text" name="CountryName" placeholder="Country Name" required>
        <input type="text" name="CountryCode" placeholder="Country Code" required>
        <button type="submit">Add Country</button>
    </form>

    <!-- Laws Form -->
    <h2>Laws</h2>
    <form action="<?= base_url('monisha-dashboard/add-law') ?>" method="post" enctype="multipart/form-data">
        <select name="CountryID">
            <?php foreach ($countries as $country): ?>
                <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="LawName" placeholder="Law Name" required>
        <textarea name="Description" placeholder="Description" id="description"></textarea>
        <br><br>
        <textarea name="KeyProvisions" placeholder="Key Provisions" id="key-provisions"></textarea>
        <input type="date" name="Date" required>
        <input type="file" name="Image" accept="image/*">
        <button type="submit">Add Law</button>
    </form>

    <!-- Documents Form -->
    <h2>Documents</h2>
    <form action="<?= base_url('monisha-dashboard/add-document') ?>" method="post" enctype="multipart/form-data">
        <select name="CountryID">
            <?php foreach ($countries as $country): ?>
                <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="DocumentName" placeholder="Document Name" required>
        <textarea name="Description" placeholder="Description" id="doc-description"></textarea>
        <select name="Type">
            <option value="Amendment">Amendment</option>
            <option value="Ruling">Ruling</option>
            <option value="Policy">Policy</option>
            <option value="Programme">Programme</option>
        </select>
        <input type="date" name="Date" required>
        <input type="file" name="Image" accept="image/*">
        <button type="submit">Add Document</button>
    </form>

    <!-- Case Studies Form -->
    <h2>Case Studies</h2>
    <form action="<?= base_url('monisha-dashboard/add-case-study') ?>" method="post" enctype="multipart/form-data">
        <select name="CountryID">
            <?php foreach ($countries as $country): ?>
                <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="Title" placeholder="Title" required>
        <textarea name="Summary" placeholder="Case study Content here..." id="case-description"></textarea>
        <input type="date" name="Date" required>
        <input type="file" name="Image" accept="image/*">
        <button type="submit">Add Case Study</button>
    </form>

    <!-- Resources Form -->
    <h2>Resources</h2>
    <form action="<?= base_url('monisha-dashboard/add-resource') ?>" method="post" enctype="multipart/form-data">
        <select name="CountryID">
            <?php foreach ($countries as $country): ?>
                <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="Title" placeholder="Title" required>
        <select name="Type">
            <option value="Whitepaper">Whitepaper</option>
            <option value="Video">Video</option>
        </select>
        <input type="text" name="URL" placeholder="URL">
        <input type="date" name="Date" required>
        <input type="file" name="Image" accept="image/*">
        <button type="submit">Add Resource</button>
    </form>
</div>

<div id="Listings" class="tabcontent">
    <h1>Listings</h1>

    <!-- Countries Listing -->
    <h2>Countries</h2>
    <ul class="ul-list">
        <?php foreach ($countries as $country): ?>
            <li class="list"><?= $country['CountryName'] ?> (<?= $country['CountryCode'] ?>)</li>
        <?php endforeach; ?>
    </ul>

    <!-- Laws Listing -->
    <h2>Laws</h2>
    <ul class="ul-list">
        <?php foreach ($laws as $law): ?>
            <li class="list">
                <?= $law['LawName'] ?>
                <a href="<?= base_url('monisha-dashboard/editLaw/'.$law['LawID']) ?>">Edit</a>
                <a href="<?= base_url('monisha-dashboard/deleteLaw/'.$law['LawID']) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Documents Listing -->
    <h2>Documents</h2>
    <ul class="ul-list">
        <?php foreach ($documents as $document): ?>
            <li class="list">
                <?= $document['DocumentName'] ?>
                <a href="<?= base_url('monisha-dashboard/editDocument/'.$document['DocumentID']) ?>">Edit</a>
                <a href="<?= base_url('monisha-dashboard/deleteDocument/'.$document['DocumentID']) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Case Studies Listing -->
    <h2>Case Studies</h2>
    <ul class="ul-list">
        <?php foreach ($caseStudies as $caseStudy): ?>
            <li class="list">
                <?= $caseStudy['Title'] ?>
                <a href="<?= base_url('monisha-dashboard/editCaseStudy/'.$caseStudy['CaseStudyID']) ?>">Edit</a>
                <a href="<?= base_url('monisha-dashboard/deleteCaseStudy/'.$caseStudy['CaseStudyID']) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Resources Listing -->
    <h2>Resources</h2>
    <ul class="ul-list">
        <?php foreach ($resources as $resource): ?>
            <li class="list">
                <?= $resource['Title'] ?>
                <a href="<?= base_url('monisha-dashboard/editResource/'.$resource['ResourceID']) ?>">Edit</a>
                <a href="<?= base_url('monisha-dashboard/deleteResource/'.$resource['ResourceID']) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script>
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Set the default active tab
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".tablinks").click();
});
</script>

<?= $this->endSection() ?>
