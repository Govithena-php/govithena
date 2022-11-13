<?php

class User extends Model
{

    public function findByEmail($username)
    {
        $sql = "SELECT * FROM login_credential WHERE username = :value";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(['value' => $username]);
        return $req->fetch();
    }

    public function create($data)
    {
        try {
            $sql = "INSERT INTO login_credential (uid, username, password) VALUES (:uid, :username, :password)";
            $req = Database::getBdd()->prepare($sql);
            $req->execute([
                'uid' => $data['uid'],
                'username' => $data['username'],
                'password' => $data['password'],
            ]);
            return $req->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function createUser($data)
    {
        try {
            $sql = "INSERT INTO user (uid, fName, lName) VALUES (:uid, :fName, :lName)";
            $req = Database::getBdd()->prepare($sql);
            $req->execute([
                'uid' => $data['uid'],
                'fName' => $data['fName'],
                'lName' => $data['lName'],
            ]);
            return $req->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
