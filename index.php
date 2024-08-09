<?php
$data = file_get_contents('backend/data/movies.json');
$movies = json_decode($data, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1><span class="highlight">test</span> Movie</h1>
        <input type="text" placeholder="Buscar película...">
        <p>Última actualización: <?php echo date("d/m/y"); ?></p>
    </header>
    <div class="movie-grid">
        <?php foreach ($movies as $movie): ?>
            <div class="movie">
                <a href="<?php echo $movie['movie_url']; ?>" target="_blank">
                    <img src="<?php echo $movie['cover_url']; ?>" alt="<?php echo $movie['name']; ?>">
                </a>
                <h3><?php echo $movie['name']; ?></h3>
                <p><?php echo isset($movie['description']) ? $movie['description'] : 'Sin descripción disponible.'; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
