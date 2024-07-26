<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="heading">Edit Law</h1>

    <form action="<?= site_url('sivasakthi-dashboard/updateLaw/' . $law['LawID']) ?>" method="post" enctype="multipart/form-data" class="form">
        <input type="hidden" name="existingImage" value="<?= esc($law['Image']) ?>">

        <label for="CountryID" class="form-label">Country ID:</label>
        <input type="text" name="CountryID" value="<?= esc($law['CountryID']) ?>" class="form-input" required>

        <label for="LawName" class="form-label">Law Name:</label>
        <input type="text" name="LawName" value="<?= esc($law['LawName']) ?>" class="form-input" required>

        <label for="Description" class="form-label">Description:</label>
        <textarea id="edit-law" name="Description" class="form-textarea" required><?= esc($law['Description']) ?></textarea>

        <label for="KeyProvisions" class="form-label">Key Provisions:</label>
        <textarea id="edit-provision" name="KeyProvisions" class="form-textarea"><?= esc($law['KeyProvisions']) ?></textarea>

        <label for="Date" class="form-label">Date:</label>
        <input type="date" name="Date" value="<?= esc($law['Date']) ?>" class="form-input" required>

        <label for="Image" class="form-label">Image:</label>
        <input type="file" name="Image" class="form-input">

        <button type="submit" class="form-button">Update Law</button>
    </form>
</div>

<style>
.container {
    max-width: 600px;
    margin: 0 auto; /* Centers the container horizontally */
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.heading {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
    text-align: center; /* Centers the heading */
}

.form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-label {
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 5px;
    color: #666;
}

.form-input, .form-textarea {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-textarea {
    resize: vertical;
    min-height: 150px;
}

.form-input:focus, .form-textarea:focus {
    border-color: #468EEE;
    outline: none;
    box-shadow: 0 0 0 2px rgba(70, 142, 238, 0.2);
}

.form-button {
    padding: 10px 20px;
    font-size: 1rem;
    color: #fff;
    background-color: #468EEE;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-button:hover {
    background-color: #357bd6;
}

.form-button:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(70, 142, 238, 0.2);
}
</style>

<?= $this->endSection() ?>
