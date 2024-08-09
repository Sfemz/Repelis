<?php
$data = file_get_contents('php://input');
$movie_index = json_decode($data, true);

$current_data = file_get_contents('data/movies.json');
$array_data = json_decode($current_data, true);

unset($array_data[$movie_index]);
$array_data = array_values($array_data);

file_put_contents('data/movies.json', json_encode($array_data));

echo json_encode($array_data);
?>
