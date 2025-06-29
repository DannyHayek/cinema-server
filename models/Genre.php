<?php

require_once("Model.php");

class Genre extends Model {
    protected static string $table = "genres";

    private int $id;
    private string $name;

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->name = $data["name"];
    }

    public static function insert(mysqli $mysqli){
        //This function will not be used for genres
    }

    public function update(mysqli $mysqli){
        //This function will not be used for genres
    }

}