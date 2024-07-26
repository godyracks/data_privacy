<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<h1>Edit Law</h1>

<form action="<?= site_url('dashboard/updateLaw/' . $law['id']) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="existingImage" value="<?= $law['Image'] ?>">

    <label for="CountryID">Country ID:</label>
    <input type="text" name="CountryID" value="<?= $law['CountryID'] ?>" required>

    <label for="LawName">Law Name:</label>
    <input type="text" name="LawName" value="<?= $law['LawName'] ?>" required>

    <label for="Description">Description:</label>
    <textarea name="Description" required><?= $law['Description'] ?></textarea>

    <label for="KeyProvisions">Key Provisions:</label>
    <textarea name="KeyProvisions"><?= $law['KeyProvisions'] ?></textarea>

    <label for="Date">Date:</label>
    <input type="date" name="Date" value="<?= $law['Date'] ?>" required>

    <label for="Image">Image:</label>
    <input type="file" name="Image">

    <button type="submit">Update Law</button>
</form>
<?= $this->endSection() ?>
