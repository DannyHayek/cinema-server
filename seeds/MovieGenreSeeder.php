<?php
require "../connection/connection.php";

try {
    $queries = ["INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (1, 1);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (3, 1);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (3, 6);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (4, 6);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (4, 8);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (5, 1);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (6, 4);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (6, 7);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (7, 5);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (8, 3);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (9, 1);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (9, 10);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (10, 1);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (11, 5);", 
                "INSERT INTO movies_has_genres(movies_id, genres_id) VALUES (11, 10);", 
            ];


    foreach($queries as $q) {
        $execute = $mysqli->prepare($q);
        $execute->execute();
    }

    echo "Movies_has_genres table successfully populated!";

} catch(Throwable $e) {
    echo $e;
}

