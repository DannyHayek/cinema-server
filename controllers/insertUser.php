<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone_number"]) && isset($_POST["password"]) && isset($_POST["favGenre"])) {
    User::insert($mysqli, $_POST["name"], $_POST["email"], $_POST["phone_number"], $_POST["password"], $_POST["age"], $_POST["favGenre"]);
}