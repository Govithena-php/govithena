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


    public function getUserCount()
    {
        try {
            $sql = "SELECT COUNT(uid) AS userCount FROM user";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getActiveUserCount()
    {
        try {
            $sql = "SELECT COUNT(uid) AS activeUserCount FROM login_credential WHERE status = 'ACTIVE'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }


    public function getGigsCount()
    {
        try {
            $sql = "SELECT category, count(gigId) as numberOfGigs FROM gig WHERE status = 'ACTIVE' GROUP BY(category)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getActiveCategoriesCount()
    {
        try {
            $sql = "SELECT COUNT(*) AS activeCategoriesCount FROM category WHERE status = 'ACTIVE'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchAll()
    {
        try {
            $sql = "SELECT * FROM user";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
