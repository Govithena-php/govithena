<?php

class Admin
{
    public function fetchAllActiveUsers()
    {
        try {
            $sql = "SELECT u.uid, lc.username, u.firstName, u.lastName, u.phoneNumber, u.city, u.image, lc.userType, lc.createdAt, u.image FROM user u INNER JOIN login_credential lc ON u.Uid = lc.Uid  WHERE lc.status = 'ACTIVE' ORDER BY lc.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchAllSuspendedUsers()
    {
        try {
            $sql = "SELECT u.uid, lc.username, u.firstName, u.lastName, u.phoneNumber, u.city, u.image, lc.userType, lc.createdAt, u.image FROM user u INNER JOIN login_credential lc ON u.Uid = lc.Uid  WHERE lc.status = 'SUSPENDED' ORDER BY lc.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function suspendUser($id)
    {
        try {
            $sql = "UPDATE login_credential SET status = 'SUSPENDED' WHERE uid = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $id]);
            return ['success' => true];
        } catch (PDOException $e) {
            die($e->getMessage());
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function reactivateUser($id)
    {
        try {
            $sql = "UPDATE login_credential SET status = 'ACTIVE' WHERE uid = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $id]);
            return ['success' => true];
        } catch (PDOException $e) {
            die($e->getMessage());
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
