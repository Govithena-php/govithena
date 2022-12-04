<?php

class User extends Model
{


    function viewFarmer($id)
    {
        try {
            $sql = "SELECT * FROM user WHERE uid = :id";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $farmer = $stmt->fetch(PDO::FETCH_ASSOC);
            return $farmer;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function findByEmail($username)
    {
        try {
            $sql = "SELECT * FROM login_credential WHERE username = :value";
            $req = Database::getBdd()->prepare($sql);
            $req->execute(['value' => $username]);
            return $req->fetch();
        } catch (PDOException $e) {
            return null;
        }
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
            return null;
        }
    }

    public function createUser($data)
    {
        try {
            $sql = "INSERT INTO user (uid, firstName, lastName) VALUES (:uid, :firstName, :lastName)";
            $req = Database::getBdd()->prepare($sql);
            $req->execute([
                'uid' => $data['uid'],
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
            ]);
            return $req->rowCount();
        } catch (PDOException $e) {
            return null;
        }
    }
}
