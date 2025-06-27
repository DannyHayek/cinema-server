<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

if(!isset($_GET["id"])) {
    $users = User::selectAll($mysqli);

    $response["users"] = [];

    foreach($users as $u) {
        $response["users"][] = $u->toArray();
    }

    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$user = User::select($mysqli, $id);
$response["user"] = $user->toArray();

echo json_encode($response);
