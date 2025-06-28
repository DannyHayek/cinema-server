<?php
require "../connection/connection.php";

try {
    $query = "CREATE TABLE genres(
          id INT(11) AUTO_INCREMENT PRIMARY KEY, 
          name VARCHAR(255) NOT NULL 
          )";

$execute = $mysqli->prepare($query);
$execute->execute();

echo "Genres table succesfully created";

} catch(Throwable $e) {
    echo $e;
}
