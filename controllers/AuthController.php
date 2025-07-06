<?php 

require(__DIR__ . "/BaseController.php");


class AuthController extends BaseController {


    public function login(){
        global $mysqli;


        try {
            if(isset($_GET["email"])){
            $users = User::selectAll($mysqli);
            $users_array = UserService::usersToArray($users); 

            // echo json_encode($users_array);

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

}

