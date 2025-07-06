<?php

require("../models/Model.php");
require("../models/Movie.php");
require("../connection/connection.php");


try{

    $data["id"] = $_POST["id"];
    $data["name"] = $_POST["name"];
    $data["synopsis"] = $_POST["synopsis"];
    $data["length"] = $_POST["length"];
    $data["age_rating"] = $_POST["age_rating"];
    $data["trailer_link"] = $_POST["trailer_link"];


    $movie = new Movie($data);

    // $movie->update($mysqli);

    echo "Movie updated successfully";

} catch (Throwable $e) {
    echo $e;
}


