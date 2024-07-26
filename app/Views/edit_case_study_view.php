<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<h1>Edit Case Study</h1>

<form action="<?= site_url('dashboard/updateCaseStudy/' . $caseStudy['CaseStudyID']) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="existingImage" value="<?= $caseStudy['Image'] ?>">

    <label for="CountryID">Country ID:</label>
    <input type="text" name="CountryID" value="<?= $caseStudy['CountryID'] ?>" required>

    <label for="Title">Title:</label>
    <input type="text" name="Title" value="<?= $caseStudy['Title'] ?>" required>

    <label for="Summary">Summary:</label>
    <textarea id="edit-summary" name="Summary" required><?= $caseStudy['Summary'] ?></textarea>

    <label for="Date">Date:</label>
    <input type="date" name="Date" value="<?= $caseStudy['Date'] ?>" required>

    <label for="Image">Image:</label>
    <input type="file" name="Image">

    <button type="submit">Update Case Study</button>
</form>
<?= $this->endSection() ?>
