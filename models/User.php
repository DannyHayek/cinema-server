<?php

require_once("Model.php");

class User extends Model {
    protected static string $table = "users";

    private int $id;
    private string $name;
    private string $email;
    private string $phone_number;
    private string $password;
    private int $age;
    private int $genre_id;
    protected static string $attributes = "name, email, phone_number, password, age, favorite_genre_id";
    protected static string $bind = "issssii";


    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->phone_number = $data["phone_number"];
        $this->password = $data["password"];

        if ($data["age"] == null) {
            $this->age = 0;
        } else {
            $this->age = $data["age"];
        }

        if ($data["favorite_genre_id"] == null) {
            $this->genre_id = 0;
        } else {
            $this->genre_id = $data["favorite_genre_id"];
        }
        
    }

    
    public function toArray() {
        return [$this->id, $this->name, $this->email, $this->phone_number, $this->password, $this->age, $this->genre_id];
    }

}
