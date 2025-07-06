<?php 

require(__DIR__ . "/UserController.php");


class AuthController extends UserController {


    public function login(){
        global $mysqli;


        try {
            if(isset($_GET["email"])){
            $users = User::selectAll($mysqli);
            $users_array = UserService::usersToArray($users); 


            $email = $_GET["email"];
            $response["user"] = "";


            foreach($users_array as $u) {
                if ($u[2] == $email) {
                        echo ResponseService::success_response($u);
                        break;
                }
            }

            return;
            }
        } catch (Throwable $e) {
            echo $e;
        }
    }

    public function signup() {
        global $mysqli;

        try {
            UserController::createUser();
        } catch (Throwable $e) {
            echo $e;
        }
    }

}

