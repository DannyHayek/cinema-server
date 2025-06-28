<?php
require "../connection/connection.php";

try {
    $query = "CREATE TABLE movies_has_genres(
          movies_id INT(11) NOT NULL, 
          genres_id INT(11) NOT NULL, 
          FOREIGN KEY (movies_id) REFERENCES movies(id), 
          FOREIGN KEY (genres_id) REFERENCES genres(id) 
          )";

$execute = $mysqli->prepare($query);
$execute->execute();

echo "Movies_has_genres table succesfully created";

} catch(Throwable $e) {
    echo $e;
}
