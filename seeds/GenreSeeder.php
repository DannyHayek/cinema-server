<?php
require "../connection/connection.php";

try {
    $queries = ["INSERT INTO genres(name) VALUES ('Action');", 
                "INSERT INTO genres(name) VALUES ('Adventure');", 
                "INSERT INTO genres(name) VALUES ('Horror');", 
                "INSERT INTO genres(name) VALUES ('Romance');", 
                "INSERT INTO genres(name) VALUES ('Thriller');", 
                "INSERT INTO genres(name) VALUES ('Sci-fi');", 
                "INSERT INTO genres(name) VALUES ('Comedy');", 
                "INSERT INTO genres(name) VALUES ('Drama');", 
                "INSERT INTO genres(name) VALUES ('Western');", 
                "INSERT INTO genres(name) VALUES ('Historical');"
            ];


    foreach($queries as $q) {
        $execute = $mysqli->prepare($q);
        $execute->execute();
    }

    echo "Genres table successfully populated!";

} catch(Throwable $e) {
    echo $e;
}

