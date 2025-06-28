<?php
require "../connection/connection.php";

try {
    $queries = ["INSERT INTO actors(name, age) VALUES ('Robert Downey Jr.', 60);", 
                "INSERT INTO actors(name, age) VALUES ('Cilian Murphy', null);", 
                "INSERT INTO actors(name, age) VALUES ('Arnold Schwarzenegger', 77);", 
                "INSERT INTO actors(name, age) VALUES ('Micheal J. Fox', 64);", 
                "INSERT INTO actors(name, age) VALUES ('Emilia Clarke', 38);", 
                "INSERT INTO actors(name, age) VALUES ('Mel Gibson', 69);", 
                "INSERT INTO actors(name, age) VALUES ('Ian McKellen', 86);", 
                "INSERT INTO actors(name, age) VALUES ('Elijah Wood', 44);", 
                "INSERT INTO actors(name, age) VALUES ('Morgan Freeman', 88);", 
                "INSERT INTO actors(name, age) VALUES ('Emilia Clarke', 38);", 
                "INSERT INTO actors(name, age) VALUES ('Gwyneth Paltrow', 52);", 
                "INSERT INTO actors(name, age) VALUES ('Christopher Lloyd', 86);", 
                "INSERT INTO actors(name, age) VALUES ('Christian Bale', 51);", 
                "INSERT INTO actors(name, age) VALUES ('Mason Thames', 17);", 
                "INSERT INTO actors(name, age) VALUES ('Gerard Butler', 55);", 
            ];


    foreach($queries as $q) {
        $execute = $mysqli->prepare($q);
        $execute->execute();
    }

    echo "Genres table successfully populated!";

} catch(Throwable $e) {
    echo $e;
}

