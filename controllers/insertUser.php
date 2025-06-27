<?php

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");

User::insert($mysqli, $_POST["name"], $_POST["email"], $_POST["phone_number"], $_POST["password"]);

