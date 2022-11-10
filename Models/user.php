<?php

class User extends Model
{

    public function findByEmail($username)
    {
        $sql = "SELECT * FROM usercredentials WHERE username = :value";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(['value' => $username]);
        return $req->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO usercredentials (username, password) VALUES (:username, :password)";
        $req = Database::getBdd()->prepare($sql);
        $req->execute($data);
        return $req->fetch();
    }
}
