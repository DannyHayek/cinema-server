<?php

require("../models/Model.php");
require("../models/User.php");
require("../models/Genre.php");
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
            $favGenre = Genre::select($mysqli, $u[6]);
            $u[7] = $u[6];
            $u[6] = $favGenre->toArray()[1];
            echo json_encode($u);
            return;
       }
    }

    return;
}

echo json_encode(getAllUsers($mysqli));

function getAllUsers ($mysqli) {
    $users = User::selectAll($mysqli);

    $temp["users"] = [];
    $response["users"] = [];

    foreach($users as $u) {
        $temp["users"][] = $u->toArray();
    }

    foreach($temp["users"] as $u) {
        echo($u[6]);
        if ($u[6] == 0) {
            $favGenre = null;
            $u[7] = $u[6];
            $u[6] = $favGenre;
            $response["users"][] = $u;
        } else {
            $favGenre = Genre::select($mysqli, $u[6])->toArray();
            $u[7] = $u[6];
            $u[6] = $favGenre[1];
            $response["users"][] = $u;
        }
        echo (json_encode($favGenre));

    }

    return $response;
}
