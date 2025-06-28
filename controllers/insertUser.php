<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");

User::insert($mysqli, $_POST["email"], $_POST["name"], $_POST["phone_number"], $_POST["password"], $_POST["age"], $_POST["favGenre"]);

