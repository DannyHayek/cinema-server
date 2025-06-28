<?php

require("../models/Model.php");
require("../models/Movie.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $movie = Movie::select($mysqli, $id);

    if ($movie == null) {
        return null;
    }

    $response["movie"] = $movie->toArray();

    echo json_encode($movie);
    return;
}

if(isset($_GET["name"])){
    $movies = getAllUsers($mysqli);
    $name = $_GET["name"];
    $response["movies"] = "";

    foreach($movies["users"] as $m) {

       if ($m[1] == $name) {
            echo json_encode($m);
            return;
       }
    }

    return;
}

// if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone_number"]) && isset($_POST["password"]) && isset($_POST["favGenre"])) {
//     User::insert($mysqli, $_POST["name"], $_POST["email"], $_POST["phone_number"], $_POST["password"], $_POST["age"], $_POST["favGenre"]);
//     return;
// }

echo json_encode(getAllMovies($mysqli));

function getAllMovies ($mysqli) {
    $movies = Movie::selectAll($mysqli);

    $response["movies"] = [];

    foreach($movies as $m) {
        // echo json_encode($u);
        $response["movies"][] = $m->toArray();
    }

    return $response;
}
