<?php 

require(__DIR__ . "/BaseController.php");


class MovieController extends BaseController {


    public function getAllMovies(){
        global $mysqli;

        try {
            if(!isset($_GET["id"])){
                        $movies = Movie::selectAll($mysqli);
                        $movies_array = UserService::usersToArray($movies); 

                        echo ResponseService::success_response($movies_array);
                        return;
                    }

                    $id = $_GET["id"];
                    $movie = Movie::select($mysqli, $id)->toArray();


                    $genresRaw = MovieGenre::selectAll($mysqli, $id);
                    $genreID = [];
                    $genreNames = [];

                    foreach($genresRaw as $g) {
                        $genreID[] = $g->toArray();
                    }

                    foreach($genreID as $g) {
                        $genreNames[] = Genre::select($mysqli, $g[1])->toArray();
                    }

                    $movie[] = $genreNames;


                    $actorsRaw = MovieActor::selectAll($mysqli, $id);
                    $actorID = [];
                    $actorNames = [];

                    foreach($actorsRaw as $a) {
                        $actorID[] = $a->toArray();
                    }

                    foreach($actorID as $a) {
                        $actorNames[] = Actor::select($mysqli, $a[1])->toArray();
                    }

                    $movie[] = $actorNames;
                    
                    echo ResponseService::success_response($movie);
                    return;
        } catch (Throwable $e) {
            echo $e;
        }
    }

    
    public function createMovie(){
        global $mysqli;

        try {
            $name = $_POST["name"];
            $params = ["", $name, $_POST["synopsis"], $_POST["length"], $_POST["age_rating"], $_POST["trailer_link"], ""];

            Movie::insert($mysqli, $params);
            echo "Creating new movie $name..."; 
        } catch (Throwable $e) {
            echo $e;
        }
        
    }


    public function deleteAllMovies(){
        global $mysqli;

        try {
           if(!isset($_GET["id"])){
            Movie::delete($mysqli, 0);
            echo ResponseService::success_response("Deleting all movies...");
            return;
        }

        $id = $_GET["id"];
        Movie::delete($mysqli, $id);
        echo ResponseService::success_response("Deleting movie $id...");
        return; 
        } catch (Throwable $e) {
            echo $e;
        }
        
    }


    public function updateMovie(){
        global $mysqli;

        try {
            $id =  $_POST["id"];

            $params["id"] = $id;
            $params["synopsis"] = $_POST["synopsis"];
            $params["length"] = $_POST["length"];
            $params["age_rating"] = $_POST["age_rating"];
            $params["trailer_link"] = $_POST["trailer_link"];
            $params["poster_url"] = $_POST["poster_url"];

            Movie::update($mysqli, $params, $id);
            echo "Updating movie $id...";
        } catch (Throwable $e) {
            echo $e;
        }
        
    }
        
}
