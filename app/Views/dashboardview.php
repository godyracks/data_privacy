<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    /* body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
} */

.tab {
    overflow: hidden;
    background-color: #333;
}

.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    color: white;
}

.tab button:hover {
    background-color: #555;
}

.tab button.active {
    background-color: #007bff;
}

.tabcontent {
    display: none;
    padding: 20px;
    border-top: none;
    background-color: white;
    margin-top: -1px;
}

form {
    background: #fff;
    padding: 20px;
    margin: 20px 0;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form input[type="text"],
form input[type="date"],
form select,
form textarea,
form input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button {
    background-color: #007bff;
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
    color: #333;
}

ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    background: #fff;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

ul li a {
    color: #007bff;
    text-decoration: none;
    margin-left: 10px;
}

ul li a:hover {
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
    <form action="<?= base_url('dashboard/add-country') ?>" method="post">
        <input type="text" name="CountryName" placeholder="Country Name" required>
        <input type="text" name="CountryCode" placeholder="Country Code" required>
        <button type="submit">Add Country</button>
    </form>

    <!-- Laws Form -->
    <h2>Laws</h2>
    <form action="<?= base_url('dashboard/add-law') ?>" method="post" enctype="multipart/form-data">
        <select name="CountryID">
            <?php foreach ($countries as $country): ?>
                <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="LawName" placeholder="Law Name" required>
        <textarea name="Description" placeholder="Description" id="description"></textarea>
        <textarea name="KeyProvisions" placeholder="Key Provisions" id="key-provisions"></textarea>
        <input type="date" name="Date" required>
        <input type="file" name="Image" accept="image/*">
        <button type="submit">Add Law</button>
    </form>

    <!-- Documents Form -->
    <h2>Documents</h2>
    <form action="<?= base_url('dashboard/add-document') ?>" method="post" enctype="multipart/form-data">
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
    <form action="<?= base_url('dashboard/add-case-study') ?>" method="post" enctype="multipart/form-data">
        <select name="CountryID">
            <?php foreach ($countries as $country): ?>
                <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="Title" placeholder="Title" required>
        <textarea name="Summary" placeholder="Summary" id="case-description"></textarea>
        <input type="date" name="Date" required>
        <input type="file" name="Image" accept="image/*">
        <button type="submit">Add Case Study</button>
    </form>

    <!-- Resources Form -->
    <h2>Resources</h2>
    <form action="<?= base_url('dashboard/add-resource') ?>" method="post" enctype="multipart/form-data">
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
    <ul>
        <?php foreach ($countries as $country): ?>
            <li><?= $country['CountryName'] ?> (<?= $country['CountryCode'] ?>)</li>
        <?php endforeach; ?>
    </ul>

    <!-- Laws Listing -->
    <h2>Laws</h2>
    <ul>
        <?php foreach ($laws as $law): ?>
            <li>
                <?= $law['LawName'] ?>
                <a href="<?= base_url('dashboard/editLaw/'.$law['LawID']) ?>">Edit</a>
                <a href="<?= base_url('dashboard/deleteLaw/'.$law['LawID']) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Documents Listing -->
    <h2>Documents</h2>
    <ul>
        <?php foreach ($documents as $document): ?>
            <li>
                <?= $document['DocumentName'] ?>
                <a href="<?= base_url('dashboard/editDocument/'.$document['DocumentID']) ?>">Edit</a>
                <a href="<?= base_url('dashboard/deleteDocument/'.$document['DocumentID']) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Case Studies Listing -->
    <h2>Case Studies</h2>
    <ul>
        <?php foreach ($caseStudies as $caseStudy): ?>
            <li>
                <?= $caseStudy['Title'] ?>
                <a href="<?= base_url('dashboard/editCaseStudy/'.$caseStudy['CaseStudyID']) ?>">Edit</a>
                <a href="<?= base_url('dashboard/deleteCaseStudy/'.$caseStudy['CaseStudyID']) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Resources Listing -->
    <h2>Resources</h2>
    <ul>
        <?php foreach ($resources as $resource): ?>
            <li>
                <?= $resource['Title'] ?>
                <a href="<?= base_url('dashboard/editResource/'.$resource['ResourceID']) ?>">Edit</a>
                <a href="<?= base_url('dashboard/deleteResource/'.$resource['ResourceID']) ?>">Delete</a>
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
