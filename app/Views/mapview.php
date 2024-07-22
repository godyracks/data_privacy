<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<style>
    #map {
        height: 100vh;
        width: 100%;
    }

    .map-modal {
        display: none; 
        position: fixed; 
        z-index: 1001; 
        left: 0; 
        top: 0; 
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0, 0, 0, 0.8); 
    }

    .map-modal-content {
        background-color: white; 
        margin: 15% auto; 
        padding: 20px; 
        border: 1px solid #888; 
        width: 80%; 
    }

    .map-modal-close {
        color: #aaa; 
        float: right; 
        font-size: 28px; 
        font-weight: bold; 
    }

    .map-modal-close:hover, .map-modal-close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<?= $this->include('partials/_search-input') ?>
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

    const markers = [
        { latlng: [22.9734, 78.6569], country: 'India', type: 'law', info: 'Information Technology Act (2000)' },
        { latlng: [28.7041, 77.1025], country: 'India', type: 'law', info: 'Aadhaar Act (2016)' },
        { latlng: [19.0760, 72.8777], country: 'India', type: 'law', info: 'Personal Data Protection Bill (2019)' },
        { latlng: [15.2993, 74.1240], country: 'India', type: 'law', info: 'Data Protection Law (2021)' },
        { latlng: [12.9716, 77.5946], country: 'India', type: 'law', info: 'Digital Information Security in Healthcare Act (DISHA)' },
        { latlng: [51.5074, -0.1278], country: 'UK', type: 'law', info: 'Data Protection Act (2018)' },
        { latlng: [55.9533, -3.1883], country: 'UK', type: 'law', info: 'General Data Protection Regulation (GDPR)' },
        { latlng: [53.483959, -2.244644], country: 'UK', type: 'law', info: 'Surveillance Camera Code of Practice (2013)' },
        { latlng: [51.4816, -3.1791], country: 'UK', type: 'law', info: 'Biometrics and Surveillance Camera Commissioner (2020)' },
        { latlng: [54.9784, -1.6174], country: 'UK', type: 'law', info: 'Protection of Freedoms Act (2012)' }
    ];

    const scales = [
        { latlng: [26.9124, 75.7873], country: 'India', type: 'scale', info: 'Amendment to the IT Act (2021)' },
        { latlng: [25.3176, 82.9739], country: 'India', type: 'scale', info: 'Supreme Court Ruling (2018)' },
        { latlng: [13.0827, 80.2707], country: 'India', type: 'scale', info: 'Digital India Programme (2015)' },
        { latlng: [52.4862, -1.8904], country: 'UK', type: 'scale', info: 'ICO Guidance on Biometrics (2021)' },
        { latlng: [53.4084, -2.9916], country: 'UK', type: 'scale', info: 'Court of Appeal Ruling on Police Use of Facial Recognition (2020)' },
        { latlng: [51.4545, -2.5879], country: 'UK', type: 'scale', info: 'ICO Regulatory Action Policy (2018)' }
    ];

    const markersLayer = L.layerGroup().addTo(map);

    markers.forEach(marker => {
        L.marker(marker.latlng).addTo(markersLayer)
            .bindTooltip(marker.info)
            .bindPopup(`<b>${marker.info}</b><br>Click for more info`)
            .on('click', () => {
                showModal(marker);
            });
    });

    scales.forEach(scale => {
        L.circleMarker(scale.latlng, { radius: 10, fillColor: "orange", color: "orange", weight: 1 }).addTo(markersLayer)
            .bindTooltip(scale.info)
            .bindPopup(`<b>${scale.info}</b><br>Click for more info`)
            .on('click', () => {
                showModal(scale);
            });
    });

    function showModal(data) {
        document.getElementById('modal-country').innerText = data.country;
        document.getElementById('modal-legislation').innerHTML = data.type === 'law' ? `
            <li>${data.info}</li>
        ` : '';
        document.getElementById('modal-updates').innerHTML = data.type === 'scale' ? `
            <li>${data.info}</li>
        ` : '';
        document.getElementById('modal-case-studies').innerHTML = `
            <li>Case Study 1: Overview of the privacy issues raised by the Aadhaar system</li>
            <li>Case Study 2: Details of a significant data breach and its implications</li>
        `;
        document.getElementById('modal-resources').innerHTML = `
            <li>Whitepaper: Biometric Data Privacy in ${data.country}</li>
            <li>Video: Understanding ${data.info.split(' ')[0]}</li>
        `;
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
