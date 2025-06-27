<?php
require "../connection/connection.php";

try {
    $query = "CREATE TABLE users(
          id INT(11) AUTO_INCREMENT PRIMARY KEY, 
          name VARCHAR(255) NOT NULL, 
          email VARCHAR(255) NOT NULL, 
          phone_number VARCHAR(255) NOT NULL, 
          password VARCHAR(255) NOT NULL
          )";

$execute = $mysqli->prepare($query);
$execute->execute();

echo "Users table succesfully created";

} catch(Throwable $e) {
    echo $e;
}

