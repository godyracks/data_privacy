<style>
/* Info Panel */
.info-panel {
    width: 450px;
    background-color: var(--body-bg);
    border-radius: 18px;
    position: absolute;
    top: 200px;
    left: 200px;
    z-index: 1001;
    transition: width 0.3s ease;
    margin: 0 auto;
}

.info-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 18px;
}

.info-title {
    font-weight: bold;
}
.country-button{
    border: black;
    border-radius: 18px;
    padding: 7px 15px;
    background-color: grey;
}
.country-button:hover{
    background-color: orange;
}

.panel-chevron {
    font-size: 24px;
    cursor: pointer;
}

.info-content {
    max-height: 500px; /* Increase to accommodate content */
    /* overflow: hidden; */
    height: 100px
    transition: height 0.3s ease, padding 0.3s ease;
    background-color: #FFFFFF;
    border-radius: 18px;
    margin-top: 2px;
    padding: 10px;
    padding-bottom: 200px;
}

.info-content.collapsed {
    max-height: 30px;
    padding: 0;
}

.tabs {
    display: flex;
    background-color: transparent;
    margin: 2px;
}

.tab-button {
    flex: 1;
    padding: 2px;
    background-color: transparent;
    border: none;
    cursor: pointer;
    text-align: center;
    color: #202124;
}

.tab-button.active {
    color: orange;
    border: 1px solid #007bff;
    border-radius: 18px;
    font-size: 12px;
}

.tab-content {
    padding: 10px;
}

.tab-panel {
    display: none;
}

.tab-panel.active {
    display: block;
}

@media (max-width: 768px) {
    .info-panel {
        width: 85%;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        position: absolute;
        top: 200px;
        left: 20px;
        z-index: 1001;
        transition: width 0.3s ease;
    }
}

</style>
<div class="info-panel">
    <div class="info-header">
        <span class="info-title">Information Panel</span>
        <span class="material-symbols-outlined panel-chevron" id="panel-chevron-icon">chevron_right</span>
    </div>
    <div class="info-content" id="info-content">
        <div class="tabs">
            <button class="tab-button active" data-tab="overview">Country</button>
            <button class="tab-button" data-tab="specific-laws">Specific Laws</button>
            <button class="tab-button" data-tab="case-studies">Case Studies</button>
        </div>
        <div class="tab-content">
            <div class="tab-panel active" id="overview">
                <div class="country-selector">
                    <button class="country-button" data-country-id="1">UK</button>
                    <button class="country-button" data-country-id="2">India</button>
                </div>
            </div>
            <div class="tab-panel" id="specific-laws">
                <p>No laws selected yet...</p>
            </div>
            <div class="tab-panel" id="case-studies">
                <p>No case studies selected yet...</p>
            </div>
        </div>
    </div>
</div>



<script>
// Collapse functionality for the panel
document.getElementById('panel-chevron-icon').addEventListener('click', function() {
    const content = document.getElementById('info-content');
    const chevron = document.getElementById('panel-chevron-icon');

    if (content.classList.contains('collapsed')) {
        content.classList.remove('collapsed');
        chevron.textContent = 'keyboard_arrow_up'; // Change chevron icon to up
    } else {
        content.classList.add('collapsed');
        chevron.textContent = 'chevron_right'; // Change chevron icon to right
    }
});

// Handling country selection and tab switching
document.querySelectorAll('.country-button').forEach(button => {
    button.addEventListener('click', function() {
        const countryId = this.dataset.countryId;

        // Fetch laws and case studies based on selected country
        fetch(`<?= site_url('panel/fetch-laws-and-case-studies/') ?>${countryId}`)
            .then(response => response.json())
            .then(data => {
                // Update the laws section
                const lawsPanel = document.getElementById('specific-laws');
                if (data.laws.length > 0) {
                    lawsPanel.innerHTML = '';
                    data.laws.forEach(law => {
                        const lawItem = `<p>${law.LawName}</p>`;
                        lawsPanel.innerHTML += lawItem;
                    });
                } else {
                    lawsPanel.innerHTML = '<p>No laws available</p>';
                }

                // Update the case studies section
                const caseStudiesPanel = document.getElementById('case-studies');
                if (data.caseStudies.length > 0) {
                    caseStudiesPanel.innerHTML = '';
                    data.caseStudies.forEach(caseStudy => {
                        const caseStudyItem = `<p>${caseStudy.Title}</p>`;
                        caseStudiesPanel.innerHTML += caseStudyItem;
                    });
                } else {
                    caseStudiesPanel.innerHTML = '<p>No case studies available</p>';
                }

                // Switch to the Specific Laws tab
                document.querySelector('.tab-button.active').classList.remove('active');
                document.querySelector('.tab-panel.active').classList.remove('active');
                document.querySelector('.tab-button[data-tab="specific-laws"]').classList.add('active');
                document.getElementById('specific-laws').classList.add('active');

                // Switch to the Case Studies tab
                document.querySelector('.tab-button.active').classList.remove('active');
                document.querySelector('.tab-panel.active').classList.remove('active');
                document.querySelector('.tab-button[data-tab="case-studies"]').classList.add('active');
                document.getElementById('case-studies').classList.add('active');
            })
            .catch(error => console.error('Error:', error));
    });
});

// Handling tab switching
const tabs = document.querySelectorAll('.tab-button');
tabs.forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelector('.tab-button.active').classList.remove('active');
        document.querySelector('.tab-panel.active').classList.remove('active');
        
        this.classList.add('active');
        document.getElementById(this.dataset.tab).classList.add('active');
    });
});

</script>