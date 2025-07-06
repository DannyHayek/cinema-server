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


    // public function deleteAllArticles(){
    //     global $mysqli;

    //     try {
    //        if(!isset($_GET["id"])){
    //         Article::delete($mysqli, 0);
    //         echo ResponseService::success_response("Deleting all articles...");
    //         return;
    //     }

    //     $id = $_GET["id"];
    //     Article::delete($mysqli, $id);
    //     echo ResponseService::success_response("Deleting article $id...");
    //     return; 
    //     } catch (Throwable $e) {
    //         echo $e;
    //     }
        
    // }


    // public function addArticle(){
    //     global $mysqli;

    //     try {
    //        $name = $_POST["name"];
    //         $params = ["", $name, $_POST["author"], $_POST["description"], $_POST["category_id"]];

    //         Article::insert($mysqli, $params);
    //         echo "Creating new article $name..."; 
    //     } catch (Throwable $e) {
    //         echo $e;
    //     }
        
    // }

    // public function updateArticle(){
    //     global $mysqli;

    //     try {
    //         $id =  $_POST["id"];

    //         $params["id"] = $id;
    //         $params["name"] = $_POST["name"];
    //         $params["author"] = $_POST["author"];
    //         $params["description"] = $_POST["description"];
    //         $params["category_id"] = $_POST["category_id"];

    //         Article::update($mysqli, $params, $id);
    //         echo "Updating article $id...";
    //     } catch (Throwable $e) {
    //         echo $e;
    //     }
        
    // }

    // public function getArticlesByCategory() {
    //     global $mysqli;

    //     try {
    //         $cat_id = $_GET["id"];

    //         $articles = Article::all($mysqli);

    //         $artByCat = [];
    //         $articleCategories = [];

    //         foreach($articles as $a) {
    //             if ($a->toArray()[4] == $cat_id) {
    //                 $artByCat[] = $a->toArray();
    //             }
    //         }

    //         $categories = Category::all($mysqli);

    //         foreach ($categories as $c) {
    //             if ($c->toArray()[0] == $cat_id) {
    //                 $artByCat[] = $c->toArray()[1];
    //                 break;
    //             }
    //         }

    //         echo json_encode($artByCat); 
    //     } catch (Throwable $e) {
    //         echo $e;
    //     }
        

    // }
}
