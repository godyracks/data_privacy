<div class="info-panel">
    <div class="info-header">
        <span class="info-title">Information Panel</span>
        <span class="material-symbols-outlined panel-chevron" id="panel-chevron-icon">chevron_right</span>
    </div>
    <div class="info-content" id="info-content">
        <div class="tabs">
            <button class="tab-button active" data-tab="overview">Overview</button>
            <button class="tab-button" data-tab="specific-laws">Specific Laws</button>
            <button class="tab-button" data-tab="case-studies">Case Studies</button>
        </div>
        <div class="tab-content">
            <div class="tab-panel active" id="overview">
                <p>Overview content goes here...</p>
            </div>
            <div class="tab-panel" id="specific-laws">
                <p>Specific Laws content goes here...</p>
            </div>
            <div class="tab-panel" id="case-studies">
                <p>Case Studies content goes here...</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('panel-chevron-icon').addEventListener('click', function() {
        const content = document.getElementById('info-content');
        const chevron = document.getElementById('panel-chevron-icon');

        if (content.style.height === '0px' || content.style.height === '') {
            content.style.height = 'auto'; // Set height to auto to allow content to expand
            content.style.overflow = 'auto';
            chevron.textContent = 'keyboard_arrow_up';
        } else {
            content.style.height = '0';
            content.style.overflow = 'hidden';
            chevron.textContent = 'chevron_right';
        }
    });

    const tabs = document.querySelectorAll('.tab-button');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const activeTab = document.querySelector('.tab-button.active');
            const activePanel = document.querySelector('.tab-panel.active');

            if (activeTab) {
                activeTab.classList.remove('active');
            }

            if (activePanel) {
                activePanel.classList.remove('active');
            }

            this.classList.add('active');
            document.getElementById(this.dataset.tab).classList.add('active');
        });
    });
</script>
