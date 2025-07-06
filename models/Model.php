<?php

abstract class Model {
    protected static string $table;
    protected static string $primary_key = "id";

    protected string $question_marks;
    protected static string $params;
    protected static string $bind;


    public static function select (mysqli $mysqli, int $id) {
        $sql = sprintf(("SELECT * FROM %s WHERE %s = ?"), static::$table, static::$primary_key);

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        // echo json_encode($data);

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
        $question_marks = "";
        $num = count($params);
        $bind = "";

        for ($i = 0; $i < $num; $i++) {
            if ($i == $num - 1){
                $question_marks .= "?";
            } else {
                $question_marks .= "?,";
            }

            if (is_int($params[$i])) {
                $bind .= "i";
            } else {
                $bind .= "s";
            }
        }

        $sql = sprintf("INSERT INTO %s VALUES (%s)",
        static::$table, $question_marks);
    
        $query = $mysqli->prepare($sql);
        $query->bind_param($bind, ...$params);
        $query->execute();
    }


    public static function update (mysqli $mysqli, array $params, int $id) {
        $keys = array_keys($params);
        $values = array_values($params);
        $values[] = $id;

        $bind = "";

        for ($i = 0; $i < count($keys); $i++) {
            $keys[$i] .= " = ?";

            if (is_int($values[$i])) {
                $bind .= "i";
            } else {
                $bind .= "s";
            }
        }

        $bind .= "i";

        $keys = implode(", " , $keys);

        $sql = sprintf("UPDATE %s SET %s WHERE %s = ?", static::$table, $keys, static::$primary_key);

        $query = $mysqli->prepare($sql);
        $query->bind_param($bind, ...$values);
        $query->execute();
    }

    public static function delete (mysqli $mysqli, int $id) {
        $sql = sprintf("DELETE FROM %s WHERE %s = ?", static::$table, static::$primary_key);

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
    }
}

