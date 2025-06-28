<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");


$status = http_response_code(200);
$reponse["status"] = [$status];

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $user = User::select($mysqli, $id);

    if ($user == null) {
        return null;
    }

    $response["user"] = $user->toArray();

    echo json_encode($response);
    return;
}

if(isset($_GET["email"])){
    $users = getAllUsers($mysqli);
    $email = $_GET["email"];
    $response["users"] = "";

    foreach($users["users"] as $u) {

       if ($u[2] == $email) {
            echo json_encode($u);
            return;
       }
    }

    return;
}

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone_number"]) && isset($_POST["password"]) && isset($_POST["favGenre"])) {
    User::insert($mysqli, $_POST["name"], $_POST["email"], $_POST["phone_number"], $_POST["password"], $_POST["age"], $_POST["favGenre"]);
    return;
}

echo json_encode(getAllUsers($mysqli));

function getAllUsers ($mysqli) {
    $users = User::selectAll($mysqli);

    $response["users"] = [];

    foreach($users as $u) {
        // echo json_encode($u);
        $response["users"][] = $u->toArray();
    }

    return $response;
}
