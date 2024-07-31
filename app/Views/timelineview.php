<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<?= $this->include('partials/_search-input') ?>
<?= $this->include('partials/_info-panel') ?>
<section class="timeline-section" style="background: url('<?= base_url('public/images/neon-map.jpg') ?>') no-repeat center center fixed; background-size: cover;">
    <div id="timeline"></div>
</section>
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
</script>

<?= $this->endSection() ?>
