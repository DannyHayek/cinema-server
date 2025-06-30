<?php

require("../models/Model.php");
require("../models/User.php");
require("../models/Movie.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

try {
    Movie::insert($mysqli, ["", $_POST["name"], $_POST["synopsis"], $_POST["length"], $_POST["age_rating"], $_POST["trailer_link"], ""]);
} catch (Throwable $e) {
    echo $e;
}
