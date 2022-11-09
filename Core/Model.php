<?php
class Model
{
    public function findById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(['id' => $id]);
        return $req->fetch();
    }

    public function findOne($table, $key, $value)
    {
        $sql = "SELECT * FROM $table WHERE $key = :value";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(['value' => $value]);
        return $req->fetch();
    }

    public function findAll($table)
    {
        $sql = "SELECT * FROM $table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    // public function create($table, $data)
    // {
    //     $sql = "INSERT INTO $table (";
    //     foreach ($data as $key => $value) {
    //         $sql .= "$key, ";
    //     }
    //     $sql = substr($sql, 0, -2);
    //     $sql .= ") VALUES (";
    //     foreach ($data as $key => $value) {
    //         $sql .= ":$key, ";
    //     }
    //     $sql = substr($sql, 0, -2);
    //     $sql .= ")";
    //     $req = Database::getBdd()->prepare($sql);
    //     $req->execute($data);
    // }
}
