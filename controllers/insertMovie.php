<?php

require("../models/Model.php");
require("../models/User.php");
require("../models/Genre.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

if(isset($_POST["name"]) && isset($_POST["synopsis"]) && isset($_POST["length"]) && isset($_POST["age_rating"]) && isset($_POST["trailer_link"])) {
    Movie::insert($mysqli, $_POST["name"], $_POST["synopsis"], $_POST["length"], $_POST["age_rating"], $_POST["trailer_link"]);
}