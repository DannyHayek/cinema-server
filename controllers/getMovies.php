<?php

require("../models/Model.php");
require("../models/Movie.php");
require("../models/Genre.php");
require("../models/MovieGenre.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $movie = Movie::select($mysqli, $id);
    $genresRaw = MovieGenre::selectAll($mysqli, $id);
    $genreID = [];
    $genreNames = [];
    
    if ($movie == null) {
        return null;
    }

    $response["movie"] = $movie->toArray();
    foreach($genresRaw as $g) {
        $genreID[] = $g->toArray();
    }

    foreach($genreID as $g) {
        $genreNames[] = Genre::select($mysqli, $g[1])->toArray();
    }

    $response["genre"] = $genreNames;

    echo json_encode($response);
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

if(isset($_POST["name"]) && isset($_POST["synopsis"]) && isset($_POST["length"]) && isset($_POST["age_rating"]) && isset($_POST["trailer_link"])) {
    Movie::insert($mysqli, $_POST["name"], $_POST["synopsis"], $_POST["length"], $_POST["age_rating"], $_POST["trailer_link"]);
    return;
}

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
