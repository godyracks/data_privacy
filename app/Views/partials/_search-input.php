<style>
/* Search Results Container */
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
    color: black !important;
}

/* Result Item */
.search-results .result-item {
    padding: 0; /* Remove padding */
    border-bottom: 1px solid #eee;
    color: black !important;
}

/* Alternate Background Colors for Result Items */
.search-results .result-item:nth-child(odd) {
    background-color: #f9f9f9;
    color: black !important;
}

.search-results .result-item:nth-child(even) {
    background-color: #fff;
    color: black !important;
}

/* Remove Bottom Border for Last Item */
.search-results .result-item:last-child {
    border-bottom: none;
}

/* Anchor Tag Styles */
.search-results .result-item a {
    display: block;
    text-decoration: none;
    color: black !important;
    padding: 10px;
    box-sizing: border-box;
    width: 100%;
    height: 100%;
}

/* Hover State for Links */
.search-results .result-item a:hover {
    background-color: #f0f0f0; /* Slightly different background on hover */
}

/* Search Container */
.search-container {
    position: relative;
}

/* Search Bar */
.search-bar {
    display: flex;
    align-items: center;
}

/* Search Input */
.search-bar .search-input {
    flex: 1;
}

/* Search Icons */
.search-bar .search-icon, 
.search-bar .clear-icon {
    cursor: pointer;
}

/* Default Message */
.default-message {
    padding: 10px;
    text-align: center;
    color: #888; /* Color for default message */
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
const API_URL = '<?= site_url('live-search/search') ?>'; // Ensure this is correct

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
                console.log(data); // Debugging: Check the data structure

                const resultsDiv = document.getElementById('searchResults');
                resultsDiv.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(item => {
                        const resultItem = document.createElement('div');
                        resultItem.className = 'result-item';

                        // Ensure item.Type and item.ReferenceID are defined
                        if (item.Type && item.ReferenceID && item.hyphenated_title) {
                            let url = '';

                            switch (item.Type.toLowerCase()) {
                                case 'document':
                                    url = `/view-more/document/${item.ReferenceID}/${item.hyphenated_title}`;
                                    break;
                                case 'case study':
                                    url = `/view-more/case-study/${item.ReferenceID}/${item.hyphenated_title}`;
                                    break;
                                case 'law':
                                    url = `/view-more/law/${item.ReferenceID}/${item.hyphenated_title}`;
                                    break;
                                default:
                                    url = '#'; // Fallback URL
                            }

                            resultItem.innerHTML = `
                                <a href="${url}" target="_blank">
                                    <h4>${item.title || 'Untitled'}</h4>
                                </a>
                            `;
                        } else {
                            resultItem.innerHTML = `
                                <a href="#">
                                    <h4>${item.title || 'Untitled'}</h4>
                                </a>
                            `;
                        }
                        resultsDiv.appendChild(resultItem);
                    });
                } else {
                    resultsDiv.innerHTML = '<p class="default-message">No results found</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
                document.getElementById('searchResults').innerHTML = '<p class="default-message">An error occurred while searching</p>';
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
