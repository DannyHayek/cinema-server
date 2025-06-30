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

    protected static string $attributes = "name, synopsis, length, age_rating, trailer_link";
    protected static string $params;
    protected static string $bind = "ississs";


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

    // public function update (mysqli $mysqli) {
    //     $sql = sprintf("UPDATE %s SET name = ?, synopsis = ?, length = ?, age_rating = ?, trailer_link = ? WHERE id = ?", static::$table);

    //     $query = $mysqli->prepare($sql);
    //     $query->bind_param("ssissi", $this->name, $this->synopsis, $this->length, $this->age_rating, $this->trailer_link, $this->id);
    //     $query->execute();
    // }
}
