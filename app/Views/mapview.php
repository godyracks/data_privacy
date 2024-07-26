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
    <div class="map-modal-content">
        <span class="map-modal-close">&times;</span>
        <h2>Biometric Data Privacy Laws</h2>
        <p>Country: <span id="modal-country"></span></p>
        <h3>Major Legislation:</h3>
        <ul id="modal-legislation"></ul>
        <h3>Recent Updates:</h3>
        <ul id="modal-updates"></ul>
        <h3>Case Studies:</h3>
        <ul id="modal-case-studies"></ul>
        <h3>Related Resources:</h3>
        <ul id="modal-resources"></ul>
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
    const laws = <?= json_encode($laws) ?>; // Pass the laws from PHP to JavaScript

    const markersLayer = L.layerGroup().addTo(map);

    // Define the coordinates for markers based on CountryID
    const lawCoordinates = {
        1: [ // UK coordinates
            [51.5074, -0.1278], // Marker 1 for UK
            [55.9533, -3.1883], // Marker 2 for UK
            [53.483959, -2.244644], // Marker 3 for UK
            [52.4862, -1.8904], // Marker 4 for UK
            [54.9784, -1.6174], // Marker 5 for UK
            [51.4816, -3.1791]  // Marker 6 for UK
        ],
        2: [ // India coordinates
            [22.9734, 78.6569], // Marker 1 for India
            [28.7041, 77.1025], // Marker 2 for India
            [19.0760, 72.8777], // Marker 3 for India
            [15.2993, 74.1240], // Marker 4 for India
            [12.9716, 77.5946], // Marker 5 for India
            [26.9124, 75.7873]  // Marker 6 for India
        ]
    };

    // Create an array to store used coordinates
    const usedCoordinates = {
        1: [],
        2: []
    };

    // Limit the number of markers to 6
    const maxMarkers = 6;

    // Counter for markers
    let markerCount = 0;

    laws.forEach(law => {
        if (markerCount >= maxMarkers) return; // Stop if we reach the limit

        const countryId = law.CountryID;

        // Use the next available coordinate for the respective country
        const latlng = lawCoordinates[countryId][usedCoordinates[countryId].length % lawCoordinates[countryId].length];

        // Add the marker to the map
        L.marker(latlng).addTo(markersLayer)
            .bindTooltip(law.LawName)
            .bindPopup(`<b>${law.LawName}</b><br>Click for more info`)
            .on('click', () => {
                showModal(law);
            });

        // Track used coordinates
        usedCoordinates[countryId].push(latlng);
        markerCount++; // Increment the marker count
    });

    function showModal(data) {
        document.getElementById('modal-country').innerText = data.CountryID == 1 ? 'UK' : 'India';
        document.getElementById('modal-legislation').innerHTML = `
            <li>${data.LawName}</li>
        `;
        // Populate other modal sections similarly...
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
<?= $this->endSection() ?>
