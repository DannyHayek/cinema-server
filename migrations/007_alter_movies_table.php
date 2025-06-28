<?php
require "../connection/connection.php";

try {
    $query = "ALTER TABLE movies ADD poster_url VARCHAR(255);";

$execute = $mysqli->prepare($query);
$execute->execute();

echo "Movies table succesfully altered";

} catch(Throwable $e) {
    echo $e;
}
