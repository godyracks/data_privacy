<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<?= $this->include('partials/_search-input') ?>
<?= $this->include('partials/_info-panel') ?>
<section class="timeline-section" style="background: url('<?= base_url('public/images/neon-map.jpg') ?>') no-repeat center center fixed; background-size: cover;">
<div id="timeline"></div>
</section>
<script>
    // Initialize the items
    let items = new vis.DataSet([
        {id: 1, content: 'India: Law 1', start: '2020-01-01', group: 1, className: 'timeline-item'},
        {id: 2, content: 'UK: Law 1', start: '2020-06-01', group: 2, className: 'timeline-item'},
        {id: 3, content: 'India: Law 2', start: '2021-01-01', group: 1, className: 'timeline-item'},
        {id: 4, content: 'UK: Law 2', start: '2021-06-01', group: 2, className: 'timeline-item'},
        {id: 5, content: 'India: Law 3', start: '2022-01-01', group: 1, className: 'timeline-item'},
        {id: 6, content: 'UK: Law 3', start: '2022-06-01', group: 2, className: 'timeline-item'}
    ]);

    // Create groups
    let groups = new vis.DataSet([
        {id: 1, content: 'India', className: 'timeline-item'},
        {id: 2, content: 'UK', className: 'timeline-item'}
    ]);

    // Configuration for the Timeline
    let options = {
        groupOrder: 'id'
    };

    // Create a Timeline
    let timeline = new vis.Timeline(document.getElementById('timeline'), items, groups, options);
</script>
<script async data-id="1655353366" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
<?= $this->endSection() ?>