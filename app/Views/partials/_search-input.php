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
        // JavaScript for clearing input and closing the results div
        document.getElementById('clearSearch').addEventListener('click', function() {
            document.getElementById('searchInput').value = '';
            document.getElementById('clearSearch').style.display = 'none';
            document.getElementById('searchResults').style.display = 'none';
        });

        document.getElementById('searchInput').addEventListener('input', function() {
            if (this.value.length > 0) {
                document.getElementById('clearSearch').style.display = 'block';
                document.getElementById('searchResults').style.display = 'block';
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