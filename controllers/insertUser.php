<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

try {
    User::insert($mysqli, ["", $_POST["name"], $_POST["email"], $_POST["phone_number"], $_POST["password"], $_POST["age"], $_POST["favGenre"]]);
} catch (Throwable $e) {
    echo $e;
}
