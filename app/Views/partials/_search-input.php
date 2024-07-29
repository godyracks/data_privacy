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
        margin-top: 5px;
      
    }

    .search-results .result-item {
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .search-results .result-item:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .search-results .result-item:nth-child(even) {
        background-color: #fff;
    }

    .search-results .result-item:last-child {
        border-bottom: none;
    }

    .search-results .result-item a {
        text-decoration: none;
        color: inherit; /* Inherit color from parent */
        display: block; /* Make the entire result-item clickable */
    }

    .search-results .result-item a:hover {
        background-color: #f0f0f0; /* Highlight on hover */
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
    const API_URL = '<?= getenv('SEARCH_API_URL') ?>';

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

                            // Ensure item.type is defined and construct URL accordingly
                            if (item.type && item.title) {
                                let url = '';
                                const titleHyphenated = item.title.toLowerCase().replace(/\s+/g, '-');

                                switch(item.type.toLowerCase()) {
                                    case 'law':
                                        url = `/view-more/law/${item.id}/${titleHyphenated}`;
                                        break;
                                    case 'document':
                                        url = `/view-more/document/${item.id}/${titleHyphenated}`;
                                        break;
                                    case 'case study':
                                        url = `/view-more/case-studies/${item.id}`;
                                        break;
                                    default:
                                        url = '#'; // Fallback URL
                                }

                                resultItem.innerHTML = `
                                    <a href="${url}" target="_blank">
                                        <h4>${item.title}</h4>
                                        <p>${item.content}</p>
                                    </a>
                                `;
                            } else {
                                resultItem.innerHTML = `
                                    <h4>${item.title || 'Untitled'}</h4>
                                    <p>${item.content || 'No content available'}</p>
                                `;
                            }
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
