<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$db_host = "localhost";
$db_name = "cinema_db";
$db_user = "root";
$db_pass = null;

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);