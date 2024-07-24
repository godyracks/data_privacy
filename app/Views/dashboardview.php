<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<h1>Countries</h1>
<form action="<?= base_url('dashboard/add-country') ?>" method="post">
    <input type="text" name="CountryName" placeholder="Country Name" required>
    <input type="text" name="CountryCode" placeholder="Country Code" required>
    <button type="submit">Add Country</button>
</form>
<ul>
    <?php foreach ($countries as $country): ?>
        <li><?= $country['CountryName'] ?> (<?= $country['CountryCode'] ?>)</li>
    <?php endforeach; ?>
</ul>

<h1>Laws</h1>
<form action="<?= base_url('dashboard/add-law') ?>" method="post" enctype="multipart/form-data">
    <select name="CountryID">
        <?php foreach ($countries as $country): ?>
            <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="LawName" placeholder="Law Name" required>
    <textarea name="Description" placeholder="Description"></textarea>
    <textarea name="KeyProvisions" placeholder="Key Provisions"></textarea>
    <input type="date" name="Date" required>
    <input type="file" name="Image" accept="image/*">
    <button type="submit">Add Law</button>
</form>


<h1>Documents</h1>
<form action="<?= base_url('dashboard/add-document') ?>" method="post" enctype="multipart/form-data">
    <select name="CountryID">
        <?php foreach ($countries as $country): ?>
            <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="DocumentName" placeholder="Document Name" required>
    <textarea name="Description" placeholder="Description"></textarea>
    <select name="Type">
        <option value="Amendment">Amendment</option>
        <option value="Ruling">Ruling</option>
        <option value="Policy">Policy</option>
        <option value="Programme">Programme</option>
    </select>
    <input type="file" name="Image" accept="image/*">
    <input type="date" name="Date" required>
    <button type="submit">Add Document</button>
</form>

<h1>Case Studies</h1>
<form action="<?= base_url('dashboard/add-case-study') ?>" method="post" enctype="multipart/form-data">
    <select name="CountryID">
        <?php foreach ($countries as $country): ?>
            <option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="Title" placeholder="Title" required>
    <textarea name="Summary" placeholder="Summary"></textarea>
    <input type="file" name="Image" accept="image/*">
    <input type="date" name="Date" required>
    <button type="submit">Add Case Study</button>
</form>

<h1>Resources</h1>
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
    <input type="file" name="Image" accept="image/*">
    <input type="date" name="Date" required>
    <button type="submit">Add Resource</button>
</form>

<!-- Add forms for SearchIndex and display lists for each table as needed -->
<?= $this->endSection() ?>
