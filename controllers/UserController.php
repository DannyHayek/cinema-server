<?php 

require(__DIR__ . "/BaseController.php");


class UserController extends BaseController {


    public function getAllUsers(){
        global $mysqli;

        try {
            if(!isset($_GET["id"])){
                        $users = User::selectAll($mysqli);
                        $users_array = UserService::usersToArray($users); 
                        echo ResponseService::success_response($users_array);
                        return;
                    }

                    $id = $_GET["id"];
                    $article = User::select($mysqli, $id)->toArray();
                    echo ResponseService::success_response($article);
                    return;
        } catch (Throwable $e) {
            echo $e;
        }
    }

    
    public function createUser(){
        global $mysqli;

        try {
            $name = $_POST["name"];
            $params = ["", $name, $_POST["email"], $_POST["phone_number"], $_POST["password"], $_POST["age"], $_POST["favorite_genre_id"]];

            User::insert($mysqli, $params);
            echo "Creating new user $name..."; 
        } catch (Throwable $e) {
            echo $e;
        }
        
    }


    public function deleteAllUsers(){
        global $mysqli;

        try {
           if(!isset($_GET["id"])){
            User::delete($mysqli, 0);
            echo ResponseService::success_response("Deleting all users...");
            return;
        }

        $id = $_GET["id"];
        User::delete($mysqli, $id);
        echo ResponseService::success_response("Deleting user $id...");
        return; 
        } catch (Throwable $e) {
            echo $e;
        }
        
    }


    public function updateUser(){
        global $mysqli;

        try {
            $id =  $_POST["id"];

            $params["id"] = $id;
            $params["name"] = $_POST["name"];
            $params["email"] = $_POST["email"];
            $params["phone_number"] = $_POST["phone_number"];
            $params["password"] = $_POST["password"];
            $params["age"] = $_POST["age"];
            $params["favorite_genre_id"] = $_POST["favorite_genre_id"];

            User::update($mysqli, $params, $id);
            echo "Updating user $id...";
        } catch (Throwable $e) {
            echo $e;
        }
        
    }

    public function login() {
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
