<?php

class User extends Model
{

    public function findByEmail($username)
    {
        return $this->findOne('usercredentials', 'username', $username);
    }

    public function create($data)
    {
        $sql = "INSERT INTO usercredentials (username, password) VALUES (:username, :password)";
        $req = Database::getBdd()->prepare($sql);
        $req->execute($data);
        return $req->fetch();
    }
}
