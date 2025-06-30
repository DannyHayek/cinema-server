<?php

require_once("Model.php");

class Actor extends Model {
    protected static string $table = "actors";

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

    public function update(mysqli $mysqli){
        //This function will not be used for this table
    }

}