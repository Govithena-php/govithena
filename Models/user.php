<?php

class User extends Model
{


    function fetchBy($id)
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


    public function getUserById($uid)
    {
        try {
            $sql = "SELECT LG.uid, LG.username, LG.userType, user.firstName, user.lastName, user.phoneNumber, user.addressLine1, user.addressLine2, user.city, user.district, user.postalCode, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE user.uid = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $uid]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return ['status' => true, 'data' => $user];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }


    public function getJoinedDate($uid)
    {
        try {
            $sql = "SELECT createdAt FROM login_credential WHERE uid = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $uid]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => true, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function updatePassword($email, $passwordHash)
    {
        try {
            $sql = "UPDATE login_credential SET password = :password WHERE username = :email";
            $req = Database::getBdd()->prepare($sql);
            $req->execute(['password' => $passwordHash, 'email' => $email]);
            return ['status' => true];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }
}
