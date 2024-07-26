<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<h1>Edit Resource</h1>

<form action="<?= site_url('dashboard/updateResource/' . $resource['id']) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="existingImage" value="<?= $resource['Image'] ?>">

    <label for="CountryID">Country ID:</label>
    <input type="text" name="CountryID" value="<?= $resource['CountryID'] ?>" required>

    <label for="Title">Title:</label>
    <input type="text" name="Title" value="<?= $resource['Title'] ?>" required>

    <label for="Type">Type:</label>
    <input type="text" name="Type" value="<?= $resource['Type'] ?>" required>

    <label for="URL">URL:</label>
    <input type="text" name="URL" value="<?= $resource['URL'] ?>" required>

    <label for="Date">Date:</label>
    <input type="date" name="Date" value="<?= $resource['Date'] ?>" required>

    <label for="Image">Image:</label>
    <input type="file" name="Image">

    <button type="submit">Update Resource</button>
</form>
<?= $this->endSection() ?>
