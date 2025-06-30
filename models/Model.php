<?php

abstract class Model {
    protected static string $table;
    protected static string $primary_key = "id";

    protected static string $attributes;
    protected static string $question_marks;
    protected static string $params;
    protected static string $bind;


    public static function select (mysqli $mysqli, int $id) {
        $sql = sprintf(("SELECT * FROM %s WHERE %s = ?"), static::$table, static::$primary_key);

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function selectAll (mysqli $mysqli, int $id = 0) {
        if ($id == 0) {
            $sql = sprintf(("SELECT * FROM %s"), static::$table);

            $query = $mysqli->prepare($sql);
            $query->execute();

            $data = $query->get_result();
            $objects = [];

            while ($row = $data->fetch_assoc()) {
                $objects[] = new static($row);
            }

            return $objects;
        }

        $sql = sprintf(("SELECT * FROM %s WHERE %s = ?"), static::$table, static::$primary_key);

        $query = $mysqli->prepare($sql);
        
        $query->bind_param("i", $id);

        $query->execute();

        $data = $query->get_result();
        $objects = [];

        while ($row = $data->fetch_assoc()) {
            $objects[] = new static($row);
        }

        return $objects;

        
    }

    public static function insert (mysqli $mysqli, array $params) {
        $sql = sprintf("INSERT INTO %s VALUES (%s)",
        static::$table, static::$question_marks);
    
        $query = $mysqli->prepare($sql);
        $query->bind_param(static::$bind, ...$params);
        $query->execute();
    }

    abstract public function update (mysqli $mysqli);

    public static function delete (mysqli $mysqli, int $id) {
        $sql = sprintf("DELETE FROM %s WHERE %s = ?", static::$table, static::$primary_key);

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
    }
}

