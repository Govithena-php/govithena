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
            die();
            return null;
        }
    }

    public function checkByEmail($username)
    {
        try {
            $sql = "SELECT username FROM login_credential WHERE username = :value";
            $req = Database::getBdd()->prepare($sql);
            $req->execute(['value' => $username]);
            $res = $req->fetch(PDO::FETCH_ASSOC);

            if ($res) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }


    public function createUser($data)
    {
        try {
            $sql = "INSERT INTO login_credential (uid, username, password, userType) VALUES (:uid, :username, :password, :userType)";
            $req = Database::getBdd()->prepare($sql);
            $req->execute(['uid' => $data['uid'], 'username' => $data['username'], 'password' => $data['password'], 'userType' => $data['userType']]);

            if ($req->rowCount() > 0) {
                try {
                    $sql = "INSERT INTO user (uid, firstName, lastName) VALUES (:uid, :firstName, :lastName)";
                    $req = Database::getBdd()->prepare($sql);
                    $req->execute(['uid' => $data['uid'], 'firstName' => $data['firstName'], 'lastName' => $data['lastName']]);

                    if ($req->rowCount() > 0) {
                        return ['status' => true, 'data' => true];
                    } else {
                        return ['status' => true, 'data' => false];
                    }
                } catch (PDOException $e) {
                    return ['status' => false, 'data' => $e->getMessage()];
                }
            }
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }



    public function fetchByEmail($username)
    {
        try {
            $sql = "SELECT * FROM login_credential INNER JOIN user ON login_credential.uid = user.uid WHERE username = :value";
            $req = Database::getBdd()->prepare($sql);
            $req->execute(['value' => $username]);
            $res = $req->fetch(PDO::FETCH_ASSOC);

            if ($res) {
                return ['status' => true, 'data' => $res];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function createUser1($data)
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
            $e->getMessage();
            die();
            return null;
        }
    }
}
