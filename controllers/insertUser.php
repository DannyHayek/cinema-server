<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

// $id = intval($_POST["id"]);
$name = $_POST["name"];
$email = $_POST["email"];
$phone_number = $_POST["phone_number"];
$password = $_POST["password"];

$data = [
    "id" => 200, "name" => $_POST["name"],
    "email" => $_POST["email"],
    "phone_number" => $_POST["phone_number"],
    "password" => $_POST["password"]
];

$temp = new User($data);

$temp->insert($mysqli);

