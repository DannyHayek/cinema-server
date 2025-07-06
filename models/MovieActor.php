<?php

require_once("Model.php");

class MovieActor extends Model {
    protected static string $table = "movies_has_actors";
    protected static string $primary_key = "movies_id";

    private int $movies_id;
    private int $actors_id;

    public function __construct(array $data)
    {
        $this->movies_id = $data["movies_id"];
        $this->actors_id = $data["actors_id"];
    }

    public function toArray() {
        return [$this->movies_id, $this->actors_id];
    }

}