<?php
require "../connection/connection.php";

try {
    $queries = [];


    foreach($queries as $q) {
        $execute = $mysqli->prepare($q);
        $execute->execute();
    }

    echo "Movies table successfully populated!";

} catch(Throwable $e) {
    echo $e;
}
