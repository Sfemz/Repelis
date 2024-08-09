document.addEventListener('DOMContentLoaded', function() {
    loadMovies();
});

function loadMovies() {
    fetch('backend/data/movies.json')
        .then(response => response.json())
        .then(data => {
            const moviesDiv = document.getElementById('movies');
            moviesDiv.innerHTML = '';
            data.forEach((movie, index) => {
                const div = document.createElement('div');
                div.innerHTML = `
                    <h3>${movie.name}</h3>
                    <a href="${movie.movie_url}" target="_blank">
                        <img src="${movie.cover_url}" alt="${movie.name}">
                    </a>
                    <p>${movie.description || 'Sin descripción disponible.'}</p>
                    <button onclick="deleteMovie(${index})">Eliminar</button>
                `;
                moviesDiv.appendChild(div);
            });
        });
}

function addMovie() {
    const name = document.getElementById('name').value;
    const cover_url = document.getElementById('cover_url').value;
    const movie_url = document.getElementById('movie_url').value;
    const description = document.getElementById('description').value;

    const movie = { name, cover_url, movie_url, description };

    fetch('backend/add_movie.php', {
        method: 'POST',
        body: JSON.stringify(movie)
    }).then(() => {
        loadMovies();
    });
}

function deleteMovie(index) {
    fetch('backend/delete_movie.php', {
        method: 'POST',
        body: JSON.stringify(index)
    }).then(() => {
        loadMovies();
    });
}
