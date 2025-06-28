<?php

require_once("Model.php");

class Movie extends Model {
    protected static string $table = "movies";

    private int $id;
    private string $name;
    private string $synopsis;
    private string $length;
    private string $age_rating;
    private string $trailer_link;
    private string $genre;


    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->synopsis = $data["synopsis"];
        $this->length = $data["length"];
        $this->age_rating = $data["age_rating"];
        $this->trailer_link = $data["trailer_link"];
    }

    public function toArray() {
        return [$this->id, $this->name, $this->synopsis, $this->length, $this->age_rating, $this->trailer_link];
    }

    public static function insert (mysqli $mysqli) {
        //echo
    }

    // public static function insert (mysqli $mysqli, string $name = "", string $synopsis = "", string $age_rating = "", string $password = "", int $age = 0, int $genre_id = 0) {

    //     $sql = sprintf("INSERT INTO %s (name, email, phone_number, password, age, favorite_genre_id) VALUES (?, ?, ?, ?, ?, ?)",
    //     static::$table);
    
    //     $query = $mysqli->prepare($sql);
    //     $query->bind_param("ssssii", $name, $email, $phone_number, $password, $age, $genre_id);
    //     $query->execute();
    // }
}
