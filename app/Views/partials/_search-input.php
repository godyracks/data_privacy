<style>
    .search-results {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        max-height: 450px;
        overflow-y: auto;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        display: none;
    }

    .search-results .result-item {
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .search-results .result-item:nth-child(odd) {
        background-color: #f9f9f9; /* Light gray for odd rows */
    }

    .search-results .result-item:nth-child(even) {
        background-color: #fff; /* White for even rows */
    }

    .search-results .result-item:last-child {
        border-bottom: none;
    }
</style>


<div class="search-container">
    <div class="search-bar">
        <span class="material-symbols-outlined search-icon">search</span>
        <input type="text" placeholder="Type to search for laws, documents..." class="search-input" id="searchInput">
        <span class="material-symbols-outlined clear-icon" id="clearSearch">close</span>
    </div>
    <div class="search-results" id="searchResults">
        <span class="material-symbols-outlined close-results" id="closeResults">close</span>
        <p class="default-message">No results found</p>
    </div>
</div>
<script>
    const API_URL = '<?= getenv('ENVIRONMENT') === 'production' ? getenv('SEARCH_API_URL_PRODUCTION') : getenv('SEARCH_API_URL_LOCAL') ?>';
</script>

<script>
    document.getElementById('clearSearch').addEventListener('click', function() {
        document.getElementById('searchInput').value = '';
        document.getElementById('clearSearch').style.display = 'none';
        document.getElementById('searchResults').style.display = 'none';
    });

    document.getElementById('searchInput').addEventListener('input', function() {
        const query = this.value;

        if (query.length > 0) {
            document.getElementById('clearSearch').style.display = 'block';
            document.getElementById('searchResults').style.display = 'block';

            fetch(`${API_URL}?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    const resultsDiv = document.getElementById('searchResults');
                    resultsDiv.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(item => {
                            const resultItem = document.createElement('div');
                            resultItem.className = 'result-item';
                            resultItem.innerHTML = `
                                <h4>${item.Type}: ${item.ReferenceID}</h4>
                                <p>${item.Content.text.substring(0, 100)}...</p>
                                ${item.Content.videoUrl ? `<a href="${item.Content.videoUrl}" target="_blank">Watch Video</a>` : ''}
                                ${item.Content.imageUrl ? `<img src="${item.Content.imageUrl}" alt="Image" style="max-width: 100px; height: auto;">` : ''}
                                ${item.Content.date ? `<p>Date: ${item.Content.date}</p>` : ''}
                            `;
                            resultsDiv.appendChild(resultItem);
                        });
                    } else {
                        resultsDiv.innerHTML = '<p class="default-message">No results found</p>';
                    }
                });
        } else {
            document.getElementById('clearSearch').style.display = 'none';
            document.getElementById('searchResults').style.display = 'none';
        }
    });

    document.getElementById('closeResults').addEventListener('click', function() {
        document.getElementById('searchResults').style.display = 'none';
    });

    document.getElementById('searchInput').addEventListener('focus', function() {
        document.getElementById('searchResults').style.display = 'block';
    });

    document.addEventListener('click', function(event) {
        const searchContainer = document.querySelector('.search-container');
        if (!searchContainer.contains(event.target)) {
            document.getElementById('searchResults').style.display = 'none';
        }
    });
</script>


