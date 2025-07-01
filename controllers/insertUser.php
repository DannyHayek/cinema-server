<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

try {
    if ($_POST["favorite_genre_id"] == 0) {
        User::insert($mysqli, ["", $_POST["name"], $_POST["email"], $_POST["phone_number"], $_POST["password"], $_POST["age"], null]);
    } else {
        User::insert($mysqli, ["", $_POST["name"], $_POST["email"], $_POST["phone_number"], $_POST["password"], $_POST["age"], $_POST["favorite_genre_id"]]);
    }
} catch (Throwable $e) {
    echo $e;
}
