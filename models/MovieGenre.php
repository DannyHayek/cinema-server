<?php

require_once("Model.php");

class MovieGenre extends Model {
    protected static string $table = "movies_has_genres";
    protected static string $primary_key = "movies_id";


    private int $movies_id;
    private int $genres_id;

    public function __construct(array $data)
    {
        $this->movies_id = $data["movies_id"];
        $this->genres_id = $data["genres_id"];
    }

    public function toArray() {
        return [$this->movies_id, $this->genres_id];
    }

    public function update(mysqli $mysqli){
        //This function will not be used for this table
    }

}