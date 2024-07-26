<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    /* Add your custom styles here */
</style>

<?= $this->include('partials/_search-input') ?>
<?= $this->include('partials/_info-panel') ?>
<div id="map"></div>

<!-- Modal Structure -->
<div id="infoModal" class="map-modal">
    <div class="map-modal-content" style="max-width: 600px;">
        <span class="map-modal-close">&times;</span>
        <h2 style="font-weight: bold; color: black;">Country: <span id="modal-country"></span></h2>
        
        <h3 style="color: blue;">Major Legislation:</h3>
        <div id="modal-legislation" style="color: black;"></div>
        <div id="modal-legislation-snippet"></div>
        <a id="modal-legislation-link" style="display: none;" href="#" target="_blank">Read full law document</a>

        <h3 style="color: blue;">Recent Updates:</h3>
        <div id="modal-updates" style="color: black;"></div>

        <h3 style="color: blue;">Case Studies:</h3>
        <div id="modal-case-studies"></div>

        <h3 style="color: blue;">Related Resources:</h3>
        <div id="modal-resources"></div>
    </div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.fullscreen/Control.FullScreen.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen/Control.FullScreen.css" />

<script>
    const map = L.map('map').setView([20, 0], 2);

    const tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    const satelliteLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> contributors'
    });

    const baseLayers = {
        "Street Map": tileLayer,
        "Satellite Map": satelliteLayer
    };

    L.control.layers(baseLayers).addTo(map);
    L.control.fullscreen().addTo(map);
    L.control.zoom({ position: 'topright' }).addTo(map);

    const countryStyle = {
        color: 'orange',
        fillColor: 'orange',
        fillOpacity: 0.1
    };

    const indiaCoords = [[8.4, 68.7], [37.6, 97.25]];
    const ukCoords = [[49.9, -8.6], [60.9, 1.8]];

    L.rectangle(indiaCoords, countryStyle).addTo(map).bindPopup('India');
    L.rectangle(ukCoords, countryStyle).addTo(map).bindPopup('UK');

    // Prepare laws data from PHP
    const laws = <?= json_encode($laws) ?>;
    const ukCaseStudies = <?= json_encode($ukCaseStudies) ?>;
    const indiaCaseStudies = <?= json_encode($indiaCaseStudies) ?>;
    const ukResources = <?= json_encode($ukResources) ?>;
    const indiaResources = <?= json_encode($indiaResources) ?>;

    const markersLayer = L.layerGroup().addTo(map);

    const lawCoordinates = {
        1: [
            [51.5074, -0.1278],
            [55.9533, -3.1883],
            [53.483959, -2.244644],
            [52.4862, -1.8904],
            [54.9784, -1.6174],
            [51.4816, -3.1791]
        ],
        2: [
            [22.9734, 78.6569],
            [28.7041, 77.1025],
            [19.0760, 72.8777],
            [15.2993, 74.1240],
            [12.9716, 77.5946],
            [26.9124, 75.7873]
        ]
    };

    const usedCoordinates = { 1: [], 2: [] };
    const maxMarkers = 6;
    let markerCount = 0;

    laws.forEach(law => {
        if (markerCount >= maxMarkers) return;

        const countryId = law.CountryID;
        const latlng = lawCoordinates[countryId][usedCoordinates[countryId].length % lawCoordinates[countryId].length];

        L.marker(latlng).addTo(markersLayer)
            .bindTooltip(law.LawName)
            .bindPopup(`<b>${law.LawName}</b><br>Click for more info`)
            .on('click', () => {
                showModal(law, countryId);
            });

        usedCoordinates[countryId].push(latlng);
        markerCount++;
    });

    function showModal(data, countryId) {
    document.getElementById('modal-country').innerText = countryId == 1 ? 'UK' : 'India';
    document.getElementById('modal-legislation').innerHTML = `<strong>${data.LawName}</strong>`;
    
    const legislationContent = data.Content || ''; 
    const legislationSnippet = legislationContent.split(' ').slice(0, 6).join(' ') + '...';
    document.getElementById('modal-legislation-snippet').innerText = legislationSnippet;

    const lawId = data.LawID; // Use LawID here
    document.getElementById('modal-legislation-link').href = `<?= site_url('view-more/law/') ?>${lawId}/<?= url_title('LawNamePlaceholder', '-', true) ?>`.replace('LawNamePlaceholder', data.LawName);
    
    document.getElementById('modal-legislation-link').style.display = 'block';

    const recentUpdates = countryId == 1 ? (data.UKUpdates || []) : (data.IndiaUpdates || []);
    document.getElementById('modal-updates').innerHTML = recentUpdates.length > 0 ? recentUpdates.join(', ') : 'None';

    const caseStudies = countryId == 1 ? ukCaseStudies : indiaCaseStudies;
    const caseStudiesList = caseStudies.map((cs, index) => `
        <div>
            <strong>Case Study ${index + 1}:</strong> ${cs.Title}<br>
            <a href="<?= site_url('view-more/case-study/') ?>${cs.CaseStudyID}/<?= url_title('${cs.Title}', '-', true) ?>" target="_blank">View More</a>
        </div>
    `).join('');

    document.getElementById('modal-case-studies').innerHTML = caseStudiesList;

    const resources = countryId == 1 ? ukResources : indiaResources;
    const resourcesList = resources.map(r => `
        <div style="text-decoration: underline;">
            <a href="${r.URL}" target="_blank">${r.Title}</a>
        </div>
    `).join('');
    document.getElementById('modal-resources').innerHTML = resourcesList;

    document.getElementById('infoModal').style.display = 'block';
}

    document.querySelector('.map-modal-close').onclick = function() {
        document.getElementById('infoModal').style.display = 'none';
    };

    window.onclick = function(event) {
        if (event.target == document.getElementById('infoModal')) {
            document.getElementById('infoModal').style.display = 'none';
        }
    };
</script>
<script async data-id="1655353366" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
<?= $this->endSection() ?>
