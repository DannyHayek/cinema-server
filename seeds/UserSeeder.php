<?php
require "../connection/connection.php";

try {
    $queries = [
        "INSERT INTO users(name, email, phone_number, password, age, favorite_genre_id) VALUES ('admin','admin', 'admin', 'admin', 0, null);", 
        "INSERT INTO users(name, email, phone_number, password, age, favorite_genre_id) VALUES ('Bob','Bob@mail.com', '71385379', 'password', 20, 3);", 
        "INSERT INTO users(name, email, phone_number, password, age, favorite_genre_id) VALUES ('Alfred','Alfie@email.com', '123456', 'wordpass', null, 6);", 
        "INSERT INTO users(name, email, phone_number, password, age, favorite_genre_id) VALUES ('Eobard','Durge@coast.com', '123-456-789', 'bhaal', 34, null);", 
        "INSERT INTO users(name, email, phone_number, password, age, favorite_genre_id) VALUES ('Wyll','Blade@frontiers.com', '713-Avernus-317', 'Mizora', null, null);", 
        "INSERT INTO users(name, email, phone_number, password, age, favorite_genre_id) VALUES ('Test','test@test.com', '000-000', 'test', 99, 1);", 
    ];


    foreach($queries as $q) {
        $execute = $mysqli->prepare($q);
        $execute->execute();
    }

    echo "Users table successfully populated!";

} catch(Throwable $e) {
    echo $e;
}

