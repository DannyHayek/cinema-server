<?php
require "../connection/connection.php";

try {
    $query = "CREATE TABLE movies_has_actors(
          movies_id INT(11) NOT NULL, 
          actors_id INT(11) NOT NULL, 
          FOREIGN KEY (movies_id) REFERENCES movies(id), 
          FOREIGN KEY (actors_id) REFERENCES actors(id) 
          )";

$execute = $mysqli->prepare($query);
$execute->execute();

echo "Movies_has_actors table succesfully created";

} catch(Throwable $e) {
    echo $e;
}
