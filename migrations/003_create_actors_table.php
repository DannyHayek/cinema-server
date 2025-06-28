<?php
require "../connection/connection.php";

try {
    $query = "CREATE TABLE actors(
          id INT(11) AUTO_INCREMENT PRIMARY KEY, 
          name VARCHAR(255) NOT NULL, 
          age INT(3) 
          )";

$execute = $mysqli->prepare($query);
$execute->execute();

echo "Actors table succesfully created";

} catch(Throwable $e) {
    echo $e;
}
