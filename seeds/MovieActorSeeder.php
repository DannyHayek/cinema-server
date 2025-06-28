<?php
require "../connection/connection.php";

try {
    $queries = ["INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (1, 1);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (1, 12);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (3, 4);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (4, 5);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (4, 13);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (5, 8);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (5, 9);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (6, 11);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (7, 10);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (8, 14);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (9, 7);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (10, 15);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (10, 16);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (11, 3);", 
                "INSERT INTO movies_has_actors(movies_id, actors_id) VALUES (11, 1);", 
            ];


    foreach($queries as $q) {
        $execute = $mysqli->prepare($q);
        $execute->execute();
    }

    echo "Movies_has_actors table successfully populated!";

} catch(Throwable $e) {
    echo $e;
}

