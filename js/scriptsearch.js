document.addEventListener('DOMContentLoaded', () => {
    const searchIcon = document.querySelector('.fa-magnifying-glass');
    const searchInput = document.getElementById('search-input');
    const searchForm = document.getElementById('search-form');
    const modal = document.getElementById('modal');
    const closeModal = document.querySelector('.close');
    const resultsDiv = document.getElementById('results');

    searchIcon.addEventListener('click', () => {
        searchInput.classList.toggle('show');
        if (searchInput.classList.contains('show')) {
            searchInput.focus();
        }
    });

    searchForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        const query = searchInput.value.trim();
        if (query) {
            try {
                const movies = await searchMovies(query);
                displayResults(movies);
                modal.style.display = 'block';
            } catch (error) {
                console.error('Error fetching movies:', error);
                displayResults([]);
            }
        }
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    async function searchMovies(query) {
        try {
            const response = await fetch(`http://localhost/searchfile.php?title=${encodeURIComponent(query)}`);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();
            return data.movies; // Assumes the API response has a "movies" field containing the list of movies
        } catch (error) {
            console.error('Error fetching data:', error);
            return [];
        }
    }

    function displayResults(movies) {
        resultsDiv.innerHTML = '';
        if (movies.length > 0) {
            const ul = document.createElement('ul');
            movies.forEach(movie => {
                const li = document.createElement('li');
                const img = document.createElement('img');
                img.src = movie.image;
                const span = document.createElement('span');
                span.textContent = movie.title;
                li.appendChild(img);
                li.appendChild(span);
                ul.appendChild(li);
            });
            resultsDiv.appendChild(ul);
        } else {
            resultsDiv.innerHTML = '<p>No results found</p>';
        }
    }
});
