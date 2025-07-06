<?php 

require(__DIR__ . "/UserController.php");


class AuthController extends UserController {


    public function login(){
        global $mysqli;


        try {
            if(isset($_GET["email"])){
                $users = UserController::getAllUsers($mysqli);
                $email = $_GET["email"];
                $response["user"] = "";

                echo json_encode($users);

                // foreach($users["users"] as $u) {
                    
                // if ($u[2] == $email) {
                //         echo json_encode($u);
                // }
                // }

                // return;
            }
        } catch (Throwable $e) {
            echo $e;
        }
    }

}

