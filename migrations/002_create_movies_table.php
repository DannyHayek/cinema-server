<?php
require "../connection/connection.php";

try {
    $query = "CREATE TABLE movies(
          id INT(11) AUTO_INCREMENT PRIMARY KEY, 
          name VARCHAR(255) NOT NULL, 
          synopsis TEXT(1000) NOT NULL, 
          length INT(11) NOT NULL, 
          age_rating VARCHAR(225) NOT NULL, 
          trailer_link VARCHAR(225) 
          )";

$execute = $mysqli->prepare($query);
$execute->execute();

echo "Movies table succesfully created";

} catch(Throwable $e) {
    echo $e;
}
