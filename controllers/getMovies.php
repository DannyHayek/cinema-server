<?php

require("../models/Model.php");
require("../models/Movie.php");
require("../models/Genre.php");
require("../models/Actor.php");
require("../models/MovieGenre.php");
require("../models/MovieActor.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $movie = Movie::select($mysqli, $id);
    $response["movie"] = $movie->toArray();

    if ($movie == null) {
        return null;
    }

    $genresRaw = MovieGenre::selectAll($mysqli, $id);
    $genreID = [];
    $genreNames = [];

    foreach($genresRaw as $g) {
        $genreID[] = $g->toArray();
    }

    foreach($genreID as $g) {
        $genreNames[] = Genre::select($mysqli, $g[1])->toArray();
    }

    $response["genre"] = $genreNames;


    $actorsRaw = MovieActor::selectAll($mysqli, $id);
    $actorID = [];
    $actorNames = [];

    foreach($actorsRaw as $a) {
        $actorID[] = $a->toArray();
    }

    foreach($actorID as $a) {
        $actorNames[] = Actor::select($mysqli, $a[1])->toArray();
    }

    $response["actor"] = $actorNames;


    echo json_encode($response);
    return;
}

$movies = Movie::selectAll($mysqli);

$response["movies"] = [];

foreach($movies as $m) {
    // echo json_encode($u);
    $response["movies"][] = $m->toArray();
}

echo json_encode($response);
