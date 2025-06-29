<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");


try{

    $data["id"] = $_POST["id"];
    $data["email"] = $_POST["email"];
    $data["name"] = $_POST["name"];
    $data["phone_number"] = $_POST["phone_number"];
    $data["password"] = $_POST["password"];
    $data["age"] = $_POST["age"];
    $data["favorite_genre_id"] = $_POST["favorite_genre_id"];


    $user = new User($data);

    $user->delete($mysqli);

    echo "User deleted successfully";

} catch (Throwable $e) {
    echo $e;
}


