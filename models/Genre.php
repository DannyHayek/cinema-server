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

    public function toArray() {
        return [$this->id, $this->name];
    }

}