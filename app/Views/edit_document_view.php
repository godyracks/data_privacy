<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<h1>Edit Document</h1>

<form action="<?= site_url('dashboard/updateDocument/' . $document['id']) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="existingImage" value="<?= $document['Image'] ?>">

    <label for="CountryID">Country ID:</label>
    <input type="text" name="CountryID" value="<?= $document['CountryID'] ?>" required>

    <label for="DocumentName">Document Name:</label>
    <input type="text" name="DocumentName" value="<?= $document['DocumentName'] ?>" required>

    <label for="Description">Description:</label>
    <textarea name="Description" required><?= $document['Description'] ?></textarea>

    <label for="Type">Type:</label>
    <input type="text" name="Type" value="<?= $document['Type'] ?>" required>

    <label for="Date">Date:</label>
    <input type="date" name="Date" value="<?= $document['Date'] ?>" required>

    <label for="Image">Image:</label>
    <input type="file" name="Image">

    <button type="submit">Update Document</button>
</form>
<?= $this->endSection() ?>
