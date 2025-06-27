<?php

require_once("Model.php");

class User extends Model {
    protected static string $table = "users";

    private int $id;
    private string $name;
    private string $email;
    private string $phone_number;
    private string $password;

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->phone_number = $data["phone_number"];
        $this->password = $data["password"];
    }

    public function toArray() {
        return [$this->id, $this->name, $this->email, $this->phone_number, $this->password];
    }

    public function insert (mysqli $mysqli) {
        $sql = sprintf("INSERT INTO %s (name, email, phone_number, password) VALUES (%s, %s, %s, %s)",
        static::$table, $this->name, $this->email, $this->phone_number, $this->password);
    
        $query = $mysqli->prepare($sql);
        $query->bind_param("ssss", $name, $email, $phone_number, $password);
        $query->execute();
    }
}
